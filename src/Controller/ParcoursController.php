<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Parcours;
use App\Form\ParcoursType;
use App\Repository\CommentRepository;
use App\Repository\ParcoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/parcours')]
class ParcoursController extends AbstractController
{
    #[Route('/', name: 'app_parcours_index', methods: ['GET'])]
    public function index(ParcoursRepository $parcoursRepository): Response
    {
        return $this->render('parcours/index.html.twig', [
            'parcours' => $parcoursRepository->findAll(),
        ]);
    }

    #[Route('/sendComment', name: 'app_parcours_send_comment', methods: ['POST'])]
    public function sendComment(
        Request $request,
        ParcoursRepository $parcoursRepository
    ): Response {
        $parcoursId = $request->request->get('id');
        $parcour = $parcoursRepository->find($parcoursId);

        $comment = (new Comment)
            ->addRelation($this->getUser())
            ->setTitre($request->request->get('titre'))
            ->setComment($request->request->get('message'))
            ->setNote($request->request->get('note'))
            ->setRela($parcour);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();

        return $this->redirectToRoute('app_parcours_show', ['id' => $parcour->getId()], Response::HTTP_SEE_OTHER);
    }

    #[Route('/new', name: 'app_parcours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ParcoursRepository $parcoursRepository): Response
    {
        $parcour = new Parcours();
        $form = $this->createForm(ParcoursType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parcoursRepository->save($parcour, true);

            return $this->redirectToRoute('app_parcours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parcours/new.html.twig', [
            'parcour' => $parcour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parcours_show', methods: ['GET'])]
    public function show(Parcours $parcour): Response

    {
        $oeuvres = $parcour->getRelaOeuvre();
        $comment = $parcour->getComment();
        $averageNote = $parcour->getAverageNote();
        return $this->render('parcours/show.html.twig', [
            'parcour' => $parcour,
            'comments' => $comment,
            'oeuvres' => $oeuvres,
            'moyenne' => $averageNote,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_parcours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Parcours $parcour, ParcoursRepository $parcoursRepository): Response
    {
        $form = $this->createForm(ParcoursType::class, $parcour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $parcoursRepository->save($parcour, true);

            return $this->redirectToRoute('app_parcours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parcours/edit.html.twig', [
            'parcour' => $parcour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_parcours_delete', methods: ['POST'])]
    public function delete(Request $request, Parcours $parcour, ParcoursRepository $parcoursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parcour->getId(), $request->request->get('_token'))) {
            $parcoursRepository->remove($parcour, true);
        }

        return $this->redirectToRoute('app_parcours_index', [], Response::HTTP_SEE_OTHER);
    }
}

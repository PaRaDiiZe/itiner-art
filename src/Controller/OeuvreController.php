<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use App\Repository\CategoryRepository;
use App\Repository\ParcoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/oeuvre')]
class OeuvreController extends AbstractController
{
    #[Route('/', name: 'app_oeuvre_index', methods: ['GET'])]
    public function index(OeuvreRepository $oeuvreRepository, CategoryRepository $categoryRepository, Request $request): Response
    {
        $category = $request->query->get('category');


        if ($category == 'all' || $category == NULL) {
            $oeuvres = $oeuvreRepository->findAllOeuvreCat();
        } else {
            $oeuvres = $this->getDoctrine()
                ->getRepository(Oeuvre::class)
                ->findAllOeuvreByIdCateg($category);
        }

        return $this->render('oeuvre/index.html.twig', [
            'oeuvres' => $oeuvres,
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_oeuvre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OeuvreRepository $oeuvreRepository, CategoryRepository $categoryRepository, ParcoursRepository $parcoursRepository): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        $category = $categoryRepository->findAll();
        $parcours = $parcoursRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {

            if ($request->request->get('rela_cat')){
                $oeuvre->setRelaCat($categoryRepository->find($request->request->get('rela_cat')));
            }

            if ($request->request->get('rela_oeuvre')){
                $oeuvre->setRelaOeuvre($parcoursRepository->find($request->request->get('rela_oeuvre')));
            }

            $oeuvreRepository->save($oeuvre, true);

            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oeuvre/new.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
            'category' => $category,
            'parcour' => $parcours
        ]);
    }

    #[Route('/{id}', name: 'app_oeuvre_show', methods: ['GET'])]
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_oeuvre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Oeuvre $oeuvre, CategoryRepository $categoryRepository, OeuvreRepository $oeuvreRepository, ParcoursRepository $parcoursRepository): Response
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        // $categoryRepository->findAll(); permet de récupérer toutes les catégories en BDD 
        $category = $categoryRepository->findAll();
        $parcours = $parcoursRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {

            // $oeuvre->setRelaCat();                   Permet d'insérer le nouvel object category
            // $categoryRepository->find(   (id)  )     Find récupère la catégorie grâce à son id 
            // $request->request->get('rela_cat')       Ceci permet de récupérer la valeur associé dans le formulaire avec le name 'rela_cat'

            if ($request->request->get('rela_cat')){
                $oeuvre->setRelaCat($categoryRepository->find($request->request->get('rela_cat')));
            }

            if ($request->request->get('rela_oeuvre')){
                $oeuvre->setRelaOeuvre($parcoursRepository->find($request->request->get('rela_oeuvre')));
            }
            
            $oeuvreRepository->save($oeuvre, true);

            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
            'category' => $category,
            'parcour' => $parcours
        ]);
    }

    #[Route('/{id}', name: 'app_oeuvre_delete', methods: ['POST'])]
    public function delete(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $oeuvre->getId(), $request->request->get('_token'))) {
            $oeuvreRepository->remove($oeuvre, true);
        }

        return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }
}

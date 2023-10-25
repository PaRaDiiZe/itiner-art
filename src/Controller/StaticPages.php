<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StaticPages extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        $titre = 'Itiner\'Art';

        return $this->render('home.html.twig', [
            'titre' => $titre
        ]);
    }
    /**
     * @Route("/les_parcours", name="parcours")
     */
    public function parcours(): Response
    {
        $titre = 'Nos parcours';

        return $this->render('parcours.html.twig', [
            'titre' => $titre
        ]);
    }
    /**
     * @Route("/oeuvres", name="oeuvre")
     */
    public function oeuvres(): Response
    {
        $titre = 'Les oeuvres';

        return $this->render('oeuvres.html.twig', [
            'titre' => $titre
        ]);
    }
    /**
     * @Route("/presentation", name="prez")
     */
    public function prez(): Response
    {
        $titre = 'Qui sommes-nous ?';

        return $this->render('prez.html.twig', [
            'titre' => $titre
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexion(): Response
    {
        $titre = 'Connexion';

        return $this->render('connexion.html.twig', [
            'titre' => $titre
        ]);
    }



    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription(): Response
    {
        $titre = 'Inscription';

        return $this->render('inscription.html.twig', [
            'titre' => $titre
        ]);
    }


    
    /**
     * @Route("/profil", name="profil")
     */
    public function profil(): Response
    {
        $titre = 'Mon profil';

        return $this->render('profil.html.twig', [
            'titre' => $titre
        ]);
    }

    /**
     * @Route("/mentions-légales", name="mentions")
     */
    public function mentions(): Response
    {
        $titre = 'Mentions Légales';

        return $this->render('mentions.html.twig', [
            'titre' => $titre
        ]);
    }
}

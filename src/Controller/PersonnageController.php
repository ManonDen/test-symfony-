<?php

namespace App\Controller;

// classe utilisé
use App\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    // C'est une annotation permet indiquer ds url si c'est /personnage, il va sur cette fonction
    // si retire le personnage va directement lafficher dès le debut
    #[Route('/', name: 'accueil')]

    public function index(): Response
    {
        // retourne la page index.html.twif dans le dossier personnage
        return $this->render('personnage/index.html.twig');
    }

    #[Route('/persos', name: 'personnages')]

    public function persos(): Response
    {
        Personnage::creerPersonnages();
        // retourne la page index.html.twif dans le dossier personnage
        return $this->render('personnage/persos.html.twig',[
            "players"=>Personnage::$personnages
        ]);
    }

    #[Route('/persos/{nom}', name: 'afficherPersonnage')]

    public function afficherPerso($nom): Response
    {
        Personnage::creerPersonnages();
        $perso=Personnage::getPersonnageParNom($nom);
        //  retourne la page index.html.twif dans le dossier personnage
        return $this->render('personnage/perso.html.twig',[
            "perso"=>$perso
        ]);
    }
}

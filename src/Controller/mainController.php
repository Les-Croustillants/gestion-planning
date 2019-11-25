<?php


namespace App\Controller;



use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Routing\Annotation\Route;

class mainController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return new Response('Hello :)');
    }

    public function inscription()
    {

    }

    public function connexion()
    {

    }

    public function deconnexion()
    {

    }

    public function showListeIntervenants()
    {

    }

    public function showListeMatieres()
    {

    }

    public function showListeJoursFeries()
    {

    }

    public function assignerIntervenant(Boolean $matin, int $idUtilisteur)
    {

    }

    public function showCalendAnnee()
    {

    }

    public function showCalendSemaine(Date $date)
    {

    }

    public function ajouterJoursAbsences()
    {

    }

    public function proposerEchange(Boolean $echangeIntraSemaine)
    {

    }

    public function validerEchange()
    {

    }
}
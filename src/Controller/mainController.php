<?php


namespace App\Controller;



use App\Entity\Calendrier;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;


class mainController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return new Response('Hello :)');
    }

    /**
     * @Route("/calendrier/annee")
     */
    public function showCalendAnnee()
    {
        $em = $this->getDoctrine()->getManager()->getRepository(Calendrier::class);
        $calendrier = new Calendrier();
        //return new Response('Calendrier de l\'annee');
        //return $this->render ('calendrier/calendrier.php');

        $Date = "2019";
        $Utilisateur = 7;

        //$calendrier->getSemaines($Date, $Utilisateur);
        $calendrier->setId(10);
        $result = $calendrier->getIdcalendrier();
        //print_r($result);
        print_r($calendrier);
        return $this->render ('calendrier/calendrier.html.twig', array('result'=> $result));
    }

    /**
     * @Route("/calendrier/semaine/{idSemaine}")
     */
    public function showCalendSemaine($semaine)
    {
        return $this->render ('creneau/affiche.html.twig',
            ['test'=> ucwords(str_replace('-', ' ', $semaine))]);
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
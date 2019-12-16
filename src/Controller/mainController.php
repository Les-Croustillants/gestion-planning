<?php


namespace App\Controller;



use App\Entity\Calendrier;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/calendrier/id")
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
        $result[] = $calendrier->getIdcalendrier();

        return $this->render ('calendrier/calendrier.html.twig', [
            'result'=> $result
        ]);
    }

    /**
     * @Route("/calendrier/annee")
     */
    public function choixAnneeCalend()
    {
        $calendrier = new Calendrier();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $calendrier);

        $formBuilder
            ->add('anneeScolaire',DateTimeType::class)
            ->add('Enregistrer',SubmitType::class);

        $form = $formBuilder->getForm();


        return $this->render ('calendrier/calendrierForm.html.twig', array(
            'result'=> $form->createView()));
    }

    /**
     * @Route("/calendrier/semaine/{idSemaine}")
     */
    public function showCalendSemaine($semaine)
    {
        return $this->render ('creneau/affiche.html.twig',
            ['test'=> ucwords(str_replace('-', ' ', $semaine))]);
    }

    public function deconnexion()
    {
        session_start();
        session_unset();
        session_destroy();
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
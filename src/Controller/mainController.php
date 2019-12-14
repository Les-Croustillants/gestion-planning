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
     * @Route("/inscription")
     */
    public function inscription()
    {
        $inscription = true;
        $submit=isset($_POST['submit']) ? $_POST['submit'] : '';
        require('templates/connexion.php');
        $MailUtilisateur = isset($_POST['MailUtilisateur']) ? $_POST['MailUtilisateur'] : '';
        $MdpUtilisateur = isset($_POST['MdpUtilisateur']) ? hash('gost-crypto', $_POST['MdpUtilisateur']) : '';
        $VerifMdp =  isset($_POST['VerifMdp']) ? hash('gost-crypto', $_POST['VerifMdp']) : '';
        $AdresseUtilisateur = isset($_POST['AdresseUtilisateur']) ? $_POST['AdresseUtilisateur'] : '';
        $NomUtilisateur = isset($_POST['NomUtilisateur']) ? $_POST['NomUtilisateur'] : '';

        if ($submit)
        {
            if($MdpUtilisateur == $VerifMdp)
            {
                $tableau = array("MailUtilisateur" => $MailUtilisateur, "MdpUtilisateur" => $MdpUtilisateur, "NomUtilisateur" => $NomUtilisateur, "AdresseUtilisateur" => $AdresseUtilisateur);
                $utilisateur = new \AtoutProtect\Model\Utilisateur();
                $utilisateur->creationUtilisateur($tableau);
                header('Location: /inscription');
            }
            else {
                echo "les deux mots de passes sont différents";
            }
        }
    }

    /**
     * @Route("/connexion")
     */
    public function connexion()
    {
        $inscription = false;
        $submit=isset($_POST['submit']) ? $_POST['submit'] : '';

        $MailUtilisateur = isset($_POST['MailUtilisateur']) ? $_POST['MailUtilisateur'] : '';
        $MdpUtilisateur = isset($_POST['MdpUtilisateur']) ? hash('gost-crypto', $_POST['MdpUtilisateur']) : '';
        echo $MdpUtilisateur;

        if ($submit)
        {
            $utilisateur = new \AtoutProtect\Model\Utilisateur();

            $tabUtilisateur = $utilisateur->find($MailUtilisateur)->fetch();

            if ($tabUtilisateur['MailUtilisateur']== $MailUtilisateur && $tabUtilisateur['MdpUtilisateur']== $MdpUtilisateur)
            {
                $_SESSION['MailUtilisateur'] = $MailUtilisateur;
                $_SESSION['IdUtilisateur'] = $tabUtilisateur['IdUtilisateur'];
                header('Location: /inscription');
            }
            else
            {
                echo '<script type="text/javascript"> alert("Utilisateur ou mot de passe non reconnu "); </script>';
            }
        }

        return $this->render ('templates/connexion.html.twig', array(
            'result'=> $form->createView()));
        //require('templates/connexion.html.twig');
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
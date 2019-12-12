<?php


namespace App\Controller;



use App\Entity\Calendrier;
use App\Entity\Utilisateur;
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
        $MailUtilisateur[0] = isset($_POST['email']) ? $_POST['email'] : '';
        $MdpUtilisateur[0] = isset($_POST['password']) ? $_POST['password'] : '';
        $submit=isset($_POST['submit']) ? $_POST['submit'] : null;

        $em = $this->getDoctrine()->getEntityManager();

        $user = new Utilisateur();
        $user->setNomutilisateur("toto");

        echo $user->getNomutilisateur();


        $utilisateur = $em->getRepository("App\Entity\Utilisateur")->findBymailutilisateur("mail@test.fr")->getQuey();


        if($utilisateur != null)
        {

            echo $utilisateur->getNomutilisateur();

        }

        if (!$submit) {
            $form = $this->createFormBuilder()//$defaultData
            ->add('Mail', \Symfony\Component\Form\Extension\Core\Type\TextType::class)
                ->add('MotDePasse', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class)
                ->add('Envoyer', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class)
                ->getForm();
            return $this->render('connexion.html.twig', array(
                    'form' => $form->createView(),
                )
            );
        }else{
            return $this->render('calendrier/calendrier.html.twig', array(
                    'result' => $MailUtilisateur,
                )
            );
        }
    }


//    }

    /**
     * @Route("/calendrier/semaine/{idSemaine}")
     */
    public function showCalendSemaine($semaine)
    {
        return $this->render ('creneau/affiche.html.twig',
            ['test'=> ucwords(str_replace('-', ' ', $semaine))]);
    }

    /**
     * @Route("/deconnexion")
     */
    public function deconnexion()
    {
        if(!$_SESSION){
            session_start();
        }
        session_unset();
        session_destroy();
        home();
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
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
        require('templates/connexion.php');
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
    }

    public function deconnexion()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
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
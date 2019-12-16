<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Utilisateur
 *
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="utilisateur_role_FK", columns={"id_role"})})
 * @ORM\Entity

 *///@UniqueEntity(fields={"mailUtilisateur"}, message="There is already an account with this mailUtilisateur")
class Utilisateur implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUtilisateur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomUtilisateur", type="string", length=50, nullable=false)
     */
    private $nomutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomUtilisateur", type="string", length=50, nullable=false)
     */
    private $prenomutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mdpUtilisateur", type="string", length=120, nullable=false)
     */
    private $mdputilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="mailUtilisateur", type="string", length=80, nullable=false)
     */
    private $mailutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneUtilisateur", type="string", length=15, nullable=false)
     */
    private $telephoneutilisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="heures_attribuesUtilisateur", type="integer", nullable=false)
     */
    private $heuresAttribuesutilisateur;

    /**
     * @var \Role
     *
     * @ORM\ManyToOne(targetEntity="Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_role", referencedColumnName="idRole")
     * })
     */
    private $idRole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Indisponible", mappedBy="idUtilisateur")
     */
    private $idIndisponible;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIndisponible = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdutilisateur(): ?int
    {
        return $this->idutilisateur;
    }

    public function getNomutilisateur(): ?string
    {
        return $this->nomutilisateur;
    }

    public function setNomutilisateur(string $nomutilisateur): self
    {
        $this->nomutilisateur = $nomutilisateur;

        return $this;
    }

    public function getPrenomutilisateur(): ?string
    {
        return $this->prenomutilisateur;
    }

    public function setPrenomutilisateur(string $prenomutilisateur): self
    {
        $this->prenomutilisateur = $prenomutilisateur;

        return $this;
    }

    public function getMdputilisateur(): ?string
    {
        return $this->mdputilisateur;
    }

    public function setMdputilisateur(string $mdputilisateur): self
    {
        $this->mdputilisateur = $mdputilisateur;

        return $this;
    }

    public function getMailutilisateur(): ?string
    {
        return $this->mailutilisateur;
    }

    public function setMailutilisateur(string $mailutilisateur): self
    {
        $this->mailutilisateur = $mailutilisateur;

        return $this;
    }

    public function getTelephoneutilisateur(): ?string
    {
        return $this->telephoneutilisateur;
    }

    public function setTelephoneutilisateur(string $telephoneutilisateur): self
    {
        $this->telephoneutilisateur = $telephoneutilisateur;

        return $this;
    }

    public function getHeuresAttribuesutilisateur(): ?int
    {
        return $this->heuresAttribuesutilisateur;
    }

    public function setHeuresAttribuesutilisateur(int $heuresAttribuesutilisateur): self
    {
        $this->heuresAttribuesutilisateur = $heuresAttribuesutilisateur;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->idRole;
    }

    public function setIdRole(?Role $idRole): self
    {
        $this->idRole = $idRole;
        return $this;
    }

    /**
     * @return Collection|Indisponible[]
     */
    public function getIdIndisponible(): Collection
    {
        return $this->idIndisponible;
    }

    public function addIdIndisponible(Indisponible $idIndisponible): self
    {
        if (!$this->idIndisponible->contains($idIndisponible)) {
            $this->idIndisponible[] = $idIndisponible;
            $idIndisponible->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeIdIndisponible(Indisponible $idIndisponible): self
    {
        if ($this->idIndisponible->contains($idIndisponible)) {
            $this->idIndisponible->removeElement($idIndisponible);
            $idIndisponible->removeIdUtilisateur($this);
        }
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->mailutilisateur;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->mdputilisateur;
    }

    public function setPassword(string $password): self
    {
        $this->mdputilisateur = $password;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return ROLE_USER;
    }
}

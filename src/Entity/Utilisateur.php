<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur", indexes={@ORM\Index(name="utilisateur_role_FK", columns={"id_role"})})
 * @ORM\Entity
 */
class Utilisateur
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
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=120, nullable=false)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=80, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=15, nullable=false)
     */
    private $telephone;

    /**
     * @var int
     *
     * @ORM\Column(name="heures_attribues", type="integer", nullable=false)
     */
    private $heuresAttribues;

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
    private $idIndisponnible;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIndisponnible = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdutilisateur(): ?int
    {
        return $this->idutilisateur;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getHeuresAttribues(): ?int
    {
        return $this->heuresAttribues;
    }

    public function setHeuresAttribues(int $heuresAttribues): self
    {
        $this->heuresAttribues = $heuresAttribues;

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
    public function getIdIndisponnible(): Collection
    {
        return $this->idIndisponnible;
    }

    public function addIdIndisponnible(Indisponible $idIndisponnible): self
    {
        if (!$this->idIndisponnible->contains($idIndisponnible)) {
            $this->idIndisponnible[] = $idIndisponnible;
            $idIndisponnible->addIdUtilisateur($this);
        }

        return $this;
    }

    public function removeIdIndisponnible(Indisponible $idIndisponnible): self
    {
        if ($this->idIndisponnible->contains($idIndisponnible)) {
            $this->idIndisponnible->removeElement($idIndisponnible);
            $idIndisponnible->removeIdUtilisateur($this);
        }

        return $this;
    }

}

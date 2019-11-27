<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Indisponible
 *
 * @ORM\Table(name="indisponible")
 * @ORM\Entity
 */
class Indisponible
{
    /**
     * @var int
     *
     * @ORM\Column(name="idIndisponible", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idindisponible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Nomjour", inversedBy="idIndisponible")
     * @ORM\JoinTable(name="choisir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_indisponible", referencedColumnName="idIndisponible")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_nomJour", referencedColumnName="idNomJour")
     *   }
     * )
     */
    private $idNomjour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", inversedBy="idIndisponible")
     * @ORM\JoinTable(name="etre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_indisponible", referencedColumnName="idIndisponible")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="idUtilisateur")
     *   }
     * )
     */
    private $idUtilisateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="LongueDuree", inversedBy="idIndisponible")
     * @ORM\JoinTable(name="poser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_indisponible", referencedColumnName="idIndisponible")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_LongueDuree", referencedColumnName="idLongueDuree")
     *   }
     * )
     */
    private $idLongueduree;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="DemiJournee", inversedBy="idIndisponible")
     * @ORM\JoinTable(name="relier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_indisponible", referencedColumnName="idIndisponible")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_demi_journee", referencedColumnName="idDemiJournee")
     *   }
     * )
     */
    private $idDemiJournee;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idNomjour = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUtilisateur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idLongueduree = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idDemiJournee = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdindisponible(): ?int
    {
        return $this->idindisponible;
    }

    /**
     * @return Collection|Nomjour[]
     */
    public function getIdNomjour(): Collection
    {
        return $this->idNomjour;
    }

    public function addIdNomjour(Nomjour $idNomjour): self
    {
        if (!$this->idNomjour->contains($idNomjour)) {
            $this->idNomjour[] = $idNomjour;
        }

        return $this;
    }

    public function removeIdNomjour(Nomjour $idNomjour): self
    {
        if ($this->idNomjour->contains($idNomjour)) {
            $this->idNomjour->removeElement($idNomjour);
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->idUtilisateur;
    }

    public function addIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        if (!$this->idUtilisateur->contains($idUtilisateur)) {
            $this->idUtilisateur[] = $idUtilisateur;
        }

        return $this;
    }

    public function removeIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        if ($this->idUtilisateur->contains($idUtilisateur)) {
            $this->idUtilisateur->removeElement($idUtilisateur);
        }

        return $this;
    }

    /**
     * @return Collection|LongueDuree[]
     */
    public function getIdLongueduree(): Collection
    {
        return $this->idLongueduree;
    }

    public function addIdLongueduree(LongueDuree $idLongueduree): self
    {
        if (!$this->idLongueduree->contains($idLongueduree)) {
            $this->idLongueduree[] = $idLongueduree;
        }

        return $this;
    }

    public function removeIdLongueduree(LongueDuree $idLongueduree): self
    {
        if ($this->idLongueduree->contains($idLongueduree)) {
            $this->idLongueduree->removeElement($idLongueduree);
        }

        return $this;
    }

    /**
     * @return Collection|DemiJournee[]
     */
    public function getIdDemiJournee(): Collection
    {
        return $this->idDemiJournee;
    }

    public function addIdDemiJournee(DemiJournee $idDemiJournee): self
    {
        if (!$this->idDemiJournee->contains($idDemiJournee)) {
            $this->idDemiJournee[] = $idDemiJournee;
        }

        return $this;
    }

    public function removeIdDemiJournee(DemiJournee $idDemiJournee): self
    {
        if ($this->idDemiJournee->contains($idDemiJournee)) {
            $this->idDemiJournee->removeElement($idDemiJournee);
        }

        return $this;
    }

}

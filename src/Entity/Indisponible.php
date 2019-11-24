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
     * @ORM\Column(name="idIndisponnible", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idindisponnible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", inversedBy="idIndisponnible")
     * @ORM\JoinTable(name="etre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_indisponnible", referencedColumnName="idIndisponnible")
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
     * @ORM\ManyToMany(targetEntity="DemiJournee", inversedBy="idIndisponnible")
     * @ORM\JoinTable(name="relier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_indisponnible", referencedColumnName="idIndisponnible")
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
        $this->idUtilisateur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idDemiJournee = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdindisponnible(): ?int
    {
        return $this->idindisponnible;
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

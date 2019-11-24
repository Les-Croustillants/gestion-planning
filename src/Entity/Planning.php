<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning")
 * @ORM\Entity
 */
class Planning
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPlanning", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idplanning;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_scolaire", type="date", nullable=false)
     */
    private $anneeScolaire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="JoursFeries", inversedBy="idPlanning")
     * @ORM\JoinTable(name="inclure",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_planning", referencedColumnName="idPlanning")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_jours_feries", referencedColumnName="idFerier")
     *   }
     * )
     */
    private $idJoursFeries;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idJoursFeries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdplanning(): ?int
    {
        return $this->idplanning;
    }

    public function getAnneeScolaire(): ?\DateTimeInterface
    {
        return $this->anneeScolaire;
    }

    public function setAnneeScolaire(\DateTimeInterface $anneeScolaire): self
    {
        $this->anneeScolaire = $anneeScolaire;

        return $this;
    }

    /**
     * @return Collection|JoursFeries[]
     */
    public function getIdJoursFeries(): Collection
    {
        return $this->idJoursFeries;
    }

    public function addIdJoursFery(JoursFeries $idJoursFery): self
    {
        if (!$this->idJoursFeries->contains($idJoursFery)) {
            $this->idJoursFeries[] = $idJoursFery;
        }

        return $this;
    }

    public function removeIdJoursFery(JoursFeries $idJoursFery): self
    {
        if ($this->idJoursFeries->contains($idJoursFery)) {
            $this->idJoursFeries->removeElement($idJoursFery);
        }

        return $this;
    }

}

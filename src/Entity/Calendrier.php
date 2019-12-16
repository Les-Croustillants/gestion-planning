<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Calendrier
 *
 * @ORM\Table(name="calendrier")
 * @ORM\Entity
 */
class Calendrier
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCalendrier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcalendrier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="annee_scolaire", type="date", nullable=false)
     */
    private $anneeScolaire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Periode", inversedBy="idCalendrier")
     * @ORM\JoinTable(name="comprendre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_Calendrier", referencedColumnName="idCalendrier")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_Periode", referencedColumnName="idPeriode")
     *   }
     * )
     */
    private $idPeriode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPeriode = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdcalendrier(): ?int
    {
        return $this->idcalendrier;
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
     * @return Collection|Periode[]
     */
    public function getIdPeriode(): Collection
    {
        return $this->idPeriode;
    }

    public function addIdPeriode(Periode $idPeriode): self
    {
        if (!$this->idPeriode->contains($idPeriode)) {
            $this->idPeriode[] = $idPeriode;
        }

        return $this;
    }

    public function removeIdPeriode(Periode $idPeriode): self
    {
        if ($this->idPeriode->contains($idPeriode)) {
            $this->idPeriode->removeElement($idPeriode);
        }

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Periode
 *
 * @ORM\Table(name="periode")
 * @ORM\Entity
 */
class Periode
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPeriode", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idperiode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var bool
     *
     * @ORM\Column(name="isFormation", type="boolean", nullable=false)
     */
    private $isformation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Calendrier", mappedBy="idPeriode")
     */
    private $idCalendrier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCalendrier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdperiode(): ?int
    {
        return $this->idperiode;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getIsformation(): ?bool
    {
        return $this->isformation;
    }

    public function setIsformation(bool $isformation): self
    {
        $this->isformation = $isformation;

        return $this;
    }

    /**
     * @return Collection|Calendrier[]
     */
    public function getIdCalendrier(): Collection
    {
        return $this->idCalendrier;
    }

    public function addIdCalendrier(Calendrier $idCalendrier): self
    {
        if (!$this->idCalendrier->contains($idCalendrier)) {
            $this->idCalendrier[] = $idCalendrier;
            $idCalendrier->addIdPeriode($this);
        }

        return $this;
    }

    public function removeIdCalendrier(Calendrier $idCalendrier): self
    {
        if ($this->idCalendrier->contains($idCalendrier)) {
            $this->idCalendrier->removeElement($idCalendrier);
            $idCalendrier->removeIdPeriode($this);
        }

        return $this;
    }

}

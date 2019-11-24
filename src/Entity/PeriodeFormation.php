<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PeriodeFormation
 *
 * @ORM\Table(name="periode_formation", indexes={@ORM\Index(name="periode_formation_planning_FK", columns={"id_planning"})})
 * @ORM\Entity
 */
class PeriodeFormation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPeriodeFormation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idperiodeformation;

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
     * @var \Planning
     *
     * @ORM\ManyToOne(targetEntity="Planning")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_planning", referencedColumnName="idPlanning")
     * })
     */
    private $idPlanning;

    public function getIdperiodeformation(): ?int
    {
        return $this->idperiodeformation;
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

    public function getIdPlanning(): ?Planning
    {
        return $this->idPlanning;
    }

    public function setIdPlanning(?Planning $idPlanning): self
    {
        $this->idPlanning = $idPlanning;

        return $this;
    }


}

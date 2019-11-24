<?php

namespace App\Entity;

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
     * @var \DateTime
     *
     * @ORM\Column(name="dt_debut", type="date", nullable=false)
     */
    private $dtDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_fin", type="date", nullable=false)
     */
    private $dtFin;

    /**
     * @var \Indisponible
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Indisponible")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_indisponnible", referencedColumnName="idIndisponnible")
     * })
     */
    private $idIndisponnible;

    public function getDtDebut(): ?\DateTimeInterface
    {
        return $this->dtDebut;
    }

    public function setDtDebut(\DateTimeInterface $dtDebut): self
    {
        $this->dtDebut = $dtDebut;

        return $this;
    }

    public function getDtFin(): ?\DateTimeInterface
    {
        return $this->dtFin;
    }

    public function setDtFin(\DateTimeInterface $dtFin): self
    {
        $this->dtFin = $dtFin;

        return $this;
    }

    public function getIdIndisponnible(): ?Indisponible
    {
        return $this->idIndisponnible;
    }

    public function setIdIndisponnible(?Indisponible $idIndisponnible): self
    {
        $this->idIndisponnible = $idIndisponnible;

        return $this;
    }


}

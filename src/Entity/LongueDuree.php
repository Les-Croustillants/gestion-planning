<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * LongueDuree
 *
 * @ORM\Table(name="longue_duree")
 * @ORM\Entity
 */
class LongueDuree
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLongueDuree", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlongueduree;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Indisponible", mappedBy="idLongueduree")
     */
    private $idIndisponible;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIndisponible = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdlongueduree(): ?int
    {
        return $this->idlongueduree;
    }

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
            $idIndisponible->addIdLongueduree($this);
        }

        return $this;
    }

    public function removeIdIndisponible(Indisponible $idIndisponible): self
    {
        if ($this->idIndisponible->contains($idIndisponible)) {
            $this->idIndisponible->removeElement($idIndisponible);
            $idIndisponible->removeIdLongueduree($this);
        }

        return $this;
    }

}

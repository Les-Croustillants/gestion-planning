<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * JoursFeries
 *
 * @ORM\Table(name="jours_feries")
 * @ORM\Entity
 */
class JoursFeries
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFerier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idferier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date", nullable=false)
     */
    private $jour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Planning", mappedBy="idJoursFeries")
     */
    private $idPlanning;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPlanning = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdferier(): ?int
    {
        return $this->idferier;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * @return Collection|Planning[]
     */
    public function getIdPlanning(): Collection
    {
        return $this->idPlanning;
    }

    public function addIdPlanning(Planning $idPlanning): self
    {
        if (!$this->idPlanning->contains($idPlanning)) {
            $this->idPlanning[] = $idPlanning;
            $idPlanning->addIdJoursFery($this);
        }

        return $this;
    }

    public function removeIdPlanning(Planning $idPlanning): self
    {
        if ($this->idPlanning->contains($idPlanning)) {
            $this->idPlanning->removeElement($idPlanning);
            $idPlanning->removeIdJoursFery($this);
        }

        return $this;
    }

}

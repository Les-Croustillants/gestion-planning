<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Nomjour
 *
 * @ORM\Table(name="nomjour")
 * @ORM\Entity
 */
class Nomjour
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNomJour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnomjour;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleNomJour", type="string", length=20, nullable=false)
     */
    private $libellenomjour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Indisponible", mappedBy="idNomjour")
     */
    private $idIndisponible;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIndisponible = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdnomjour(): ?int
    {
        return $this->idnomjour;
    }

    public function getLibellenomjour(): ?string
    {
        return $this->libellenomjour;
    }

    public function setLibellenomjour(string $libellenomjour): self
    {
        $this->libellenomjour = $libellenomjour;

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
            $idIndisponible->addIdNomjour($this);
        }

        return $this;
    }

    public function removeIdIndisponible(Indisponible $idIndisponible): self
    {
        if ($this->idIndisponible->contains($idIndisponible)) {
            $this->idIndisponible->removeElement($idIndisponible);
            $idIndisponible->removeIdNomjour($this);
        }

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * DemiJournee
 *
 * @ORM\Table(name="demi_journee")
 * @ORM\Entity
 */
class DemiJournee
{
    /**
     * @var int
     *
     * @ORM\Column(name="idDemiJournee", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddemijournee;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleDemiJournee", type="string", length=15, nullable=false)
     */
    private $libelledemijournee;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Indisponible", mappedBy="idDemiJournee")
     */
    private $idIndisponible;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIndisponible = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIddemijournee(): ?int
    {
        return $this->iddemijournee;
    }

    public function getLibelledemijournee(): ?string
    {
        return $this->libelledemijournee;
    }

    public function setLibelledemijournee(string $libelledemijournee): self
    {
        $this->libelledemijournee = $libelledemijournee;

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
            $idIndisponible->addIdDemiJournee($this);
        }

        return $this;
    }

    public function removeIdIndisponible(Indisponible $idIndisponible): self
    {
        if ($this->idIndisponible->contains($idIndisponible)) {
            $this->idIndisponible->removeElement($idIndisponible);
            $idIndisponible->removeIdDemiJournee($this);
        }

        return $this;
    }

}

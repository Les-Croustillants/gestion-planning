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
     * @ORM\Column(name="libelle", type="string", length=15, nullable=false)
     */
    private $libelle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Indisponible", mappedBy="idDemiJournee")
     */
    private $idIndisponnible;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idIndisponnible = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIddemijournee(): ?int
    {
        return $this->iddemijournee;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Indisponible[]
     */
    public function getIdIndisponnible(): Collection
    {
        return $this->idIndisponnible;
    }

    public function addIdIndisponnible(Indisponible $idIndisponnible): self
    {
        if (!$this->idIndisponnible->contains($idIndisponnible)) {
            $this->idIndisponnible[] = $idIndisponnible;
            $idIndisponnible->addIdDemiJournee($this);
        }

        return $this;
    }

    public function removeIdIndisponnible(Indisponible $idIndisponnible): self
    {
        if ($this->idIndisponnible->contains($idIndisponnible)) {
            $this->idIndisponnible->removeElement($idIndisponnible);
            $idIndisponnible->removeIdDemiJournee($this);
        }

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recurrent
 *
 * @ORM\Table(name="recurrent")
 * @ORM\Entity
 */
class Recurrent
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=5, nullable=false)
     */
    private $libelle;

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

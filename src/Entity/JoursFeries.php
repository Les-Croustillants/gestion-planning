<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JoursFeries
 *
 * @ORM\Table(name="jours_feries", uniqueConstraints={@ORM\UniqueConstraint(name="jours_feries_jour_AK", columns={"id_Jour"})})
 * @ORM\Entity
 */
class JoursFeries
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFerie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idferie;

    /**
     * @var \Jour
     *
     * @ORM\ManyToOne(targetEntity="Jour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Jour", referencedColumnName="idJour")
     * })
     */
    private $idJour;

    public function getIdferie(): ?int
    {
        return $this->idferie;
    }

    public function getIdJour(): ?Jour
    {
        return $this->idJour;
    }

    public function setIdJour(?Jour $idJour): self
    {
        $this->idJour = $idJour;

        return $this;
    }


}

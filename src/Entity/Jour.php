<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jour
 *
 * @ORM\Table(name="jour", indexes={@ORM\Index(name="jour_periode0_FK", columns={"id_Periode"}), @ORM\Index(name="jour_nomJour_FK", columns={"id_NomJour"})})
 * @ORM\Entity
 */
class Jour
{
    /**
     * @var int
     *
     * @ORM\Column(name="idJour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idjour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateJour", type="date", nullable=false)
     */
    private $datejour;

    /**
     * @var \Nomjour
     *
     * @ORM\ManyToOne(targetEntity="Nomjour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_NomJour", referencedColumnName="idNomJour")
     * })
     */
    private $idNomjour;

    /**
     * @var \Periode
     *
     * @ORM\ManyToOne(targetEntity="Periode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Periode", referencedColumnName="idPeriode")
     * })
     */
    private $idPeriode;

    public function getIdjour(): ?int
    {
        return $this->idjour;
    }

    public function getDatejour(): ?\DateTimeInterface
    {
        return $this->datejour;
    }

    public function setDatejour(\DateTimeInterface $datejour): self
    {
        $this->datejour = $datejour;

        return $this;
    }

    public function getIdNomjour(): ?Nomjour
    {
        return $this->idNomjour;
    }

    public function setIdNomjour(?Nomjour $idNomjour): self
    {
        $this->idNomjour = $idNomjour;

        return $this;
    }

    public function getIdPeriode(): ?Periode
    {
        return $this->idPeriode;
    }

    public function setIdPeriode(?Periode $idPeriode): self
    {
        $this->idPeriode = $idPeriode;

        return $this;
    }


}

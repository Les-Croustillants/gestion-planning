<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Present
 *
 * @ORM\Table(name="present", indexes={@ORM\Index(name="present_demi_journee_FK", columns={"id_demi_journee"}), @ORM\Index(name="present_periode_formation0_FK", columns={"id_periode_formation"}), @ORM\Index(name="IDX_FDBCAE174E89FE3A", columns={"id_matiere"})})
 * @ORM\Entity
 */
class Present
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="jour", type="date", nullable=false)
     */
    private $jour;

    /**
     * @var \DemiJournee
     *
     * @ORM\ManyToOne(targetEntity="DemiJournee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_demi_journee", referencedColumnName="idDemiJournee")
     * })
     */
    private $idDemiJournee;

    /**
     * @var \Matiere
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_matiere", referencedColumnName="idMatiere")
     * })
     */
    private $idMatiere;

    /**
     * @var \PeriodeFormation
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="PeriodeFormation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_periode_formation", referencedColumnName="idPeriodeFormation")
     * })
     */
    private $idPeriodeFormation;

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getIdDemiJournee(): ?DemiJournee
    {
        return $this->idDemiJournee;
    }

    public function setIdDemiJournee(?DemiJournee $idDemiJournee): self
    {
        $this->idDemiJournee = $idDemiJournee;

        return $this;
    }

    public function getIdMatiere(): ?Matiere
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?Matiere $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    public function getIdPeriodeFormation(): ?PeriodeFormation
    {
        return $this->idPeriodeFormation;
    }

    public function setIdPeriodeFormation(?PeriodeFormation $idPeriodeFormation): self
    {
        $this->idPeriodeFormation = $idPeriodeFormation;

        return $this;
    }


}

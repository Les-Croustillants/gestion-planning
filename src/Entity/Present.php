<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Present
 *
 * @ORM\Table(name="present", indexes={@ORM\Index(name="present_demi_journee_FK", columns={"id_demi_journee"}), @ORM\Index(name="present_matiere0_FK", columns={"id_Matiere"}), @ORM\Index(name="IDX_FDBCAE17F1056AF9", columns={"id_Jour"})})
 * @ORM\Entity
 */
class Present
{
    /**
     * @var \DemiJournee
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="DemiJournee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_demi_journee", referencedColumnName="idDemiJournee")
     * })
     */
    private $idDemiJournee;

    /**
     * @var \Jour
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Jour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Jour", referencedColumnName="idJour")
     * })
     */
    private $idJour;

    /**
     * @var \Matiere
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Matiere", referencedColumnName="idMatiere")
     * })
     */
    private $idMatiere;

    public function getIdDemiJournee(): ?DemiJournee
    {
        return $this->idDemiJournee;
    }

    public function setIdDemiJournee(?DemiJournee $idDemiJournee): self
    {
        $this->idDemiJournee = $idDemiJournee;

        return $this;
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

    public function getIdMatiere(): ?Matiere
    {
        return $this->idMatiere;
    }

    public function setIdMatiere(?Matiere $idMatiere): self
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }


}

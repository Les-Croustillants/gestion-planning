<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proposer
 *
 * @ORM\Table(name="proposer", indexes={@ORM\Index(name="proposer_demi_journee1_FK", columns={"id_demi_journee"}), @ORM\Index(name="proposer_utilisateur0_FK", columns={"id_utilisateurReceveur"}), @ORM\Index(name="IDX_21866C15FDA1FCB7", columns={"id_utilisateurEmmetteur"})})
 * @ORM\Entity
 */
class Proposer
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
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateurReceveur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idUtilisateurreceveur;

    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateurEmmetteur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idUtilisateuremmetteur;

    public function getIdDemiJournee(): ?DemiJournee
    {
        return $this->idDemiJournee;
    }

    public function setIdDemiJournee(?DemiJournee $idDemiJournee): self
    {
        $this->idDemiJournee = $idDemiJournee;

        return $this;
    }

    public function getIdUtilisateurreceveur(): ?Utilisateur
    {
        return $this->idUtilisateurreceveur;
    }

    public function setIdUtilisateurreceveur(?Utilisateur $idUtilisateurreceveur): self
    {
        $this->idUtilisateurreceveur = $idUtilisateurreceveur;

        return $this;
    }

    public function getIdUtilisateuremmetteur(): ?Utilisateur
    {
        return $this->idUtilisateuremmetteur;
    }

    public function setIdUtilisateuremmetteur(?Utilisateur $idUtilisateuremmetteur): self
    {
        $this->idUtilisateuremmetteur = $idUtilisateuremmetteur;

        return $this;
    }


}

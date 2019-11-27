<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere", indexes={@ORM\Index(name="utilisateur_FK", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class Matiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMatiere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmatiere;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMatiere", type="string", length=50, nullable=false)
     */
    private $nommatiere;

    /**
     * @var int
     *
     * @ORM\Column(name="nbHeuresTotalMatiere", type="integer", nullable=false)
     */
    private $nbheurestotalmatiere;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idUtilisateur;

    public function getIdmatiere(): ?int
    {
        return $this->idmatiere;
    }

    public function getNommatiere(): ?string
    {
        return $this->nommatiere;
    }

    public function setNommatiere(string $nommatiere): self
    {
        $this->nommatiere = $nommatiere;

        return $this;
    }

    public function getNbheurestotalmatiere(): ?int
    {
        return $this->nbheurestotalmatiere;
    }

    public function setNbheurestotalmatiere(int $nbheurestotalmatiere): self
    {
        $this->nbheurestotalmatiere = $nbheurestotalmatiere;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}

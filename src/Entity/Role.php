<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
class Role
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleRole", type="string", length=15, nullable=false)
     */
    private $libellerole;

    public function getIdrole(): ?int
    {
        return $this->idrole;
    }

    public function getLibellerole(): ?string
    {
        return $this->libellerole;
    }

    public function setLibellerole(string $libellerole): self
    {
        $this->libellerole = $libellerole;

        return $this;
    }


}

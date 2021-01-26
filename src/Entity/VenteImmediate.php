<?php

namespace App\Entity;

use App\Repository\VenteImmediateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteImmediateRepository::class)
 */
class VenteImmediate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdAnnonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdAnnonce(): ?int
    {
        return $this->IdAnnonce;
    }

    public function setIdAnnonce(int $IdAnnonce): self
    {
        $this->IdAnnonce = $IdAnnonce;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\EnchereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnchereRepository::class)
 */
class Enchere
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
    private $OffreEnchere;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateEnchere;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdVendeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdAcheteur;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdAnnonce;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffreEnchere(): ?int
    {
        return $this->OffreEnchere;
    }

    public function setOffreEnchere(int $OffreEnchere): self
    {
        $this->OffreEnchere = $OffreEnchere;

        return $this;
    }

    public function getDateEnchere(): ?\DateTimeInterface
    {
        return $this->DateEnchere;
    }

    public function setDateEnchere(\DateTimeInterface $DateEnchere): self
    {
        $this->DateEnchere = $DateEnchere;

        return $this;
    }

    public function getIdVendeur(): ?int
    {
        return $this->IdVendeur;
    }

    public function setIdVendeur(int $IdVendeur): self
    {
        $this->IdVendeur = $IdVendeur;

        return $this;
    }

    public function getIdAcheteur(): ?int
    {
        return $this->IdAcheteur;
    }

    public function setIdAcheteur(int $IdAcheteur): self
    {
        $this->IdAcheteur = $IdAcheteur;

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

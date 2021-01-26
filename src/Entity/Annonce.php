<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PrixDepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateFin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PrixPlafond;

    /**
     * @ORM\Column(type="boolean")
     */
    private $VenteImmediate;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdVendeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdCategorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixDepart(): ?float
    {
        return $this->PrixDepart;
    }

    public function setPrixDepart(?float $PrixDepart): self
    {
        $this->PrixDepart = $PrixDepart;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getPrixPlafond(): ?float
    {
        return $this->PrixPlafond;
    }

    public function setPrixPlafond(?float $PrixPlafond): self
    {
        $this->PrixPlafond = $PrixPlafond;

        return $this;
    }

    public function getVenteImmediate(): ?bool
    {
        return $this->VenteImmediate;
    }

    public function setVenteImmediate(bool $VenteImmediate): self
    {
        $this->VenteImmediate = $VenteImmediate;

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

    public function getIdCategorie(): ?int
    {
        return $this->IdCategorie;
    }

    public function setIdCategorie(int $IdCategorie): self
    {
        $this->IdCategorie = $IdCategorie;

        return $this;
    }
}

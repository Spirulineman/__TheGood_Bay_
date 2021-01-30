<?php

namespace App\Entity;

use App\Repository\VenteEnchereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteEnchereRepository::class)
 */
class VenteEnchere
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
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdVendeur;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, inversedBy="venteEnchere", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdAcheteur;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="venteEncheres")
     * @ORM\JoinColumn(nullable=false)
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

    public function getIdVendeur(): ?Utilisateur
    {
        return $this->IdVendeur;
    }

    public function setIdVendeur(Utilisateur $IdVendeur): self
    {
        $this->IdVendeur = $IdVendeur;

        return $this;
    }

    public function getIdAcheteur(): ?Utilisateur
    {
        return $this->IdAcheteur;
    }

    public function setIdAcheteur(Utilisateur $IdAcheteur): self
    {
        $this->IdAcheteur = $IdAcheteur;

        return $this;
    }

    public function getIdAnnonce(): ?Annonce
    {
        return $this->IdAnnonce;
    }

    public function setIdAnnonce(?Annonce $IdAnnonce): self
    {
        $this->IdAnnonce = $IdAnnonce;

        return $this;
    }
}

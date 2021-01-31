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

    /**
     * @ORM\Column(type="integer")
     */
    private $prixDepart;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixVendu;

    /**
     * @ORM\Column(type="integer")
     */
    private $propositionEncherisseur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDepart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFinEnchere;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="VenteEnchere")
     */
    private $Encherisseur;

    /**
     * @ORM\Column(type="integer")
     */
    private $meilleurPrix;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gagnant;

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

    public function getPrixDepart(): ?int
    {
        return $this->prixDepart;
    }

    public function setPrixDepart(int $prixDepart): self
    {
        $this->prixDepart = $prixDepart;

        return $this;
    }

    public function getPrixVendu(): ?int
    {
        return $this->prixVendu;
    }

    public function setPrixVendu(int $prixVendu): self
    {
        $this->prixVendu = $prixVendu;

        return $this;
    }

    public function getPropositionEncherisseur(): ?int
    {
        return $this->propositionEncherisseur;
    }

    public function setPropositionEncherisseur(int $propositionEncherisseur): self
    {
        $this->propositionEncherisseur = $propositionEncherisseur;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    public function getDateFinEnchere(): ?\DateTimeInterface
    {
        return $this->dateFinEnchere;
    }

    public function setDateFinEnchere(\DateTimeInterface $dateFinEnchere): self
    {
        $this->dateFinEnchere = $dateFinEnchere;

        return $this;
    }

    public function getEncherisseur(): ?Utilisateur
    {
        return $this->Encherisseur;
    }

    public function setEncherisseur(?Utilisateur $Encherisseur): self
    {
        $this->Encherisseur = $Encherisseur;

        return $this;
    }

    public function getMeilleurPrix(): ?int
    {
        return $this->meilleurPrix;
    }

    public function setMeilleurPrix(int $meilleurPrix): self
    {
        $this->meilleurPrix = $meilleurPrix;

        return $this;
    }

    public function getGagnant(): ?bool
    {
        return $this->gagnant;
    }

    public function setGagnant(?bool $gagnant): self
    {
        $this->gagnant = $gagnant;

        return $this;
    }
}

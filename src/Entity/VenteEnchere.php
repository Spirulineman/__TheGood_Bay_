<?php

namespace App\Entity;

use App\Repository\VenteEnchereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="integer")
     */
    private $IdVendeur;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="IdAcheteur")
     */
    private $IdAcheteur;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdAnnonce;

    public function __construct()
    {
        $this->IdAcheteur = new ArrayCollection();
    }

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

    /**
     * @return Collection|Utilisateur[]
     */
    public function getIdAcheteur(): Collection
    {
        return $this->IdAcheteur;
    }

    public function addIdAcheteur(Utilisateur $idAcheteur): self
    {
        if (!$this->IdAcheteur->contains($idAcheteur)) {
            $this->IdAcheteur[] = $idAcheteur;
            $idAcheteur->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeIdAcheteur(Utilisateur $idAcheteur): self
    {
        if ($this->IdAcheteur->removeElement($idAcheteur)) {
            // set the owning side to null (unless already changed)
            if ($idAcheteur->getIdAcheteur() === $this) {
                $idAcheteur->setIdAcheteur(null);
            }
        }

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

<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use App\Repository\VenteImmediateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    /* private $categorie; */

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $VenteImmediate;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="annonces")
     */
    private $IdVendeur;

    /**
     * @ORM\OneToOne(targetEntity=VenteImmediate::class, mappedBy="IdAnnonce", cascade={"persist", "remove"})
     */
    private $venteImmediate;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdCategorie;

    /**
     * @ORM\OneToMany(targetEntity=Enchere::class, mappedBy="IdAnnonce")
     */
    private $Annonce_Enchere;

    /**
     * @ORM\OneToMany(targetEntity=VenteEnchere::class, mappedBy="IdAnnonce")
     */
    private $venteEncheres;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="IdAnnonce")
     */
    private $photos;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    public function __construct()
    {
        $this->Annonce_Enchere = new ArrayCollection();
        $this->venteEncheres = new ArrayCollection();
        $this->photos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /* public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    } */

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

    public function setPrixDepart(float $PrixDepart): self
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

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

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

    public function setVenteImmediate(?bool $VenteImmediate): self
    {
        $this->VenteImmediate = $VenteImmediate;

        return $this;
    }

    public function getIdVendeur(): ?Utilisateur
    {
        return $this->IdVendeur;
    }

    public function setIdVendeur(?Utilisateur $IdVendeur): self
    {
        $this->IdVendeur = $IdVendeur;

        return $this;
    }

    public function getIdCategorie(): ?Categorie
    {
        return $this->IdCategorie;
    }

    public function setIdCategorie(?Categorie $IdCategorie): self
    {
        $this->IdCategorie = $IdCategorie;

        return $this;
    }

    /**
     * @return Collection|Enchere[]
     */
    public function getAnnonceEnchere(): Collection
    {
        return $this->Annonce_Enchere;
    }

    public function addAnnonceEnchere(Enchere $annonceEnchere): self
    {
        if (!$this->Annonce_Enchere->contains($annonceEnchere)) {
            $this->Annonce_Enchere[] = $annonceEnchere;
            $annonceEnchere->setIdAnnonce($this);
        }

        return $this;
    }

    public function removeAnnonceEnchere(Enchere $annonceEnchere): self
    {
        if ($this->Annonce_Enchere->removeElement($annonceEnchere)) {
            // set the owning side to null (unless already changed)
            if ($annonceEnchere->getIdAnnonce() === $this) {
                $annonceEnchere->setIdAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VenteEnchere[]
     */
    public function getVenteEncheres(): Collection
    {
        return $this->venteEncheres;
    }

    public function addVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if (!$this->venteEncheres->contains($venteEnchere)) {
            $this->venteEncheres[] = $venteEnchere;
            $venteEnchere->setIdAnnonce($this);
        }

        return $this;
    }

    public function removeVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if ($this->venteEncheres->removeElement($venteEnchere)) {
            // set the owning side to null (unless already changed)
            if ($venteEnchere->getIdAnnonce() === $this) {
                $venteEnchere->setIdAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setIdAnnonce($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIdAnnonce() === $this) {
                $photo->setIdAnnonce(null);
            }
        }

        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }
}

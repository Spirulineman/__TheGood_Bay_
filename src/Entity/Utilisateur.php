<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MDP;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vendeur;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="IdVendeur")
     */
    private $annonces;

    /**
     * @ORM\OneToMany(targetEntity=Enchere::class, mappedBy="IdVendeur")
     */
    private $encheres;

    /**
     * @ORM\OneToMany(targetEntity=Enchere::class, mappedBy="IdAcheteur")
     */
    private $Acheteur_Enchere;

     /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="IdEnvoi")
     */
    private $Envoi;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="IdRecoit")
     */
    private $Recoit;

    /**
     * @ORM\OneToMany(targetEntity=VenteEnchere::class, mappedBy="Encherisseur")
     */
    private $VenteEnchere;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->encheres = new ArrayCollection();
        $this->Acheteur_Enchere = new ArrayCollection();
        $this->Envoi = new ArrayCollection();
        $this->Recoit = new ArrayCollection();
        $this->VenteEnchere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMDP(): ?string
    {
        return $this->MDP;
    }

    public function setMDP(string $MDP): self
    {
        $this->MDP = $MDP;

        return $this;
    }

    public function getVendeur(): ?bool
    {
        return $this->vendeur;
    }

    public function setVendeur(bool $vendeur): self
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setIdVendeur($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getIdVendeur() === $this) {
                $annonce->setIdVendeur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enchere[]
     */
    public function getEncheres(): Collection
    {
        return $this->encheres;
    }

    public function addEnchere(Enchere $enchere): self
    {
        if (!$this->encheres->contains($enchere)) {
            $this->encheres[] = $enchere;
            $enchere->setIdVendeur($this);
        }

        return $this;
    }

    public function removeEnchere(Enchere $enchere): self
    {
        if ($this->encheres->removeElement($enchere)) {
            // set the owning side to null (unless already changed)
            if ($enchere->getIdVendeur() === $this) {
                $enchere->setIdVendeur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enchere[]
     *//* 
    public function getAcheteurEnchere(): Collection
    {
        return $this->Acheteur_Enchere;
    }

    public function addAcheteurEnchere(Enchere $acheteurEnchere): self
    {
        if (!$this->Acheteur_Enchere->contains($acheteurEnchere)) {
            $this->Acheteur_Enchere[] = $acheteurEnchere;
            $acheteurEnchere->setIdAcheteur($this);
        }

        return $this;
    }

    public function removeAcheteurEnchere(Enchere $acheteurEnchere): self
    {
        if ($this->Acheteur_Enchere->removeElement($acheteurEnchere)) {
            // set the owning side to null (unless already changed)
            if ($acheteurEnchere->getIdAcheteur() === $this) {
                $acheteurEnchere->setIdAcheteur(null);
            }
        }

        return $this;
    }
 */
    

    /**
     * @return Collection|Message[]
     */
    public function getEnvoi(): Collection
    {
        return $this->Envoi;
    }

    public function addEnvoi(Message $envoi): self
    {
        if (!$this->Envoi->contains($envoi)) {
            $this->Envoi[] = $envoi;
            $envoi->setIdEnvoi($this);
        }

        return $this;
    }

    public function removeEnvoi(Message $envoi): self
    {
        if ($this->Envoi->removeElement($envoi)) {
            // set the owning side to null (unless already changed)
            if ($envoi->getIdEnvoi() === $this) {
                $envoi->setIdEnvoi(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getRecoit(): Collection
    {
        return $this->Recoit;
    }

    public function addRecoit(Message $recoit): self
    {
        if (!$this->Recoit->contains($recoit)) {
            $this->Recoit[] = $recoit;
            $recoit->setIdRecoit($this);
        }

        return $this;
    }

    public function removeRecoit(Message $recoit): self
    {
        if ($this->Recoit->removeElement($recoit)) {
            // set the owning side to null (unless already changed)
            if ($recoit->getIdRecoit() === $this) {
                $recoit->setIdRecoit(null);
            }
        }

        return $this;
    }

    public function addVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if (!$this->VenteEnchere->contains($venteEnchere)) {
            $this->VenteEnchere[] = $venteEnchere;
            $venteEnchere->setEncherisseur($this);
        }

        return $this;
    }

    public function removeVenteEnchere(VenteEnchere $venteEnchere): self
    {
        if ($this->VenteEnchere->removeElement($venteEnchere)) {
            // set the owning side to null (unless already changed)
            if ($venteEnchere->getEncherisseur() === $this) {
                $venteEnchere->setEncherisseur(null);
            }
        }

        return $this;
    }
}

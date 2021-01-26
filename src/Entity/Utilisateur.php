<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
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
     * @ORM\ManyToOne(targetEntity=VenteEnchere::class, inversedBy="IdAcheteur")
     */
    private $IdAcheteur;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdAcheteur(): ?VenteEnchere
    {
        return $this->IdAcheteur;
    }

    public function setIdAcheteur(?VenteEnchere $IdAcheteur): self
    {
        $this->IdAcheteur = $IdAcheteur;

        return $this;
    }
}

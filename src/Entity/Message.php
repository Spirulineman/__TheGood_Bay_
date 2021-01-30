<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
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
     * @ORM\Column(type="text")
     */
    private $texte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateHeure;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Envoi", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdEnvoi;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Recoit", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdRecoit;

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

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->DateHeure;
    }

    public function setDateHeure(\DateTimeInterface $DateHeure): self
    {
        $this->DateHeure = $DateHeure;

        return $this;
    }

    public function getIdEnvoi(): ?Utilisateur
    {
        return $this->IdEnvoi;
    }

    public function setIdEnvoi(?Utilisateur $IdEnvoi): self
    {
        $this->IdEnvoi = $IdEnvoi;

        return $this;
    }

    public function getIdRecoit(): ?Utilisateur
    {
        return $this->IdRecoit;
    }

    public function setIdRecoit(?Utilisateur $IdRecoit): self
    {
        $this->IdRecoit = $IdRecoit;

        return $this;
    }
}

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
     * @ORM\Column(type="string", length=255)
     */
    private $MDP;

    /**
     * @ORM\Column(type="integer")
     */
    private $IdVendeur;

    /**
     * @ORM\Column(type="integer")
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
}

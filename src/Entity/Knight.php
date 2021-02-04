<?php

namespace App\Entity;

use App\Repository\KnightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KnightRepository::class)
 */
class Knight
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $section;

    /**
     * @ORM\Column(type="boolean")
     */
    private $round_table;

    /**
     * @ORM\ManyToOne(targetEntity=Coterie::class, inversedBy="member")
     */
    private $coterie;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="knight", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userKnight;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getRoundTable(): ?bool
    {
        return $this->round_table;
    }

    public function setRoundTable(bool $round_table): self
    {
        $this->round_table = $round_table;

        return $this;
    }

    public function getCoterie(): ?Coterie
    {
        return $this->coterie;
    }

    public function setCoterie(?Coterie $coterie): self
    {
        $this->coterie = $coterie;

        return $this;
    }

    public function getUserKnight(): ?User
    {
        return $this->userKnight;
    }

    public function setUserKnight(?User $userKnight): self
    {
        $this->userKnight = $userKnight;

        return $this;
    }
}

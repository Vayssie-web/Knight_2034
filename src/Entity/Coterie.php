<?php

namespace App\Entity;

use App\Repository\CoterieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoterieRepository::class)
 */
class Coterie
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
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Knight::class, mappedBy="coterie")
     */
    private $member;

    public function __construct()
    {
        $this->member = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Knight[]
     */
    public function getMember(): Collection
    {
        return $this->member;
    }

    public function addMember(Knight $member): self
    {
        if (!$this->member->contains($member)) {
            $this->member[] = $member;
            $member->setCoterie($this);
        }

        return $this;
    }

    public function removeMember(Knight $member): self
    {
        if ($this->member->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getCoterie() === $this) {
                $member->setCoterie(null);
            }
        }

        return $this;
    }
}

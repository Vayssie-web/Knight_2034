<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
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
    private $sectionName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionName(): ?string
    {
        return $this->sectionName;
    }

    public function setSectionName(string $sectionName): self
    {
        $this->sectionName = $sectionName;

        return $this;
    }
}

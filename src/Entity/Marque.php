<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    /**
     * @var Collection<int, AbatJour>
     */
    #[ORM\OneToMany(targetEntity: AbatJour::class, mappedBy: 'Marque')]
    private Collection $abatJours;

    public function __construct()
    {
        $this->abatJours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, AbatJour>
     */
    public function getAbatJours(): Collection
    {
        return $this->abatJours;
    }

    public function addAbatJour(AbatJour $abatJour): static
    {
        if (!$this->abatJours->contains($abatJour)) {
            $this->abatJours->add($abatJour);
            $abatJour->setMarque($this);
        }

        return $this;
    }

    public function removeAbatJour(AbatJour $abatJour): static
    {
        if ($this->abatJours->removeElement($abatJour)) {
            // set the owning side to null (unless already changed)
            if ($abatJour->getMarque() === $this) {
                $abatJour->setMarque(null);
            }
        }

        return $this;
    }
}

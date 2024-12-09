<?php

namespace App\Entity;

use App\Repository\AbatJourRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AbatJourRepository::class)]
class AbatJour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(length: 20)]
    private ?string $Couleur = null;

    #[ORM\Column(length: 50)]
    private ?string $Matiere = null;

    #[ORM\Column(length: 20)]
    private ?string $Forme = null;

    #[ORM\Column(length: 255)]
    private ?string $Dimensions = null;

    #[ORM\Column(length: 13)]
    #[Assert\Length(
        min: 13,
        max: 13
    )]
    private ?string $CodeBarre = null;

    #[ORM\ManyToOne(inversedBy: 'abatJours')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marque $Marque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

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

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): static
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->Matiere;
    }

    public function setMatiere(string $Matiere): static
    {
        $this->Matiere = $Matiere;

        return $this;
    }

    public function getForme(): ?string
    {
        return $this->Forme;
    }

    public function setForme(string $Forme): static
    {
        $this->Forme = $Forme;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->Dimensions;
    }

    public function setDimensions(string $Dimensions): static
    {
        $this->Dimensions = $Dimensions;

        return $this;
    }

    public function getCodeBarre(): ?string
    {
        return $this->CodeBarre;
    }

    public function setCodeBarre(string $CodeBarre): static
    {
        $this->CodeBarre = $CodeBarre;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->Marque;
    }

    public function setMarque(?Marque $Marque): static
    {
        $this->Marque = $Marque;

        return $this;
    }
}

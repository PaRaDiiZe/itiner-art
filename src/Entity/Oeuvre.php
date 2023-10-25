<?php

namespace App\Entity;

use App\Repository\OeuvreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Category;
use App\Entity\Parcours;

#[ORM\Entity(repositoryClass: OeuvreRepository::class)]
class Oeuvre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description_o = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $artiste = null;

    #[ORM\Column(length: 255)]
    private ?string $coordonee_lat = null;

    #[ORM\Column(length: 255)]
    private ?string $coordonee_lon = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $alt_img = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'rela_cat')]
    private ?Category $rela_cat = null;

    #[ORM\ManyToOne(inversedBy: 'rela_oeuvre')]
    private ?Parcours $rela_oeuvre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $credit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescriptionO(): ?string
    {
        return $this->description_o;
    }

    public function setDescriptionO(?string $description_o): self
    {
        $this->description_o = $description_o;

        return $this;
    }

    public function getArtiste(): ?string
    {
        return $this->artiste;
    }

    public function setArtiste(?string $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getCoordoneeLat(): ?string
    {
        return $this->coordonee_lat;
    }

    public function setCoordoneeLat(string $coordonee_lat): self
    {
        $this->coordonee_lat = $coordonee_lat;

        return $this;
    }

    public function getCoordoneeLon(): ?string
    {
        return $this->coordonee_lon;
    }

    public function setCoordoneeLon(string $coordonee_lon): self
    {
        $this->coordonee_lon = $coordonee_lon;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAltImg(): ?string
    {
        return $this->alt_img;
    }

    public function setAltImg(?string $alt_img): self
    {
        $this->alt_img = $alt_img;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRelaCat(): ?Category
    {
        return $this->rela_cat;
    }

    public function setRelaCat(?Category $rela_cat): self
    {
        $this->rela_cat = $rela_cat;

        return $this;
    }

    public function getRelaOeuvre(): ?Parcours
    {
        return $this->rela_oeuvre;
    }

    public function setRelaOeuvre(?Parcours $rela_oeuvre): self
    {
        $this->rela_oeuvre = $rela_oeuvre;

        return $this;
    }

    public function getCredit(): ?string
    {
        return $this->credit;
    }

    public function setCredit(?string $credit): self
    {
        $this->credit = $credit;

        return $this;
    }
}

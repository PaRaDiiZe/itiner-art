<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cat_name = null;

    #[ORM\OneToMany(mappedBy: 'rela_cat', targetEntity: oeuvre::class)]
    private Collection $rela_cat;

    public function __construct()
    {
        $this->rela_cat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    public function setCatName(string $cat_name): self
    {
        $this->cat_name = $cat_name;

        return $this;
    }

    /**
     * @return Collection<int, oeuvre>
     */
    public function getRelaCat(): Collection
    {
        return $this->rela_cat;
    }

    public function addRelaCat(oeuvre $relaCat): self
    {
        if (!$this->rela_cat->contains($relaCat)) {
            $this->rela_cat->add($relaCat);
            $relaCat->setRelaCat($this);
        }

        return $this;
    }

    public function removeRelaCat(oeuvre $relaCat): self
    {
        if ($this->rela_cat->removeElement($relaCat)) {
            // set the owning side to null (unless already changed)
            if ($relaCat->getRelaCat() === $this) {
                $relaCat->setRelaCat(null);
            }
        }

        return $this;
    }
}

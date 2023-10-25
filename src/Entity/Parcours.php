<?php

namespace App\Entity;

use App\Entity\Oeuvre;

use App\Repository\ParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParcoursRepository::class)]
class Parcours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'rela', targetEntity: Comment::class, orphanRemoval: true)]
    private Collection $comment;

    #[ORM\OneToMany(mappedBy: 'rela_oeuvre', targetEntity: Oeuvre::class)]
    private Collection $rela_oeuvre;


    public function __construct()
    {
        $this->comment = new ArrayCollection();
        $this->rela_oeuvre = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment->add($comment);
            $comment->setRela($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRela() === $this) {
                $comment->setRela(null);
            }
        }

        return $this;
    }

    public function getAverageNote(): float
    {
        $commentNotes = $this->getComment()->map(function($comment) {
            return $comment->getNote();
        });

        if ($commentNotes->count() === 0) {
            return 0;
        }

        $averageNote = $commentNotes->reduce(function($accumulator, $note) {
            return $accumulator + $note;
        }) / $commentNotes->count();

        return round($averageNote, 1);
    }


    /**
     * @return Collection<int, oeuvre>
     */
    public function getRelaOeuvre(): Collection
    {
        return $this->rela_oeuvre;
    }

    public function addRelaOeuvre(oeuvre $relaOeuvre): self
    {
        if (!$this->rela_oeuvre->contains($relaOeuvre)) {
            $this->rela_oeuvre->add($relaOeuvre);
            $relaOeuvre->setRelaOeuvre($this);
        }

        return $this;
    }

    public function removeRelaOeuvre(oeuvre $relaOeuvre): self
    {
        if ($this->rela_oeuvre->removeElement($relaOeuvre)) {
            // set the owning side to null (unless already changed)
            if ($relaOeuvre->getRelaOeuvre() === $this) {
                $relaOeuvre->setRelaOeuvre(null);
            }
        }

        return $this;
    }
}

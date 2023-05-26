<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $produits = null;

    #[ORM\OneToMany(mappedBy: 'produits', targetEntity: self::class)]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: Commentaire::class)]
    private Collection $commentaire;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'Commentaire')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $User = null;

    #[ORM\OneToMany(mappedBy: 'User', targetEntity: self::class)]
    private Collection $Commentaire;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->Commentaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProduits(): ?self
    {
        return $this->produits;
    }

    public function setProduits(?self $produits): self
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(self $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setProduits($this);
        }

        return $this;
    }

    public function removeCommentaire(self $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getProduits() === $this) {
                $commentaire->setProduits(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function getUser(): ?self
    {
        return $this->User;
    }

    public function setUser(?self $User): self
    {
        $this->User = $User;

        return $this;
    }
}

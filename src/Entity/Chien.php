<?php

namespace App\Entity;

use App\Repository\ChienRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChienRepository::class)]
class Chien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $poid = null;

    #[ORM\Column(length: 255)]
    private ?string $race = null;

    #[ORM\ManyToOne(inversedBy: 'chiens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personne $proprio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPoid(): ?int
    {
        return $this->poid;
    }

    public function setPoid(int $poid): static
    {
        $this->poid = $poid;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): static
    {
        $this->race = $race;

        return $this;
    }

    public function getProprio(): ?Personne
    {
        return $this->proprio;
    }

    public function setProprio(?Personne $proprio): static
    {
        $this->proprio = $proprio;

        return $this;
    }
}

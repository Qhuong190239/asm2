<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $name;

    #[ORM\OneToOne(inversedBy: 'game', targetEntity: GameDetail::class, cascade: ['persist', 'remove'])]
    private $detail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDetail(): ?GameDetail
    {
        return $this->detail;
    }

    public function setDetail(?GameDetail $detail): self
    {
        $this->detail = $detail;

        return $this;
    }
}

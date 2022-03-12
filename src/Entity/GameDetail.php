<?php

namespace App\Entity;

use App\Repository\GameDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameDetailRepository::class)]
class GameDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $platform;

    #[ORM\Column(type: 'string', length: 255)]
    private $tag;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\OneToOne(mappedBy: 'detail', targetEntity: Game::class, cascade: ['persist', 'remove'])]
    private $game;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): self
    {
        $this->platform = $platform;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): self
    {
        $this->tag = $tag;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        // unset the owning side of the relation if necessary
        if ($game === null && $this->game !== null) {
            $this->game->setDetail(null);
        }

        // set the owning side of the relation if necessary
        if ($game !== null && $game->getDetail() !== $this) {
            $game->setDetail($this);
        }

        $this->game = $game;

        return $this;
    }
}

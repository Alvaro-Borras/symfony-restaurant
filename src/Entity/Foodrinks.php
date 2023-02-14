<?php

namespace App\Entity;

use App\Repository\FoodrinksRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FoodrinksRepository::class)]
class Foodrinks
{
 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id_F = null;

    #[ORM\Column(length: 50)]
    public ?string $item = null;

    #[ORM\Column(length: 50, nullable: true)]
    public ?string $category = null;

    #[ORM\Column(nullable: true)]
    public ?int $price = null;

    #[ORM\Column]
    public ?int $stock = null;

    #[ORM\Column]
    public ?int $stock_min = null;


    public function getIdF(): ?int
    {
        return $this->id_F;
    }

    public function setIdF(int $id_F): self
    {
        $this->id_F = $id_F;

        return $this;
    }

    public function getItem(): ?string
    {
        return $this->item;
    }

    public function setItem(string $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStockMin(): ?int
    {
        return $this->stock_min;
    }

    public function setStockMin(int $stock_min): self
    {
        $this->stock_min = $stock_min;

        return $this;
    }

}

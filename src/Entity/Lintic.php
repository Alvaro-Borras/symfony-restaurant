<?php

namespace App\Entity;

use App\Repository\LinticRepository;
use Doctrine\ORM\Mapping\Embeddable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LinticRepository::class)]
 class Lintic
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $numL = null;

    #[ORM\Column(nullable: true)]
    public ?int $amount = null;

    #[ORM\Column(length: 20, nullable: true)]
    public ?string $cook = null;
      
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    public ?Tickets $L_idT = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]   
    public ?Foodrinks $L_idF = null;

     public function getNumL(): ?int
    {
        return $this->numL;
    }

    public function setNumL(int $numL): self
    {
        $this->numL = $numL;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCook(): ?string
    {
        return $this->cook;
    }

    public function setCook(?string $cook): self
    {
        $this->cook = $cook;

        return $this;
    }

    public function getLIdT(): ?tickets
    {
        return $this->L_idT;
    }

    public function setLIdT(?tickets $L_idT): self
    {
        $this->L_idT = $L_idT;

        return $this;
    }

    public function getLIdF(): ?foodrinks
    {
        return $this->L_idF;
    }

    public function setLIdF(?foodrinks $L_idF): self
    {
        $this->L_idF = $L_idF;

        return $this;
    }
}

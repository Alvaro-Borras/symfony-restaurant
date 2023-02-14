<?php

namespace App\Entity;
use App\Entity\Lintic;

use App\Repository\TicketsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketsRepository::class)]
class Tickets
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id_T = null;

    // #[ORM\Column(nullable: true)]
    // public ?int $TIdW = null;

    // #[ORM\Column(nullable: true)]
    // public ?int $TidD = null;

    #[ORM\Column(nullable: true)]
    public ?int $people = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    public ?\DateTimeInterface $datic = null;

    public function getIdT(): ?int
    {
        return $this->id_T;
    }

    public function setIdT(int $id_T): self
    {
        $this->id_T = $id_T;

        return $this;
    }
    // public function getAll()
    // {
    //     // $repositoryL = $em->getRepository(Lintic::class);
    //     // $lintics = $repositoryL->findAll();

    //     return [
    //         'id_T' => $this->getIdT(),
    //         // 'L_idT' => $lintics->getLIdT(),
    //         'people' => $this->getPeople(),
    //         'datic' => $this->getDatic()->format('Y-m-d')
    //     ];
    // }
    // public function getTIdW(): ?int
    // {
    //     return $this->TIdW;
    // }

    // public function setTIdW(?int $TIdW): self
    // {
    //     $this->TIdW = $TIdW;

    //     return $this;
    // }

    // public function getTidD(): ?int
    // {
    //     return $this->TidD;
    // }

    // public function setTidD(?int $TidD): self
    // {
    //     $this->TidD = $TidD;

    //     return $this;
    // }

    public function getPeople(): ?int
    {
        return $this->people;
    }

    public function setPeople(?int $people): self
    {
        $this->people = $people;

        return $this;
    }

    public function getDatic(): ?\DateTimeInterface
    {
        return $this->datic;
    }

    public function setDatic(?\DateTimeInterface $datic): self
    {
        $this->datic = $datic;

        return $this;
    }
}

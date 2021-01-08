<?php

namespace App\Entity;

use App\Repository\PointsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PointsRepository::class)
 */
class Points
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Prize::class, inversedBy="points", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prize;

    /**
     * @ORM\Column(type="integer")
     */
    private $sum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrize(): ?Prize
    {
        return $this->prize;
    }

    public function setPrize(Prize $prize): self
    {
        $this->prize = $prize;

        return $this;
    }

    public function getSum(): ?int
    {
        return $this->sum;
    }

    public function setSum(int $sum): self
    {
        $this->sum = $sum;

        return $this;
    }
}

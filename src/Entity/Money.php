<?php

namespace App\Entity;

use App\Repository\MoneyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoneyRepository::class)
 */
class Money
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Prize::class, inversedBy="money", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prize;

    /**
     * @ORM\Column(type="integer")
     */
    private $sum;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $currency;

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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }
}

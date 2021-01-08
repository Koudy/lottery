<?php

namespace App\Entity;

use App\Repository\PrizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrizeRepository::class)
 */
class Prize
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity=Money::class, mappedBy="prize", cascade={"persist", "remove"})
     */
    private $money;

    /**
     * @ORM\OneToOne(targetEntity=Points::class, mappedBy="prize", cascade={"persist", "remove"})
     */
    private $points;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMoney(): ?Money
    {
        return $this->money;
    }

    public function setMoney(Money $money): self
    {
        // set the owning side of the relation if necessary
        if ($money->getPrize() !== $this) {
            $money->setPrize($this);
        }

        $this->money = $money;

        return $this;
    }

    public function getPoints(): ?Points
    {
        return $this->points;
    }

    public function setPoints(Points $points): self
    {
        // set the owning side of the relation if necessary
        if ($points->getPrize() !== $this) {
            $points->setPrize($this);
        }

        $this->points = $points;

        return $this;
    }
}

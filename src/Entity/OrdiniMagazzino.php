<?php

namespace App\Entity;

use App\Repository\OrdiniMagazzinoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=OrdiniMagazzinoRepository::class)
 */
class OrdiniMagazzino
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderlist;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $deliveryAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $stockUser;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $readyAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    public function __construct()
    {
        $this->createAt = new \DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getOrderlist(): ?string
    {
        return $this->orderlist;
    }

    public function setOrderlist(string $orderlist): self
    {
        $this->orderlist = $orderlist;

        return $this;
    }

    public function getDeliveryAt(): ?\DateTimeImmutable
    {
        return $this->deliveryAt;
    }

    public function setDeliveryAt(\DateTimeImmutable $deliveryAt): self
    {
        $this->deliveryAt = $deliveryAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStockUser(): ?User
    {
        return $this->stockUser;
    }

    public function setStockUser(?User $stockUser): self
    {
        $this->stockUser = $stockUser;

        return $this;
    }

    public function getReadyAt(): ?\DateTimeImmutable
    {
        return $this->readyAt;
    }

    public function setReadyAt(?\DateTimeImmutable $readyAt): self
    {
        $this->readyAt = $readyAt;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}

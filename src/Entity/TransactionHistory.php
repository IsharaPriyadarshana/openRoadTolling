<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionHistoryRepository")
 */
class TransactionHistory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entrance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vehicleNo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transaction")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $egress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $toll;

    /**
     * @ORM\Column(type="datetime", length=6, nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrance(): ?string
    {
        return $this->entrance;
    }

    public function setEntrance(?string $entrance): self
    {
        $this->entrance = $entrance;

        return $this;
    }

    public function getEgress(): ?string
    {
        return $this->egress;
    }

    public function setEgress(?string $egress): self
    {
        $this->egress = $egress;

        return $this;
    }

    public function getToll(): ?string
    {
        return $this->toll;
    }

    public function setToll(?string $toll): self
    {
        $this->toll = $toll;

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

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getVehicleNo(): ?string
    {
        return $this->vehicleNo;
    }

    public function setVehicleNo(?string $vehicleNo): self
    {
        $this->vehicleNo = $vehicleNo;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}

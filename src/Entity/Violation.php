<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ViolationRepository")
 */
class Violation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $vehicleNo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="violation")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HighwayExtension", inversedBy="violation")
     */
    private $interchange;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $toll;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $violationType;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleNo(): ?string
    {
        return $this->vehicleNo;
    }

    public function setVehicleNo(string $vehicleNo): self
    {
        $this->vehicleNo = $vehicleNo;

        return $this;
    }

    public function getToll(): ?float
    {
        return $this->toll;
    }

    public function setToll(?float $toll): self
    {
        $this->toll = $toll;

        return $this;
    }

    public function getViolationType(): ?int
    {
        return $this->violationType;
    }

    public function setViolationType(?int $violationType): self
    {
        $this->violationType = $violationType;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getInterchange(): ?HighwayExtension
    {
        return $this->interchange;
    }

    public function setInterchange(?HighwayExtension $interchange): self
    {
        $this->interchange = $interchange;

        return $this;
    }
}

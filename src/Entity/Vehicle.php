<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehicleRepository")
 */
class Vehicle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vehicleNo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\HighwayVehicle", mappedBy="vehicle")
     */
    private $highwayVehicle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="vehicle")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\VehicleClass", inversedBy="vehicle")
     */
    private $class;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }



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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getClass(): ?VehicleClass
    {
        return $this->class;
    }

    public function setClass(?VehicleClass $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    public function getHighwayVehicle(): ?HighwayVehicle
    {
        return $this->highwayVehicle;
    }

    public function setHighwayVehicle(?HighwayVehicle $highwayVehicle): self
    {
        $this->highwayVehicle = $highwayVehicle;

        // set (or unset) the owning side of the relation if necessary
        $newVehicle = $highwayVehicle === null ? null : $this;
        if ($newVehicle !== $highwayVehicle->getVehicle()) {
            $highwayVehicle->setVehicle($newVehicle);
        }

        return $this;
    }
}

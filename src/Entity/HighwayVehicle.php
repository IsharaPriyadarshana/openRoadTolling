<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HighwayVehicleRepository")
 */
class HighwayVehicle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vehicle", inversedBy="highwayVehicle")
     */
    private $vehicle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HighwayExtension", inversedBy="entranceExtension")
     */
    private $entrance;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HighwayExtension", inversedBy="egressExtension")
     */
    private $egress;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $toll;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCurrentlyIn;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsCurrentlyIn(): ?bool
    {
        return $this->isCurrentlyIn;
    }

    public function setIsCurrentlyIn(bool $isCurrentlyIn): self
    {
        $this->isCurrentlyIn = $isCurrentlyIn;

        return $this;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(?Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getEntrance(): ?HighwayExtension
    {
        return $this->entrance;
    }

    public function setEntrance(?HighwayExtension $entrance): self
    {
        $this->entrance = $entrance;

        return $this;
    }

    public function getEgress(): ?HighwayExtension
    {
        return $this->egress;
    }

    public function setEgress(?HighwayExtension $egress): self
    {
        $this->egress = $egress;

        return $this;
    }
}

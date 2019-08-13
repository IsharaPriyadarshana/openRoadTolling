<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HighwayExtensionRepository")
 */
class HighwayExtension
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Highway", inversedBy="highwayExtension")
     */
    private $highway;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HighwayVehicle", mappedBy="entrance")
     */
    private $entranceExtension;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HighwayVehicle", mappedBy="egress")
     */
    private $egressExtension;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $macAddress;

    /**
     * @ORM\Column(type="integer")
     */
    private $sequenceNo;

    public function __construct()
    {
        $this->entranceExtension = new ArrayCollection();
        $this->egressExtension = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCodeName(): ?string
    {
        return $this->codeName;
    }

    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }

    public function getSequenceNo(): ?int
    {
        return $this->sequenceNo;
    }

    public function setSequenceNo(int $sequenceNo): self
    {
        $this->sequenceNo = $sequenceNo;

        return $this;
    }

    public function getHighway(): ?Highway
    {
        return $this->highway;
    }

    public function setHighway(?Highway $highway): self
    {
        $this->highway = $highway;

        return $this;
    }

    /**
     * @return Collection|HighwayVehicle[]
     */
    public function getEntranceExtension(): Collection
    {
        return $this->entranceExtension;
    }

    public function addEntranceExtension(HighwayVehicle $entranceExtension): self
    {
        if (!$this->entranceExtension->contains($entranceExtension)) {
            $this->entranceExtension[] = $entranceExtension;
            $entranceExtension->setEntrance($this);
        }

        return $this;
    }

    public function removeEntranceExtension(HighwayVehicle $entranceExtension): self
    {
        if ($this->entranceExtension->contains($entranceExtension)) {
            $this->entranceExtension->removeElement($entranceExtension);
            // set the owning side to null (unless already changed)
            if ($entranceExtension->getEntrance() === $this) {
                $entranceExtension->setEntrance(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HighwayVehicle[]
     */
    public function getEgressExtension(): Collection
    {
        return $this->egressExtension;
    }

    public function addEgressExtension(HighwayVehicle $egressExtension): self
    {
        if (!$this->egressExtension->contains($egressExtension)) {
            $this->egressExtension[] = $egressExtension;
            $egressExtension->setEgress($this);
        }

        return $this;
    }

    public function removeEgressExtension(HighwayVehicle $egressExtension): self
    {
        if ($this->egressExtension->contains($egressExtension)) {
            $this->egressExtension->removeElement($egressExtension);
            // set the owning side to null (unless already changed)
            if ($egressExtension->getEgress() === $this) {
                $egressExtension->setEgress(null);
            }
        }

        return $this;
    }

    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    public function setMacAddress(string $macAddress): self
    {
        $this->macAddress = $macAddress;

        return $this;
    }
}

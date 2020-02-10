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
     * @ORM\OneToMany(targetEntity="App\Entity\AccessPoint", mappedBy="highwayExtension")
     */
    private $accessPoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $accessKey;

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
     * @ORM\Column(type="string", length=8)
     */
    private $codeName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Violation", mappedBy="interchange")
     */
    private $violation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Power", mappedBy="interchange")
     */
    private $power;

    /**
     * @ORM\Column(type="integer")
     */
    private $sequenceNo;

    public function __construct()
    {
        $this->entranceExtension = new ArrayCollection();
        $this->egressExtension = new ArrayCollection();
        $this->accessPoint = new ArrayCollection();
        $this->violation = new ArrayCollection();
        $this->power = new ArrayCollection();
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


    public function getAccessKey(): ?string
    {
        return $this->accessKey;
    }

    public function setAccessKey(string $accessKey): self
    {
        $this->accessKey = $accessKey;

        return $this;
    }


    /**
     * @return Collection|AccessPoint[]
     */
    public function getAccessPoint(): Collection
    {
        return $this->accessPoint;
    }

    public function addAccessPoint(AccessPoint $accessPoint): self
    {
        if (!$this->accessPoint->contains($accessPoint)) {
            $this->accessPoint[] = $accessPoint;
            $accessPoint->setHighwayExtension($this);
        }

        return $this;
    }

    public function removeAccessPoint(AccessPoint $accessPoint): self
    {
        if ($this->accessPoint->contains($accessPoint)) {
            $this->accessPoint->removeElement($accessPoint);
            // set the owning side to null (unless already changed)
            if ($accessPoint->getHighwayExtension() === $this) {
                $accessPoint->setHighwayExtension(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Violation[]
     */
    public function getViolation(): Collection
    {
        return $this->violation;
    }

    public function addViolation(Violation $violation): self
    {
        if (!$this->violation->contains($violation)) {
            $this->violation[] = $violation;
            $violation->setInterchange($this);
        }

        return $this;
    }

    public function removeViolation(Violation $violation): self
    {
        if ($this->violation->contains($violation)) {
            $this->violation->removeElement($violation);
            // set the owning side to null (unless already changed)
            if ($violation->getInterchange() === $this) {
                $violation->setInterchange(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Power[]
     */
    public function getPower(): Collection
    {
        return $this->power;
    }

    public function addPower(Power $power): self
    {
        if (!$this->power->contains($power)) {
            $this->power[] = $power;
            $power->setInterchange($this);
        }

        return $this;
    }

    public function removePower(Power $power): self
    {
        if ($this->power->contains($power)) {
            $this->power->removeElement($power);
            // set the owning side to null (unless already changed)
            if ($power->getInterchange() === $this) {
                $power->setInterchange(null);
            }
        }

        return $this;
    }
}

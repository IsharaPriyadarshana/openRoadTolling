<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccessPointRepository")
 */
class AccessPoint
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
     * @ORM\ManyToOne(targetEntity="App\Entity\HighwayExtension", inversedBy="accessPoint")
     */
    private $highwayExtension;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $macAddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ssid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gps;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Power", mappedBy="accessPoint")
     */
    private $power;

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

    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    public function setMacAddress(string $macAddress): self
    {
        $this->macAddress = $macAddress;

        return $this;
    }

    public function getSsid(): ?string
    {
        return $this->ssid;
    }

    public function setSsid(string $ssid): self
    {
        $this->ssid = $ssid;

        return $this;
    }

    public function getHighwayExtension(): ?HighwayExtension
    {
        return $this->highwayExtension;
    }

    public function setHighwayExtension(?HighwayExtension $highwayExtension): self
    {
        $this->highwayExtension = $highwayExtension;

        return $this;
    }

    public function getGps(): ?string
    {
        return $this->gps;
    }

    public function setGps(?string $gps): self
    {
        $this->gps = $gps;

        return $this;
    }

    public function getPower(): ?Power
    {
        return $this->power;
    }

    public function setPower(?Power $power): self
    {
        $this->power = $power;

        // set (or unset) the owning side of the relation if necessary
        $newAccessPoint = $power === null ? null : $this;
        if ($newAccessPoint !== $power->getAccessPoint()) {
            $power->setAccessPoint($newAccessPoint);
        }

        return $this;
    }
}

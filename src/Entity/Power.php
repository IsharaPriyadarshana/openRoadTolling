<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PowerRepository")
 */
class Power
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
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\HighwayExtension", inversedBy="power")
     */
    private $interchange;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AccessPoint", inversedBy="power")
     */
    private $accessPoint;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
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

    public function getAccessPoint(): ?AccessPoint
    {
        return $this->accessPoint;
    }

    public function setAccessPoint(?AccessPoint $accessPoint): self
    {
        $this->accessPoint = $accessPoint;

        return $this;
    }
}

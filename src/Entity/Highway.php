<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HighwayRepository")
 */
class Highway
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
     * @ORM\OneToMany(targetEntity="App\Entity\HighwayExtension", mappedBy="highway")
     */
    private $highwayExtension;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeName;

    public function __construct()
    {
        $this->highwayExtension = new ArrayCollection();
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

    /**
     * @return Collection|HighwayExtension[]
     */
    public function getHighwayExtension(): Collection
    {
        return $this->highwayExtension;
    }

    public function addHighwayExtension(HighwayExtension $highwayExtension): self
    {
        if (!$this->highwayExtension->contains($highwayExtension)) {
            $this->highwayExtension[] = $highwayExtension;
            $highwayExtension->setHighway($this);
        }

        return $this;
    }

    public function removeHighwayExtension(HighwayExtension $highwayExtension): self
    {
        if ($this->highwayExtension->contains($highwayExtension)) {
            $this->highwayExtension->removeElement($highwayExtension);
            // set the owning side to null (unless already changed)
            if ($highwayExtension->getHighway() === $this) {
                $highwayExtension->setHighway(null);
            }
        }

        return $this;
    }
}

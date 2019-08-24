<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SerialRepository")
 */
class Serial
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
    private $serialNo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerialNo(): ?string
    {
        return $this->serialNo;
    }

    public function setSerialNo(string $serialNo): self
    {
        $this->serialNo = $serialNo;

        return $this;
    }
}

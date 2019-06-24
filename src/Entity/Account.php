<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccountRepository")
 */
class Account
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
    private $accountNo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $balance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ownerName;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="account")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountNo(): ?string
    {
        return $this->accountNo;
    }

    public function setAccountNo(string $accountNo): self
    {
        $this->accountNo = $accountNo;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(?float $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): self
    {
        $this->ownerName = $ownerName;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newAccount = $user === null ? null : $this;
        if ($newAccount !== $user->getAccount()) {
            $user->setAccount($newAccount);
        }

        return $this;
    }
}

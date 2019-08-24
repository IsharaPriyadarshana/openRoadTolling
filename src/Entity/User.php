<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
         * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $pendingTransaction;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(groups={"update"})
     *
     */
    private $firstName;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank(groups={"update"})
     */
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TransactionHistory", mappedBy="user")
     */
    private $transaction;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     *
     */
    private $image;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string",length=10)
     * @Assert\Length("10",groups={"update"})
     */
    private $phoneNumber;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\HighwayVehicle", mappedBy="user")
     */
    private $highwayVehicle;

    /**
     * @ORM\Column(type="string",length=10, nullable=true)
     */
    private $revisionNo;

    /**
     * @ORM\Column(type="string",length=10)
     * @Assert\NotBlank(groups={"update"})
     * @Assert\Length("10",groups={"update"})
     */
    private $idNumber;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Vehicle", mappedBy="user")
     */
    private $vehicle;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Account", mappedBy="user")
     */
    private $account;


    public function __construct()
    {
        $this->vehicle = new ArrayCollection();
        $this->transaction = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail( $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername()
    {
        return (string) $this->email;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    public function eraseCredentials(){}


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName( $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName( $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress( $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getIdNumber()
    {
        return $this->idNumber;
    }

    public function setIdNumber( $idNumber): self
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber( $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicle(): Collection
    {
        return $this->vehicle;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicle->contains($vehicle)) {
            $this->vehicle[] = $vehicle;
            $vehicle->setUser($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicle->contains($vehicle)) {
            $this->vehicle->removeElement($vehicle);
            // set the owning side to null (unless already changed)
            if ($vehicle->getUser() === $this) {
                $vehicle->setUser(null);
            }
        }

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getRevisionNo(): ?string
    {
        return $this->revisionNo;
    }

    public function setRevisionNo(string $revisionNo): self
    {
        $this->revisionNo = $revisionNo;

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
        $newUser = $highwayVehicle === null ? null : $this;
        if ($newUser !== $highwayVehicle->getUser()) {
            $highwayVehicle->setUser($newUser);
        }

        return $this;
    }

    /**
     * @return Collection|TransactionHistory[]
     */
    public function getTransaction(): Collection
    {
        return $this->transaction;
    }

    public function addTransaction(TransactionHistory $transaction): self
    {
        if (!$this->transaction->contains($transaction)) {
            $this->transaction[] = $transaction;
            $transaction->setUser($this);
        }

        return $this;
    }

    public function removeTransaction(TransactionHistory $transaction): self
    {
        if ($this->transaction->contains($transaction)) {
            $this->transaction->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getUser() === $this) {
                $transaction->setUser(null);
            }
        }

        return $this;
    }

    public function getPendingTransaction(): ?bool
    {
        return $this->pendingTransaction;
    }

    public function setPendingTransaction(bool $pendingTransaction): self
    {
        $this->pendingTransaction = $pendingTransaction;

        return $this;
    }


}

<?php

namespace App\Entity;

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
     * @ORM\Column(type="string",length=10)
     * @Assert\NotBlank(groups={"update"})
     * @Assert\Length("10",groups={"update"})
     */
    private $idNumber;

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

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
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
}

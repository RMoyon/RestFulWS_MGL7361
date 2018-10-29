<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="information")
 */
class Information
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id_information", type="integer")
     * @ORM\GeneratedValue
     */
    private $idInformation;

    /**
     * @ORM\Column(type="string", nullable="true")
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $category;

    /**
     * @ORM\Column(name="street_number", type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $streetNumber;

    /**
     * @ORM\Column(name="street_name", type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $streetName;

    /**
     * @ORM\Column(name="town", type="string", nullable=true)
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $town;

    /**
     * @ORM\Column(name="postal_code", type="string", nullable=true)
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $postalCode;

    /**
     * @ORM\Column(name="email", type="string", nullable=true)
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $email;

    /**
     * @ORM\Column(name="phone_number", type="string", nullable=true)
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $phoneNumber;

        /**
     * @ORM\Column(name="urlWebsite", type="string", nullable=true)
     * @Assert\Type("url", message="Cette valeur devrait être du type {{ type }}")
     */
    private $urlWebsite;


    public function getId()
    {
        return $this->idInformation;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function getStreetName()
    {
        return $this->streetName;
    }

    public function getTown()
    {
        return $this->town;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getUrlWebsite()
    {
        return $this->urlWebsite;
    }

    //TODO SETTERS
    public function setId($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }
}

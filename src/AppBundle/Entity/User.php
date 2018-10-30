<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="user_login_unique",columns={"login"})}
 * )
 * @UniqueEntity("login", message="Cet identifiant existe déjà")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id_user", type="integer")
     * @ORM\GeneratedValue
     */
    private $idUser;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $login;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $password;

    /**
     * @ORM\Column(name="last_name", type="string", nullable=true)
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $lastName;

    /**
     * @ORM\Column(name="first_name", type="string", nullable=true)
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $firstName;

    // /**
    //  * @ORM\ManyToMany(targetEntity="GreatDeal", mappedBy="User")
    //  * @var GreatDeal[]
    //  */
    // private $greatDeal;

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setIdUser($idUser)
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

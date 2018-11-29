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
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

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

    /**
     * @ORM\OneToMany(targetEntity="TakeAnInterest", mappedBy="users")
     * @var TakeAnInterest[]
     */
    protected $interests;

    /**
     * @var University[]
     *
     * @ORM\ManyToMany(targetEntity="University", inversedBy="users")
     * @ORM\JoinTable(
     *  name="study",
     *  joinColumns={
     *    @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *    @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     *  }
     * )
     */
    protected $universities;

###############################################################

    public function getId()
    {
        return $this->id;
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

    public function getUniversities()
    {
        return $this->universities;
    }

    public function getInterests()
    {
        return $this->interests;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function setUniversities($universities)
    {
        $this->universities = $universities;
        return $this;
    }

    public function setInterests($interests)
    {
        $this->interests = $interests;
        return $this;
    }

    public function addUniversity($university)
    {
        $this->universities->add($university);
    }

    public function removeUniversity($university)
    {
        $this->universities->removeElement($university);
    }
}

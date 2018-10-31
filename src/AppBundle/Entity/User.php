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

  // /**
  //  * @ORM\ManyToMany(targetEntity="GreatDeal", mappedBy="User")
  //  * @var GreatDeal[]
  //  */
  // private $greatDeal;

  /**
   * @ORM\OneToMany(targetEntity="TakeAnInterest", mappedBy="user")
   * @var TakeAnInterest[]
   */
  protected $take_an_interest;

  /**
   * @ORM\ManyToMany(targetEntity="University", mappedBy="user")
   * @var University[]
   */
  protected $university;

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

  public function getGreatDeal()
  {
    return $this->great_deal;
  }

  public function getTakeAnInterest()
  {
    return $this->take_an_interest;
  }

  public function getUniversity()
  {
    return $this->university;
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

  public function setGreatDeal(GreatDeal $great_deal)
  {
    $this->great_deal = $great_deal;
    return $this;
  }

  public function setTakeAnInterest(TakeAnInterest $take_an_interest)
  {
    $this->take_an_interest = $take_an_interest;
    return $this;
  }

  public function setUniversity(University $university)
  {
    $this->university = $university;
    return $this;
  }
}

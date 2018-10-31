<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="university",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="university_name_unique",columns={"name"})}
 * )
 * @UniqueEntity("name", message="Cette université existe déjà")
 */
class University
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
  private $name;

  /**
   * @ORM\ManyToMany(targetEntity="GreatDeal", inversedBy="university")
   * @var GreatDeal[]
   */
  protected $great_deal;

  /**
   * @ORM\ManyToMany(targetEntity="User", inversedBy="University")
   * @var User[]
   */
  protected $user;

################################################################

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getGreatDeal()
  {
    return $this->great_deal;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public function setGreatDeal(GreatDeal $great_deal)
  {
    $this->great_deal = $great_deal;
    return $this;
  }

  public function setUser(User $user)
  {
    $this->user = $user;
    return $this;
  }
}

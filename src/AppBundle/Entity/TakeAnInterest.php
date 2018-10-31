<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="take_an_interest")
 */
class TakeAnInterest
{

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  protected $id;

  /**
   * @ORM\ManyToOne(targetEntity="User")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ORM\ManyToOne(targetEntity="GreatDeal")
   * @ORM\JoinColumn(nullable=false)
   */
  private $great_deal;

  /**
   * @ORM\Column(type="string")
   */
  private $type_of_interest;

################################################################

  public function getId()
  {
    return $this->id;
  }

  public function getTypeOfInterest()
  {
    return $this->type_of_interest;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function getGreatDeal()
  {
    return $this->great_deal;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function setTypeOfInterest($type_of_interest)
  {
    $this->type_of_interest = $type_of_interest;
    return $this;
  }

  public function setUser(User $user)
  {
    $this->user = $user;
    return $this;
  }
}

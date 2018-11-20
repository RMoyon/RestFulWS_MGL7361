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
   * @var User[]
   * @ORM\ManyToOne(targetEntity="User", inversedBy="interests")
   * @ORM\JoinColumn(nullable=false)
   */
  private $users;

  /**
   * @var GreatDeal[]
   * @ORM\ManyToOne(targetEntity="GreatDeal", inversedBy="interests")
   * @ORM\JoinColumn(nullable=false)
   */
  private $great_deals;

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

  public function getGreatDeals()
  {
    return $this->great_deals;
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

  public function setUsers(User $users)
  {
    $this->users = $users;
    return $this;
  }

################################################################

  public function findByUsers($id)
  {
      return $this->createQueryBuilder('i')
        ->innerJoin('i.users', 'u')
        ->andWhere('u.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getResult();
  }
}

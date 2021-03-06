<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    private $greatDeals;

    /**
     * @ORM\Column(type="string")
     */
    private $typeOfInterest;

################################################################

    public function getId()
    {
        return $this->id;
    }

    public function getTypeOfInterest()
    {
        return $this->typeOfInterest;
    }

    public function getGreatDeals()
    {
        return $this->greatDeals;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setTypeOfInterest($typeOfInterest)
    {
        $this->typeOfInterest = $typeOfInterest;
        return $this;
    }

    public function setGreatDeals($greatDeals)
    {
        $this->greatDeals = $greatDeals;
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

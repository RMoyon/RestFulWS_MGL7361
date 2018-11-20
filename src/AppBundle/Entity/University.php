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
     * @var GreatDeal[]
     *
     * @ORM\ManyToMany(targetEntity="GreatDeal", inversedBy="universities")
     * @ORM\JoinTable(
     *  name="availability",
     *  joinColumns={
     *    @ORM\JoinColumn(name="university_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *    @ORM\JoinColumn(name="great_deal_id", referencedColumnName="id")
     *  }
     * )
     */
    protected $great_deals;

    /**
     * @var User[]
     * @ORM\ManyToMany(targetEntity="University", mappedBy="users", cascade={"persist", "remove"})
     */
    protected $users;

################################################################

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
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
}

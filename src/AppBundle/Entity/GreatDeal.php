<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity()
 * @ORM\Table(name="great_deal",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="great_deal_name_unique",columns={"name"})}
 * )
 * @UniqueEntity("name", message="Un évènement porte déjà le même nom")
 */
class GreatDeal
{
    /**
     * @ORM\Id
     * @ORM\Column(name= "id_great_deal", type="integer")
     * @ORM\GeneratedValue
     */
    private $idGreatDeal;

    /**
     * @ORM\Column(name="type_of_great_deal", type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     * @Assert\Choice({"Discount", "Event"})
     */
    private $typeOfGreatDeal;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $description;

    // /**
    //  * @ORM\ManyToMany(targetEntity="User", mappedBy="GreatDeal")
    //  * @var User[]
    //  */
    // protected $user;


    public function getId()
    {
        return $this->idGreatDeal;
    }

    public function getTypeOfGreatDeal()
    {
        return $this->typeOfGreatDeal;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->idGreatDeal = $id;
        return $this;
    }

    public function setTypeOfGreatDeal($typeOfGreatDeal)
    {
        $this->typeOfGreatDeal = $typeOfGreatDeal;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

}

<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="tag",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="tag_name_unique",columns={"name"})}
 * )
 * @UniqueEntity("name", message="Ce Tag existe déjà")
 */
class Tag
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
   * @ORM\ManyToMany(targetEntity="GreatDeal", inversedBy="Tag")
   * @var GreatDeal[]
   */
  protected $great_deal;

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
}

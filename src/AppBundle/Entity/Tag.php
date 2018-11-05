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
   * @var GreatDeal[]
   * @ORM\ManyToMany(targetEntity="GreatDeal", inversedBy="tags")
   * @ORM\JoinTable(
   *  name="have_tag",
   *  joinColumns={
   *    @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
   *  },
   *  inverseJoinColumns={
   *    @ORM\JoinColumn(name="great_deal_id", referencedColumnName="id")
   *  }
   * )
   */
  protected $great_deals;

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

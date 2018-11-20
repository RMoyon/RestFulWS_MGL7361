<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

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
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  private $id;

  /**
   * @ORM\Column(name="type_of_great_deal", type="string")
   * @Assert\NotBlank()
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   * @Assert\Choice(callback="callBackForTypeOfGreatDealValidation",
   *               message="Doit être égal à Discount ou Event")
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

  /**
   * @ORM\ManyToMany(targetEntity="University", mappedBy="great_deals")
   * @var University[]
   */
  protected $universities;

  /**
   * @ORM\ManyToMany(targetEntity="Information", mappedBy="great_deals")
   * @var Information[]
   */
  protected $informations;

  /**
   * @ORM\ManyToMany(targetEntity="Tag", mappedBy="great_deals")
   * @var Tag[]
   */
  protected $tags;

  /**
   * @ORM\OneToMany(targetEntity="Period", mappedBy="great_deals")
   * @var Period[]
   */
  protected $periods;

  /**
   * @ORM\OneToMany(targetEntity="TakeAnInterest", mappedBy="great_deals")
   * @var TakeAnInterest[]
   */
  protected $interests;

###############################################################

  public function getId()
  {
    return $this->id;
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

  public function getInformations()
  {
    return $this->informations;
  }

  public function getTags()
  {
    return $this->tags;
  }

  public function getPeriods()
  {
    return $this->periods;
  }

  public function setId($id)
  {
    $this->id = $id;
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

################################################################

  public function callBackForTypeOfGreatDealValidation()
  {
    return array("Discount", "Event");
  }
}

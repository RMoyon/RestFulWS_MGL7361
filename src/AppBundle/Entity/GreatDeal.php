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
   * @ORM\ManyToMany(targetEntity="University", mappedBy="GreatDeal")
   * @var University[]
   */
  protected $university;

  /**
   * @ORM\ManyToMany(targetEntity="Information", mappedBy="GreatDeal")
   * @var Information[]
   */
  protected $information;

  /**
   * @ORM\ManyToMany(targetEntity="Tag", mappedBy="GreatDeal")
   * @var Tag[]
   */
  protected $tag;

  /**
   * @ORM\OneToMany(targetEntity="Period", mappedBy="GreatDeal")
   * @var Period[]
   */
  protected $period;

  /**
   * @ORM\OneToMany(targetEntity="TakeAnInterest", mappedBy="GreatDeal")
   * @var TakeAnInterest[]
   */
  protected $take_an_interest;

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

  public function getUniversity()
  {
    return $this->university;
  }

  public function getInformation()
  {
    return $this->information;
  }

  public function getTag()
  {
    return $this->tag;
  }

  public function getPeriod()
  {
    return $this->period;
  }

  public function getTakeAnInterest()
  {
    return $this->take_an_interest;
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

  public function setUser(User $user)
  {
    $this->user = $user;
    return $this;
  }

  public function setUniversity(University $university)
  {
    $this->university = $university;
    return $this;
  }

  public function setInformation(Information $information)
  {
    $this->informatio = $information;
    return $this;
  }

  public function setTag(Tag $tag)
  {
    $this->tag = $tag;
    return $this;
  }

  public function setPeriod(Period $period)
  {
    $this->period = $period;
    return $this;
  }

  public function setTakeAnInterest(TakeAnInterest $take_an_interest)
  {
    $this->take_an_interest = $take_an_interest;
    return $this;
  }

################################################################

  public function callBackForTypeOfGreatDealValidation()
  {
    return array("Discount", "Event");
  }
}

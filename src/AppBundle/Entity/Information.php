<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="information")
 */
class Information
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue
   */
  private $id;

  /**
   * @ORM\Column(type="string", nullable=true)
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   * @Assert\Choice(callback="callBackForCategoryValidation",
   *               message="N'est pas égal à une des valeurs définies")
   */
  private $category;

  /**
   * @ORM\Column(name="street_number", type="integer")
   * @Assert\NotBlank()
   * @Assert\Type("integer", message="Cette valeur devrait être du type {{ type }}")
   */
  private $streetNumber;

  /**
   * @ORM\Column(name="street_name", type="string")
   * @Assert\NotBlank()
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   */
  private $streetName;

  /**
   * @ORM\Column(name="town", type="string", nullable=true)
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   */
  private $town;

  /**
   * @ORM\Column(name="postal_code", type="string", nullable=true)
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   */
  //TODO Add control on postalCode
  private $postalCode;

  /**
   * @ORM\Column(name="latitude", type="string", nullable=false)
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   */
  private $latitude;

  /**
   * @ORM\Column(name="longitude", type="string", nullable=false)
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   */
  private $longitude;

  /**
   * @ORM\Column(name="email", type="string", nullable=true)
   * @Assert\Email(message = "The email '{{ value }}' is not a valid email.")
   */
  private $email;

  /**
   * @ORM\Column(name="phone_number", type="string", nullable=true)
   * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
   */
  //TODO Add control on phoneNumber
  private $phoneNumber;

  /**
   * @ORM\Column(name="urlWebsite", type="string", nullable=true)
   * @Assert\Url(message="Cette URL est incorrecte")
   */
  private $urlWebsite;

  /**
   * @var GreatDeal[]
   * @ORM\ManyToMany(targetEntity="GreatDeal", inversedBy="informations")
   * @ORM\JoinTable(
   *  name="contact",
   *  joinColumns={
   *    @ORM\JoinColumn(name="information_id", referencedColumnName="id")
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

  public function getCategory()
  {
    return $this->category;
  }

  public function getStreetNumber()
  {
    return $this->streetNumber;
  }

  public function getStreetName()
  {
    return $this->streetName;
  }

  public function getTown()
  {
    return $this->town;
  }

  public function getPostalCode()
  {
    return $this->postalCode;
  }

  public function getLatitude()
  {
    return $this->latitude;
  }

  public function getLogitude()
  {
    return $this->longitude;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  public function getUrlWebsite()
  {
    return $this->urlWebsite;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function setCategory($category)
  {
    $this->category = $category;
    return $this;
  }

  public function setStreetNumber($streetNumber)
  {
    $this->streetNumber = $streetNumber;
    return $this;
  }

  public function setStreetName($streetName)
  {
    $this->streetName = $streetName;
    return $this;
  }

  public function setTown($town)
  {
    $this->town = $town;
    return $this;
  }

  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
    return $this;
  }

  public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }

  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
    return $this;
  }

  public function seturlWebsite($urlWebsite)
  {
    $this->urlWebsite = $urlWebsite;
    return $this;
  }

################################################################

  public function callBackForCategoryValidation()
  {
    return array("Bar", "Restaurant", "Cinéma", "Discothèque");
  }
}

<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="period")
 */
class Period
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="start_date", type="datetime")
     * @Assert\NotBlank()
     */
    private $startDate;

    /**
     * @ORM\Column(name="end_date", type="datetime")
     * @Assert\NotBlank()
     */
    //TODO Ajouter un contrôle pour que les deux dates ne soient pas égales
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="GreatDeal", inversedBy="periods")
     * @ORM\JoinColumn(nullable=false)
     * @var great_deal[]
     */
    protected $great_deals;

################################################################

    public function getId()
    {
        return $this->id;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function setendDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }
}

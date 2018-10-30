<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="period")
 */
class Period
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id_period", type="integer")
     * @ORM\GeneratedValue
     */
    private $idPeriod;

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

    public function getIdPeriod()
    {
        return $this->idPeriod;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setIdPeriod($idPeriod)
    {
        $this->idPeriod = $idPeriod;
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

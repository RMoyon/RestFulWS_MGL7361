<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class UserPoint
{
    /**
     * @Assert\NotBlank()
     * type = float
     */
    private $latitude;

    /**
     * @Assert\NotBlank()
     * type = float
     */
    private $longitude;

    /**
     * @Assert\NotBlank()
     */
    private $returnNumber;

###############################################################

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getReturnNumber()
    {
        return $this->returnNumber;
    }

    public function setReturnNumber($returnNumber)
    {
        $this->returnNumber = $returnNumber;
    }

###############################################################

}

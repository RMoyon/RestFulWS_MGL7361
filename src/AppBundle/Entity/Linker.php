<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Linker
{
    /**
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @Assert\NotBlank()
     */
    private $inversedId;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getInversedId()
    {
        return $this->inversedId;
    }

    public function setInversedId($inversedId)
    {
        $this->inversedId = $inversedId;
    }
}
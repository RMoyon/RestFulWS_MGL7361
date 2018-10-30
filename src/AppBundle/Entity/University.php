<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="university",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="university_name_unique",columns={"name"})}
 * )
 * @UniqueEntity("name", message="Cette université existe déjà")
 */
class University
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id_university", type="integer")
     * @ORM\GeneratedValue
     */
    private $idUniversity;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $name;

    public function getIdUniversity()
    {
        return $this->idUniversity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setIdUniversity($idUniversity)
    {
        $this->idUniversity = $idUniversity;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

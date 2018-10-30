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
     * @ORM\Column(name="id_tag", type="integer")
     * @ORM\GeneratedValue
     */
    private $idTag;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Type("string", message="Cette valeur devrait être du type {{ type }}")
     */
    private $name;

    public function getIdTag()
    {
        return $this->idTag;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

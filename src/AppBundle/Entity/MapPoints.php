<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class MapPoints
{
    /**
     * @Assert\NotBlank()
     */
    private $top;

    /**
     * @Assert\NotBlank()
     */
    private $bottom;

    /**
     * @Assert\NotBlank()
     */
    private $left;

    /**
     * @Assert\NotBlank()
     */
    private $right;

    /**
     * @Assert\NotBlank()
     */
    private $returnNumber;

###############################################################

    public function getTop()
    {
        return $this->top;
    }

    public function setTop($top)
    {
        $this->top = $top;
    }

    public function getBottom()
    {
        return $this->bottom;
    }

    public function setBottom($bottom)
    {
        $this->bottom = $bottom;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left)
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right)
    {
        $this->right = $right;
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

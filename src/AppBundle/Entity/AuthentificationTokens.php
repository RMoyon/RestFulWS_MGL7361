<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class AuthentificationTokens
{
    /**
     * @Assert\NotBlank()
     */
    private $login;

    /**
     * @Assert\NotBlank()
     */
    private $password;

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

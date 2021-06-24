<?php


class User
{
    public $name;
    public $email;
    public $password;

    public function __construct($name,$email, $password)
    {
        $this->name = $name;
        $this->email=$email;
        $this->password = $password;

    }

    public function getName()
    {
        return $this->name;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }



    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

}
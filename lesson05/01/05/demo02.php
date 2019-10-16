<?php

namespace lesson05\grasp\example05\demo02;

class Empoyee
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function rename($name)
    {
        $this->name = $name;
    }

    public function changeEmail($email)
    {
        $this->email = $email;
    }

    public static function filterEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
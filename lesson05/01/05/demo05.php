<?php

namespace lesson05\grasp\example05\demo05;

class Empoyee
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $this->filterEmail($email);
    }

    public function rename($name)
    {
        $this->name = $name;
    }

    public function changeEmail($email)
    {
        $this->email = $this->filterEmail($email);
    }

    private static function filterEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
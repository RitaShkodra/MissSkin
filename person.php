<?php

abstract class Person
{
    protected $fullname;
    protected $username;
    protected $email;
    protected $password;
    protected $role;

    function __construct($fullname, $username, $email, $password, $role)
    {
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    abstract protected function setSession();
    abstract protected function setCookie();
}
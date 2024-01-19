<?php

abstract class Person
{
    protected $id;
    protected $fullname;
    protected $username;
    protected $email;
    protected $password;
    protected $role;

    function __construct($id, $fullname, $username, $email, $password, $role)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    abstract protected function setSession();
    abstract protected function setCookie();
}
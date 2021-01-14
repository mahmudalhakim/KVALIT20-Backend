<?php

class Name
{
    public function __construct($firstName, $lastName, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->age = rand(1, 100);
        $this->email = $this->createEmail();
    }

    public function createEmail()
    {
        $email = $this->firstName . '.' . $this->lastName . '@example.com';
        $email = mb_strtolower($email);

        $search  = array('å', 'ä', 'ö', 'é', '-', ' ');
        $replace = array('a', 'a', 'o', 'e', '', '');
        $email = str_replace($search, $replace, $email);

        return $email;
    }
}

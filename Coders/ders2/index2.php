<?php

class Student
{
    private $firstname;
    private $gender;

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function checkGender($gender)
    {
        if ('male' !== strtolower($gender) and 'female' !== strtolower($gender)) {
            return [
                'success' => false,
                'message' => 'Set gender as Male or Female for gender'
            ];
        }
        return [
            'success' => true,
            'message' => 'Ok'
        ];
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
}

$student = new Student();
$student->setFirstName('Meena');
$student->setGender('Female');

?>
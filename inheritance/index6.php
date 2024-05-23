<?php
//! instanceof bir obyektin hansisa calssdan torediyini gosterir. 
class Person
{
    protected string $name;
    protected string $surname;
    protected $age;
    function __construct($name, $surname, $age)
    {
        $this->name = $name;
        $this->age = $age;
        $this->surname = $surname;
    }
    public function toString()
    {
        $result = "Person " . $this->name . " " . $this->surname . " " . $this->age;
        return $result;
    }
}
class Teacher extends Person
{
    protected $subject;
    protected $salary;
    function __construct($name, $surname, $age, $subject, $salary)
    {
        parent::__construct($name, $surname, $age);
        $this->subject = $subject;
        $this->salary = $salary;
    }
    public function toStringTeacher()
    {
        $result = "Teacher " . $this->name . " " . $this->surname . " " . $this->age . " " . $this->subject . " " . $this->salary;
        return $result;
    }
    public function getWage()
    {
        return $this->salary;
    }
    public function getSubject()
    {
        return $this->subject;
    }

}
class LisfOfPeople
{
    private $people = [];
    public function add(Person $person)
    {
        $this->people[] = $person;
    }
    public function size()
    {
        return count($this->people);
    }
    public function toString()
    {
        $result = '';
        foreach ($this->people as $index => $person) {
            $result .= $person->toString();
        }
        return $result;
    }
    public function getBudget()
    {
        $sum = 0;
        foreach ($this->people as $item) {
            if ($item instanceof Teacher) {
                $sum += $item->getWage();
            }
        }
        return $sum;
    }
    public function AverageSalary()
    {
        $sum = 0;
        $count = 0;
        foreach ($this->people as $item) {
            if ($item instanceof Teacher) {
                $sum += $item->getWage();
                $count++;
            }
        }
        return $sum / $count;
    }
    public function getBudgetSubject($subject)
    {
        $sum = 0;
        foreach ($this->people as $item) {
            if ($item instanceof Teacher && $item->getSubject() == $subject) {
                $sum += $item->getWage();
            }
        }
        return $sum;
    }
}
$person = new Person("Nihad", 18, "Karimov");
$person2 = new Person("Fuad", 18, "Karimov");
$teacher1 = new Teacher("Nihad", 'Karimov', 18, "Info", 200);
$teacher2 = new Teacher("Sahmar", 'Quluzade', 22, "Info", 500);
$teacher3 = new Teacher("Gismat", 'Gusein', 23, "LL", 500);
$list = new LisfOfPeople();
// $add = $list->add($person);
// $add = $list->add($person2);
// $add = $list->add($teacher1);
// $add = $list->add($teacher2);
// $add = $list->add($teacher3);
echo $list->getBudgetSubject("Info");
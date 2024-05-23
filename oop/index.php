<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index2.php" method="GET">
        <input type="text" name="car">
        <button type="submit">Send</button>
    </form>
</body>

</html>
<?php
class Car
{
    public $name;
    public $age;
    function __wahtever($ad)
    {
        $this->name = $ad;
    }
    function get_name()
    {
        return $this->name;
    }

}
$car = new Car;
$name = $_GET['car'];
$car->__wahtever($name);
echo "Name is::{$car->get_name()}";
?>
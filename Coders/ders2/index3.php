<?php

// class Riyaziyyat
// {
//     private int $a = 12;

//     public function set($param)
//     {
//         $this->a = $param;
//     }
//     public function get()
//     {
//         return $this->a;
//     }
// }

// $class = new Riyaziyyat();
// echo $class->get();
// echo "<br>";
// $class->set(23);
// echo $class->get();

class MyClass
{
    private $num1;
    private $num2;
    public function set($num1, $num2): void
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }
    public function subtract(): int
    {
        return $this->num1 - $this->num2;
    }
}
$class = new MyClass();

if (isset($_POST['submitInfo'])) {
    $class->set($_POST['num1'], $_POST['num2']);
    echo $class->subtract();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="num1">
        <input type="text" name="num2">
        <input type="submit" name="submitInfo">
    </form>
</body>

</html>
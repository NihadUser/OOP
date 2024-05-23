<?php
class Request
{
    public static array $request = [];
    public static function store($arr)
    {
        foreach ($arr as $key => $value) {
            self::$request[$key] = $value;
        }
        return self::$request;
    }
}
if (isset($_POST['submitBtn'])) {
    $arr = Request::store($_POST);
    // print_r($arr->name);
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
        <input type="text" name="name">
        <br>
        <input type="submit" name="submitBtn">
    </form>
</body>

</html>
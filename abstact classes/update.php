<?php
include "Controller.php";
$categoriesClass = new CodersBlog('categories', $db);

if ($categoriesClass instanceof PDO) {
    echo "salam";
}
if (isset($_POST['submitBtn'])) {
    $upadte = $categoriesClass->update([
        'name' => $_POST['name'],
        'created_by' => 45,
        'created_at' => date("m:y:d H:i:s")
    ], $_GET['id']);

    echo "<div>{$upadte['message']}</div>";
}

$category = $categoriesClass->find($_GET['id']);
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
        <input type="text" name="name" value="<?= $category['name'] ?>"><br>
        <input type="submit" name="submitBtn">
    </form>
</body>

</html>
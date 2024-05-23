<?php
include "Controller.php";

$categoriesClass = new CodersBlog('categories', $db);
$categories = $categoriesClass->all();

if (isset($_POST['submitBtn'])) {
    $categoriesClass->create([
        'name' => $_POST['name'],
    ]);

}
$blogClass = new CodersBlog("blogs", $db);
// $blogClass->create([
//     'title' => "OOP",
//     'description' => "Lorem",
//     "image" => "https://101.php",
//     "created_by" => 3,
//     "category_id" => 3,
// ]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name"><br>
        <input type="submit" name="submitBtn">
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $cat):
                ?>
                <tr>
                    <td><?= $cat['name'] ?></td>
                    <td><?= $cat['created_at'] ?></td>
                    <td><a href="update.php?id=<?= $cat['id'] ?>">Edit</a></td>
                </tr>
                <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>
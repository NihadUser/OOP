<?php
include "DBquery.php";
class Category extends DBQuery
{
    public static string $table = 'categories';
}

// $categories = Category::paginate();
// print_r($categories);

$categories = Category::paginate([], [], $_GET['page'])['data'];
print_r($categories);
$paginationCount = Category::paginate([], [], $_GET['page'])['paginationCount'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <ul>
        <?php
        for ($i = 1; $i <= $paginationCount; $i++) {
            ?>
        <li class="page-item"><a class="page-link"
                href=<?= "http://localhost/OOP/static/Category.php?page=$i" ?>><?= $i ?></a></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>
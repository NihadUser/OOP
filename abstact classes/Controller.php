<?php
// class Categories extends CodersBlog
// {
//     public function create($id)
//     {
//         $query = $this->dataBase->prepare("UPDATE categories SET name = ? WHERE id = ?");
//         $query->execute([
//             $_POST['name'],
//             $id
//         ]);
//         return [
//             'response' => true,
//             'message' => "Ok."
//         ];
//     }
// }
class CodersBlog
{
    protected $tableName;
    protected $dataBase;
    function __construct($tableName, $db)
    {
        $this->tableName = $tableName;
        $this->dataBase = $db;
    }
    public function all()
    {
        $query = $this->dataBase->prepare("SELECT * FROM $this->tableName");
        $query->execute([]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function find($id)
    {
        $query = $this->dataBase->prepare("SELECT * FROM $this->tableName WHERE id = ?");
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function delete($id)
    {
        $query = $this->dataBase->prepare("DELETE FROM $this->tableName WHERE id = ?");
        $delete = $query->execute([
            $id
        ]);
        if ($delete) {
            return [
                'status' => true,
                'message' => "deleted"
            ];
        }
    }
    public function create($arr)
    {
        try {
            $questionQuery = '';
            $sqlColumnNames = '';
            $j = 0;
            $executeArr = [];

            foreach ($arr as $key => $value) {
                $questionQuery .= $j == 0 ? " ?" : ", ? ";
                $sqlColumnNames .= $j == 0 ? $key : ", " . $key;

                $executeArr[] = $value;

                $j++;
            }
            $slqQuery = "INSERT INTO $this->tableName ($sqlColumnNames) VALUES ($questionQuery)";
            print_r($slqQuery);
            $query = $this->dataBase->prepare($slqQuery);
            $query->execute($executeArr);
            return [
                'status' => true,
                "message" => "Ok."
            ];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update($arr, $id)
    {

        $i = 0;
        $updateQuery = '';
        $executeArr = [];

        foreach ($arr as $key => $value) {
            $updateQuery .= $i == 0 ? $key . " = ?" : "," . $key . " = ?";
            $executeArr[] = $value;
            $i++;
        }

        $executeArr[] = $id;
        $query = $this->dataBase->prepare("UPDATE $this->tableName SET $updateQuery WHERE id = ?");
        $query->execute($executeArr);

        return [
            'status' => true,
            'message' => "Updated!"
        ];
    }
    public function where($columnName, $keyword)
    {
        try {
            $query = $this->dataBase->prepare("SELECT * FROM $this->tableName WHERE $columnName = ?");
            $query->execute([$keyword]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // public function select($arr = [], $id = null)
    // {
    //     $whereQuery = $id == null ? "" : 'WHERE id = ?';

    //     $selectQuery = implode(',', $arr);
    //     $sqlQuery = "SELECT $selectQuery FROM $this->tableName" . $whereQuery;
    //     $query = $this->dataBase->prepare($sqlQuery);
    //     $query->execute([]);
    //     $data  

    // }

}



$db = new PDO("mysql:host=localhost;dbname=blog_project", "root", '');

$class = new CodersBlog('categories', $db);
$class->where('name', "Aqil");

?>
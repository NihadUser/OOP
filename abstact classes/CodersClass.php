<?php
$db = new PDO("mysql:host=localhost;dbname=blog_project", "root", '');
class CodersClass
{
    public $tableName;
    public $databaseConn;
    function __construct($tableName, $db)
    {
        $this->tableName = $tableName;
        $this->databaseConn = $db;
    }
    public function all()
    {
        $query = $this->databaseConn->prepare("SELECT * FROM $this->tableName");
        $query->execute([]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function find($id)
    {
        $query = $this->databaseConn->prepare("SELECT * FROM $this->tableName WHERE id = ?");
        $query->execute([$id]);
        $singleData = $query->fetch(PDO::FETCH_ASSOC);
        return $singleData;
    }
    public function create($arr)
    {
        $sqlColumnNames = '';
        $questionCount = '';
        $executeArr = [];
        $i = 0;
        foreach ($arr as $key => $value) {

            $sqlColumnNames .= $i == 0 ? $key : "," . $key;
            $questionCount .= $i == 0 ? "?" : ", ?";
            $executeArr[] = $value;
            $i++;
        }
        // return $executeArr;
        // return $insertQuery;
        $insertQuery = "INSERT INTO $this->tableName ($sqlColumnNames) VALUES($questionCount)";
        $query = $this->databaseConn->prepare($insertQuery);
        $query->execute($executeArr);
        return [
            'success' => true,
            'message' => "inserted!"
        ];
    }
}


$class = new CodersClass('categories', $db);

$query = $class->create([
    'name' => 'insert',
]);
print_r($query);
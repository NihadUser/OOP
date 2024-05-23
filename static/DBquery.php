<?php
class DBquery
{
    public static string $table = '';
    public static $conn = null;
    public static string $hostName = 'localhost';
    public static string $dbName = 'blog_project';
    public static string $username = 'root';
    public static string $psw = '';
    public const FETCH_ALL = 1;
    public const FETCH = 2;


    public static function connectDB()
    {
        if (self::$conn == null) {
            try {
                return self::$conn = new PDO('mysql:host=' . self::$hostName . ';dbname=' . self::$dbName, self::$username, self::$psw);
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        return self::$conn;
    }
    public static function all()
    {
        $db = self::connectDB();

        $query = $db->prepare("SELECT * FROM " . static::$table);
        $query->execute([]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    public static function get($type = self::FETCH_ALL, $columnArr = [], array $where = []): array
    {
        $db = self::connectDB();
        $table = static::$table;

        $whereQuery = $where == [] ? '' : ' WHERE ';
        $executeArr = [];

        $columns = $columnArr == [] ? "*" : implode(",", $columnArr);

        $i = 0;
        foreach ($where as $key => $value) {
            $whereQuery .= $i == 0 ? $key . "= ?" : " and $key" . "= ?";
            $executeArr[] = $value;

            $i++;
        }

        $getQuery = "SELECT $columns FROM $table $whereQuery";

        // return $getQuery;
        $query = $db->prepare($getQuery);
        $query->execute($executeArr);
        if ($type == self::FETCH_ALL) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } elseif ($type == self::FETCH) {
            $data = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $data;

    }
    public static function first($columnArr = [], $where = [])
    {
        return self::get(self::FETCH, $columnArr, $where);
    }
    public static function find($id)
    {
        $db = self::connectDB();
        $table = static::$table;

        $query = $db->prepare("SELECT * FROM $table WHERE id = ?");
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public static function delete($id)
    {
        $db = self::connectDB();
        $table = static::$table;

        $query = $db->prepare("DELETE FROM $table WHERE id = ?");
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
    public static function where($columnName, $keyword)
    {
        $db = self::connectDB();
        $table = static::$table;

        try {
            $query = $db->prepare("SELECT * FROM $table WHERE $columnName = ?");
            $query->execute([$keyword]);
            $data = $query->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public static function create($arr)
    {
        $db = self::connectDB();
        $table = static::$table;

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

            $slqQuery = "INSERT INTO $table ($sqlColumnNames) VALUES ($questionQuery)";
            $query = $db->prepare($slqQuery);
            $query->execute($executeArr);
            return [
                'status' => true,
                "message" => "Ok."
            ];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public static function update($arr, $id)
    {
        $db = self::connectDB();
        $table = static::$table;

        try {
            $i = 0;
            $updateQuery = '';
            $executeArr = [];

            foreach ($arr as $key => $value) {
                $updateQuery .= $i == 0 ? $key . " = ?" : "," . $key . " = ?";
                $executeArr[] = $value;
                $i++;
            }

            $executeArr[] = $id;
            $query = $db->prepare("UPDATE $table SET $updateQuery WHERE id = ?");
            $query->execute($executeArr);

            return [
                'status' => true,
                'message' => "Updated!"
            ];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    // public static function paginate($columnArr = [], $currentPage = 1, array $where = [])
    // {
    //     $db = self::connectDB();
    //     $table = static::$table;

    //     $limit = 10;
    //     $offset = ($currentPage - 1) * $limit;


    //     $whereQuery = $where == [] ? '' : ' WHERE ';
    //     $executeArr = [];

    //     $columns = $columnArr == [] ? "*" : implode(",", $columnArr);

    //     $i = 0;
    //     foreach ($where as $key => $value) {
    //         $whereQuery .= $i == 0 ? $key . "= ?" : " and $key" . "= ?";
    //         $executeArr[] = $value;

    //         $i++;
    //     }

    //     $getQuery = "SELECT $columns FROM $table $whereQuery LIMIT $limit OFFSET $offset";

    //     $query = $db->prepare($getQuery);
    //     $query->execute($executeArr);
    //     $data = $query->fetchAll(PDO::FETCH_ASSOC);

    //     $allCategories = self::get(self::FETCH_ALL, $columnArr, $where);
    //     $paginationCount = ceil(count($allCategories) / $limit);

    //     return [
    //         'data' => $data,
    //         'paginationCount' => $paginationCount
    //     ];
    // }

    // public function groupBy($columnName, $value)
    // {
    //     $table = static::$table;
    //     $db = self::connectDB();

    //     $groupByQuery = "SELECT COUNT($columnName), $columnName FROM $table GROUP BY $columnName";

    // }
    public static function paginate($columnArr = [], $where = [], $currentPage = 1)
    {
        $db = self::connectDB();
        $table = static::$table;

        $limit = 10;
        $offset = ($currentPage - 1) * $limit;

        $whereQuery = $where == [] ? '' : ' WHERE ';
        $executeArr = [];

        $columns = $columnArr == [] ? "*" : implode(",", $columnArr);

        $i = 0;
        foreach ($where as $key => $value) {
            $whereQuery .= $i == 0 ? $key . "= ?" : " and $key" . "= ?";
            $executeArr[] = $value;

            $i++;
        }

        $getQuery = "SELECT $columns FROM $table $whereQuery LIMIT $limit OFFSET $offset";

        // return $getQuery;
        $query = $db->prepare($getQuery);
        $query->execute($executeArr);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $categories = self::get();

        $paginationCount = ceil(count($categories) / $limit);
        return [
            'data' => $data,
            'paginationCount' => $paginationCount
        ];
    }
}

?>
<?php

class Database
{
    private function connection()
    {
        $dsn = 'mysql:host=' . DBHOST . ';port=' . PORT . ';dbname=' . DBNAME;
        $con = new PDO($dsn, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = [])
    {
        $con = $this->connection();

        $stm = $con->prepare($query);

        $check = $stm->execute($data);

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($check) && count($check)) {
                return $result;
            }
        }

        return false;
    }


}

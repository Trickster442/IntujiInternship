<?php

trait Database
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
            if (is_array($result)) {
                return $result;
            }
        }

        return false;
    }

    public function get_row($query, $data = [])
    {
        $con = $this->connection();

        $stm = $con->prepare($query);

        $check = $stm->execute($data);

        if ($check) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result)) {
                return $result[0];
            }
        }

        return false;
    }

}

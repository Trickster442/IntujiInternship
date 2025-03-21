<?php

trait Model
{
    use Database;
    //protected $table = 'users'; //which model
    protected $offset = 0;  // for offset
    protected $limit = 10;  // limit in query


    // returns multiple rows
    // where with multiple conditions
    // and with not as well
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keysNot = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE"; // Changed 'where' to 'WHERE'

        // Concatenate for all where clause
        foreach ($keys as $key) {
            $query .= " $key = :$key AND";
        }

        // Concatenate for not equal conditions
        foreach ($keysNot as $key) {
            $query .= " $key != :$key AND";
        }

        // Remove the last "AND"
        $query = rtrim($query, " AND");

        // Add limit and offset
        $query .= " LIMIT $this->limit OFFSET $this->offset";

        // Merge the data arrays
        $data = array_merge($data, $data_not);

        // Call the query method
        return $this->query($query, $data);
    }


    // returns only one row
    public function first($data, $data_not)
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE";

        // Concatenate for all where clause
        foreach ($keys as $key) {
            $query .= " $key = :$key AND";
        }

        // Concatenate for not equal conditions
        foreach ($keys_not as $key) {
            $query .= " $key != :$key AND";
        }

        // Remove the last "AND"
        $query = rtrim($query, " AND");

        // Add limit and offset
        $query .= " LIMIT $this->limit OFFSET $this->offset";

        // Merge the data arrays
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if ($result)
            return $result[0];

        return false;
    }

    // create new record
    public function insert($data)
    {
        // remove any data that is not in allowedColumn of model
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $query = "INSERT into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        $this->query($query, $data);

        return false;
    }


    // update record based on id and data send
    public function update($id, $data, $id_column = 'id')
    {
        // remove any data that is not in allowedColumn of model
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $query = "UPDATE $this->table SET";

        // Concatenate for all where clause
        foreach ($keys as $key) {
            $query .= " $key = :$key ,";
        }
        $query = rtrim($query, " ,");


        $query .= " WHERE $id_column = :$id_column";

        $data[$id_column] = $id;

        $this->query($query, $data);

        return false;



    }

    // delete record based on id, delete based on column record
    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table where $id_column = :$id_column ";

        $this->query($query, $data);

        return false;
    }
}
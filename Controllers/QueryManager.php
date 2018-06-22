<?php
class QueryManager
{
    private $link;

    public function __construct($host, $user, $pass, $dbname)
    {
        $this->link = new mysqli($host, $user, $pass, $dbname);
        if($this->link->connect_errno)
        {
            echo 'Error de conexion: '.$this->link->connect_error;
        }
    }
    
    public function select($attributes, $table)
    {
        $query = "SELECT ".$attributes." FROM ".$table;
        $result = $this->link->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
                $response[] = $row;
            }
            return $response;
        }
    }

    public function selectWhere($attributes, $table, $where)
    {
        $query = "SELECT ".$attributes." FROM ".$table." WHERE ".$where;
        $result = $this->link->query($query);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $response[] = $row;
            }
            return $response;
        }
    }

    public function selectWhereOrder($attributes, $table, $where, $order)
    {
        $query = "SELECT ".$attributes." FROM ".$table." WHERE ".$where." ORDER BY ".$order;
        $result = $this->link->query($query);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $response[] = $row;
            }
            return $response;
        }
    }

    public function selectOrder($attributes, $table, $order)
    {
        $query = "SELECT ".$attributes." FROM ".$table." ORDER BY ".$order;
        $result = $this->link->query($query);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $response[] = $row;
            }
            return $response;
        }
    }

    public function insert($table, $array){
        $columns = null;
        $data = null;
        foreach ($array as $key => $value) {
            $columns .= $key.",";
            $data .= "'".$value."',";
        }
        //Eliminamor la , sobrante en cada variable
        $columns = substr($columns, 0, -1);
        $data = substr($data, 0 , -1);
        $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$data.")";
        return $this->link->query($query);
    }

    public function update($table, $array, $where) {
        $data = null;
        foreach ($array as $key => $value) {
            $data .= $key."='".$value."',";
        }
        $data = substr($data, 0 , -1);
        $query = "UPDATE ".$table." SET ".$data." WHERE ".$where;
        return $this->link->query($query);
    }

    public function delete($table, $where) {
        $query = "DELETE FROM ".$table." WHERE ".$where;
        return $this->link->query($query);
    }
}
?>
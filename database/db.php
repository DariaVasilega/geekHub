<?php
class DB{
    protected $connection;

    public function __construct($host = 'localhost', $user = 'root', $password = '123456', $db_name = 'test_db')
    {

        $this->connection = new mysqli($host, $user, $password, $db_name);

        $this->query("SET NAMES utf8mb4");

        if( !$this->connection )
        {
            throw new Exception('Could not connect to DB ');
        }
    }

    public function query($sql)
    {
        if ( !$this->connection ){
            return false;
        }

        $result = $this->connection->query($sql);

        if ( mysqli_error($this->connection) ){
            throw new Exception(mysqli_error($this->connection));
        }

        if ( is_bool($result) ){
            return $result;
        }

        $data = array();

        while( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }

        mysqli_free_result($result);

        return $data;
    }

    public function escape($str)
    {
        return mysqli_escape_string($this->connection, $str);
    }

    public function close()
    {
        return $this->connection->close();
    }
}
?>
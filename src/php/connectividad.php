<?php
class DB_Connect {
    const URL = 'mysql:host=mysql-recidenciacyj.alwaysdata.net;dbname=recidenciacyj_apeajal';
    const USERNAME = '279932_jessica';
    const PASSWORD = 'BTS2103';
    const OPCION = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
    var $connection=null;

    function __construct(){}

    function __destruct() 
    {
        $this->close();
    }

    public function connect() 
    {
        try {
            $this->connection = new PDO(self::URL, self::USERNAME, self::PASSWORD, self::OPCION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
            $this->close();
        }
        return $this->connection;
    }

    public function connect_externa() 
    {
        try {
            $this->connection = new PDO("", "", "", [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
            $this->close();
        }
        return $this->connection;
    }

    public function close() 
    {
        unset($this->connection);
    }

}

?>
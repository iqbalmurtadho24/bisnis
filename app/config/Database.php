<?php
final class Database
{

    //PDO config
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'bisnis';


    private $dbh; //PDO database handler
    private $stmt; //PDO Statement

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
          
            $query = "update user set
            session = '' , ip_address=''
            where TIMESTAMPDIFF(minute, last_access ,now()) > 9999  or status_akun != '1' ";
            self::query($query);
            self::execute();

        } catch (PDOException $th) {
            die($th->getMessage());
        }



    }

    //secure from sql injection
    public function query($query)
    {

        $this->stmt = $this->dbh->prepare($query);
    }
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }elseif ($type == "int") {
            $type = PDO::PARAM_INT;
        }elseif ($type == "string") {
            $type = PDO::PARAM_STR;
        }elseif ($type == 'bool') {
            $type = PDO::PARAM_STR;
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}

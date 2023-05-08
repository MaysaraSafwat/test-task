<?php

class MYSQLHandler implements DBHandler
{


    private $_db_handler;
    private $_table;
    private $_primary_key;
    public $rawCount;
    // DB
    protected $query;
    protected $sql;
    private $conn;

    public function __construct($table, $primary_key = "id")
    {
        $this->_table = $table;
         $this->connect();
        // $this->_primary_key = $primary_key;
        // $this->rawCount =  $this->getCount($this->_table);
        $this->conn = $this->_db_handler;
    }

    public function connect()
    {
        try {
            $handler = mysqli_connect(__HOST__, __USER__, __PASS__, __DB__, __PORT__);
            if ($handler) {
                $this->_db_handler = $handler;
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            // log();
            die("Something went wrong try again later");
        }
    }

    public function disconnect()
    {
        if ($this->_db_handler)
            mysqli_close($this->_db_handler);
    }

    public function get_all()
    
    {   $table = $this->_table;
        $query = mysqli_query($this->conn, "SELECT * FROM `$table`");
        $data = $query->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    public function create($data){
           var_dump($data);
        
            $coulmns = '';
            $values = '';
    
            foreach ($data as $key => $value) {
                if ($key == 'product_specifications'){
                   $value =  json_encode($value);
                }
                $coulmns .= "`$key` ,";
                $values .= "'$value' ,";
            }
    
            $coulmns = rtrim($coulmns, ",");
            $values = rtrim($values, ",");
    
            $this->sql = "INSERT INTO products ($coulmns) VALUES ($values);";
           
            $this->execute();
            return $this;
        
    }

    public function mass_delete($ids){
       $this->sql = "DELETE FROM $this->_table WHERE id IN (" . implode(",", $ids) . ")";
       $this->execute();
       return $this;
    } 

    public function execute()
    {
         print_r($this->sql);
        // die;
        $this->query = mysqli_query($this->conn, $this->sql);
        if (mysqli_affected_rows($this->conn) > 0) {
            return true;
        } else {
            return false;
        }
    }

  
}
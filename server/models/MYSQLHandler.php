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

  
}
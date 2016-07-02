<?php

define('DB_HOST', 'localhost');

define('DB_USER', 'root');

define('DB_PASS', '');

define('DB_NAME', 'reyting'); 

class MySQLdatabase

{

    private $connection;

    public $last_query;

    private $magic_quotes_active;

    private $new_enough_php;

    public function __construct() {

        $this->open_connection();

        $this->magic_quotes_active = get_magic_quotes_gpc();

        $this->new_enough_php = function_exists("mysql_real_escape_string");

  

    }

    public function open_connection() {

        $this->connection = mysql_connect(DB_HOST, DB_USER, DB_PASS);

        if(!$this->connection) {

            die ("Bazaga ulanishda xatolik yuz berdi: ".msql_error());

        } else {

            $db_select = mysql_select_db(DB_NAME, $this->connection);

            if(!$db_select) {

                die ("Baza tanlashda xatolik yuz berdi: ".mysql_error());

            }

        }    

    }

    public function query($sql) {

        $this->last_query= $sql;

        $result = mysql_query($sql, $this->connection);

        $this->confirm_query($result);

        return $result;

     }

     private function confirm_query($result) {

        if(!$result) {

        $output = "<br />Bazaga Murojat bajarilmadi: ".mysql_error();

        $output .= "<br /> <br />So`nggi SQL:  ".$this->last_query;

        die($output);    

     }

     }

    public function escape_value($value){

        

         if($this->new_enough_php){

            if($this->magic_quotes_active)

            {

                $value = stripslashes($value);

            }

            $value = mysql_real_escape_string($value);

        } else {

            if(!$this->magic_quotes_active) {

                $value = addslashes($value);

            }

            

        }

        return $value;

    } 

    public function fetch_array($result_set) {

        return mysql_fetch_array($result_set);

    }

    public function num_rows($result_set) {

        return mysql_num_rows($result_set);

    }

    public function insert_id()

    {

        return mysql_insert_id($this->connection);

    }

    public function affected_rows()

    {

        return mysql_affected_rows($this->connection); 

    }

    public function close_connection() {

        if(isset($this->connection)) {

            mysql_close($this->connection);

            unset($this->connection);

        }

    }

}

$database = new MySQLdatabase();

$db =& $database;

?>
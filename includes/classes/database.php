<?php
//To Make All Constant Variable Avaliable in This page For Create Connection 
require_once("config.php"); 
class Database 
{
    // This Is Public Variable Called Con To Create Connection 
    public $con; 

    function __construct()
    {
        // Becouse We Need To Create A Connection Automatically 
        $this->open_database_connection(); 
    }

    // Method To Open And Create A Connection 
    public function open_database_connection()
    {
        $this->con = new mysqli(SERVER_NAME,USER_NAME,PASSWORD,DB_NAME); 
        //To Check About Connection
        if(!$this->con)
        {
            die("Database Connection Failed Badly ".$this->con->connect_error); 
        }
    }

    // This Method For Execute A Query     
    public function Query($sql_statment)
    {
        $result=$this->con->query($sql_statment);
        $this->confirm_query($result); 
        return $result;//Return True 
    }
    //This method to check iF connection done or not
    public function confirm_query($result)
    {
        if(!$result)
        {
            die("Query Failed ".$this->con->error); 
        } 
    }
    public function escape_string($string)
    {
        // Escapes special characters in a string for use in an SQL statement
        $escaped_string = $this->con->real_escape_string($string); 
        /*
        دالة real_escape_string
        تقوم بتأمين السلسلة النصية (string)
        عن طريق إضافة شرطة مائلة عكسية (\) قبل الأحرف الخاصة مثل علامات الاقتباس المفردة
        (') والمزدوجة (")، مما يمنع استغلال هذه الأحرف في هجمات حقن SQL.
        */ 
        return $escaped_string; 
    }
    
    public function insert_id()
    {
        return $this->con->insert_id; 
    }

}
// This Object To Create A Connection 
$database = new Database(); 
?>
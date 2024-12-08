<?php
class Db_object 
{
    protected static $db_table="users";
    protected static $db_table_field=array('first_name','last_name','user_name','email','password');
   //$tmp_path =>This property for temrory path for our images  
    public $tmp_path; 
    public $filetype;
    public $size;
   public $errors=array(); //for own error to display to user
   //This array contain a types of error message 
    public $upload_errors_array = array(
        UPLOAD_ERR_OK       =>'the file uploaded successfully',
        UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded',
        UPLOAD_ERR_NO_FILE => 'No file was uploaded',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
        UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.',
    );
    public $id;
    // we make a method is static becouse make it able to access from class name 
public static function find_all()
{
    // we use a static keyword for access to static method in current class
    return static::find_by_query("SELECT * FROM ".static::$db_table." ");//static:: (late static binding)
}

//This method to find a user by id 
public static function find_by_id($id)
{
    global $database; 
    $the_result_array=static::find_by_query("SELECT * FROM ".static::$db_table." where id ='$id' LIMIT 1");
    return !empty($the_result_array) ? array_shift($the_result_array) : false;
    //if true it will return user_Name,first_Nameand last_name without id    
}
 // To Execute any query was sent
public static function find_by_query($sql)
{
    global $database; 
    $result_set = $database->Query($sql); 
     // this array to assign a record from this query 
    $the_object_array=array(); 
     // to fetch all record from table
    while($row=$result_set->fetch_assoc())
    {
        $the_object_array[]=static::instantation($row); 
    }
    return $the_object_array;  
}
public static function instantation($tht_record)
    {
        $calling_class=get_called_class(); 
        $the_object= new $calling_class;  
            /*
            This loop to assignment a value from the record 
            into array of object proprties 
            */
        foreach($tht_record as $the_attribute => $value)
        {
            // we pass the attribute for has_the_attribute method to check 
            // if has attribute or not
            if($the_object->has_the_attribute($the_attribute))
            {
                //assign value to attribute 
                $the_object->$the_attribute=$value; 
            }
        }
        return $the_object;
    }
    protected function properties()
    {
        //properties => empty array     
        $properties = array(); 
        // $db_table_field =array('user_name','password','first_name','last_name');
        // we use a static keyword becouse we need to access a static property from class 
        foreach(static::$db_table_field as $db_feild)
        {
            //property_exists -> We use this function to Checks if the object or class has a property
            //property_exists($this,$db_feild):$this:Refers to the current object
            //db_feild: this is a string refera to the key
            if(property_exists($this,$db_feild))
            {
                $properties[$db_feild]=$this->$db_feild;
            }
        }
        return $properties; 
    }
    //This method to filter a data before updating or inserting into data base
    protected function clean_properties()
    {
        global $database; 
        $clean_properties = array(); 
        foreach($this->properties() as $key => $value)
        {
            $clean_properties[$key] =$database->escape_string($value); 
        }   
        return $clean_properties; 
    }
    // this method to check if the array or object has attribute or not 
    private function has_the_attribute($the_attribute)
    {
        // get_object_vars => this is predefine bulit in function
        // to collect all the proprty in the class
        $object_properties= get_object_vars($this);//return array contain propties in current class
        //array_key_exists=> this is predefine bulit in function
        //Checks if the given key or index exists in the array
        return array_key_exists($the_attribute, $object_properties);
    }
    //This method to check if the user are found we do something like update upon anything 
    //If not we create it by create a user 
    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create(); 
    }
    //Thiss method to insert a new user into data base 
    public function create()
    {
        global $database; //to access to own method in this class 
        $properties=$this->clean_properties();  
        $sql ="INSERT INTO ".static::$db_table."(".implode(",",array_keys($properties)) .")"; 
        $sql.=" VALUES ('".implode("','",array_values($properties))."')" ; 
        if($database->Query($sql))
        {
            $this->id=$database->insert_id();  
            return true ; 
        }
        else 
        {
            return false; 
        }
    }
    public function update()
    {
        global $database; 
        $properties=$this->clean_properties(); 
        $properties_pair=array(); 
        foreach($properties as $key => $value)
        {
            $properties_pair[]="{$key}='{$value}'"; 
        }
        $sql="UPDATE ".static::$db_table." SET ";
        $sql.=implode(", ",$properties_pair); 
        $sql.=" WHERE id =".$database->escape_string($this->id); 
        $database->Query($sql); 
        return (mysqli_affected_rows($database->con)==1) ? true : false; 
    }
    public function Delete()
    {
        global $database; 
        $sql="DELETE FROM ".static::$db_table." WHERE "; 
        $sql.="id=".$database->escape_string($this->id)." LIMIT 1"; 
        
        $database->Query($sql); 
        return (mysqli_affected_rows($database->con)==1) ? true : false; 
    }
    public static function count_all()
    {
        global $database;
        $sql="SELECT COUNT(*) FROM ".static::$db_table;
        $result_set=$database->Query($sql); 
        $row = mysqli_fetch_array($result_set);
        return array_shift($row); 
    } 
}


?>
<?php
//This Is The User Class To Create OR delete or update user Into Data Base
class User extends Db_object
{
    //db_table => This is the name of our table called users 
    protected static $db_table="users";
    //db_table_field => These are our field we have in users table 
    protected static $db_table_field=array('first_name','last_name','user_name','email','password','user_image');
    // These are public properties 
    public $id;
    public $first_name;
    public $last_name;
    public $user_name;
    public $email;
    public $password;
    public $user_image; 
    public $upload_directory ="images"; 
    public $image_placeholder="http://placehold.it/400x400&text=image"; 
    // This method return a facke image if the user no has a user_image while if has we display 
    // his / her photo 
    public function image_path_placeholder()
    {
        return empty($this->user_image)? $this->image_placeholder : $this->upload_directory. DS ."user_image".DS.$this->user_image; 
    }
    
    public function upload_photo()
    {
            if(!empty($this->errors))
            {
                return false ; 
            }
            if(empty($this->user_image)||empty($this->tmp_path))
            {
                $this->errors[]="The file was not available ";
                return false; 
            }
            $target_path =SITE_ROOT . DS. $this->upload_directory . DS ."user_image".DS. $this->user_image ; 

            if(file_exists($target_path))
            {
                $this->errors[]="The file {$this->user_image} already exists"; 
                return false ; 
            }
            if(move_uploaded_file($this->tmp_path,$target_path))//To Moves an uploaded file to a new location
            {
                    unset($this->tmp_path); 
                    return true ; 
                
            }
            else 
            {
                $this->errors[]="The file directory probably doesn't have permission";
                return false ;  
            }
    
    }
    //This is passing $_FILES['uploaded_file'] as an argument
    public function set_file($file)//$file = $_FILES['uploaded_file']
    {
        //basename => Returns trailing name component of path
        $this->user_image = basename($file['name']);
        if(empty($file)||!$file ||!is_array($file))
        {
            $this->errors[]="There was no file uploaded here "; 
            return false ; 
        }
        else if($file['error'] != 0) // if get an error  
        {
            $this->errors[]=$this->upload_errors_array[$file['error']]; 
            return false; 
        }
        else 
        {
            $this->tmp_path =$file['tmp_name']; 
            $this->filetype =$file['type']; 
            $this->size =$file['size']; 
        }

    }
    // this method to check userName and Password 
    // verify user 
    public static function verify_user($user_name,$password)
    {
        global $database; 
        $Filter_userName =$database->escape_string($user_name);
        $Filter_Password=$database->escape_string($password); 
        $sql="SELECT * FROM ".self::$db_table.
        " WHERE user_name='{$Filter_userName}' AND password ='{$Filter_Password}' LIMIT 1";
        $the_result_array=self::find_by_query($sql);
        return !empty($the_result_array)?array_shift($the_result_array):false;
    }

}
// End User Class 
?>
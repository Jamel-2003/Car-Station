<?php
class Cars extends Db_object
{
    //db_table => This is the name of our table called cars 
    protected static $db_table="cars";
    //db_table_field => These are our field we have in photos table 
    protected static $db_table_field=array('user_id','license_number','color','type','rental_price','if_rentaled','filename','filetype','size');
    // These are public properties 
    public $id;
    public $user_id;
    public $license_number;
    public $color;
    public $type;
    public $rental_price;
    public $if_rentaled;
    public $filename;
    public $filetype;
    public $size;
    //$tmp_path =>This property for temrory path for our images  
    public $tmp_path; 
    //$upload_directory =>This property for upload images from this folder
    public $upload_directory="images"; 
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

    //This is passing $_FILES['uploaded_file'] as an argument
    public function set_file($file)//$file = $_FILES['uploaded_file']
    {
        //basename => Returns trailing name component of path
        $this->filename = basename($file['name']);
        if(empty($file)||!$file ||!is_array($file))
        {
            $this->errors[]="There was no file upoaded here "; 
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

    public function picture_path()
    {
        return $this->upload_directory . DS ."car_image".DS. $this->filename; 
    }


    public function save()
    {
        if($this->id)
        {
            $this->update(); 
        }
        else 
        {
            if(!empty($this->errors))
            {
                return false ; 
            }
            if(empty($this->filename)||empty($this->tmp_path))
            {
                $this->errors[]="The file was not available ";
                return false; 
            }
            $target_path =SITE_ROOT . DS. $this->upload_directory . DS ."car_image".DS. $this->filename ; 

            if(file_exists($target_path))
            {
                $this->errors[]="The file {$this->filename} already exists"; 
                return false ; 
            }
            if(move_uploaded_file($this->tmp_path,$target_path))//To Moves an uploaded file to a new location
            {
                if($this->create())
                {
                    unset($this->tmp_path); 
                    return true ; 
                }
            }
            else 
            {
                $this->errors[]="The file directory probably doesn't have permission";
                return false ;  
            }
        }
    }
    //This method to delete the photo from the data base in from the file server 
}
?>
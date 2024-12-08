<?php
class Session 
{
    private $signed_in=false; // By defualt we Assume the user did't sign in 
    public $id; 
    //This Property called count to count how many view we will get 
    public $count;
    public $message; 

    // to turn on session automatically 
    function __construct()
    {
        //Initialize session data
        session_start();
        $this->visitor_count();
        $this->check_the_login(); 
        $this->check_message(); 
    }

    public function visitor_count()
    {
        // in the first we check if the $_SESSION['count'] is empty or not
        if(isset($_SESSION['count']))
        {
            //count will increment one by evry refrish for page 
            return $this->count=$_SESSION['count']++; 
        }
        else
        {
            return $_SESSION['count']=1;
        }
    }
    public function is_signed_in ()
    {
        return $this->signed_in; 
    }

    public function login($user)
    {
        if($user)
        {
            $this->id=$_SESSION['id']=$user->id; 
            $this->signed_in=true ; 
        }
    }

    public function logout()
    {
        unset($_SESSION['id']); 
        unset($this->id);
        $this->signed_in=false ; 
    }

    private function check_the_login()
    {  
        // isset()=> To Determine if a variable is declared and is different than NULL(not empty)
        if(isset($_SESSION['id']))// to check if the session[id] empty or not 
        {
            $this->id=$_SESSION['id']; 
            $this->signed_in=true ; 
        }
        else
        {
            unset($this->id); 
            $this->signed_in=false; 

        }
    }
        public function message($msg="")
        {
            if(!empty($msg))
            {
                $_SESSION['message']=$msg; 
            }
            else 
            {
                return $this->message; 
            }
        }
        public function check_message()
        {
            if(isset($_SESSION['message']))
            {
                $this->message =$_SESSION['message']; 
                unset($_SESSION['message']); 
            }
            else 
            {
                $this->message=""; 
            }
        }
}

$session = new Session();

?>
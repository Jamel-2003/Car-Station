<?php
//in the first we Checks whether a given named constant exists or not 
// if not return null if exist we define a constant called (DS) : stand for DIRECTORY_SEPARATOR
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); //DIRECTORY_SEPARATOR => ('/' or '\') in windows operatin system 
define('SITE_ROOT', DS .'Users'. DS . 'www' . DS .'car_station'); // we main => C:\Users\www\car_station
// We Checks whether a INCLUDES_PATH constant exists or not
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'includes') ;
/*
The require_once expression is identical to require
except PHP will check if the file has already been
included, and if so,
not include (require) it again.
*/ 
// more secure method 
require_once(INCLUDES_PATH.DS."classes/function.php");
require_once(INCLUDES_PATH.DS."classes/config.php"); 
require_once(INCLUDES_PATH.DS."classes/database.php"); 
require_once(INCLUDES_PATH.DS."classes/db_object.php"); 
require_once(INCLUDES_PATH.DS."classes/user.php");
require_once(INCLUDES_PATH.DS."classes/session.php"); 
require_once(INCLUDES_PATH.DS."classes/cars.php"); 
require_once(INCLUDES_PATH.DS."classes/reservation.php"); 
require_once(INCLUDES_PATH.DS."classes/removes.php"); 

?>
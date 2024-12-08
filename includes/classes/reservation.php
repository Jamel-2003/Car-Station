<?php
class Reservation extends Cars
{
    //db_table => This is the name of our table called cars 
    protected static $db_table="rentals";
    //db_table_field => These are our field we have in photos table 
    protected static $db_table_field=array('user_id','car_id','rental_period','rental_cost','license_number','color','type','rental_price','if_rentaled','filename','filetype','size');
    // These are public properties 
    public $id;
    public $user_id;
    public $car_id;
    public $rental_period;
    public $rental_cost;
    public $license_number;
    public $color;
    public $type;
    public $rental_price;
    public $if_rentaled;
    public $filename;
    public $filetype;
    public $size;
    


}
?>
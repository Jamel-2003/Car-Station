<?php
require_once("init.php"); 
$cars= Cars::find_by_id($_GET['id']);
$reserv=new Reservation(); 
$rental_period=$_GET['rental_period']; 

if(isset($_POST['rental']))
{
    global $database; 
    $sql="INSERT INTO rentals (user_id,car_id,rental_period,rental_cost,license_number,color,type,if_rentaled,filename,filetype,size) 
    VALUES($cars->user_id , $cars->id , $rental_period , $cars->rental_price*$rental_period, $cars->license_number,'{$cars->color}','{$cars->type}','true','{$cars->filename}','{$cars->filetype}',$cars->size)";
    if($database->Query($sql))
    {
        $update="UPDATE cars SET if_rentaled ='true' WHERE id={$cars->id}";
        if($database->Query($update))
        {
            redirect("../index.php");
        }
        
    }
    
}

?>
    <!-- Start Header -->
    <?php
    include("include/header.php");
    ?>
    <link href="../css/car_reservation.css" rel="stylesheet">
    </head>
    <!-- End Header -->
<body>
     <!-- Start nav -->
   <?php
   include("include/nav.php");
   ?>
  <!-- End nav -->
<div class="col-md-4 col-md-offset-2">
    <div class="container" style="width:440px;height: 200px;margin:100px 450px ">
    <form action="confirm_reservation.php?id=<?php echo $_GET['id'];?>&rental_period=<?php echo $_GET['rental_period'];?>" method="post" class="form">
    <div class="heading" style="font-size:14px">The car rental price for <?php echo $rental_period;?> days of this car is <?php echo $cars->rental_price*$rental_period;?>$</div>
    <input class="login-button" style="width:100px;float:right" type="submit" name="rental" value="Confirm">
    </form>
    <a href="../index.php"><button class="login-button" style="width:100px;float:left; display:block;
    font-weight: bold;
    background-color:#1eb4ff;
    color: white;
    padding-block: 15px;
    margin: 20px auto;
    border-radius: 20px;
    box-shadow: rgba(133, 189, 215, 0.8784313725) 0px 20px 10px -15px;
    border: none;
    transition: all 0.2s ease-in-out;">Cancel</button></a>
    </div>
    </div> 

        <!-- Start Footer -->
    <?php
    include("include/footer.php");
    ?>
    <!-- End Footer -->
</body>
    </html>
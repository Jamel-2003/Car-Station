<?php
require_once("init.php"); 
$rental_id=$_GET['id']; 
$reservations=Reservation::find_by_id($rental_id);
$sql="UPDATE cars SET user_id = $reservations->user_id,license_number=$reservations->license_number,color ='{$reservations->color}',
type='{$reservations->type}',rental_price=$reservations->rental_cost,if_rentaled='false',filename='{$reservations->filename}' WHERE id=$reservations->car_id ";
global $database; 
if($database->Query($sql))
{
    $reservations->delete(); 
    redirect("confirm_cancel_reservation.php"); 
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
    <div class="container" style="height: 200px;">
    <div class="form">
    <div class="heading" style="font-size:14px">Do you need to cancel reservation another car ? </div>
    <a href="reservation_cancel.php"><button class="login-button" style="width:100px;float:right">Cancel Another Car</button></a>
    <a href="../index.php"><button class="login-button" style="width:100px;float:left">Cancel</button></a>
    </div>
    </div>
    </div>
</body>
</html>
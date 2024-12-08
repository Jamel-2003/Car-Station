<?php
require_once("init.php");
if(empty($_GET['id']))
{
    //then we dircet user to Home page
    redirect("car_reservation.php");
}
$cars=Cars::find_by_id($_GET['id']);
if(isset($_POST['submit']))
{
    $rental_period=trim($_POST['rental_period']);
    redirect("confirm_reservation?rental_period={$rental_period}"."&id={$_GET['id']}"); 
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

<div class="col-lg-4 ">
<div class="container " style="width:400px;height: 320px;margin:100px 450px ">
    <form action="" method="post" class="form" autocomplete="off">
    <div class="heading" style="font-size:14px">Enter how many days do you need ? </div>
    <input  class="input" type="text" name="type" id="type" placeholder="<?php echo $cars->type;?>" disabled>
    <input required class="input" type="number" name="rental_period" id="rental_period" placeholder="Number of day" min="0" max="31">
    <input class="login-button" type="submit" name="submit" value="Confirm">

    </form>
</div>


</div>

  <!-- Start Footer -->
  <?php
  include("include/footer.php");
  ?>
  <!-- End Footer -->
</body>

</html>
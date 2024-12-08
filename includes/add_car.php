<!-- Forms from : https://uiverse.io/-->

<?php
include("init.php");
$car = new Cars (); 
if(!$session->is_signed_in())
{
    redirect("login.php"); 
}
$message=""; 

if(isset($_POST['create']))
{
    global $database;
    $license_number=$_POST['license_number'];
    $car->user_id=$_SESSION['id'];
    $car->license_number=$_POST['license_number']; 
    $car->color=$_POST['color']; 
    $car->type=$_POST['type']; 
    $car->rental_price=$_POST['rental_price']; 
    $car->if_rentaled="false"; 
    $car->set_file($_FILES['file_upload']);
    $checkLiceseNumber="SELECT license_number FROM cars WHERE license_number='$license_number'";
    $result=$database->Query($checkLiceseNumber);
    if($result->num_rows>0)
    {
      $message="*The License Number for this car already exists ";
    }
    else 
    {
      if($car->save())
      {
        $message="";
        redirect("confirm_add_car.php");
          
      }
      else 
      {
          $message=join("<br>",$car->errors);
      }
    }
    
}
else
{
  $message="";
}

?>

    <?php
    include("include/header.php");
    ?>
    <link href="../css/add_car.css" rel="stylesheet">
</head>

<body>
  <!-- Start nav -->
    <?php
    include("include/nav.php");
    ?>
  <!-- End nav -->
  
  <div class="col-md-4 ">
  <div class="container">
    <div class="heading">ADD CAR</div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="form" enctype="multipart/form-data" autocomplete="off">
    
    <input required class="input" type="number" name="license_number" id="license_number" placeholder="License Number" min="00000" max="99999" maxlength="5">
    <input required class="input" type="text" name="color" id="color" placeholder="Car Color">
    <input required class="input" type="text" name="type" id="type" placeholder="Car Type">
    <input required class="input" type="number" name="rental_price" id="rental_price" placeholder="Rental Price"><br><br>
    <div class="form-group">
            <input type="file" name="file_upload" >
            <span class="message"><?php echo $message; ?></span>
    </div>
    <input class="login-button" type="submit" name="create" value="ADD">
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
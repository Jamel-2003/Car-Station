<!-- Cards from : https://uiverse.io/-->

<?php
require_once("init.php"); 
$reservations=Reservation::find_all();
?>
<!-- Start Header  -->
<?php
include("include/header.php");
?>
<!-- End Header  -->
   <link href="../css/car_reservation.css" rel="stylesheet">
</head>
<body>
 <!-- Start nav -->
   <?php
 include("include/nav.php");
 ?>
 <!-- End nav -->
 <!-- Start Cards  -->
<div class="cards pt-3 mt-5 mb-5" id="cars">
  <div class="container-lg mt-5 cars">
    <div class="heading text-center text-dark pb-5">
      <h1 class="display-4 pt-3"> All Car Reservation </h1>
    </div>
    <div class="row">
    <form action="" method="post" class="d-flex ps-4" role="search">
    <input class="form-control me-2" type="text" placeholder="Enter Car Name For Search " name="search" aria-label="Search">
    <input class="btn btn-outline-primary" type="submit"  value="search"></input>
    </form>
      <?php
      if(isset($_POST['search']))
      {
        global $database; 
        $car_name_for_search=$_POST['search'];
        $sql="SELECT * FROM rentals WHERE type='$car_name_for_search'"; 
        $search_cars=Reservation::find_by_query($sql);
        foreach($search_cars as $car)
        {
        
        ?>
        <div class="col-xl-4 col-lg-4 col-md-4 p-5 ">
          <div class="card" style="width:300px;height: 410px;" >
          <div class="img" >
          <img src="../<?php echo $car->picture_path();?>" width="300px" height="150px"
          style="border-top-left-radius: 40px;
          border-top-right-radius: 40px;">
          </div>
          <div class="text pt-2 text-dark">
          <p class="p">
            Car Name : <?php echo $car->type;?>
          </p>
          <p class="p"> License Number : <?php echo $car->license_number;?>  </p>
            <p class="p"> Color : <?php echo $car->color;?></p>
            <p class="p">Rental Price : <?php echo $car->rental_price;?>$</p>
            <p class="p">If Rentaled: <?php echo $car->if_rentaled;?></p>
          </div>
          </div>
          </div>
      <?php
      
    }
    }
      else 
      {
        foreach($reservations as $reserve):;
      
        ?>
        <div class="col-xl-4 col-lg-4 col-md-4 p-5 ">
            <div class="card" style="width:300px;height: 400px;">
            <div class="img" >
            <img src="../<?php echo $reserve->picture_path();?>" width="300px" height="150px"
            style="border-top-left-radius: 40px;
            border-top-right-radius: 40px;">
            </div>
            <div class="text pt-2 text-dark">
            <p class="p">
              Car Name : <?php echo $reserve->type;?>
            </p>
              <p class="p"> License Number : <?php echo $reserve->license_number;?>  </p>
              <p class="p"> Color : <?php echo $reserve->color;?></p>
              <p class="p">Rental Price : <?php echo $reserve->rental_cost;?>$</p>
              <p class="p">If Rentaled: <?php echo $reserve->if_rentaled;?></p>
            </div>
            </div>
          
            </div>
        <?php
      
        endforeach; 
      }
      ?>

    </div>
    </div>
    </div>

   <!-- Start footer -->
   <?php
 include("include/footer.php");
 ?>
 <!-- End footer -->
</body>
  </html>
    
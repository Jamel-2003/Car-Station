<!-- Cards from : https://uiverse.io/-->
<?php
include("init.php");
if(!$session->is_signed_in())
{
    redirect("login.php"); 
} 
$cars=Cars::find_all();
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

<!-- Start Cards  -->
<div class="cards pt-3 mt-5 mb-5" id="cars">
  <div class="container-lg mt-5 cars">
    <div class="heading text-center text-dark pb-5">
      <h1 class="display-4 pt-3">All cars for rentals </h1>
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
        $sql="SELECT * FROM cars WHERE type='$car_name_for_search'"; 
        $search_cars=Cars::find_by_query($sql);
        foreach($search_cars as $car)
        {
        if($car->if_rentaled != "true")
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
            <a href="car_reservation2.php?id=<?php echo $car->id;?>" class="ps-5 ms-5 mb-2"><button class="btn btn-primary " style="" >Select</button></a>
          </div>
          </div>
          </div>
      <?php
      }
    }
    }
      else 
      {
        foreach($cars as $car):
        if($car->if_rentaled != "true")
      {
      ?>
      <div class="col-xl-4 col-lg-4 col-md-4 p-5 ">
          <div class="card" style="width:300px;height: 410px;">
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
            <a href="car_reservation2.php?id=<?php echo $car->id;?>" class="ps-5 ms-5 mb-2"><button class="btn btn-primary " style="" >Select</button></a>
          </div>
          </div>
          </div>
      <?php
      }
      endforeach; 
    }
      ?>
    
    </div>
    </div>
    </div>
    
    


      
  <!-- Start Footer  -->
  <?php
  include("include/footer.php");
  ?>
  <!-- End Footer  -->
</body>
</html>
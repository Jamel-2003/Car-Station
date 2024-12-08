<?php
include("init.php");
$cars =Cars::find_all(); 
if(empty($_GET['id']))
{

}
else
{
    global $database; 
    $remover_car_by_id=Cars::find_by_id($_GET['id']);
    $sql="INSERT INTO removed_cars(user_id,license_number,color,type,rental_price,if_rentaled,filename,filetype,size)
    VALUES($remover_car_by_id->user_id,$remover_car_by_id->license_number,'{$remover_car_by_id->color}','{$remover_car_by_id->type}',
    $remover_car_by_id->rental_price,'{$remover_car_by_id->if_rentaled}','{$remover_car_by_id->filename}','{$remover_car_by_id->filetype}',
    $remover_car_by_id->size)";
    if($database->Query($sql))
    {
        $remover_car_by_id->delete(); 
        redirect("remove_car.php");  
    } 
}
?>
<!-- Start Header   -->
<?php
include("include/header.php");
?>
    <link href="../css/car_reservation.css" rel="stylesheet">
</head>
<!-- Enn Header   -->
<body>
    <!-- Start Nav -->
    <?php
include("include/nav.php");
?>
    <!-- End Nav -->

  <!-- Start Cards  -->
<div class="cards pt-3 mt-5 mb-5" id="cars">
  <div class="container-lg mt-5 cars">
    <div class="heading text-center text-dark pb-5">
      <h1 class="display-4 pt-3">All Cars </h1>
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
            <a href="remove_car.php?id=<?php echo $car->id;?>" class="ps-5 ms-5 mb-2"><button class="btn btn-primary " style="" >Delete</button></a>
          </div>
          </div>
          </div>
      <?php
         
    }
    }
      else 
      {
      
      foreach($cars as $car):
        
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
            <a href="remove_car.php?id=<?php echo $car->id;?>" class="ps-5 ms-5 mb-2"><button class="btn btn-primary " style="" >Delete</button></a>
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

    
    <!-- Start Footer -->
      <?php
      include("include/footer.php");
      ?>
    <!-- End Footer -->
</body>
    </html>
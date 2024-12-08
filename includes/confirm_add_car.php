<?php
include("init.php");
?>

    <?php
    include("include/header.php");
    ?>
    <link href="../css/add_car.css" rel="stylesheet">
</head>
<body>
  <!-- Start Nav -->
    <?php
    include("include/nav.php");
    ?>
  <!-- End Nav -->
  
  <div class="col-md-12 col-md-offset-2">
    <div class="container" style="height: 200px;">
    <div class="form">
    <div class="heading" style="font-size:14px">Do you need to add another car ? </div>
    <a href="add_car.php"><button class="login-button" style="width:100px;float:right">Add</button></a>
    <a href="../index.php"><button class="login-button" style="width:100px;float:left">Cancel</button></a>
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
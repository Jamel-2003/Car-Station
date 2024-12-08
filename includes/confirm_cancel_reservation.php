<?php
include("init.php");


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

    <div class="col-md-12 col-md-offset-2">
    <div class="container" style="height: 200px;">
    <div class="form">
    <div class="heading" style="font-size:14px">Do you want to cancel reservation another car ? </div>
    <a href="reservation_cancel.php"><button class="login-button mt-5" style="width:200px;float:right">Cancel Another Car</button></a>
    <a href="../index.php"><button class="login-button mt-5" style="width:200px;float:left">Go Back</button></a>
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
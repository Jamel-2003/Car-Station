    <!-- logo from :https://www.logoai.com/edit -->
    <!-- ======= navigation ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">
        <div class="logo me-auto">
            <h1><a href="index.php"><img src="images/logo.png"></a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
            <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About Us</a></li>
            <li class="dropdown"><a href="#"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a class="nav-link scrollto" href="includes/add_car.php?id=<?php echo $_SESSION['id'];?>"> Add Car </a></li>
                <li><a class="nav-link scrollto" href="includes/car_reservation.php">Car Reservation </a></li>
                <li><a class="nav-link scrollto" href="includes/reservation_cancel.php?id=<?php echo $_SESSION['id'];?>">Reservation Cancel </a></li>
                <li><a class="nav-link scrollto" href="includes/remove_car.php">Remove Car </a></li>
                <li class="dropdown"><a href="#"><span>Show Cars </span> <i class="bi bi-chevron-right"></i></a>
                    <ul>
                    <li><a href="includes/display_removed_car.php">All Removed Cars</a></li>
                    <li><a href="includes/display_all_cars.php">All Cars in System</a></li>
                    <li><a href="includes/display_reservation_cars.php">All Car Reservation</a></li>
                    <li><a href="includes/display_unreserve_car.php">All Car Unreservation</a></li>
                    
                    </ul>
                </li>
                </ul>
            </li>

            <li class="dropdown"><a href="#"><span>Account </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="includes/logout.php">Logout<i class="bi bi-box-arrow-right" style="font-size: 1rem;"></i></a></li>
                    <li><a href="includes/account_settings.php">Setting<i class="bi bi-person-gear" style="font-size: 1rem;"></i></a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#footer">Contact</a></li>

                </ul>

            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
        </div>
    </header>
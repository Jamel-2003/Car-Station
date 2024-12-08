<!-- This bootstrap template from :  https://bootstrapmade.com/-->
<?php
require_once("includes/init.php");
if(!$session->is_signed_in())
{
    redirect("includes/login.php"); 
} 
?>
  <!-- Start Header -->
  <?php
  include("main_header.php");
  ?>
  <!-- End Header -->
<body>
  <!-- Start nav -->
  <?php
  include("navigation.php");
  ?>
  <!-- End nav -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>Looking for a vehicle? You are at the right place.</h1>
            <h2>FIND YOUR BEST CAR RENTAL WITH JAMEL STATION</h2>
            <a href="#services" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="images/car.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="images/hero-img.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3 class="text-center">About Us</h3>
              <p class="fst-italic">
              Experience the convenience and efficiency of JAMEL STATION. Whether you're a car rental agency looking to streamline your operations or a customer searching for the perfect rental car, we have the tools and features to meet your needs.
              Join our community today and discover a better way to rent cars.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Our intuitive booking system allows you to reserve your desired vehicle in just a few clicks.</li>
                <li><i class="bi bi-check-circle"></i> Manage your bookings, update your personal information, and track your rental history with ease.</li>
                <li><i class="bi bi-check-circle"></i> Easily browse through our extensive database of available rental cars, complete with detailed information and images.</li>
                <li><i class="bi bi-check-circle"></i>Our platform is designed with the user in mind, offering a seamless and intuitive experience.</li>
                <li><i class="bi bi-check-circle"></i>We provide accurate and current information on all available rental cars.</li>
              </ul>
              
            </div>
          </div>
        </div>

      </div>
    </section>
    <br>
    <br>
    <br>
    <!-- End About Section -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container pb-5">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-center pb-5">Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bi bi-plus-circle"></i></div><br>
              <h4 class="title"><a href="#">Add Car</a></h4>
              <p class="description">Allows users to add a new car to the system by entering details like the license plate number, color, type, and rental price.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bi bi-coin"></i></div><br>
              <h4 class="title"><a href="">Rent a Car</a></h4>
              <p class="description">Users can view all available cars for rent, select a car, enter the rental duration, and see the total cost before confirming the rental.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bi bi-x-circle"></i></div><br>
              <h4 class="title"><a href="">Cancel a Reservation</a></h4>
              <p class="description">Users can view and cancel existing car reservations. When a reservation is canceled, the car is made available for rent again.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bi bi-trash"></i></div><br>
              <h4 class="title"><a href="">Remove a Car</a></h4>
              <p class="description">Users can permanently remove a car from the system. Unlike the cancellation of a reservation, this action removes the car entirely from the list of available cars.</p>
            </div>
          </div>

        </div>

        <br>
        <br>
        <br>
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bi bi-archive"></i></div><br>
              <h4 class="title"><a href="#">View Removed Cars</a></h4>
              <p class="description">Users can view all cars that have been removed from the system.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bi bi-car-front"></i></div><br>
              <h4 class="title"><a href="">View Added Cars</a></h4>
              <p class="description">Users can see a list of all cars that have been added to the system.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bi bi-cash-coin"></i></div><br>
              <h4 class="title"><a href="">View Rented Cars</a></h4>
              <p class="description">Users can view all currently rented cars.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box icon-box-blue">
              <div class="icon"><i class="bi bi-ev-front-fill"></i></div><br>
              <h4 class="title"><a href="">View Available Cars</a></h4>
              <p class="description"> Users can view all cars that are currently available for rent.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Services Section -->


  </main>
  <!-- End #main -->

  <!-- Start Footer -->
  <?php
  include("main_footer.php");
  ?>
  <!-- End Footer -->
  
</body>

</html>
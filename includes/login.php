<!-- Forms from : https://uiverse.io/-->
<?php
require_once ("init.php");
// In the first we need to check if the user already sign in or not 
if($session->is_signed_in())//if return true
{
    redirect("../index.php");
}
if(isset($_POST['submit']))
{
    $userName=test_data($_POST['username']); 
    $password=test_data($_POST['password']); 
    ///method to check database usre
    $user_found=User::verify_user($userName,$password);
    if($user_found)
    {
        $session->login($user_found);
        redirect("../index.php");
    }
    else 
    {
        $the_message="* Your Password or Username are incorrect "; 
    }

}
else 
    {
        $userName=""; 
        $password=""; 
        $the_message=""; 
    }


function test_data($data)
{
    $data=trim($data); 
    $data=htmlspecialchars($data); 
    return $data;

}
?>
<!-- Start Header -->
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Car Station</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../images/favicon.png" rel="icon">
    <link href="../images/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="../vendor/aos/aos.css" rel="stylesheet">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
</head>
<!-- End Header -->

<body>

<div class="col-md-12 ">
<div class="container">
    <div class="heading">Sign In</div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="form" autocomplete="off">
    <input required class="input" type="text" name="username" id="username" placeholder="User Name">
    <input required class="input" type="password" name="password" id="password" placeholder="Password">
    <span class="forgot-password"><a href="forgotPassword.php">Forgot Password ?</a></span>
    <span class="message"><?php echo $the_message; ?></span>
    <input class="login-button" type="submit" name="submit" value="Sign In">

    </form>
    <span class="sign_up"> Create New Account? <a href="signUp.php">SignUp</a></span>
</div>
</div>

</body>
    </html>
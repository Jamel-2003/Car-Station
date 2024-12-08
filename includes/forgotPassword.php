<!-- Forms from : https://uiverse.io/-->

<?php
include("init.php"); 
if(isset($_POST['submit']))
{
    $email=test_data($_POST['email']); 
    $password=test_data($_POST['password']); 
    $Confirm_password=test_data($_POST['confirm_password']); 

    $database=new Database();
    $user = new User ();  
    $checkQuery="SELECT email FROM users WHERE email='$email'"; 
    $result = $database->Query($checkQuery);
    // Check if the email already exists in the database or not 
    if ($result->num_rows > 0) 
    {
        if ($password === $Confirm_password)
        {
            $UpDate="UPDATE users SET password='$password' WHERE email='$email'";
            if ($database->Query($UpDate) === TRUE) {
                $the_message="*Password updated successfully";
                } 
        }
        else 
        {
            $the_message="*Doesn't Match password ";
        }
    }
    else
    {
        $the_message="*Doesn't found Email";
    }


}
else
{
    $the_message="";
}



function test_data($data)
{
    $data=trim($data); 
    $data=htmlspecialchars($data); 
    return $data;

}


?>

<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Car Station</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="images/favicon.png" rel="icon">
    <link href="images/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="vendor/aos/aos.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/forgotPassword.css" rel="stylesheet">
</head>

<body>
    
<div class="col-md-4 col-md-offset-2">
<div class="container">
<div class="form-container">
        <div class="logo-container">
            Forgot Password
        </div>

        <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <input type="password" id="password" name="password" placeholder="new password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
            <span class="message"><?php echo $the_message; ?></span>   
        </div>

            <input class="form-submit-btn" name="submit" type="submit" value="Send Email">
        </form>
        <span class="sign_up"> Already have an account? <a href="login.php">Sign In</a></span>
        <p class="signup-link">
            Don't have an account?
            <a href="signUp.php" class="signup-link link"> Sign up now</a>
        </p>
    </div>
</div>


</div>
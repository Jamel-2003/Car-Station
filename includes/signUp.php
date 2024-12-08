<!-- Forms from : https://uiverse.io/-->

<?php
include ("init.php");
$user = new User (); 
if(isset($_POST['create']))
{
if($user)
{
    $user_name=$_POST['user_name']; 
    $email=$_POST['email'];

    
    global $database;
    $checkUserName="SELECT user_name FROM users WHERE user_name = '$user_name'";
    $result = $database->Query($checkUserName);
    if ($result->num_rows > 0) 
    {
        $the_message ="*User Name already exists ";
    }
    else
    {
        $checkEmail="SELECT email FROM users WHERE email='$email'";
        $result2 = $database->Query($checkEmail);
        if ($result2->num_rows > 0) 
        {
            $the_message ="*Email already exists ";

        }
        else 
        {
        
            $user->first_name=$_POST['first_name'];
            $user->last_name=$_POST['last_name'];
            $user->user_name=$_POST['user_name']; 
            $user->email=$_POST['email']; 
            $user->password=$_POST['password']; 
            $user->set_file($_FILES['user_image']); 
            $user->upload_photo(); 

            if($user->save())
            {
                redirect("login.php"); 
            }
        }

    }

}
}
else 
{
    $the_message="";
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
    <link href="../css/signup.css" rel="stylesheet">
</head>

<body>
    
<div class="col-md-12">
<div class="container">
<div class="login">
<div class="hader">
    <span>Join us today!</span>
    <p>Sing up now to become a member.</p>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="First Name" name="first_name" required>
    <input type="text" placeholder="Last Name" name="last_name" required>
    <input type="text" placeholder="User Name" name="user_name" required>
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <input type="file" name="user_image" require>
    <span style="text-align:left;
    margin-top: 10px;
    margin-left: 10px;
    color: red;
    font-size: 14px;"><?php echo $the_message; ?></span>   
    <input type="submit" name="create" value="Sign up" >
    <span> Already a member? <a href="login.php">Login Here</a></span>
</form>
</div>
</div>


</div>
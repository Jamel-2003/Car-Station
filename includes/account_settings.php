<?php
require_once("init.php"); 
$user = User::find_by_id($_SESSION['id']);
$password = $user->password;
echo $password;
$the_message="";
if(isset($_POST['save']))
{
if($user)
{
  if(empty($_POST['email']))
  {

  }
  else 
  {
    $user->email=$_POST['email']; 
  }

    if(empty($_FILES['user_image']))
    {

    }
    else 
    {
        $user->set_file($_FILES['user_image']); 
        $user->upload_photo();
        $user->save();
        redirect("account_settings.php"); 
    }
    
}
}
else 
{
    $the_message="";
}
if(isset($_POST['save_password']))
{


    $new_password =$_POST['new_password'];
    $confirm_password =$_POST['confirm_password'];
    
        if($new_password === $confirm_password)
        {
            $user->password=$_POST['new_password']; 
            $user->save();
            redirect("account_settings.php"); 
            $the_message="";
        }
        else 
        {
            $the_message = "*Don't Match ";
        }
    
}
else 
{
    $the_message=" ";
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body{
    margin-top:20px;
    background:#f8f8f8
        }
    </style>
</head>
<body>
<!-- ======= Header ======= -->
<?php
include("include/nav.php"
);
?>



<div class="container pt-5 mt-5 pb-5 mb-4">
<div class="row flex-lg-nowrap">
<div class="col">
    <div class="row">
    <div class="col mb-3">
        <div class="card">
        <div class="card-body">
            <div class="e-profile">
            <div class="row">
                <div class="col-12 col-sm-auto mb-2 mt-2 " style="margin:auto  ;">
                <div class="mx-auto" style="width: 200px; height:200px;">
                    <div class="d-flex justify-content-center align-items-center img-thumbnail " style="height: 200px;width:200px; ">
                    <img src="../<?php echo $user->image_path_placeholder();?>" style="height:200px;width:200px">
                    </div>
                </div>
                </div>
                
            </div>
            
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#" class="active nav-link">Settings</a></li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane active">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="row">
                    <div class="col">
                        <div class="row">
                        <div class="col">
                        <div class="form-group">
                            <label class="mb-2">First Name</label>
                            <input class="form-control" type="text" placeholder="<?php echo $user->first_name;?>" disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                            <label class="mb-2">Last Name</label>
                            <input class="form-control" type="text" placeholder="<?php echo $user->last_name;?>" disabled>
                            </div>
                        </div>
                        </div><br>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label class="mb-2">User Name</label>
                            <input class="form-control" type="text" placeholder="<?php echo $user->user_name;?>" disabled>
                            </div><br>
                            <div class="form-group">
                            <label class="mb-2">Email</label>
                            <input class="form-control mb-4" type="email" name="email" placeholder="<?php echo $user->email;?>">
                            </div>
                            <div class="form-group mb-4">
                            <input type="file" name="user_image" require>
                            </div>
                            <div class="form-group">
                            <input type="submit" name="save" class="btn btn-primary" value="Save Change" >
                            </div>
                        </div>
                        </div>
                        <br><hr>
                    </div>
                    </div>
                </form>


                    <div class="row">
                        <form action="" method="post">
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        
                        <div class="row">
                        <div class="col">

                            <div class="form-group">
                            <label >New Password</label>
                            <input class="form-control" type="password" name="new_password" placeholder="••••••">
                            </div>

                        </div>
                        </div>

                        <div class="row">
                          <div class="col">

                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="confirm_password" placeholder="••••••"></div><br>
                              <p class="text-danger"> <?php echo $the_message; ?></p>
                          </div>
                        </div>

                        <div class="row">
                      <div class="mt-1">
                            <input type="submit" name="save_password" class="btn btn-primary" value="Save Change" >
                      </div>
                    </div>
                    
                      </div>
                    </div>
                    </form>

                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
</div>
</div>
<!-- ======= Footer ======= -->
<?php
include("include/footer.php");
?>
</body>

</html>
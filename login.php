<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
    $username=get_safe_value($con,$_POST['username']);
    $password=get_safe_value($con,$_POST['password']);
    $sql="select * from admin_users where username='$username' and password='$password'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['ADMIN_USERNAME']=$username;
        header('location:categories.php');
        die();

    }else{
        $msg="Please enter correct login details";
    }

}
?>
    <!DOCTYPE html>
    <html lang="en">
    <title>Login</title>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="img/LT_logo.png">
        <link rel="stylesheet" type="text/css" href="bootstrap framework/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='userjs/jquery-3.2.1.min.js'></script>
        <script src='bootstrap framework/js/bootstrap.bundle.min.js'></script>
        <link rel="stylesheet" href="usercss/login.css">


    </head>

    <body>
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="images/Milk_Tea.png" class="image" width="400" height="300"> </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <h6 class="mb-0 mr-4 mt-2">&nbsp;</h6>
                                <div class="facebook text-center mr-3">
                                    <div></div>
                                </div>
                                <div class="twitter text-center mr-3">
                                    <div></div>
                                </div>
                                <div class="linkedin text-center mr-3">
                                    <div></div>
                                </div>
                            </div>
                            <div class="row px-3 mb-4">
                            </div>
                            <form method="post">
                                <div class="form-group row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Username</h6>
                            </label> <input class="mb-4" type="text" name="username" class="form-control" placeholder="Enter a valid email address" required> </div>

                                <div class="form-group row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label> <input type="password" name="password" class="form-control" placeholder="Enter password" required> </div>
                                <div class="row px-3 mb-4">
                                    <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                                </div>
                                <div class="row mb-3 px-3"> <button type="submit" name="submit" class="btn btn-blue text-center">Login</button> </div>
                                <div class="row mb-3 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger" href="registration.html">Register</a></small> </div>
                                <div class="row mb-3 px-3"> <small class="font-weight-bold">Are you an Admin? <a class="text-danger" href="registration.html">Click here!</a></small> </div>
                            </form>
                           <div class="field_error"> <?php echo $msg?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
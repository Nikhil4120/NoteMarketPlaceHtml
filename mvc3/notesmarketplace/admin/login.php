<?php
    include '../db.php';
?>

<?php

    if(isset($_POST['login'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE emailid = '{$email}' AND roleid = 2";
        $login_query = mysqli_query($connection,$query);
        if(!($login_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        if(mysqli_num_rows($login_query) == 0){

            echo "<script>alert('Please Enter Valid Email Id ');</script>";
        }
        else{
            while($row = mysqli_fetch_assoc($login_query)){
                $db_password = $row['Password'];
            }

            if($password == $db_password){
                header('location: /notesmarketplace/admin/admin_dasboard.php');
            }
            else{
                echo "<script>alert('Please Enter Valid Password');</script>";
                $flag =1;
            }
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/login/login.css">
    <link rel="stylesheet" href="css/login/responsive.css">

</head>

<body>

    <section id="login">
        <div class="content-box-lg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-sm-12 col-12 text-center">
                    <div id="top-logo">
                        <img src="images/top-logo.png" alt="logo" class="img-responsive">
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-12">

                    <div id="login-form">
                        <div id="heading" class="text-center">
                            <h2>Login</h2>
                            <p>Enter Your Email Address and Password to login</p>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" id="email">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="notesmarketplace@gmail.com" name="email">

                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12" id="pwd">
                                    <div class="form-group remove-margin">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <label for="password-field">Enter Your Password</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6 text-right">
                                                <a href="forgetpassword.php" id="forget">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control" id="password-field"
                                            placeholder="Password" name="password">
                                        <span toggle="#password-field" class="eye field-icon toggle-password"><img
                                                src="images/eye.png" alt="eye"></span>
                                        <p id="incorrect-pwd" style="display:<?php if(isset($flag)){echo 'block';}else{echo 'none';}?>">The Password that you have entered is incorrect</p>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group form-check" id="add-margin">
                                        <input type="checkbox" class="form-check-input" id="chk">
                                        <label class="form-check-label" for="chk" id="chk-label">Remeber Me</label>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <button type="submit" class="btn btn-block btn-general" name="login">Login</button>
                                </div>
                            </div>
                            </form>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div id="signup-link">
                                    <p class="text-center">Don't Have Account? <a href="#">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                             
                    </div>

                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
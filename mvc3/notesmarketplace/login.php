<?php
    include "db.php";
?>
<?php
    session_start();
?>
<?php
    if(isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        echo "<script>alert('$msg');</script>";
        unset($_SESSION['msg']);
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
    <link rel="stylesheet" href="front/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="front/css/login/login.css">
    <link rel="stylesheet" href="front/css/login/responsive.css">

</head>

<body>

    <section id="login">
        <div class="content-box-lg">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 col-sm-12 col-12 text-center">
                    <div id="top-logo">
                        <img src="front/images/top-logo.png" alt="logo" class="img-responsive">
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-12">

                    <div id="login-form">
                        <div id="heading" class="text-center">
                            <h2>Login</h2>
                            <p>Enter Your Email Address and Password to login</p>
                        </div>

                        <?php
                            if(isset($_POST['login'])){
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $email = mysqli_real_escape_string($connection,$email);
                                $password = mysqli_real_escape_string($connection,$password);
                                
                                $query = "SELECT * FROM users WHERE emailid='{$email}' AND isactive = 1";
                                $login_query = mysqli_query($connection,$query);
                                
                                if(!($login_query)){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                                
                                if(mysqli_num_rows($login_query) == 0 ){
                                    $flag = 1;
                                    $validation_msg = "Mail id does not exist"; 
                                    echo "<script>alert('Mail id does not exist . Please enter valid email id');</script>";
                                }
                                else{
                                        $row = mysqli_fetch_assoc($login_query);
                                        $ID = $row['ID'];
                                        $isemailverified = $row['IsEmailVerified'];                                        
                                        $db_password = $row['Password'];
                                        $firstname = $row['FirstName'];
                                        $lastname = $row['LastName'];
                                        $email = $row['EmailID'];
                                        $roleid = $row['RoleID'];

                                        
                                    
                                    
                                    if(password_verify($password, $db_password))
                                    {
                                        if($roleid == 3){
                                            if($isemailverified == 0){
                                                
                                                    $validation_msg = "Verify your email first"; 
                                                    echo "<script>alert('Please Verify Your Email first');</script>";
                                                
                                                                        
                                            }
                                            else{
                                                $_SESSION['ID'] = $ID; 
                                                $_SESSION['roleid'] = $roleid;
                                                if(isset($_POST['remember'])){
                                                    setcookie('emailcookie',$email,time()+86400);
                                                    setcookie('passwordcookie',$password,time()+86400);
                                                }
                                                $query = "SELECT * FROM userprofile WHERE userid = $ID";
                                                $select_page_query  = mysqli_query($connection,$query);
                                                if(!($select_page_query)){
                                                    die("QUERY FAILED".mysqli_error($connection));
                                                }
                                                $count = mysqli_num_rows($select_page_query);
                                                if($count == 0){
                                                    header('Location: front/userprofile.php');
                                                }
                                                else{
                                                    header('Location: front/search.php');
                                                }
                                                
                                            }
                                        }
                                        else{
                                            $_SESSION['ID'] = $ID; 
                                            $_SESSION['roleid'] = $roleid;
                                            if(isset($_POST['remember'])){
                                                setcookie('emailcookie',$email,time()+86400);
                                                setcookie('passwordcookie',$password,time()+86400);
                                            }
                                            header('location: admin/admin_dashboard.php');                 
                                        }
 

                                    }

                                    else{
                                        $flag = 1;
                                        $validation_msg = "The Password that you have entered is incorrect"; 
                                    }

                            }
                        }
                       ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" id="email">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="notesmarketplace@gmail.com" name="email" value="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];}?>" required>

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
                                            placeholder="Password" name="password" value="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie'];}?>" required>
                                        <span toggle="#password-field" class="eye field-icon toggle-password"><img
                                                src="front/images/eye.png" alt="eye"></span>
                                        <p id="incorrect-pwd" style="display:<?php if(isset($flag)){echo 'block';}else{echo 'none';}  ?>"><?php echo $validation_msg; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group form-check" id="add-margin">
                                        <input type="checkbox" class="form-check-input" id="chk" name="remember">
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
                                    <p class="text-center">Don't Have Account? <a href="front/signup.php">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </section>
    <script src="front/js/jquery.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/script.js"></script>
</body>

</html>
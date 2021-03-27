<?php
    include "../db.php";
?>
<?php
    session_start();
?>
<?php
    if(isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        echo "<script>alert('$msg');</script>";
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

                        <?php
                            if(isset($_POST['login'])){
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $email = mysqli_real_escape_string($connection,$email);
                                $password = mysqli_real_escape_string($connection,$password);
                                $query = "SELECT * FROM users WHERE emailid='{$email}'";
                                $login_query = mysqli_query($connection,$query);
                                
                                if(!($login_query)){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                                // print_r(mysqli_fetch_assoc($login_query));
                                if(mysqli_num_rows($login_query) == 0 ){
                                    echo "<script>alert('Mail id does not exist . Please enter valid email id');</script>";
                                }
                                else{
                                    while($row = mysqli_fetch_assoc($login_query)){
                                        $ID = $row['ID'];
                                        $isemailverified = $row['IsEmailVerified'];                                        
                                        $db_password = $row['Password'];
                                        $firstname = $row['FirstName'];
                                        $lastname = $row['LastName'];
                                        $email = $row['EmailID'];
                                        
                                    }
                                    
                                    if($password == $db_password){
                                        
                                        if($isemailverified == 0){
                                            $token = $email;
                                            echo "<script>alert('Please first you verified Your email')</script>";
                                            $body = "HELLO <h1>" . $firstname . " " .  $lastname . ",<br><br></h1>";
                                            $body .= "<p>Thank you for signing up with us. Please click on below link to verify your email address and to do login</p><br>";
                
                $body .= "<table style='height:60%;width: 60%; position: absolute;margin-left:10%;font-family:Open Sans !important;background: white;border-radius: 3px;padding-left: 2%;padding-right: 2%;'>
                <thead>
                    <th>
                        <img src='https://i.ibb.co/HVyPwqM/top-logo1.png' alt='logo' style='margin-top: 5%; margin-left: 0px;'>
                    </th>
                </thead>
                <tbody>
                    <tr style='height: 60px;font-family: Open Sans;font-size: 26px;font-weight: 600;line-height: 30px;color: #6255a5;'>
                        <td class='text-1'>Email Verification</td>
                    </tr>
                    <tr style='height: 40px;font-family: Open Sans;font-size: 18px;font-weight: 600;line-height: 22px;color: #333333;margin-bottom: 20px;'>
                        <td class='text-2'>Dear $firstname,</td>
                    </tr>
                    <tr style='height: 60px;'>
                        <td class='text-3'>
                            Thanks for Signing up! <br>
                            Simply click below for email verification.
                        </td>
                    </tr>
                    <tr style='height: 120px;font-size: 16px;font-weight: 400;line-height: 22px;color: #333333;margin-bottom: 50px;'>
                        <td style='text-align: center;'>
                            <button class='btn btn-verify' style='width: 100% !important;height:50px;font-family: Open Sans; font-size: 18px;font-weight: 600;line-height: 22px;color: #fff;background-color: #6255a5;border-radius: 3px;'><a class='btn' href='http://localhost/notesmarketplace/front/activation.php?token=$token' role='button' style='color: #fff; text-decoration: none; text-transform: uppercase;'>Verify email address</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
                </table>"; 
                                            $body .= "<br><br>";
                                            $body .= "Regards,<br>NotesmarketPlace";
                                            include "includes/mail.php";
                                            $mail->setFrom("notesmarketplace4120@gmail.com");
                                            
                                            $mail->addAddress($email);
                                            $mail->addReplyTo("notesmarketplace4120@gmail.com");
                                            $mail->isHtml(true);
                                            $mail->Subject = "Email Verification" ;
                                            $mail->Body = $body;
                                            $flag = 1;   
                                            if(!$mail->send()){
                                                echo "<script>alert('something went wrong');</script>";
                                            }
                                            else{
                                                echo "<script>alert('Please Verify Your Email first');</script>";
                                            }
                                                                    
                                        }
                                        else{
                                            $_SESSION['ID'] = $ID; 
                                            $query = "SELECT * FROM userprofile WHERE userid = $ID";
                                            $select_page_query  = mysqli_query($connection,$query);
                                            if(!($select_page_query)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            $count = mysqli_num_rows($select_page_query);
                                            if($count == 0){
                                                header('Location: userprofile.php');
                                            }
                                            else{
                                                header('Location: search.php');
                                            }
                                            
                                        }

                                    }

                                    else{
                                        $flag = 1;
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
                                        <p id="incorrect-pwd" style="display:<?php if(isset($flag)){echo 'block';}else{echo 'none';}  ?>">The Password that you have entered is incorrect</p>
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
                                    <p class="text-center">Don't Have Account? <a href="signup.php">Sign up</a></p>
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
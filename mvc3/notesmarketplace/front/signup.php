<?php
    include "../db.php";
?>
<?php
    session_start();
?>

<?php
    if(isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $confirmpass = mysqli_real_escape_string($connection,$_POST['confirmpass']);
        
        $roleid = 3;
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        
        
        $query = "SELECT * FROM users WHERE emailid = '{$email}' ";
        $email_exist_query = mysqli_query($connection,$query);
        if(!($email_exist_query)){
            die("QUERY FAILED" . mysqli_error($connection));
        }
        if(mysqli_num_rows($email_exist_query) != 0){
            echo '<script>alert("email id already exist Please Enter Different Email Id")</script>';
        }
        else{
            if($password !== $confirmpass){
                
                echo "<script>alert('Password and Confirm Password not match');</script>";
            }
            else{
                

                $query = "INSERT INTO users(roleid,firstname,lastname,emailid,Password,createddate,modifieddate)";
                $query .= "VALUES($roleid,'{$firstname}','{$lastname}','{$email}','{$hashpassword}',now(),now())";
                $signup_query = mysqli_query($connection,$query);
                if(!($signup_query)){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                $host = $_SERVER['HTTP_HOST'];
                $path = rtrim(dirname($_SERVER['PHP_SELF']),"/\\");            
                $token = $email;
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
                            <button class='btn btn-verify' style='width: 100% !important;height:50px;font-family: Open Sans; font-size: 18px;font-weight: 600;line-height: 22px;color: #fff;background-color: #6255a5;border-radius: 3px;'><a class='btn' href='http://$host$path/activation.php?token=$token' role='button' style='color: #fff; text-decoration: none; text-transform: uppercase;'>Verify email address</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
                </table>"; 
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
                        $_SESSION['msg'] = "Thanks For Signup Please Verify The email address via clicking on the link via sent you mail";
                        echo "<script>alert('Thanks For Signup Please Verify The email address via clicking on the link via sent you mail');</script>";
                    }

                
                
                

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
    <title>Signup</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/signup/signup.css">
    <link rel="stylesheet" href="css/signup/responsive.css">
  

</head>

<body>
    <section id="signup">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12 text-center">
                    <div id="logo">
                        <img src="images/top-logo.png" alt="logo" class="img-responsive">
                    </div>
                </div>
                
                
                <div class="col-md-12 col-sm-12 col-12">
                    <div id="signup-form">
                        <div id="heading" class="text-center">
                            <h2>Create An Account</h2>
                            <p>Enter Your Details to Signup</p>
                            
                        </div>
                        <div class="success-para text-center">
                            <p class="text-success" style="display:<?php if(isset($flag)){echo 'block';}else{echo 'none';}  ?>"><i class="fa fa-check cir"></i> Your account has been successfully created</p>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="firstname" id="fname">Firstname*</label>
                                        <input type="text" class="form-control" id="firstname" placeholder="Enter your first name" name="firstname" required pattern="[A-z]{,50}">


                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="Lastname" id="lname">Lastname*</label>
                                        <input type="text" class="form-control" id="Lastname" placeholder="Enter your last name" name="lastname" required pattern="[A-z]{,50}">


                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" id="email">Email*</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">


                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="new-password-field" class="pwd">Password*</label>
                                        <input type="password" class="form-control" id="new-password-field" placeholder="Enter your Password " name="password" required >
                                        <span toggle="#new-password-field" class="eye field-icon toggle-password"><img
                                            src="images/eye.png" alt="eye"></span>
                                      </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="confirm-password-field" class="pwd">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm-password-field" placeholder="Enter your confirm Password " name="confirmpass" required >
                                        <span toggle="#confirm-password-field" class="eye field-icon toggle-password"><img
                                            src="images/eye.png" alt="eye"></span>
                                        <span id="validationpass" style="display:none;color:red">Password And Confirm Password not match</span>
                                      </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-12">                                
                                    <button type="submit" class="btn  btn-block btn-general" name="signup" onclick="return validation()">Submit</button>
                                </div>

                            </div>
                        </form>
                        <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div id="login-link">
                                        <p class="text-center">Already Have an Account? <a href="../login.php">Login</a></p>
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
    <script>
        function validation(){
            var password = document.getElementById('new-password-field');
            var confirmpassword = document.getElementById('confirm-password-field');
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,24}$/;
            if(password.value != confirmpassword.value){
                alert("password and confirm password do not match");
                $('#validationpass').show();
                return false;
            }
            if(password.value.match(decimal)) 
            { 
                return true;
            }
            else
            { 
                
                alert("wrong password format");
                return false;
            }
                
        }
    </script>
</body>

</html>
<?php
    include "../db.php";
?>

<?php
    if(isset($_POST['forget'])){

        $email = $_POST['email'];
        
        $query = "SELECT * FROM users WHERE emailid = '{$email}' ";
        $forget_query = mysqli_query($connection,$query);

        if(!($forget_query)){
            die("QUERY FAILED" . mysqli_error($connection));
        }

        if(mysqli_num_rows($forget_query) == 0){

            echo '<script>alert("email id does not exist")</script>';
        }

        else{
            $chars ="abc1defghij2k3lmno4pq5rs6tu7vw8xy9z@0ABCDEFGHIJK#LMNOPQRSTUVWXYZ#";
            $password = substr(str_shuffle($chars),5,8);
            $row = mysqli_fetch_array($forget_query);
            $password = mysqli_real_escape_string($connection,$password);
            

            $subject = "New Temporary Password has been created for you ";
            $body = "Hello,<br> We have generated a new password for you<br>";
            $body .= "<h1>Password:" . $password . "</h1>";
            $body .= "<br> <h4>Regards,<br>Notes Marketplace</h4>";
            include "includes/mail.php";
            $mail->setFrom("notesmarketplace4120@gmail.com");
                                            
            $mail->addAddress($email);
            $mail->addReplyTo("notesmarketplace4120@gmail.com");
            $mail->isHtml(true);
            $mail->Subject = "Email Verification" ;
            $mail->Body = $body;
            $flag = 1;   
            if($mail->send()){
                $query = "UPDATE users SET Password = '{$password}' WHERE emailid = '{$email}'";
                $update_password_query = mysqli_query($connection,$query);
                if(!($update_password_query)){
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                echo "<script>alert('Your Password has been changed successfully and newly generated password is sent on your registered email address');";
                echo "window.location.href = 'login.php';</script>";
            }
            else{
                echo "<script>alert('Please Verify Your Email first');</script>";
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
    <title>Notes-MarketPlace</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/forget/forget.css">
    <link rel="stylesheet" href="css/forget/responsive.css">

</head>

<body>
    <section id="forget-password">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div id="logo">
                        <img src="images/top-logo.png" alt="logo" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div id="forget-form">
                        <div id="heading" class="text-center">
                            <h2>Forgot Password?</h2>
                            <p>Enter Your Email to Reset Password</p>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" id="email">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">


                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">                                
                                    <button type="submit" class="btn  btn-block btn-general" name="forget">Submit</button>
                                </div>

                            </div>
                        </form>
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
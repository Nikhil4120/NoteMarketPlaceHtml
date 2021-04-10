<?php

    include "../db.php";
?>
<?php
    session_start();
?>
<?php
    if(!(isset($_SESSION['ID']))){
        header("Location: ../login.php");
    }
    
?>

<?php
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] != 1){
        header('location: admin_dashboard.php');
    }
?>
<?php
    if(isset($_GET['edit'])){
        $adminid = $_GET['edit'];
        $adminquery= mysqli_query($connection,"SELECT * FROM users WHERE ID = $adminid");
        if(!($adminquery)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $editqueryrow = mysqli_fetch_assoc($adminquery);
        $editfirstname = $editqueryrow['FirstName'];
        $editlastname = $editqueryrow['LastName'];
        $editemail = $editqueryrow['EmailID'];
        $adminuserprofile = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $adminid");
        if(!($adminuserprofile)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $edituserprofilerow = mysqli_fetch_assoc($adminuserprofile);
        $editcountrycode = $edituserprofilerow['Countrycode'];
        $editphone = $edituserprofilerow['Phonenumber'];
        $flag = 1;

    }
?>
<?php

    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $countrycode = $_POST['countrycode'];
        $phone = $_POST['phone'];
        if(isset($flag)){
            $updateadmin = "UPDATE users SET firstname='{$firstname}' , lastname='{$lastname}' , emailid='{$email}'  WHERE id =$adminid";
            $updateadmin = mysqli_query($connection,$updateadmin);
            if(!($updateadmin)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            $updateuserprofile = "UPDATE userprofile SET countrycode=$countrycode , phonenumber=$phone WHERE userid = $adminid";
            $updateuserprofile = mysqli_query($connection,$updateuserprofile);            
            if(!($updateuserprofile)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        else{
            $chars ="abc1defghij2k3lmno4pq5rs6tu7vw8xy9z@0ABCDEFGHIJK#LMNOPQRSTUVWXYZ#";
            $password = substr(str_shuffle($chars),5,8);
            $subject = "New Temporary Password has been created for you ";
            $body = "Hello,<br> We have generated a new password for you<br>";
            $body .= "<h1>Password:" . $password . "</h1>";
            $body .= "<br> <h4>Regards,<br>Notes Marketplace</h4>";
            include "includes/mail.php";
            $mail->setFrom("notesmarketplace4120@gmail.com");
            $mail->addAddress($email);
            $mail->addReplyTo("notesmarketplace4120@gmail.com");
            $mail->isHtml(true);
            $mail->Subject = "Admin Password";
            $mail->Body = $body;
            
            if(!$mail->send()){
                echo "<script>alert('something went wrong');</script>";
            }
            else{
                $session_id = $_SESSION['ID'];
                $insert_user_query = "INSERT INTO users(roleid,firstname,lastname,emailid,Password,createddate,createdby)";
                $insert_user_query .= "VALUES(2,'{$firstname}','{$lastname}','{$email}','{$password}',now(),$session_id)";
                $insert_user_query = mysqli_query($connection,$insert_user_query);
                if(!($insert_user_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                $last_id = mysqli_insert_id($connection);
                $insert_userprofile_query = "INSERT INTO userprofile(userid,countrycode,phonenumber,createddate,createdby)";
                $insert_userprofile_query .= "VALUES($last_id,'{$countrycode}','{$phone}',now(),$session_id)";
                $insert_userprofile_query = mysqli_query($connection,$insert_userprofile_query);
                if(!($insert_userprofile_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
        }
        header('location: manageadministrator.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Administrator</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/addadministrator/addadministrator.css">
    <link rel="stylesheet" href="css/addadministrator/responsive.css">

</head>

<body>
    <?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="add-administrator">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Add Administrator</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-administrator-form">
                <form method="POST">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="firstname">First Name*</label>
                                <input type="text" class="form-control" id="firstname" 
                                    placeholder="Enter your first name" name="firstname" <?php if(isset($flag)){echo "value='$editfirstname'"; }?>required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="lastname">Last Name*</label>
                                <input type="text" class="form-control" id="lastname" 
                                    placeholder="Enter your last name" name="lastname" <?php if(isset($flag)){echo "value='$editlastname'"; }?> required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="Email">Email*</label>
                                <input type="email" class="form-control" id="Email"
                                    placeholder="Enter your email" name="email" <?php if(isset($flag)){echo "value='$editemail' readonly"; }?> required>
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12 col-12">

                            <label for="phone_no">Phone no.*</label>

                            <div class="row">
                            <div class="col-md-2 col-sm-4 col-4">
                                <div class="form-group">
                            
                                    <select class="form-control custom-select" id="exampleFormControlSelect1" name="countrycode">
                                        <?php
                                            $country_query =mysqli_query($connection,"SELECT countrycode FROM countries");

                                            if(!($country_query)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            while($row = mysqli_fetch_assoc($country_query)){
                                                $countrycode = $row['countrycode'];
                                                if(isset($flag) && $editcountrycode == $countrycode){
                                                    echo "<option value='$countrycode'>$countrycode</option>";
                                                }
                                                else{
                                                    echo "<option value='$countrycode'>$countrycode</option>";
                                                }
                                                
                                            }
                                        ?>
                                        
    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 col-8">
                                <div class="form-group">

                                    <input type="text" class="form-control" id="phone_no" placeholder="Enter your phone no." name="phone" <?php if(isset($flag)){echo "value='$editphone'"; }?>
                                        required>
                                </div>
                            </div>
                            



                            


                        </div>


                        </div>

                        <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn-submit" name="submit">Submit</button>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>





    <hr>
    <?php
        include "includes/admin_footer.php";
    ?>
    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>
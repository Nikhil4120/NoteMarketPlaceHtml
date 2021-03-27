<?php
    include "../db.php";
?>
<?php
    session_start();
?>
<?php
    if(!(isset($_SESSION['ID']))){
        header('Location: /notesmarketplace/front/login.php');
    }  
?>
<?php
    if(isset($_POST['submit'])){
        $id = $_SESSION['ID'];
        $query = "SELECT * FROM users WHERE ID = $id ";
        $select_user_query = mysqli_query($connection,$query);
        if(!($select_user_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($select_user_query);
        $db_password = $row['Password'];
        $old_password = $_POST['oldpassword'];
        $new_password = $_POST['newpassword'];
        if($db_password != $old_password){
            echo "<script>alert('please enter your old password correct');</script>";
        } 
        else{
            $query = "UPDATE users SET password='{$new_password}' WHERE ID=$id";
            $update_query = mysqli_query($connection,$query);
            if(!($update_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            echo "<script>alert('Your password has been Changed');window.location.href='login.php';</script>";
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
    <link rel="stylesheet" href="css/changepassword/changepassword.css">
    <link rel="stylesheet" href="css/changepassword/responsive.css">

</head>

<body>
    <section id="change-password">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div id="logo">
                        <img src="images/top-logo.png" alt="logo" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div id="change-form">
                        <div id="heading" class="text-center">
                            <h2>Change Password</h2>
                            <p>Enter your new password to change your password </p>
                        </div>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="old-password-field" id="pwd">Old Password</label>
                                        <input type="password" class="form-control" id="old-password-field" placeholder="Enter your old Password " name="oldpassword">
                                        <span toggle="#old-password-field" class="eye field-icon toggle-password"><img
                                            src="images/eye.png" alt="eye"></span>
                                      </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="new-password-field" class="newpwd">New Password</label>
                                        <input type="password" class="form-control" id="new-password-field" placeholder="Enter your new Password " name="newpassword">
                                        <span toggle="#new-password-field" class="eye field-icon toggle-password"><img
                                            src="images/eye.png" alt="eye"></span>
                                      </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="confirm-password-field" class="newpwd">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm-password-field" placeholder="Enter your confirm Password " name="confirm password">
                                        <span toggle="#confirm-password-field" class="eye field-icon toggle-password"><img
                                            src="images/eye.png" alt="eye"></span>
                                      </div>
                                </div>
                                <div class="col-md-12 col-sm-12">                                
                                    <button type="submit" class="btn  btn-block btn-general" onclick="return validation()" name="submit">Submit</button>
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
    <script>
        function validation(){
            var password = document.getElementById('new-password-field');
            var confirmpassword = document.getElementById('confirm-password-field');
            var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,24}$/;
            if(password.value != confirmpassword.value){
                alert("password and confirm password do not match");
                return false;
            }
            if(password.value.match(decimal)) 
            { 
                
               return true;
            }
            else
            { 
                alert('Wrong Password!')
                return false;
            }
                
        }
    </script>
</body>

</html>
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
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] == 3){
        header('location: ../login.php');
    }
?>
<?php
    if(isset($_SESSION['ID'])){
        $session_user = $_SESSION['ID'];
        $session_user_query = "SELECT * FROM users WHERE ID = $session_user";
        $session_user_query = mysqli_query($connection,$session_user_query);
        if(!($session_user_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $session_user_row = mysqli_fetch_assoc($session_user_query);
        $session_firstname = $session_user_row['FirstName'];
        $session_lastname = $session_user_row['LastName'];
        $session_email = $session_user_row['EmailID'];

        $session_userprofile_query = "SELECT * FROM userprofile WHERE userid = $session_user";
        $session_userprofile_query = mysqli_query($connection,$session_userprofile_query);
        if(!($session_userprofile_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        if(mysqli_num_rows($session_userprofile_query) != 0){
            $userprofile_row = mysqli_fetch_assoc($session_userprofile_query);
            $phone = $userprofile_row['Phonenumber'];
            $countrycode = $userprofile_row['Countrycode'];
            $secondaryemailaddress = $userprofile_row['SecondaryEmailAddress'];
            $profilepicture = $userprofile_row['ProfilePicture'];
            $flag = 1;            
        }
    }
?>
<?php
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $secondaryemail = $_POST['secondaryemail'];
        $selectcountrycode = $_POST['countrycode'];
        $phonenumber = $_POST['Phone'];
        $uploaded_profile_picture = $_FILES['dp']['name'];
        $uploaded_profile_picture_tmp = $_FILES['dp']['tmp_name'];
        

        $adminuser_update = "UPDATE users SET firstname = $firstname , lastname = $lastname WHERE ID = $session_user";
        $adminuser_update = mysqli_query($connection,$adminuser_update);
        if(isset($flag)){
            if($profilepicture == ""){
                if($uploaded_profile_picture != ""){
                    $profile_picture_ext = strtolower(pathinfo( $_FILES["dp"]["name"], PATHINFO_EXTENSION )); 
            
                    $uploaded_profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
                    if(!is_dir("../uploads/Members")){mkdir("../uploads/Members");}
                    if(!is_dir("../uploads/Members/$session_user")){mkdir("../uploads/Members/$session_user");}
                    move_uploaded_file($uploaded_profile_picture_tmp, "../uploads/Members/$session_user/$uploaded_profile_picture");
                }
                
            }
            else{
                if($uploaded_profile_picture != ""){
                    $profile_picture_ext = strtolower(pathinfo( $_FILES["dp"]["name"], PATHINFO_EXTENSION )); 
            
                    $uploaded_profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
                    move_uploaded_file($uploaded_profile_picture_tmp, "../uploads/Members/$session_user/$uploaded_profile_picture");
                    $path = "../uploads/Members/$session_user/$profilepicture";
                    unlink($path);
                }
                else{
                    $uploaded_profile_picture = $profilepicture;
                }
                
            }
            $admin_userprofile_update = "UPDATE userprofile SET countrycode = '{$selectcountrycode}' , phonenumber = '{$phonenumber}',secondaryemailaddress='{$secondaryemail}',profilepicture='{$uploaded_profile_picture}' WHERE userid = $session_user";
            $admin_userprofile_update = mysqli_query($connection,$admin_userprofile_update);
            if(!($admin_userprofile_update)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            
        }
        else{
            if($uploaded_profile_picture != ""){
                $profile_picture_ext = strtolower(pathinfo( $_FILES["dp"]["name"], PATHINFO_EXTENSION )); 
            
                $uploaded_profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
                if(!is_dir("../uploads/Members")){mkdir("../uploads/Members");}
                if(!is_dir("../uploads/Members/$session_user")){mkdir("../uploads/Members/$session_user");}
                move_uploaded_file($uploaded_profile_picture_tmp, "../uploads/Members/$session_user/$uploaded_profile_picture");
            }
            $admin_userprofile_insert = "INSERT INTO userprofile (userid,countrycode,phonenumber,secondaryemailaddress,profilepicture)VALUES($session_user,'{$selectcountrycode}','{$phonenumber}','{$secondaryemail}','{$uploaded_profile_picture}')";
            $admin_userprofile_insert = mysqli_query($connection,$admin_userprofile_insert);
            if(!($admin_userprofile_insert)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        header('location: admin_dashboard.php');
            
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/myprofile/myprofile.css">
    <link rel="stylesheet" href="css/myprofile/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="my-profile">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>My Profile</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-profile-form">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="firstname">First Name*</label>
                                <input type="text" class="form-control" id="firstname" 
                                    placeholder="Enter your first name" value="<?php echo $session_firstname; ?>" name="firstname" required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="lastname">Last Name*</label>
                                <input type="text" class="form-control" id="lastname" value="<?php echo $session_lastname; ?>"
                                    placeholder="Enter your last name" name="lastname" required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="Email">Email*</label>
                                <input type="email" class="form-control" id="Email" value="<?php echo $session_email; ?>"
                                    placeholder="Enter your email" required readonly>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="secondary-Email">Email*</label>
                                <input type="email" class="form-control" id="secondary-Email" <?php if(isset($flag)){echo "value='$secondaryemailaddress'";}?>
                                    placeholder="Enter your email" name="secondaryemail" required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="phone_no">Phone no.*</label>
                                </div>

                                <div class="col-md-2 col-sm-4 col-4">
                                    <div class="form-group">

                                        <select class="form-control custom-select" id="exampleFormControlSelect1" name="countrycode">
                                            <?php
                                                $country_query = mysqli_query($connection,"SELECT * FROM countries");
                                                if(!($country_query)){
                                                    die("QUERY FAILED".mysqli_error($connection));
                                                }
                                                while($country_row = mysqli_fetch_assoc($country_query)){
                                                    $countrycodedropdown = $country_row['CountryCode'];
                                                    if(isset($flag) && $countrycodedropdown == $countrycode){
                                                        echo "<option value='$countrycodedropdown' selected>$countrycodedropdown</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$countrycodedropdown'>$countrycodedropdown</option>";
                                                    }
                                                    
                                                }
                                            ?>
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-8 col-8">

                                    <div class="form-group">

                                        <input type="text" class="form-control" id="phone_no"
                                            placeholder="Enter your phone no." name="Phone" <?php if(isset($flag)){?>value="<?php echo $phone; ?>" <?php }  ?>required>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Profile Picture</label>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 text-center add-border">
                                    <label for="upload" class="upload-profile">
                                        <img src="images/images/upload-file.png">
                                        <p style="color: lightgray;" id="picture-name"><?php if(isset($flag) && $profilepicture != ""){echo $profilepicture;}else{echo "Upload a Picture";}?></p>
                                        <input type="file" id="upload" style="display: none;" name="dp">
                                    </label>
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
   
        <script>  
        $(function() {  
        
        var dp = document.getElementById("upload");
        var infoArea = document.getElementById("picture-name");
        dp.addEventListener( 'change', showFileName );

            function showFileName( event ) {
            
            // the change event gives us the input it occurred in 
            var upload = event.srcElement;
            
            
            
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = upload.files[0].name;
            
            // use fileName however fits your app best, i.e. add it into a div
            infoArea.textContent = fileName;
            }

        })     

    </script>  
    
</body>

</html>
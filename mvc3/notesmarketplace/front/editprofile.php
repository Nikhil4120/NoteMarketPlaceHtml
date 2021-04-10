<?php
    include "../db.php";
?>
<?php
    session_start();
?>
<?php
    if(isset($_SESSION['ID'])){

        $id = $_SESSION['ID'];
        $query = "SELECT * FROM users WHERE ID = $id ";
        $select_user_query = mysqli_query($connection,$query);
        if(!($select_user_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($select_user_query);
        $select_firstname = $row['FirstName'];
        $select_lastname = $row['LastName'];
        $select_email = $row['EmailID']; 
    }
    else{
        header("Location: ../login.php");
    }
?>
<?php
    $edit_profile_query = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $id");
    if(!($edit_profile_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    if(mysqli_num_rows($edit_profile_query) != 0){
        
        $row = mysqli_fetch_assoc($edit_profile_query);
        $phone = $row['Phonenumber'];
        $address_1 = $row['AddressLine1'];
        $address_2 = $row['AddressLine2'];
        $countrycode = $row['Countrycode'];
        $city = $row['City'];
        $state = $row['State'];
        $zipcode = $row['ZipCode'];
        $university = $row['University'];
        $college = $row['College'];
        $profile_picture = $row['ProfilePicture'];
        $dob = $row['DOB'];
        $dob = date('m/d/Y',strtotime($dob));
        $country = $row['Country'];
        $gender = $row['Gender'];
        
    }
    else{
        header('location: userprofile.php');
    }

?>
<?php
    if(isset($_POST['submit'])){
        $update_firstname = $_POST['firstname'];
        $update_lastname = $_POST['lastname'];
        $update_email = $_POST['email'];
        $update_dob = $_POST['dob'];
        $update_dob = date('Y-m-d',strtotime($dob));
        $update_countrycode = $_POST['countrycode'];
        $update_phone = $_POST['phone'];
        $update_address_1 = $_POST['add1']; 
        $update_address_2 = $_POST['add2']; 
        $update_city = $_POST['city']; 
        $update_state = $_POST['state']; 
        $update_country = $_POST['country'];
        $update_university = $_POST['university'];
        $update_college = $_POST['college'];
        $update_zipcode = $_POST['zipcode'];
        $update_gender = $_POST['gender'];
        $update_profile_picture = $_FILES['dp']['name'];
        $update_profile_picture_tmp = $_FILES['dp']['tmp_name'];
        if(empty($update_profile_picture_tmp)){
            $update_profile_pic_ext = strtolower(pathinfo($profile_picture, PATHINFO_EXTENSION )); 
            $update_profile_picture = $profile_picture;
        }
        else{
            $update_profile_pic_ext = strtolower(pathinfo($update_profile_picture, PATHINFO_EXTENSION )); 
            $update_profile_picture = "DP_". date("dmYhis") . "." . $update_profile_pic_ext;
            $accepted_image = array('png','jpg','jpeg');
            if(!in_array($update_profile_pic_ext,$accepted_image) ){
                echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
                exit();
            }
            
            $path = "../uploads/Members/$id/$profile_picture";
            unlink($path);
            move_uploaded_file($update_profile_picture_tmp,"../uploads/Members/$id/$update_profile_picture");
        }
        $update_query = "UPDATE userprofile SET dob = '{$update_dob}' , ";
        $update_query .= "countrycode = '{$update_countrycode}', ";
        $update_query .= "phonenumber = '{$update_phone}' , ";
        $update_query .= "addressline1 = '{$update_address_1}' , ";
        $update_query .= "addressline2 = '{$update_address_2}' , ";
        $update_query .= "city = '{$update_city}' , ";
        $update_query .= "state = '{$update_state}' , ";
        $update_query .= "country = '{$update_country}' , ";
        $update_query .= "university = '{$update_university}' , ";
        $update_query .= "college = '{$update_college}' , ";
        $update_query .= "zipcode = '{$update_zipcode}' , ";
        $update_query .= "gender = '{$update_gender}' , ";
        $update_query .= "profilepicture = '{$update_profile_picture}'  ";
        $update_query .= "WHERE userid = $id";
        $update_select_query = mysqli_query($connection,$update_query);
        if(!($update_select_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('Location: search.php');
        


    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/userprofile/userprofile.css">
    <link rel="stylesheet" href="css/userprofile/responsive.css">
    <link rel ="stylesheet" href ="css/bootstrap/bootstrap-datepicker.min.css">  

</head>

<body>
    <?php
        $page = "userprofile";
        include "includes/reg_header.php";
    ?>
    <section id="bg-image" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">User Profile</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="user-profile-form">

            <form method="post" enctype="multipart/form-data">
                <div id="basic-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>Basic Profile Details</h2>
                            </div>
                        </div>
                    </div>

                    <div id="basic-details-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="firstname" id="fname">Firstname*</label>
                                    <input type="text" class="form-control" id="firstname"
                                        placeholder="Enter your first name" name="firstname" value="<?php echo $select_firstname;?>" readonly required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="lastname" id="lname">Last Name*</label>
                                    <input type="text" class="form-control" id="lastname"
                                        placeholder="Enter your last name" name="lastname" value="<?php echo $select_lastname;?>" readonly required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" id="email">Email*</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter your email address" name="email" value="<?php echo $select_email;?>"  readonly required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group" >
                                    <label for="d.o.b" id="dob">Date Of Birth</label>
                                    <input type="text" class="form-control" id="datetimepicker1"
                                        placeholder="Enter your date of birth" name="dob" value="<?php echo $dob;?>">
                                    <span class="shift-right-r"><img src="images/calendar.png"></span>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="gender" id="seller-label">Gender</label>
                                    <select id="gender" class="form-control custom-select" name="gender">
                                        <option value="1" <?php if($gender == 1){echo "selected";}?>>Male</option>
                                        <option value="2" <?php if($gender == 2){echo "selected";}?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="phoneno" id="phoneno">Phone no.</label>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3  col-5">
                                            <div id="country-code">
                                                <select class="form-control custom-select" id="countrycode" name="countrycode">
                                                <?php

                                                    $query = "SELECT * FROM countries";
                                                    $select_country_code = mysqli_query($connection,$query);
                                                    if(!($select_country_code)){
                                                        die("QUERY FAILED".mysqli_error($connection));
                                                    }

                                                    while($row = mysqli_fetch_assoc($select_country_code)){
                                                        
                                                        $country_code = $row['CountryCode'];
                                                        if($country_code == $CountryCode){
                                                            echo "<option value='{$country_code}' selected>$country_code</option>";
                                                        }
                                                        else{
                                                            echo "<option value='{$country_code}'>$country_code</option>";
                                                        }
                                                        

                                                    }

                                                ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-9 col-7">
                                            <div id="phone-no">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your phone number " id="phoneno" name="phone" value="<?php echo $phone; ?>" required>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <label>Profile Picture</label>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <div class="add-border">
                                        <label for="upload" class="upload-profile">
                                            <img src="images/images/upload-file.png">
                                            <p style="color: lightgray;" id="picture-name"><?php echo $profile_picture; ?></p>
                                            <input type="file" id="upload" style="display: none;" name="dp">
                                        </label>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div id="address-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>Address Details</h2>
                            </div>
                        </div>
                    </div>
                    <div id="address-details-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="add1">Address Line 1*</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Enter your address" name="add1" value="<?php echo $address_1;?>" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="add2">Address Line 2*</label>
                                    <input type="text" class="form-control" id="add2" placeholder="Enter your address" name="add2" value="<?php echo $address_2;?>">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="City">City*</label>
                                    <input type="text" class="form-control" id="CIty" placeholder="Enter your city" name="city" value="<?php echo $city;?>" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="state">State*</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state" value="<?php echo $state;?>" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="zip-code">ZipCode*</label>
                                    <input type="text" class="form-control" id="zip-code"
                                        placeholder="Enter your zipcode" name="zipcode" value="<?php echo $zipcode;?>" required>


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="coutry" id="seller-label">Country</label>
                                    <select id="country" class="form-control custom-select" name="country">
                                        
                                        <?php

                                        $query = "SELECT * FROM countries";
                                        $select_countries = mysqli_query($connection,$query);
                                        if(!($select_countries)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_countries)){
                                            $country_id = $row['ID'];
                                            $country_name = $row['Name'];
                                            if($country_id == $country){
                                                echo "<option value='{$country_id}' selected>$country_name</option>";
                                            }
                                            else{
                                                echo "<option value='{$country_id}'>$country_name</option>";
                                            }
                                            
                                        
                                        }

                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div id="university-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>University and College Information</h2>
                            </div>
                        </div>
                    </div>
                    <div id="university-details-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <input type="text" class="form-control" id="university"
                                        placeholder="Enter your university" name="university" value="<?php echo $university;?>">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="university">College</label>
                                    <input type="text" class="form-control" id="college"
                                        placeholder="Enter your college" name="college" value="<?php echo $college;?>">


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-user-profile" name="submit">SUBMIT</button>
                    </div>
                </div>
            </form>

        </section>
    </div>
    <hr>
    <?php
        include "includes/footer.php";
    ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    
    <script>  
        $(function() {  
        $('#datetimepicker1').datepicker();  
        });  
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

            

    </script>  
    <script>
        
    </script>
</body>

</html>
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
    if(isset($_GET['edit'])){
        $country_id = $_GET['edit'];
        $editcountryquery = mysqli_query($connection,"SELECT * FROM countries WHERE ID = $country_id");
        if(!($editcountryquery)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $editcountryquery = mysqli_fetch_assoc($editcountryquery);
        $editcountryname = $editcountryquery['Name'];
        $editcountrycode = $editcountryquery['CountryCode'];
        $flag = 1;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $countryname = $_POST['countryname'];
        $countrycode = $_POST['code'];
        if(isset($flag)){
            $updatecountry = "UPDATE countries SET name = '{$countryname}' , countrycode = '{$countrycode}' WHERE ID = $country_id";
            $updatecountry = mysqli_query($connection,$updatecountry);
            if(!($updatecountry)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        else{
            $exist_country_query = mysqli_query($connection,"SELECT * FROM countries WHERE name = '{$countryname}'");
            if(!($exist_country_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            if(mysqli_num_rows($exist_country_query) != 0){
                echo "<script>alert('Country Name Already Exist');</script>";
            }
            else{
                $session_id = $_SESSION['ID'];
                $country_insert = "INSERT INTO countries(name,countrycode,createddate,createdby)VALUES('{$countryname}','{$countrycode}',now(),$session_id)";
                $country_insert_query = mysqli_query($connection,$country_insert);
                if(!($country_insert_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
        }
        
        header('location: managecountry.php');
        

    }


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Country</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/addcountry/addcountry.css">
    <link rel="stylesheet" href="css/addcountry/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="add-country">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Add Country</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-Country-form">
                <form method="POST">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="countryname">Country Name*</label>
                                <input type="text" class="form-control" id="countryname" 
                                    placeholder="Enter your country name" name="countryname" <?php if(isset($flag)){echo "value='$editcountryname'"; }?> required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="countrycode">Country Code*</label>
                                
                                <input type="text" class="form-control" id="countrycode" 
                                    placeholder="Enter your country code" name="code" <?php if(isset($flag)){echo "value='$editcountrycode'"; }?> required>
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
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
        $cat_id = $_GET['edit'];
        $editcatquery = mysqli_query($connection,"SELECT * FROM notecategories WHERE ID = $cat_id");
        if(!($editcatquery)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $editcatquery = mysqli_fetch_assoc($editcatquery);
        $editcatname = $editcatquery['Name'];
        $editcatdescription = $editcatquery['Description'];
        $flag = 1;
    }
?>
<?php
    if(isset($_POST['submit'])){
        $categoryname = $_POST['categoryname'];
        $description = $_POST['description'];
        if(isset($flag)){
            $updatecategory = mysqli_query($connection,"UPDATE notecategories SET Name = '{$categoryname}' , description = '{$description}' WHERE ID = $cat_id");    
            if(!($updatecategory)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        else{
            $exist_category_query = mysqli_query($connection,"SELECT * FROM notecategories WHERE name = '{$categoryname}'");
            if(!($exist_category_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            if(mysqli_num_rows($exist_category_query) != 0){
                echo "<script>alert('Category Name Already Exist');</script>";
            }
            else{
                $session_id = $_SESSION['ID'];
                $category_insert = "INSERT INTO notecategories(name,description,createddate,createdby)VALUES('{$categoryname}','{$description}',now(),$session_id)";
                $category_insert_query = mysqli_query($connection,$category_insert);
                if(!($category_insert_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
        }
        
        header('location: managecategory.php'); 

    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/addcategory/addcategory.css">
    <link rel="stylesheet" href="css/addcategory/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="add-category">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Add Category</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-category-form">
                <form method="POST">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="categoryname">Category Name*</label>
                                <input type="text" class="form-control" id="categoryname" 
                                    placeholder="Enter your category name" name="categoryname" <?php if(isset($flag)){echo "value='$editcatname'"; }?> required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description*</label>
                                
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="enter your Description" name="description"><?php if(isset($flag)){echo $editcatdescription; }?></textarea>
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
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
        $type_id = $_GET['edit'];
        $edittypequery = mysqli_query($connection,"SELECT * FROM notetypes WHERE ID = $type_id");
        if(!($edittypequery)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $edittypequery = mysqli_fetch_assoc($edittypequery);
        $edittypename = $edittypequery['Name'];
        $edittypedescription = $edittypequery['Description'];
        $flag = 1;
    }
?>

<?php
    if(isset($_POST['submit'])){
        $typename = $_POST['typename'];
        $description = $_POST['description'];
        if(isset($flag)){
            $updatetype = mysqli_query($connection,"UPDATE notetypes SET Name = '{$typename}' , description = '{$description}' WHERE ID = $type_id");    
            if(!($updatetype)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        else{
            $exist_type_query = mysqli_query($connection,"SELECT * FROM notetypes WHERE name = '{$typename}'");
            if(!($exist_type_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            if(mysqli_num_rows($exist_type_query) != 0){
                echo "<script>alert('type Name Already Exist');</script>";
            }
            else{
                $session_id = $_SESSION['ID'];
                $type_insert = "INSERT INTO notetypes(name,description,createddate,createdby)VALUES('{$typename}','{$description}',now(),$session_id)";
                $type_insert_query = mysqli_query($connection,$type_insert);
                if(!($type_insert_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
        }
        
        header('location: managetype.php');

    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Type</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/addtype/addtype.css">
    <link rel="stylesheet" href="css/addtype/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="add-type">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Add Type</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-type-form">
                <form method="POST">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="type">Type*</label>
                                <input type="text" class="form-control" id="type" 
                                    placeholder="Enter type name" name="typename" <?php if(isset($flag)){echo "value='$edittypename'"; }?> required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description*</label>
                                
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="enter your Description" name="description"><?php if(isset($flag)){echo $edittypedescription; }?></textarea>
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
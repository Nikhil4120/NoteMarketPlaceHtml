<?php
    include "../db.php";
?>
<?php
    session_start();
?>

<?php
    if(!(isset($_SESSION['ID']))){
        header("Location: /notesmarketplace/front/login.php");
    }
    
?>
<?php
    if(!(isset($_GET['edit']))){
        header("Location: /notesmarketplace/front/dashboard.php");
    }
    else{
        $note_id = (int)$_GET['edit'];
        
        $edit_notes = "SELECT * FROM sellernotes WHERE ID='$note_id'";
        $edit_notes_query = mysqli_query($connection,$edit_notes);
        if(!($edit_notes_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $count = mysqli_num_rows($edit_notes_query);
        
        $row = mysqli_fetch_assoc($edit_notes_query);
        
        $edit_title = $row['Title'];
        
        $edit_category = $row['Category'];
        $edit_type = $row['NoteType'];
        $edit_pages = $row['NumberofPages'];
        $description = $row['Description'];
        $country = $row['Country'];
        $institution_name = $row['UniversityName']; 
        $course = $row['Course'];
        $course_code = $row['CourseCode'];
        $professor = $row['Professor'];
        $sell = $row['IsPaid'];
        $sell_price = $row['SellingPrice'];
        $edit_dp = $row['DisplayPicture'];
        $edit_cv = $row['NotesPreview'];
        $flag = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/add-notes/add-notes.css">
    <link rel="stylesheet" href="css/add-notes/responsive.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="images/navbarbanner.png" alt="logo" class="img-responsive">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&#9776;</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="search.html">Search<span class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mysoldnotes.html">Sell<span class="spacing">Your</span><span
                                    class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buyerrequest.html">Buyer<span class="spacing">Requests</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq.html">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.html">Contact<span class="spacing">Us</span></a>

                        </li>
                        <li class="nav-item">
                            <img src="images/images/user-img.png" alt="client" class="rounded-circle seller">
                        </li>
                        <li class="nav-item">
                            <form class="form-inline">

                                <button class="btn btn-outline-success btn-navbar" type="submit">Logout</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <section id="bg-image" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">Add Notes</h2>
                </div>
            </div>
        </div>
    </section>
    <?php
        if(isset($_POST['save'])){
            $save_title = $_POST['title'];
        
            $save_category = $_POST['category'];
            $save_type = $_POST['note_type'];
            $save_pages = $_POST['pages'];
            $save_description = $_POST['description'];
            $save_country = $_POST['country'];
            $save_institution_name = $_POST['institutename']; 
            $save_course = $_POST['coursename'];
            $save_course_code = $_POST['coursecode'];
            $save_professor = $_POST['lecturer'];
            $save_sell = $_POST['sell'];
            $save_sell_price = $_POST['sell_price'];
            $profile_picture = $_FILES['profile_picture']['name'];
            $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
            $preview_cv = $_FILES['preview_cv']['name'];
            $preview_cv_tmp = $_FILES['preview_cv']['tmp_name'];
            $accepted_image = array('png','jpg','jpeg');
            $accepted_pdf = array('pdf');
            if(!empty($_FILES['profile_picture']['tmp_name'])){
                
                $profile_picture_ext = pathinfo( $_FILES["profile_picture"]["name"], PATHINFO_EXTENSION ); 
                
                $profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
            }
            else{
                $profile_picture = $edit_dp;
                $profile_picture_ext = "jpg";
            }
            if(!empty($_FILES['preview_cv']['tmp_name'])){
                $preview_cv_ext = pathinfo( $_FILES["preview_cv"]["name"], PATHINFO_EXTENSION ); 
                $preview_cv = "Preview_". date("dmYhis") ."." . $preview_cv_ext;
            }
            else{
                $preview_cv = $edit_cv;
                $preview_cv_ext = "jpg";
            }
            
            if(!in_array($profile_picture_ext,$accepted_image) ){
                echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
            }
            elseif(!in_array($preview_cv_ext,$accepted_image)){
                echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
            }
            $update_query = "UPDATE sellernotes SET title = '{$save_title}', ";
            $update_query .= "category = '{$save_category}', ";
            $update_query .= "notetype = '{$save_type}', ";
            $update_query .= "NumberofPages = '{$save_type}', ";
            $update_query .= "Country = '{$save_type}', ";
            $update_query .= "UniversityName = '{$save_type}', ";
            $update_query .= "Course = '{$save_course}', ";
            $update_query .= "CourseCode = '{$save_course_code}', ";
            $update_query .= "Professor = '{$save_professor}', ";
            $update_query .= "IsPaid = $save_sell, ";
            $update_query .= "SellingPrice = $save_sell_price, ";
            $update_query .= "DisplayPicture = '{$edit_dp}', ";
            $update_query .= "notespreview = '{$edit_cv}' ";
            $update_query .= "WHERE ID= $note_id ";
            $update_select_query = mysqli_query($connection,$update_query);
            if(!($update_select_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }

        }        

        if(isset($_POST['publish'])){
            
            
            
            
        
                
                    
                    $query = "UPDATE sellernotes SET status = 7 WHERE ID = $note_id";
                    $seller_query = mysqli_query($connection,$query);
                    if(!($seller_query)){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    $email_query = "SELECT * FROM systemconfiguration";
                    $email_get_query = mysqli_query($connection,$email_query);
                    if(!($email_get_query)){
                        die("wrong mail id" . mysqli_error($connection));

                    }
                    
                    $row = mysqli_fetch_assoc($email_get_query);
                    $email = $row['value'];
                    $name_query = "SELECT * FROM users WHERE ID=13";
                    $name_get_query = mysqli_query($connection,$name_query);
                    if(!($name_get_query)){
                        die("QUERY FAILED" . mysqli_error($connection));

                    }
                    $row_name = mysqli_fetch_assoc($name_get_query);
                    $firstname = $row_name['FirstName'];
                    $lastname = $row_name['LastName'];
                    $name = $firstname . " " . $lastname;
                    $subject = $name . " sent his note for review";
                    $msg = "<h1>Hello Admins,</h1><br>";
                    $msg .= "<p>We Want to inform you that, $name sent his note</p>";
                    $msg .= "<p>$seller_title for review . Please look at the notes and take required actions</p><br>";
                    $msg .= "<h1>Regards,<br>NotesMarketPlace";

                    require '../phpmailer/PHPMailerAutoload.php';
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->port = 587;
                    $mail->SMTPAUTH=true;
                    $mail->SMTPSecure='tls';
                    $mail->SMTPAuth=true;
                    $mail->Username='todoapp4120@gmail.com';
                    $mail->Password='nikhil1234';  

                    $mail->setFrom("todoapp4120@gmail.com","nikhil shah");
                    $mail->addAddress($email);
                    $mail->addReplyTo("todoapp4120@gmail.com","nikhil shah");
                    $mail->isHtml(true);
                    $mail->Subject = $subject ;
                    $mail->Body = $msg;

                    if(!$mail->send()){
                        echo "<script>alert('something went wrong');</script>";
                    }
                    else{
                        echo "<script>window.location.href='/notesmarketplace/front/dashboard.php';</script>";
                    }
                
            ?>

		
    <?php
        }        
    ?>
    <div class="container">
        <section id="add-notes">
            <form action="" method="post" enctype="multipart/form-data" id="myform">
                <div class="basic-notes-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Basic Notes Details</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="notes-title">Title*</label>
                                <input type="text" class="form-control" id="notes-title"
                                    placeholder="Enter your notes title" name="title" <?php if(isset($flag)){echo "value=$edit_title";} ?>>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="Category">Category*</label>
                                <select class="form-control custom-select" id="category" name="category">
                                    
                                    <?php

                                        $query = "SELECT * FROM notecategories";
                                        $select_category = mysqli_query($connection,$query);
                                        if(!($select_category)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_category)){
                                            $category_id = $row['ID'];
                                            $category_name = $row['Name'];
                                            if($category_id == $edit_category){
                                                echo "<option value='{$category_id}' selected>$category_name</option>";
                                            }
                                            else{
                                                echo "<option value='{$category_id}'>$category_name</option>";
                                            }
                                            
                                        
                                        }

                                    ?>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Display Picture</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                    <label for="dp" class="upload-profile">
                                        <img src="images/images/upload-file.png">
                                        <p style="color: lightgray;" id="picture-name"><?php echo $edit_dp; ?></p>
                                        <input type="file" id="dp" style="display: none;" name="profile_picture">
                                    </label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <label>Upload Notes</label>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <div class="add-border">
                                        <label for="upload-notes" class="upload-profile">
                                            <img src="images/images/upload-note.png">
                                            <p style="color: lightgray;" id="note-name">Upload a Notes</p>
                                            <input type="file" id="upload-notes" style="display: none;" name="notes[]" accept = "application/pdf" multiple>
                                        </label>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="note-type">Type</label>
                                <select class="form-control custom-select" id="note-type" name="note_type">
                                    

                                    <?php

                                        $query = "SELECT * FROM notetypes";
                                        $select_types = mysqli_query($connection,$query);
                                        if(!($select_types)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_types)){
                                            $type_id = $row['ID'];
                                            $type_name = $row['Name'];
                                            if($edit_type == $type_id){
                                                echo "<option value='{$type_id}' selected>$type_name</option>";
                                            }
                                            else{
                                                echo "<option value='{$type_id}'>$type_name</option>";
                                            }
                                            
                                        
                                        }

                                    ?>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="note-pages">Pages*</label>
                                <select class="form-control custom-select" id="note-pages" name="pages">
                                    
                                    <option value="100"<?php if($edit_pages==100){echo "selected";}?>>100</option>
                                    <option value="200" <?php if($edit_pages==200){echo "selected";}?>>200</option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="description" id="description">Description*</label>
                                <textarea class="form-control" id="description"
                                    placeholder="Enter your Description" name="description"><?php if(isset($flag)){echo $description;} ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="institute-information-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Institute Details</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select class="form-control custom-select" id="country" name="country">
                                    <option>Select your Country</option>
                                    <?php

                                        $query = "SELECT * FROM countries";
                                        $select_countries = mysqli_query($connection,$query);
                                        if(!($select_countries)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_countries)){
                                            $country_id = $row['ID'];
                                            $country_name = $row['Name'];
                                            if($country == $country_id){
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
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="institute-name">Institution name</label>
                                <input type="text" class="form-control" id="institute-name"
                                    placeholder="Enter your institute name" name="institutename" <?php if(isset($flag)){echo "value=$institution_name";} ?>>


                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="course-information-form">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Course Details</h2>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="course-name">Course Name</label>
                                <input type="text" class="form-control" id="course-name"
                                    placeholder="Enter your course name" name="coursename" <?php if(isset($flag)){echo "value=$course";} ?>>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="course-code">Course Code</label>
                                <input type="text" class="form-control" id="course-code"
                                    placeholder="Enter your course code" name="coursecode" <?php if(isset($flag)){echo "value=$course_code";} ?>>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="proffessor">Proffessor/lecturer</label>
                                <input type="text" class="form-control" id="professor"
                                    placeholder="Enter your proffessor name" name="lecturer" <?php if(isset($flag)){echo "value=$professor";} ?>>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="selling-information">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="heading">
                                <h2>Selling Information</h2>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    
                                    <label for="sell" id="#sell">Sell For*</label><br>
                                    <input type="radio" id="free" name="sell" value="0" <?php if($sell == 0){echo "checked";}?>>
                                    <label for="free" id="free-lbl">Free</label>
                                    <input type="radio" id="paid" name="sell" value="1" <?php if($sell == 1){echo "checked";}?>>
                                    <label for="paid" id="paid-lbl">Paid</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label for="sell-price">Sell Price</label>
                                <input type="text" class="form-control" id="sell-price"
                                    placeholder="Enter your price" name="sell_price" <?php if(isset($flag)){echo "value='$sell_price'";}?>>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Preview CV</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                    <label for="upload-file" class="upload-profile">
                                        <img src="images/images/upload-file.png">
                                        <p style="color: lightgray;" id="cv_name"><?php echo $edit_cv; ?></p>
                                        <input type="file" id="upload-file" style="display: none;" name="preview_cv">
                                    </label>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-save" name="save">SAVE</button>
                    <button type="submit" class="btn btn-publish" name="publish" style="visibility:<?php if(isset($flag)){echo "visible";}else{echo "hidden";} ?>">PUBLISH</button>
                </div>
            </form>


        </section>
    </div>
    <hr>
    <div class="container">
        <footer>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">
                    <p>
                        Copyright &copy; Tatvasoft All rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 col-12 text-right">
                    <ul class="social-list">
                        <li><a href="#"><img src="images/images/facebook.png"></a></li>
                        <li><a href="#"><img src="images/images/twitter.png"></a></li>
                        <li><a href="#"><img src="images/images/linkedin.png"></a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function(){
            if($("input[type=radio]").val() == 0 ){
                $('#sell-price').css('display','none');
                $('#upload-file').prop("required",false);
            }
            $("input[type=radio]").change(function(){
                var a = $(this).val();
                if(a == 0){
                    $('#sell-price').css('display','none');
                    
                }
                else{
                    $('#sell-price').prop("required",true).css('display','block');
                    
                }
            });
            $('.btn-publish').click(function () { 
                if(confirm("Publishing this note will send note to administrator for review, once administrator review and approve then this note will be published toportal. Press yes to continue.")){
                    return true;
                }
                else{
                    return false;
                }   
                
            });
            $('.btn-save').click(function(){
                if($('#notes-title').val() == ""){
                    alert('please enter title first');
                    return false;
                }
                else if($('#category').val() == ""){
                    alert('please enter category first');
                    return false;
                }
                else if($('#description').text() == ""){
                    alert('please enter Description first');
                    return false;
                }
                else if(!$("input[name='sell']:checked").val()){
                    alert("Please Select One of the Radio Button");
                    return false;
                }
            });
        });

    </script>
    <script>
        var dp = document.getElementById("dp");
        var infoArea = document.getElementById("picture-name");
        dp.addEventListener( 'change', showFileName );

            function showFileName( event ) {
            
            // the change event gives us the input it occurred in 
            var dp = event.srcElement;
            
            
            
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = dp.files[0].name;
            
            // use fileName however fits your app best, i.e. add it into a div
            infoArea.textContent = fileName;
            }

            var cv = document.getElementById("upload-file");
            var cv_name = document.getElementById("cv_name");
            cv.addEventListener( 'change', showCvName );
            function showCvName( event ) {
            
            // the change event gives us the input it occurred in 
            var cv = event.srcElement;
            
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = cv.files[0].name;
            
            // use fileName however fits your app best, i.e. add it into a div
            cv_name.textContent = fileName;
            }

            var note = document.getElementById("upload-notes");
            var note_name = document.getElementById("note-name");
            note.addEventListener( 'change', showNoteName );
            function showNoteName( event ) {
            
            // the change event gives us the input it occurred in 
            var note = event.srcElement;
            
            var count = note.files.length; 
            var len = count-1;
            
            
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            if(count == 1){
                 var fileName = note.files[0].name;
            }
            else if(count == 2){
                var fileName = note.files[0].name + "," + note.files[1].name;
            }
            else{
                var fileName = note.files[0].name + "," + note.files[1].name + "..." + note.files[len].name ;
            }
            
            // use fileName however fits your app best, i.e. add it into a div
            note_name.textContent = fileName;
            }
    </script>
    
</body>

</html>
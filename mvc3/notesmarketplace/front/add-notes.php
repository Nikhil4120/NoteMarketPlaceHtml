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
    <?php
        include "includes/reg_header.php";
    ?>
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
            date_default_timezone_set('Asia/Kolkata');
            $user_id = $_SESSION['ID'];
            $title = $_POST['title'];
            $category = $_POST['category'];
            $profile_picture = $_FILES['profile_picture']['name'];
            $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
            $accepted_image = array('png','jpg','jpeg');
            $accepted_pdf = array('pdf');
            if(!empty($_FILES['profile_picture']['tmp_name'])){
                
                $profile_picture_ext = strtolower(pathinfo( $_FILES["profile_picture"]["name"], PATHINFO_EXTENSION )); 
                
                $profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
            }
            else{
                $profile_picture = "";
                $profile_picture_ext = "jpg";
            }
            
            $note_type = $_POST['note_type'];
            $pages = $_POST['pages'];
            $description = $_POST['description'];
            $country = $_POST['country'];
            $institutename = $_POST['institutename'];
            $coursename = $_POST['coursename'];
            $coursecode = $_POST['coursecode'];
            $lecturer = $_POST['lecturer'];
            
            $sell = $_POST['sell'];
            $sell_price = $_POST['sell_price'];
            $preview_cv = $_FILES['preview_cv']['name'];
            $preview_cv_tmp = $_FILES['preview_cv']['tmp_name'];
            if($sell == 0){
                $sell_price = 0;
            }
            
            $select_title = "SELECT * FROM sellernotes WHERE title = '{$title}'";            
            $select_title_query = mysqli_query($connection,$select_title);
            if(!($select_title_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            if(mysqli_num_rows($select_title_query) > 0){
                echo "<script>alert('Title Already Exist So Please Use Other TItle');</script>";
            }
            else{
            
                
                if(!empty($_FILES['preview_cv']['tmp_name'])){
                    $preview_cv_ext = strtolower(pathinfo( $_FILES["preview_cv"]["name"], PATHINFO_EXTENSION )); 
                    $preview_cv = "Preview_". date("dmYhis") ."." . $preview_cv_ext;
                }
                else{
                    $preview_cv = "";
                    $preview_cv_ext = "pdf";
                }
                
                if(!in_array($profile_picture_ext,$accepted_image) ){
                    echo "<script>alert('please enter valid image file extension like .jpg ,.jpeg or .png ');</script>";
                }
                elseif(!in_array($preview_cv_ext,$accepted_pdf)){
                    echo "<script>alert('please enter valid image file extension like .pdf ');</script>";
                }
                else{
                    $c = 0;
                    $pdf_check = 0;
                    while($c < count($_FILES['notes']['name'])){
                        $notes_ext = strtolower(pathinfo( $_FILES["notes"]["name"][$c], PATHINFO_EXTENSION ));
                        if(!in_array($notes_ext,$accepted_pdf)){
                            echo "<script>alert('Only Pdf file allowed for notes so please upload valid file ');</script>";
                            $pdf_check =1; 
                            break;
                        }
                        $c++;
                    }
                    if($pdf_check == 0){
                        $query = "INSERT INTO sellernotes(sellerid,status,title,category,DisplayPicture,notetype,numberofpages,description,universityname,country,course,coursecode,professor,ispaid,sellingprice,notespreview,createddate)";
                        $query .= "VALUES($user_id,6,'{$title}','{$category}','{$profile_picture}',$note_type,$pages,'{$description}','{$institutename}',$country,'{$coursename}','{$coursecode}','{$lecturer}',$sell,$sell_price,'{$preview_cv}',now())";
                        $save_query = mysqli_query($connection,$query);
                        if(!($save_query)){
                            die("QUERY FAILED".mysqli_error($connection));
                        }
                        $last_id = mysqli_insert_id($connection);
                        $file_query = "SELECT * FROM sellernotes WHERE ID = $last_id";
                        $select_file_query = mysqli_query($connection,$file_query);
                        if(!($select_file_query)){
                            die("QUERY FAILED" . mysqli_error($connection));
                        }
                        $row = mysqli_fetch_assoc($select_file_query); 
                        $sellerid = $row['SellerID'];
                        $noteid = $row['ID'];
                        
                        if(!is_dir("../uploads/Members/$sellerid")){mkdir("../uploads/Members/$sellerid");}
                        if(!is_dir("../uploads/Members/$sellerid/$noteid")){mkdir("../uploads/Members/$sellerid/$noteid");}
                        if(!is_dir("../uploads/Members/$sellerid/$noteid/attachments")){mkdir("../uploads/Members/$sellerid/$noteid/attachments");}
                        move_uploaded_file($profile_picture_tmp, "../uploads/Members/$sellerid/$noteid/$profile_picture");
                    
                        move_uploaded_file($preview_cv_tmp, "../uploads/Members/$sellerid/$noteid/$preview_cv");
                        $i =0;
                        
                        while($i<count($_FILES['notes']['name'])){
    
                            $select_attachment = "SELECT max(ID) AS ID FROM sellernotesattachments";
                            $select_notes_attachment = mysqli_query($connection,$select_attachment);
                            if(!($select_notes_attachment)){
                                die("QUERY FAILED" . mysqli_error($connection));
                            }
                            $select_attachment_row = mysqli_fetch_assoc($select_notes_attachment);
                            $attachment_id = $select_attachment_row['ID'] + 1;
                            $notes = $_FILES['notes']['name'][$i];
                            $notes_ext = pathinfo( $_FILES["notes"]["name"][$i], PATHINFO_EXTENSION ); 
                            $notes = $attachment_id . date("dmYhis") ."." . $notes_ext;
                            $notes_tmp = $_FILES['notes']['tmp_name'][$i];
                            $insert_notes = "INSERT INTO sellernotesattachments(noteid,FileName,FilePath)VALUES($last_id,'{$notes}','uploads/Members/$sellerid/$noteid/attachments/$notes')";
                            $insert_notes_query = mysqli_query($connection,$insert_notes);
                            if(!($insert_notes_query)){
                                die("QUERY FAILED".mysqli_error($connection));
                            }
                            move_uploaded_file($_FILES['notes']['tmp_name'][$i],"../uploads/Members/$sellerid/$noteid/attachments/$notes");
                            $i++;
                        }
                        
                        
                        $flag = 1; 
                            }
    
                }
                
            }
            
            
            
        }

        if(isset($_POST['publish'])){
            
            
            $last_get_id = "SELECT * FROM sellernotes WHERE ID = (SELECT MAX(ID) AS ID FROM sellernotes)";
            $last_query_id = mysqli_query($connection,$last_get_id);
            if(!($last_query_id)){
                die("QUERY FAILED" . mysqli_error($connection));
            }
            
        
                while($row = mysqli_fetch_assoc($last_query_id)){
                    $seller_id = $row['ID'];
                    $seller_title = $row['Title'];
                    $query = "UPDATE sellernotes SET status = 7 WHERE ID = $seller_id";
                    $seller_query = mysqli_query($connection,$query);
                    if(!($seller_query)){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    $email_query = "SELECT * FROM systemconfiguration WHERE configurationkey = 'emailaddresses'";
                    $email_get_query = mysqli_query($connection,$email_query);
                    if(!($email_get_query)){
                        die("wrong mail id" . mysqli_error($connection));

                    }
                    
                    $row = mysqli_fetch_assoc($email_get_query);
                    $email = $row['value'];
                    $email = explode(",",$email);
                    
                    $name_query = "SELECT * FROM users WHERE ID=$seller_id";
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

                    include "includes/mail.php";

                    $mail->setFrom("notesmarketplace4120@gmail.com","nikhil shah");
                    foreach($email as $email){
                        $mail->addAddress($email);
                    }
                    
                    $mail->addReplyTo("notesmarketplace4120@gmail.com","nikhil shah");
                    $mail->isHtml(true);
                    $mail->Subject = $subject ;
                    $mail->Body = $msg;

                    if(!$mail->send()){
                        echo "<script>alert('something went wrong');</script>";
                    }
                    else{
                        echo "<script>window.location.href='dashboard.php';</script>";
                    }
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
                                    placeholder="Enter your notes title" name="title" <?php if(isset($flag)){echo "value=$title";} ?>>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="Category">Category*</label>
                                <select class="form-control custom-select" id="category" name="category">
                                    <option value="">Select your Category </option>
                                    <?php

                                        $query = "SELECT * FROM notecategories";
                                        $select_category = mysqli_query($connection,$query);
                                        if(!($select_category)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_category)){
                                            $category_id = $row['ID'];
                                            $category_name = $row['Name'];
                                            if(isset($flag) && $category == $category_id){
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
                                        <p style="color: lightgray;" id="picture-name"><?php if(isset($flag) && $profile_picture != ""){echo $profile_picture;}else{echo "Upload a Picture";}?></p>
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
                                    <option>Select your notes type</option>

                                    <?php

                                        $query = "SELECT * FROM notetypes";
                                        $select_types = mysqli_query($connection,$query);
                                        if(!($select_types)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_types)){
                                            $type_id = $row['ID'];
                                            $type_name = $row['Name'];
                                            if(isset($flag) && $note_type == $type_id){
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
                                    <option value="">Enter number of note pages</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
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
                                            if(isset($flag) && $country == $country_id){
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
                                    placeholder="Enter your institute name" name="institutename" <?php if(isset($flag)){echo "value=$institutename";} ?>>


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
                                    placeholder="Enter your course name" name="coursename" <?php if(isset($flag)){echo "value=$coursename";} ?>>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="course-code">Course Code</label>
                                <input type="text" class="form-control" id="course-code"
                                    placeholder="Enter your course code" name="coursecode" <?php if(isset($flag)){echo "value=$coursecode";} ?>>


                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="proffessor">Proffessor/lecturer</label>
                                <input type="text" class="form-control" id="professor"
                                    placeholder="Enter your proffessor name" name="lecturer" <?php if(isset($flag)){echo "value=$lecturer";} ?>>


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
                                    <input type="radio" id="free" name="sell" value="0" <?php if(isset($flag)){if($sell == 0){echo "checked";}}else{echo "checked";}?>>
                                    <label for="free" id="free-lbl">Free</label>
                                    <input type="radio" id="paid" name="sell" value="1" <?php if(isset($flag)){if($sell == 1){echo "checked";}}?>>
                                    <label for="paid" id="paid-lbl">Paid</label>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label for="sell-price" id="sell_price">Sell Price</label>
                                <input type="text" class="form-control" id="sell-price"
                                    placeholder="Enter your price" name="sell_price" <?php if(isset($flag)){echo "value=$sell_price";} ?> value="0">

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
                                        <p style="color: lightgray;" id="cv_name"><?php if(isset($flag) && $preview_cv != ""){echo $preview_cv;}else{echo "Preview CV";}?></p>
                                        <input type="file" id="upload-file" style="display: none;" name="preview_cv">
                                    </label>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-save" name="save" <?php if(isset($flag)){echo "disabled";} ?>>SAVE</button>
                    <button type="submit" class="btn btn-publish" name="publish" style="visibility:<?php if(isset($flag)){echo "visible";}else{echo "hidden";} ?>">PUBLISH</button>
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
    <script>
        $(document).ready(function(){
            var a = $('input[type=radio]:checked').val();
            if(a == 0){
                    $('#sell-price').css('display','none');
                    $('#upload-file').prop("required",false);
                    $('#sell_price').css('display','none');
            }
            $("input[type=radio]").change(function(){
                var a = $(this).val();
                if(a == 0){
                    $('#sell-price').css('display','none').prop("required",false);
                    $('#upload-file').prop("required",false);
                    $('#sell_price').css('display','none');

                }
                else{
                    $('#sell-price').prop("required",true).css('display','block');
                    $('#upload-file').prop("required",true);
                    $('#sell_price').css('display','block');
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
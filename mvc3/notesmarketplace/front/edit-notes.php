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
    if(!(isset($_GET['edit']))){
        header("Location: dashboard.php");
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
        $sellerid = $row['SellerID'];
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
`   <?php
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
            $notename = $_FILES['notes']['name'];
            $notenametmp = $_FILES['notes']['tmp_name'];
            if(!empty($_FILES['profile_picture']['tmp_name'])){
                
                $profile_picture_ext = pathinfo( $_FILES["profile_picture"]["name"], PATHINFO_EXTENSION ); 
                
                $profile_picture = "DP_". date("dmYhis") . "." . $profile_picture_ext;
                $path = '../uploads/Members/'.$sellerid.'/'.$note_id.'/'.$edit_dp;
                move_uploaded_file($profile_picture_tmp,'../uploads/Members/'.$sellerid.'/'.$note_id.'/'.$profile_picture);
                unlink($path);
                
            }
            else{
                $profile_picture = $edit_dp;
                $profile_picture_ext = strtolower(pathinfo( $edit_dp, PATHINFO_EXTENSION ));
                
            }
            if(!empty($_FILES['preview_cv']['tmp_name'])){
                $preview_cv_ext = pathinfo( $_FILES["preview_cv"]["name"], PATHINFO_EXTENSION ); 
                $preview_cv = "Preview_". date("dmYhis") ."." . $preview_cv_ext;
                $path = '../uploads/Members/'.$sellerid.'/'.$note_id.'/'.$edit_dp;
                move_uploaded_file($profile_picture_tmp,'../uploads/Members/'.$sellerid.'/'.$note_id.'/'.$preview_cv);
                unlink($path);
            }
            else{
                $preview_cv = $edit_cv;
                $preview_cv_ext = strtolower(pathinfo( $edit_dp, PATHINFO_EXTENSION ));
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
            $update_query .= "NumberofPages = '{$save_pages}', ";
            $update_query .= "Country = '{$save_country}', ";
            $update_query .= "UniversityName = '{$save_institution_name}', ";
            $update_query .= "Course = '{$save_course}', ";
            $update_query .= "CourseCode = '{$save_course_code}', ";
            $update_query .= "Professor = '{$save_professor}', ";
            $update_query .= "IsPaid = $save_sell, ";
            $update_query .= "SellingPrice = $save_sell_price, ";
            $update_query .= "DisplayPicture = '{$profile_picture}', ";
            $update_query .= "notespreview = '{$preview_cv}' ";
            $update_query .= "WHERE ID= $note_id ";
            $update_select_query = mysqli_query($connection,$update_query);
            if(!($update_select_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            if($notename[0] != "" ){
                $select_attachment = mysqli_query($connection,"SELECT * FROM sellernotesattachments WHERE noteid = $note_id");
                if(!($select_attachment)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                while($attachmentrow = mysqli_fetch_assoc($select_attachment)){
                    $attachmentpath = $attachmentrow['FilePath'];
                    $unlinkpath = "../" . $attachmentpath;
                    unlink($unlinkpath);
                }
                $oldattachmentdelete = mysqli_query($connection,"DELETE FROM sellernotesattachments WHERE noteid = $note_id");
                if(!($oldattachmentdelete)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
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
                            $insert_notes = "INSERT INTO sellernotesattachments(noteid,FileName,FilePath)VALUES($note_id,'{$notes}','uploads/Members/$sellerid/$note_id/attachments/$notes')";
                            $insert_notes_query = mysqli_query($connection,$insert_notes);
                            if(!($insert_notes_query)){
                                die("QUERY FAILED".mysqli_error($connection));
                            }
                            move_uploaded_file($_FILES['notes']['tmp_name'][$i],"../uploads/Members/$sellerid/$note_id/attachments/$notes");
                            $i++;
                        }
            }
            
        }        

        if(isset($_POST['publish'])){
            
            
                    $query = mysqli_query($connection,"SELECT title FROM sellernotes WHERE ID= $note_id");
                    if(!($query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    $query_row = mysqli_fetch_row($query);
                    $seller_title = $query_row[0];
                    
        
                
                    
                    $query = "UPDATE sellernotes SET status = 7 WHERE ID = $note_id";
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
                    $id = $_SESSION['ID'];
                    $name_query = "SELECT * FROM users WHERE ID=$id";
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
                                    <label for="sell-price" id="sell_price">Sell Price</label>
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
    <?php
        include "includes/footer.php";
    ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function(){
            if($("input[type=radio]:checked").val() == 0 ){
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
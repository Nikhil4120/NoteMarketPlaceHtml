<?php
    include "../db.php";
?>
<?php
    session_start();
?>

<?php
    if(isset($_GET['note'])){
        $note = $_GET['note'];
        $note_query = "SELECT * FROM sellernotes WHERE id = $note";
        $select_note_query = mysqli_query($connection,$note_query);
        if(!($select_note_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($select_note_query);
        $title = $row['Title'];
        $category = $row['Category'];
        $description = substr($row['Description'],0,60);
        $DisplayPicture = $row['DisplayPicture'];
        $selltype = $row['IsPaid'];
        $sellprice = $row['SellingPrice'];
        $university = $row['UniversityName'];
        $course = $row['Course'];
        $country = $row['Country'];
        $coursecode = $row['CourseCode'];
        $publishdate = $row['PublishedDate'];
        if($publishdate != ""){
            $publishdate = date('F j Y',strtotime($publishdate));
        }
        else{
            $publishdate = "NA";
        }
        $professor = $row['Professor'];
        $pages = $row['NumberofPages'];
        $id = $row['ID'];
        $sellerid = $row['SellerID'];
        $preview_cv = $row['NotesPreview'];
    }
    if(isset($_POST['paidnotes'])){
        
        $downloaderid = $_SESSION['ID'];
        $select_attachment = mysqli_query($connection,"SELECT * FROM sellernotesattachments WHERE noteid  = $id");
        if(!($select_attachment)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        while($attachment_row = mysqli_fetch_assoc($select_attachment)){
            $insert_query = "INSERT INTO downloads(noteid,seller,downloader,issellerhasalloweddownload,isattachmentdownloaded,attachmentdownloadeddate,ispaid,purchasedprice,notetitle,notecategory,createddate,createdby)";
            $insert_query .= "VALUES($id,$sellerid,$downloaderid,0,0,now(),$selltype,$sellprice,'{$title}',$category,now(),$downloaderid)";
            $insert_select_query = mysqli_query($connection,$insert_query);
            if(!($insert_select_query)){
                die("QUERY  FAILED".mysqli_error($connection));
            }
        }
        
        include "includes/mail.php";
        $user_email = "SELECT emailid,firstname from users WHERE ID = $sellerid";
        $user_email_query = mysqli_query($connection,$user_email);
        if(!($user_email_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $user_email = mysqli_fetch_row($user_email_query);
        $email = $user_email[0];
        $fname = $user_email[1];
        $user = "SELECT * FROM users WHERE ID = $downloaderid";
        $user_query = mysqli_query($connection,$user);
        if(!($user_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $user_row = mysqli_fetch_row($user_query);
        $firstname = $user_row['FirstName'];
        $lastname = $user_row['LastName'];
        $subject = $firstname . " " . $lastname ." wants to purchase your notes ";
        $msg = "<b> HELLO $fname </b><br> ";
        $msg .= "<p>WE Would Like to inform you that $firstname wants to purchase your notes.Please see Buyer Requests tab and allow download access to Buyer if you have received payment from him</p><br>  ";
        $msg .= "<h1>Regards,<br>Notes MarketPlace</h1>";
        $mail->setFrom("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->addAddress($email);
        $mail->addReplyTo("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->isHtml(true);
        $mail->Subject = $subject ;
        $mail->Body = $msg;

        if(!$mail->send()){
            echo "<script>alert('something went wrong');</script>";
        }
        else{
            echo "<script>window.location.href='/notesmarketplace/front/dashboard.php';</script>";
                    }
    }
?>
<?php
    $systemdefaultnote = mysqli_query($connection,"SELECT value FROM systemconfiguration WHERE configurationkey = 'defaultnote' ");
    if(!($systemdefaultnote)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $defaultnoterow = mysqli_fetch_row($systemdefaultnote);
    $defaultnote = $defaultnoterow[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/note-details/note-details.css">
    <link rel="stylesheet" href="css/note-details/responsive.css">


</head>

<body>
    <?php
        $page="search";
        if(isset($_SESSION['ID'])){
            include "includes/reg_header.php";
        }
        else{
            include "includes/nonreg_header.php";
        }
        
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <section id="notes-details">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Notes Details</h2>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-lg-5 col-md-4 col-sm-5 col-12">
                                <div id="notes-img">
                                    <?php
                                        if($DisplayPicture == ""){
                                            echo "<img src='../uploads/Systemconfiguration/$defaultnote' alt='note-img' class='img-fluid'>";
                                        }
                                        else{
                                    ?>
                                    
                                    
                                    <img src="../uploads/Members/<?php echo $sellerid . '/' . $id . '/' . $DisplayPicture ; ?>" alt="note-img" class="img-fluid">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-7 col-12">
                                <div id="note-name">
                                    <h2><?php echo $title;?></h2>
                                    <p><?php 
                                        $category_query = "SELECT * FROM Notecategories WHERE ID = $category";
                                        $category_select_query = mysqli_query($connection,$category_query);
                                        if(!($category_select_query)){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        $category_row = mysqli_fetch_assoc($category_select_query);
                                        $category = $category_row['Name'];
                                        echo $category;
                                    ?>
                                    </p>
                                </div>
                                <div id="note-description">
                                    <p>
                                        <?php
                                            echo $description;
                                        ?>
                                    </p>
                                </div>
                                <div id="note-btn">
                                    <?php if(isset($_SESSION['ID'])){
                                        $dwlderid = $_SESSION['ID'];
                                        $dwld_times_query = mysqli_query($connection,"SELECT * FROM downloads WHERE noteid = $id AND downloader= $dwlderid");
                                        if(!($dwld_times_query)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }
                                        $dwld_times = mysqli_num_rows($dwld_times_query);
                                        
                                    ?>
                                    <?php
                                        if($sellprice != 0 && $sellerid != $_SESSION['ID'] && $dwld_times == 0 ){
                                    ?>
                                    
                                    <button type="button" class="btn btn-dwld" id="paid-modal" 
                                        >DOWNLOAD <?php if($sellprice != 0){ echo "/$sellprice";}?></button>
                                    
                                    <?php
                                        }
                                        else{
                                        ?>
                                        <button type="button" class="btn btn-dwld" 
                                        ><a href="downloadpdf.php?id=<?php echo $id; ?>" style="color:#fff;text-decoration:none;" target="_blank">DOWNLOAD</a> <?php if($sellprice != 0){ echo "/$sellprice";}?></button>
                                    <?php
                                        }
                                    ?>
                                    
                                    <?php
                                    }
                                    else{
                                       ?>
                                       <button type="button" class="btn btn-dwld" onclick="login()"
                                        >DOWNLOAD <?php if($sellprice != 0){ echo "/$sellprice";}?></button>
                                    <?php 
                                    }
                                    ?>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div id="note-info">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Institution:</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value"><?php echo $university; ?>
                                        </span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Country:</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value">
                                <?php
                                    $country_query = "SELECT * FROM countries WHERE ID=$country";
                                    $select_countries = mysqli_query($connection,$country_query);
                                    if(!($select_countries)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $row = mysqli_fetch_assoc($select_countries);
                                    $country = $row['Name'];
                                    echo $country;
                                ?>
                                        </span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Course Name:</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value"><?php echo $course; ?>
                                        </span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Course Code</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value"><?php echo $coursecode; ?></span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Proffessor</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value"><?php echo $professor; ?>
                                        </span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Number Of Pages</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value"><?php echo $pages; ?></span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Approoved date</span></div>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value"><?php echo $publishdate; ?>
                                        </span></div>
                                <div class="col-md-6 col-sm-6 col-6"><span class="name">Rating</span></div>
                                <?php
                                
                                    $review_query = mysqli_query($connection,"SELECT AVG(ratings),COUNT(noteid) FROM sellernotesreview WHERE noteid = $id ");
                                    if(!($review_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $review_row = mysqli_fetch_row($review_query);
                                    $avg_review = round($review_row[0]);
                                    $count_review = $review_row[1];
                                ?>
                                <div class="col-md-6 col-sm-6 col-6 text-right"><span class="value">
                                        <?php
                                            for ($i=1; $i <= $avg_review ; $i++) { 
                                                echo '<img src="images/images/star.png">';
                                            }
                                            for($i=1;$i<= 5-$avg_review ; $i++){
                                                echo '<img src="images/images/star-white.png">';
                                            }
                                        ?>
                                        
                                        
                                        
                                        <?php echo $count_review; ?> Reviews
                                    </span>
                                </div>
                                <?php
                                    $spam_query = mysqli_query($connection,"SELECT count(DISTINCT reportedbyid) FROM sellernotesreportedissues WHERE noteid=$id");
                                    if(!($spam_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $spam_row = mysqli_fetch_row($spam_query);
                                ?>
                                <div class="col-md-12 col-sm-12 col-12"><span class="inappropriate"><?php echo $spam_row[0]; ?> People Marked as a inappropriate</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <section id="notes-preview-review">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div id="notes-preview">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="heading">
                                        <h2>Notes Preview</h2>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">

                                    <div id="Iframe-Cicis-Menu-To-Go"
                                        class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                                        <div class="responsive-wrapper 
     responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                                            <iframe src='<?php echo "../uploads/Members/$sellerid/$id/$preview_cv"; ?> '>
                                                <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                                        An &#105;frame should be displayed here but your browser version
                                                        does not support &#105;frames.</em> Please update your browser
                                                    to its most recent version and try again, or access the file <a
                                                        href="images/images/sample.pdf">with
                                                        this link.</a></p>
                                            </iframe>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div id="customer-review">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="heading">
                                        <h2>Customer Reviews</h2>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="reviews">
                                        <div class="row">
                                            <?php
                                                $review_query = mysqli_query($connection,"SELECT * FROM sellernotesreview WHERE noteid = $id ORDER BY ratings DESC,createddate DESC");
                                                if(!($review_query)){
                                                    die("QUERY FAILED".mysqli_error($connection));
                                                }
                                                if(mysqli_num_rows($review_query) == 0){
                                                    echo '<h3 style="color:#6255a5">No Reviews</h3>';
                                                }
                                                else{

                                                
                                                while($row = mysqli_fetch_assoc($review_query)){
                                                    $reviewer = $row['ReviewedByID'];
                                                    $ratings = $row['Ratings'];
                                                    $comments = $row['Comments'];
                                                    $ratings = round($ratings);
                                                    $review_user_query = mysqli_query($connection,"SELECT * FROM users WHERE ID = $reviewer");
                                                    if(!($review_user_query)){
                                                        die("QUERY FAILED".mysqli_error($connection));
                                                    }
                                                    $user_row = mysqli_fetch_assoc($review_user_query);
                                                    $firstname = $user_row['FirstName'];
                                                    $lastname = $user_row['LastName'];
                                                    $review_img_query = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $reviewer");
                                                    if(!($review_img_query)){
                                                        die("QUERY FAILED".mysqli_error($connection));
                                                    }
                                                    $img_row = mysqli_fetch_assoc($review_img_query);
                                                    $img_path = $img_row['ProfilePicture'];
                                            ?>
                                            <div class="col-md-2 col-sm-2 col-3">
                                                <div class="client-img">
                                                    <img src="../uploads/Members/<?php echo $reviewer . '/' . $img_path ;?>" class="rounded-circle">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-9">
                                                <div class="client-desc">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="client-name">
                                                                <h3><?php echo $firstname . " " . $lastname ;?> </h3>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="rating">
                                                                <?php 
                                                                    for($i =1 ; $i<=$ratings ; $i++){
                                                                        echo '<img src="images/images/star.png">';
                                                                    }
                                                                    for($i =1 ; $i<=5-$ratings ; $i++){
                                                                        echo '<img src="images/images/star-white.png">';
                                                                    }
                                                                ?>
                                                                
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 col-sm-12 col-12">
                                                            <div class="client-para">
                                                                <p>
                                                                    <?php echo $comments; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr id="client-hr">
                                            <?php

                                                }    
                                                }
                                            ?>

                                            
                                            
                                            

                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
        
    </div>

    <hr>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div id="success-logo">
                                <img src="images/notedetails/SUCCESS.png">
                                <h4 class="modal-title">Thank you For Purchasing! </h4>
                            </div>

                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php

                    $query = mysqli_query($connection,"SELECT * FROM users WHERE ID = $sellerid");
                    if(!($query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($query);
                    $sellerfirstname = $row['FirstName'];
                    $sellerlastname = $row['LastName'];
                    $query = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $sellerid");
                    if(!($query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($query);
                    $countrycode = $row['Countrycode'];
                    $phone = $row['Phonenumber'];
                    if(isset($_SESSION['ID'])){
                        $buyerid = $_SESSION['ID'];
                    
                    $query = mysqli_query($connection,"SELECT * FROM users WHERE ID = $buyerid");
                    if(!($query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($query);
                    $buyername = $row['FirstName'];
                    }
                    
                ?>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div id="client-name">
                                    <h4>Dear <?php echo $buyername; ?></h4>
                                    <p>AS this is Paid Notes - you need to pay to seller <?php echo $sellerfirstname . " " . $sellerlastname ?> offline.We Will send
                                        him an email that you want to download this note.He may contact you further for
                                        payment process completion.</p>
                                    <p>Incase, you have urgency,</p>
                                    <p>Please contact us on <?php echo $countrycode;?><?php echo $phone;?></p>
                                    <p>Once you have received payment and ackknowledge us - selected notes you can see
                                        over my downloads tab for download. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p>Have a good day</p>
                </div>

            </div>
        </div>
    </div>

    </div>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        function login(){
            alert("kindly first login");
            window.location.href = "../login.php";
        }
        $('#paid-modal').click(function(){
            if(confirm("Do you really want to download this paid notes ")){
                $(this).attr('data-toggle','modal').attr('data-target','#myModal');
                $.ajax({
                    type: "POST",
                    url: "note-details.php?note=<?php echo $note; ?>",
                    data: {'paidnotes':'paidnotes'},
                    dataType: "text",
                    success: function (res) {
                       
                    },
                    error: function (err) {
                        alert("yeah same page ajax not succeed");
                    },
                });
                return true;
            }
            else{
                return false;
            }
        })
        
    </script>
</body>

</html>
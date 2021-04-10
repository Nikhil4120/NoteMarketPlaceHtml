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
if(isset($_GET['note'])){
        $note = $_GET['note'];
        $note_query = "SELECT * FROM sellernotes WHERE id = $note";
        $select_note_query = mysqli_query($connection,$note_query);
        if(!($select_note_query)){
            die("QUERY FAILED".mysqli.error($connection));
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
        $publishdate = date('F j Y',strtotime($publishdate));
        $professor = $row['Professor'];
        $pages = $row['NumberofPages'];
        $id = $row['ID'];
        $sellerid = $row['SellerID'];
        $preview_cv = $row['NotesPreview'];
    }
?>
<?php
    if(isset($_GET['delete'])){
        $delete_review = $_GET['delete'];
        $deletequery = "DELETE FROM sellernotesreview WHERE ID = $delete_review";
        $deletequery = mysqli_query($connection,$deletequery);
        if(!($deletequery)){
            die("QUERY FAILED".mysqli_error($connection));
        } 
        echo "<script>window.location.href='admin_notedetails.php?note=$id'</script>";
    }
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

    <link rel="stylesheet" href="css/admin_notedetails/admin_notedetails.css">
    <link rel="stylesheet" href="css/admin_notedetails/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
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
                                    <img src="images/notedetails/1.jpg" alt="note-img" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-7 col-12">
                                <div id="note-name">
                                    <h2><?php echo $title;?></h2>
                                    <p>
                                    <?php 
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
                                <a href="downloadpdf.php?id=<?php echo $id ?>">    <button type="button" class="btn btn-dwld">
                                        DOWNLOAD <?php if($sellprice != 0){ echo "/$sellprice";}?></button></a>
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
                                        2020</span></div>
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
                                            <iframe src='<?php echo "../uploads/Members/$sellerid/$id/$preview_cv"; ?>'>
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
                                                    $reviewerid = $row['ID'];
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
                                                        <div class="col-md-12">
                                                            <div class="client-name">
                                                                <span style="float: right;"><a href="admin_notedetails.php?note='<?php echo $id;?>'&delete='<?php echo $reviewerid;?>'"><img src="images/images/delete.png"></a></span>
                                                                <h3><?php echo $firstname . " " . $lastname ;?> </h3>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
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
                                                        <div class="col-md-12">
                                                            <div class="client-para">
                                                                <p><?php echo $comments; ?>
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
    

    </div>
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
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>
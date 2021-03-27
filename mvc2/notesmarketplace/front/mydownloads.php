<?php
    include "../db.php";
?>
<?php
    session_start();
?>


<?php
   
   if(!(isset($_SESSION['ID']))){
        header('Location: login.php');
   }

?>
<?php
    $user_id = $_SESSION['ID'];
    $select_user = "SELECT * FROM users WHERE ID = $user_id";
    $select_user_query = mysqli_query($connection,$select_user);
    if(!($select_user_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select_user_query);
    $email = $row['EmailID'];
    $firstname = $row['FirstName'];
    $lastname = $row['LastName'];
?>
<?php
    if(isset($_POST['submit'])){
        $ratings = $_POST['rating'];
        $user_id = $_SESSION['ID'];
        $comments = $_POST['comments'];
        $downloadid = $_POST['downloadid'];
        $noteid = $_POST['noteid'];
        $multiple_query = mysqli_query($connection,"SELECT ID FROM sellernotesreview WHERE reviewedbyid = $user_id AND noteid = $noteid");
        if(!($multiple_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }        
        
        if(mysqli_num_rows($multiple_query) == 0){
            $insert_query = "INSERT INTO sellernotesreview(noteid,reviewedbyid,againstdownloadsid,ratings,comments,createddate,createdby)";
            $insert_query .= "VALUES($noteid,$user_id,$downloadid,$ratings,'{$comments}',now(),$user_id)";
            $insert_select_query = mysqli_query($connection,$insert_query);
            if(!($insert_select_query)){
                die("QUERY FAILED".mysqli_error($connection)); 
            }
        }
        else{
            $row = mysqli_fetch_row($multiple_query);
            $ID = $row[0];
            $update_query = mysqli_query($connection,"UPDATE sellernotesreview SET ratings = $ratings , comments = $comments WHERE ID = $ID") ;
            if(!($update_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        
        
    }

?>
<?php
    if(isset($_POST['report'])){
        
        $remarks = $_POST['remarks'];
        $downloadid = $_POST['downloadid'];
        $noteid = $_POST['noteid'];
        $title = $_POST['title'];
        $multiple_query = mysqli_query($connection,"SELECT ID FROM sellernotesreportedissues WHERE reportedbyid = $user_id AND noteid = $noteid");
        if(!($multiple_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        if(mysqli_num_rows($multiple_query) == 0){
            $insert_query = "INSERT INTO sellernotesreportedissues(noteid,reportedbyid,againstdownloadid,remarks,createddate,createdby)";
            $insert_query .= "VALUES($noteid,$user_id,$downloadid,'{$remarks}',now(),$user_id)";
            $insert_select_query = mysqli_query($connection,$insert_query);
            if(!($insert_select_query)){
                die("QUERY FAILED".mysqli_error($connection)); 
            }
        }
        else{
            $row = mysqli_fetch_row($multiple_query);
            $ID = $row[0];
            $update_query = mysqli_query($connection,"UPDATE sellernotesreportedissues SET remarks = $remarks WHERE ID = $ID");
            if(!($update_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
        
        $seller_query = "SELECT * FROM users WHERE id = (SELECT sellerid FROM sellernotes WHERE id = $noteid)";
        $select_seller_query = mysqli_query($connection,$seller_query);
        if(!($select_seller_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($select_seller_query);
        $fname = $row['FirstName'];
        $lname = $row['LastName'];
        $subject = $firstname . " ". $lastname . " Reported an issue for ".$title;
        $msg = "<h2>Hello Admins,</h2>";
        $msg .= "<p>We want to inform that ,$firstname $lastname Reported an issue for $fname $lname's note with title $title. Please look at the notes and take required actions. </p><br>";
        $msg .= "<h1>Regards,<br>NotesMarketPlace";

        include "includes/mail.php";

        $mail->setFrom("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->addAddress("niks04446@gmail.com");
        $mail->addReplyTo("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->isHtml(true);
        $mail->Subject = $subject ;
        $mail->Body = $msg;

        if(!$mail->send()){
            echo "<script>alert('something went wrong');</script>";
        }
        else{
            echo "<script>alert('note has been reported');</script>";
        }
    }

?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM sellernotesattachments WHERE noteid  = $id";
        $select_pdf_query = mysqli_query($connection,$query);
        if(!($select_pdf_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }      
        $pdfs = [];

        $dwldid = $_GET['dwldid'];
        
        $query = "SELECT * FROM downloads WHERE noteid = $id AND downloader = $user_id ORDER BY ID";
        $select_query = mysqli_query($connection,$query);
                if(!($select_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                $dwld_row = mysqli_fetch_assoc($select_query);
                $dwldid = $dwld_row['ID'];
                $sellerid = $dwld_row['Seller'];
                $downloaderid = $dwld_row['Downloader'];
                $title = $dwld_row['NoteTitle'];
                $category = $dwld_row['NoteCategory'];
                $selltype = $dwld_row['IsPaid'];
                $sellprice = $dwld_row['PurchasedPrice'];
                $isattachmentdownloaded = $dwld_row['IsAttachmentDownloaded'];
        while($row = mysqli_fetch_assoc($select_pdf_query)){
            $filepath = $row['FilePath'];
            $pdf_file_path = "../" . $filepath;
            if(file_exists($pdf_file_path)){
            
                
                if($isattachmentdownloaded == 1){
                    $insert_query = "INSERT INTO downloads(noteid,seller,downloader,issellerhasalloweddownload,attachmentpath,isattachmentdownloaded,attachmentdownloadeddate,ispaid,purchasedprice,notetitle,notecategory,createddate,createdby)";
                    $insert_query .= "VALUES($id,$sellerid,$downloaderid,1,'{$filepath}',1,now(),$selltype,$sellprice,'{$title}',$category,now(),$downloaderid)";
                    $insert_select_query = mysqli_query($connection,$insert_query);
                    if(!($insert_select_query)){
                        die("QUERY  FAILED".mysqli_error($connection));
                    }
                    array_push($pdfs,$pdf_file_path);
                }
                else{
                    $update_query = "UPDATE downloads SET  ";
                    $update_query .= "isattachmentdownloaded = 1, ";
                    $update_query .= "attachmentdownloadeddate = now()";
                    $update_query .= " WHERE noteid = $id AND downloader = $user_id";
                    $update_select_query = mysqli_query($connection,$update_query);
                    if(!($update_select_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                    array_push($pdfs,$pdf_file_path);
                }
                
                
            }
            
        }
        
        $zipname = time() . ".zip";
        $zip = new ZipArchive;
        $zip->open($zipname,ZipArchive::CREATE | ZipArchive::OVERWRITE);
        foreach($pdfs as $file){
            $zip->addFile($file,basename($file));
        }
        $zip->close();
        header('Content-type: application/zip');
        header('Content-Disposition: attachment;filename='.$zipname);
        readfile($zipname);
        unlink($zipname);
        
        
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Downloads</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/mydownloads/mydownloads.css">
    <link rel="stylesheet" href="css/mydownloads/responsive.css">

</head>

<body>
    <?php
        $page = "mydownloads";
        include "includes/reg_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <section id="my-downloads">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-12">
                        <div class="heading">
                            <h2>My Downloads</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-12 my-2 my-lg-0">
                        <form class="form-inline">
                            <div id="search-box">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                id="search">
                            <img src="images/images/search-icon.png" class="search-icon">
                            
                                </div>
                                <div id="search-btn">
                            <button class="btn btn-search  " type="submit">Search</button></div>
                        </form>
                    </div>
                </div>
                <?php


                    $query = "SELECT * FROM downloads WHERE downloader = $user_id AND issellerhasalloweddownload=1 AND seller != downloader GROUP BY noteid ORDER BY AttachmentDownloadeddate DESC";

                    
                    $select_query = mysqli_query($connection,$query);

                    if(!($select_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }

                    
                    
                ?>
                <div class="download-table">
                   <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">BUYER</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">DOWNLOAD DATE/TIME</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                    $j =1;
                                    while($row = mysqli_fetch_assoc($select_query)){
                                        
                                        $title = $row['NoteTitle'];
                                        $category = $row['NoteCategory'];
                                        $category_query = "SELECT * FROM Notecategories WHERE ID = $category";
                                        $category_select_query = mysqli_query($connection,$category_query);
                                        if(!($category_select_query)){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $category_row = mysqli_fetch_assoc($category_select_query);
                                        $category_name = $category_row['Name'];
                                        $buyer_id = $row['Downloader'];
                                        $buyer_email_query = "SELECT * FROM users WHERE ID = $buyer_id";
                                        $buyer_email_select_query = mysqli_query($connection,$buyer_email_query);
                                        if(!($buyer_email_select_query)){
                                            die("QUERY FAILED".mysqli_error($connection));

                                        }
                                        $row_email = mysqli_fetch_assoc($buyer_email_select_query);
                                        $buyer_email = $row_email['EmailID'];
                                        
                                        $IsPaid = $row['IsPaid'];
                                        if($IsPaid == 0){
                                            $IsPaid = "Free";
                                        }
                                        else{
                                            $IsPaid = "Paid";
                                        }
                                        $sellingprice = $row['PurchasedPrice'];
                                        $time = $row['AttachmentDownloadedDate'];
                                        $time = date('d M Y, h:i:s',strtotime($time));
                                        $id = $row['ID'];
                                        $noteid = $row['NoteID'];
                                ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $j++; ?></th>
                                    <td><a href="note-details.php?note=<?php echo $title;?>"><?php echo $title ?></a></td>
                                    <td><?php echo $category_name ?></td>
                                    <td><?php echo $buyer_email; ?></td>
                                    
                                    <td><?php echo $IsPaid ?></td>
                                    <td><?php echo $sellingprice ?></td>
                                    <td><?php echo $time ?></td>
                                    <td><a href="note-details.php?note=<?php echo $title;?>"><img src="images/eye.png"></a></td>
                                    <td>
                                    <div class="dropdown">
                                        <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="mydownloads.php?id=<?php echo $noteid;?>&dwldid=<?php echo $id;?>">Download Note</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#m<?php echo ($j-1); ?>">Add Reviews/Feedback</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#r<?php echo ($j-1); ?>">Report as an inappropriate</a>
                                        </div>

                                    </div>
                                    <div class="modal fade" id="m<?php echo ($j-1); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form method="post">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-12">
                                                                    <fieldset class="rating">
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>5" name="rating" value="5" /><label
                                                                            class="full" for="star<?php echo ($j-1); ?>5" title="Awesome - 5 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>4half" name="rating"
                                                                            value="4.5" /><label class="half" for="star<?php echo ($j-1); ?>4half"
                                                                            title="Pretty good - 4.5 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>4" name="rating" value="4" /><label
                                                                            class="full" for="star<?php echo ($j-1); ?>4"
                                                                            title="Pretty good - 4 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>3half" name="rating"
                                                                            value="3.5" /><label class="half" for="star<?php echo ($j-1); ?>3half"
                                                                            title="Meh - 3.5 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>3" name="rating" value="3" /><label
                                                                            class="full" for="star<?php echo ($j-1); ?>3" title="Meh - 3 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>2half" name="rating"
                                                                            value="2.5" /><label class="half" for="star<?php echo ($j-1); ?>2half"
                                                                            title="Kinda bad - 2.5 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>2" name="rating" value="2" /><label
                                                                            class="full" for="star<?php echo ($j-1); ?>2"
                                                                            title="Kinda bad - 2 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>1half" name="rating"
                                                                            value="1.5" /><label class="half" for="star<?php echo ($j-1); ?>1half"
                                                                            title="Meh - 1.5 stars"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>1" name="rating" value="1" /><label
                                                                            class="full" for="star<?php echo ($j-1); ?>1"
                                                                            title="Sucks big time - 1 star"></label>
                                                                        <input type="radio" id="star<?php echo ($j-1); ?>half" name="rating"
                                                                            value="0.5" /><label class="half" for="star<?php echo ($j-1); ?>half"
                                                                            title="Sucks big time - 0.5 stars"></label>
                                                                    </fieldset>
                                    
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-12">
                                    
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1" id="comments">Comments</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                                            name="comments"></textarea>
                                                                    </div>
                                                                    <input type="hidden" value="<?php echo $id; ?>" name="downloadid">
                                                                    <input type="hidden" value="<?php echo $noteid; ?>" name="noteid">
                                                                    <button type="submit" class="btn btn-modal" name="submit">Submit</button>
                                    
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="r<?php echo ($j-1); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Report As an inappropriate</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post">
                                                <div class="modal-body">
                                                   
                                                       <div class="form-group">
                                                            <label for="Title">Title</label>
                                                            <input id="Title" class="form-control" type="text" value="<?php echo $title;?>" name="title" readonly>

                                                        </div>
                                                        <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1" id="remarks">Remarks</label>
                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                                            name="remarks" required></textarea>
                                                        </div>
                                                        <input type="hidden" value="<?php echo $id; ?>" name="downloadid">
                                                        <input type="hidden" value="<?php echo $noteid; ?>" name="noteid">
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger" name="report">Report an issue </button>
                                                </div>
                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                
                                <?php
                                    }
                                ?>
                            
                            </tr>
                        </tbody>
                    </table></div>
                </div>
            </section>
            
            
        </div>



    </div>

    <hr>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      $(document).ready( function () {
        var table = $('table').DataTable({
                'sDom' : '"top"i',
                "iDisplayLength":10,
                "binfo":false,
                language:{
                    paginate:{
                        next:'<img src="images/images/right-arrow.png">',
                        previous:'<img src="images/images/left-arrow.png">'
                    }
                },
                columnDefs:[{
                    targets:[7,8],
                    orderable:false,
                }]
                
            }

            );
        $('.btn-search').click(function(){
            var x = $('#search').val();
            
            table.search(x).draw();
        });

        });
    </script>
    <script>
        $('.btn-danger').click(function(){
            if(confirm("Are You Sure want to mark this report as spam , you cannot update it later")){
                return true;
            }
            else{
                return false;
            }
        })
    </script>
</body>

</html>
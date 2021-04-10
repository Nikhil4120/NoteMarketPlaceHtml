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

    if(isset($_POST['unpublish'])){
        
        $unpublish_noteid = $_POST['noteid'];
        $unpublish_title = $_POST['title'];
        $unpublish_remarks = $_POST['remarks'];
        $unpublish_notes_query = "UPDATE sellernotes SET status = 11 , isactive = 0 , adminremarks = '{$unpublish_remarks}' WHERE id = $unpublish_noteid";
        $unpublish_notes_query = mysqli_query($connection,$unpublish_notes_query);
        if(!($unpublish_notes_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $unpublish_note_attachment = "UPDATE sellernotesattachments SET isactive = 0 WHERE noteid = $unpublish_noteid";
        $unpublish_note_attachment = mysqli_query($connection,$unpublish_note_attachment);
        if(!($unpublish_note_attachment)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $unpublish_download = "UPDATE downloads SET isactive = 0 WHERE noteid = $unpublish_noteid";
        $unpublish_download = mysqli_query($connection,$unpublish_download);
        if(!($unpublish_download)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        include "includes/mail.php";
        $seller_email = "SELECT emailid,firstname,lastname FROM users WHERE ID = (SELECT sellerid FROM sellernotes WHERE id =$unpublish_noteid)";
        $seller_email = mysqli_query($connection,$seller_email);
        if(!($seller_email)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $selleremail = mysqli_fetch_row($seller_email);
        $sellerselectmail = $selleremail[0];
        $sellerselectfirstname = $selleremail[1];
        $sellerselectlastname = $selleremail[2];
        
        $subject = "Sorry! We need to remove your notes From our portal ";
        $msg = "<h1>Hello $sellerselectfirstname $sellerselectlastname</h1><br>";
        $msg .= "<p>We Want to inform you that, your note $unpublish_title has removed from the poratal</p>";
        $msg .= "<p>Please find our remarks as below - <br>$unpublish_remarks</p><br>";
        $msg .= "<h1>Regards,<br>NotesMarketPlace";
        $mail->setFrom("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->setFrom("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->addAddress($sellerselectmail);
        $mail->addReplyTo("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->isHtml(true);
        $mail->Subject = $subject ;
        $mail->Body = $msg;

        if(!$mail->send()){
            echo "<script>alert('something went wrong');</script>";
        }
        else{
            echo "<script>window.location.href='publishednotes.php';</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Published Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/publishednotes/publishednotes.css">
    <link rel="stylesheet" href="css/publishednotes/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">

            <div class="published-notes">

                

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Published Notes</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12">
                    ``<?php

                            $select_seller = mysqli_query($connection,"SELECT DISTINCT(seller) AS seller FROM downloads");
                            if(!($select_seller)){
                                die("QUERY FAILED".mysqli_error($connection));
                            }

                       ?>
                        <form class="select-form">
                        <div class="form-group">
                            <label for="inputSeller" id="seller-label">Seller</label>
                            <select id="inputSeller" class="form-control custom-select">
                                
                                <?php
                                    if(isset($_GET['publish'])){
                                        $getseller = $_GET['publish'];        
                                        $getsellerquery = mysqli_query($connection,"SELECT firstname FROM users WHERE ID = $getseller");
                                        if(!($getsellerquery)){
                                            die("QUERY FAILED".mysqli_error($connection));

                                        }
                                        $getsellerrow = mysqli_fetch_row($getsellerquery);
                                        $getsellerfirstname = $getsellerrow[0];
                                        echo "<option value='$getsellerfirstname'>$getsellerfirstname</option>";
                                    }
                                    else{
                                        echo '<option value="">Select seller</option>';
                                        while($sellerrow = mysqli_fetch_assoc($select_seller)){
                                            $seller_dropdown = $sellerrow['seller'];
                                            $user_dropdown = mysqli_query($connection,"SELECT firstname FROM users WHERE ID = $seller_dropdown");
                                            if(!($user_dropdown)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            $user_selectrow = mysqli_fetch_row($user_dropdown);
                                            $userfirstname = $user_selectrow[0];
                                            echo "<option value='$userfirstname'>$userfirstname</option>";
                                        }
                                    }


                                ?>
                                
                            </select>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-8 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                id="search">
                            <img src="images/Dashboard/search.jpg" alt="search" class="search-icon"></div>
                            <div id="search-btn">
                            <button class="btn btn-search" type="submit">Search</button></div>

                        </form>
                    </div>
                </div>
                <?php
                    $publish_query = "SELECT * FROM sellernotes WHERE status = 9";
                    if(isset($_GET['publish'])){
                        $publish_query .= " AND sellerid=$getseller";
                    }
                    $publish_query .= " ORDER BY publisheddate DESC";
                    $publish_query = mysqli_query($connection,$publish_query);
                    if(!($publish_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                ?>
               <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>

                            <th scope="col">NOTE TITLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">SELL Type</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">SELLER</th>
                            <th scope="col">PUBLISHED DATE</th>
                            <th scope="col">APPROVED BY</th>
                            <th scope="col">NUMBER OF DOWNLOADS</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j =1;
                            while($row = mysqli_fetch_assoc($publish_query)){
                                $noteid = $row['ID'];
                                $title = $row['Title'];
                                $category = $row['Category'];
                                $cat_query = mysqli_query($connection,"SELECT NAME FROM notecategories WHERE id = $category");
                                if(!($cat_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $cat_row = mysqli_fetch_row($cat_query);
                                $category = $cat_row[0];
                                $selltype = $row['IsPaid'];
                                if($selltype == 0){
                                    $selltype = "Free";
                                }
                                else if($selltype == 1){
                                    $selltype = "PAID";
                                }
                                $sellprice = $row['SellingPrice'];
                                $count_dwld = "SELECT * FROM downloads WHERE noteid = $noteid AND isattachmentdownloaded = 1 GROUP BY noteid,downloader,createddate";
                                $count_dwld = mysqli_query($connection,$count_dwld);
                                if(!($count_dwld)){
                                    die("QUERY FAILED1".mysqli_error($connection));
                                }
                                $dwld_count = mysqli_num_rows($count_dwld);
                                $seller_id = $row['SellerID'];
                                $publisher_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $seller_id");
                                if(!($publisher_query)){
                                    die("QUERY FAILED2".mysqli_error($connection));
                                }
                                $publisher_row = mysqli_fetch_row($publisher_query);
                                $publisher_firstname = $publisher_row[0];
                                $publisher_lastname = $publisher_row[1];
                                $published_date = $row['PublishedDate'];
                                $published_date = date('d-m-Y, h:i',strtotime($published_date));
                                $actionby = $row['ActionedBy'];
                                $actionbyquery = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE id = $actionby");
                                if(!($actionbyquery)){
                                    die("QUERY FAILED3".mysqli_error($connection));
                                }
                                $actionbyrow = mysqli_fetch_row($actionbyquery);
                                $actionby_firstname = $actionbyrow[0];
                                $actionby_lastname = $actionbyrow[1];
                                
                        ?>
                        <tr>
                            <th scope="row"><?php echo $j++; ?></th>
                            <td><a href="admin_notedetails.php?note=<?php echo $noteid; ?>" style="color:#6255a5"><?php echo $title; ?></a></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $selltype; ?></td>
                            <td><?php echo $sellprice; ?></td>
                            <td><?php echo $publisher_firstname; ?> <?php echo $publisher_lastname; ?><a href="memberdetail.php?id=<?php echo $seller_id;?>"><img src="images/eye.png"></a></td>
                            <td><?php echo $published_date; ?></td>
                            <td><?php echo $actionby_firstname; ?> <?php echo $actionby_lastname; ?></td>
                            <td><a href="downloadednotes.php?note=<?php echo $noteid; ?>" style="color:#6255a5"><?php echo $dwld_count; ?></a></td>

                            <td>
                            <div class="dropdown">
                                            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                                <a class="dropdown-item" href="downloadpdf.php?id=<?php echo $noteid; ?>">Download Note</a>
                                                <a class="dropdown-item" href="admin_notedetails.php?note=<?php echo $noteid; ?>">View More Details</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#r<?php echo ($j-1); ?>">Unpublish</a>
                                            </div>

                                    </div>
                            </td>
                            <div class="modal fade" id="r<?php echo ($j-1); ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">UnPublish</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                    
                                                        <div class="form-group">
                                                            <label for="Title">Title</label>
                                                            <input id="<?php echo $title;?>" class="form-control" type="text" value="<?php echo $title;?>" name="title"
                                                                readonly>
                                    
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlTextarea1" id="remarks">Remarks</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="remarks"
                                                                required></textarea>
                                                        </div>
                                                        
                                                        <input type="hidden" value="<?php echo $noteid; ?>" name="noteid">
                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" name="unpublish">UnPublish</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </tr>
                        <?php
                            }
                        ?>
                        
                        
                    </tbody>
                </table></div>
            </div>
            
        </div>
    </div>



    </div>

    <hr>

    <?php
        include "includes/admin_footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready( function () {
        var table = $('table').DataTable({
                'sDom' : '"top"i',
                "iDisplayLength":5,
                "binfo":false,
                
                language:{
                    paginate:{
                        next:'<img src="images/images/right-arrow.png">',
                        previous:'<img src="images/images/left-arrow.png">'
                    }
                },
                columnDefs:[{
                    targets:[9],
                    orderable:false,
                }]
                
            }

            );
        $('select').change(function(){
            var x = $(this).val();
            table.columns(5).search(x).draw(); 
        });
        $('.btn-search').click(function(){
            var x = $('#search').val();
            var y = $('select').val();
            table.search(x).columns(5).search(y).draw();
        });

        });
    </script>
    <script>
        $('.btn-danger').click(function(){
            if(confirm("Do you want to Unpublish this note")){
                

                return true;
            }
            else{

                return false;

            }
        })
    </script>
</body>

</html>
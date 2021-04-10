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
            echo "<script>window.location.href='admin_dashboard.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/admin_dashboard/admin_dashboard.css">
    <link rel="stylesheet" href="css/admin_dashboard/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="admin-dashboard">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">

                            <h2>Dashboard</h2>

                        </div>
                    </div>
                    <?php
                        $publish_count = mysqli_query($connection,"SELECT * FROM sellernotes WHERE status = 8");
                        if(!($publish_count)){
                            die("QUERY FAILED".mysqli_error($connection));
                        }
                        $publish_count_row = mysqli_num_rows($publish_count);

                    ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="square-box text-center">
                            <h2><a href="notesunderreview.php" style="color:#6255a5"><?php echo $publish_count_row; ?></a></h2>
                            <p>Number Of notes in review for Publish</p>
                        </div>
                    </div>
                    <?php

                        $dwld_week_count = "SELECT * FROM downloads WHERE seller != downloader AND attachmentdownloadeddate >= now() - INTERVAL 1 week AND isattachmentdownloaded = 1 GROUP BY noteid,downloader,createddate";
                        $dwld_week_count = mysqli_query($connection,$dwld_week_count);
                        if(!($dwld_week_count)){
                            die("QUERY FAILED".mysqli_error($connection));
                        }
                        $dwld_week_count_row = mysqli_num_rows($dwld_week_count);

                    ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="square-box text-center">
                            <h2><a href="downloadednotes.php" style="color:#6255a5"><?php echo $dwld_week_count_row; ?></a></h2>
                            <p>Number Of new notes downloaded (last seven days)</p>
                        </div>
                    </div>
                    <?php

                        $user_week_count = "SELECT * FROM users WHERE roleid = 3 AND createddate >= now() - INTERVAL 1 week";
                        $user_week_count = mysqli_query($connection,$user_week_count);
                        if(!($user_week_count)){
                            die("QUERY FAILED".mysqli_error($connection));
                        }
                        $user_week_count_row = mysqli_num_rows($user_week_count);

                    ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="square-box text-center">
                            <h2><a href="members.php" style="color:#6255a5"><?php echo $user_week_count_row; ?></a></h2>
                            <p>Number Of new Registration (last seven days)</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="admin-dashboard-table">

                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="table-heading">
                            <h2>Published Notes</h2>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                        <form class="form-inline" id="dashboard-form" method="post">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search">
                                <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search " type="button">Search</button>
                                <?php
                                    $months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                    $currentmonth = date('M');
                                    $key = array_search($currentmonth,$months);
                                ?>
                                
                                    <select class="month form-control custom-select" name="month">
                                        
                                        <?php
                                            $month_count = 1;
                                            $key_count = 0;
                                            while($month_count <=6){
                                                $month = $months[$key];
                                                $key_count = $key + 1;
                                                if(isset($_POST['month']) && $_POST['month'] == $key_count){
                                                    echo "<option value='$key_count' selected>$month</option>";    
                                                }
                                                else{
                                                    echo "<option value='$key_count'>$month</option>";
                                                }
                                                
                                                
                                                $key = $key - 1;
                                                if($key < 0){
                                                    $key =11;
                                                }
                                                
                                                $month_count = $month_count + 1;
                                            }
                                            
                                        ?>
                                    
                                    </select>
                                    
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
                <?php

                    $publish_query = "SELECT * FROM sellernotes WHERE status = 9";
                    if(isset($_POST['month'])){
                        $selectmonth = $_POST['month'];
                        $publish_query .= " AND month(publisheddate) = $selectmonth";
                    }
                    else{
                        
                        $key = array_search($currentmonth,$months) + 1;
                        $publish_query .= " AND month(publisheddate) = $key";
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
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">ATACHMENT SIZE</th>

                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>

                                <th scope="col">PUBLISHER</th>
                                <th scope="col">PUBLISHED DATE</th>
                                <th scope="col">NUMBER OF DOWNLOADS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sizes = array("Bytes", "KB", "MB" ,"GB");
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
                                    $publisheddate = $row['PublishedDate'];
                                    $publisheddate = date('d M Y h:i:s',strtotime($publisheddate));
                                    $attachment_query = mysqli_query($connection,"SELECT * FROM sellernotesattachments WHERE noteid = $noteid");
                                    if(!($attachment_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $size = 0;
                                    while($attachment_row = mysqli_fetch_assoc($attachment_query)){
                                        $filepath = $attachment_row['FilePath'];
                                        $size = $size + filesize("../".$filepath);
                                    }
                                    $attachment_size = round($size/pow(1024,($i = floor(log($size,1024)))),2).$sizes[$i];
                                    $count_dwld = "SELECT * FROM downloads WHERE noteid = $noteid AND isattachmentdownloaded = 1 GROUP BY noteid,downloader,createddate";
                                    $count_dwld = mysqli_query($connection,$count_dwld);
                                    if(!($count_dwld)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $dwld_count = mysqli_num_rows($count_dwld);
                                    $seller_id = $row['SellerID'];
                                    $publisher_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $seller_id");
                                    if(!($publisher_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $publisher_row = mysqli_fetch_row($publisher_query);
                                    $publisher_firstname = $publisher_row[0];
                                    $publisher_lastname = $publisher_row[1];

                            ?>
                            <tr>
                                <th scope="row"><?php echo $j++; ?></th>
                                <td><a href="admin_notedetails.php?note=<?php echo $noteid; ?>" style="color:#6255a5"><?php echo $title; ?></a></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $attachment_size; ?></td>
                                <td><?php echo $selltype; ?></td>
                                <td><?php echo $sellprice; ?></td>
                                <td><?php echo $publisher_firstname; ?> <?php echo $publisher_lastname; ?></td>
                                <td><?php echo $publisheddate; ?></td>
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
                                                <form method="post" action="admin_dashboard.php">
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
                    </table>
                </div>
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
        
        $('.btn-search').click(function(){
            var x = $('#search').val();
            
            table.search(x).draw();
        });

        });
    </script>
    <script>
        $('select').change(function(){
            //var month= $(this).val();
            $('#dashboard-form').submit();


        
        })
    </script>
    <script>
        $('.table-responsive').on('click','.btn-danger',function(){
            
            if(confirm("Do you want to Unpublish this note")){
                

                return true;
            }
            else{

                return false;

            }
        });
    </script>
</body>

</html>
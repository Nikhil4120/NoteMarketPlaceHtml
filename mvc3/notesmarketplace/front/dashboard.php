<?php
    include "../db.php";
?>
<?php
    session_start();
?>
<?php
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] != 3){
        header('location: ../admin/admin_dashboard.php');
    }
?>
<?php
    if(isset($_SESSION['ID'])){

        $id = $_SESSION['ID'];
        $query = "SELECT * FROM users WHERE ID = $id ";
        $select_user_query = mysqli_query($connection,$query);
        if(!($select_user_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($select_user_query);
        $select_firstname = $row['FirstName'];
        $select_lastname = $row['LastName'];
        $select_email = $row['EmailID']; 
    }
    else{
        header("Location: ../login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/dashboard/dashboard.css">
    <link rel="stylesheet" href="css/dashboard/responsive.css">

</head>
<?php
    if(isset($_GET['delete'])){
        
        $delete = $_GET['delete'];
        $delete_row = "DELETE FROM sellernotes WHERE title = '{$delete}' ";
        $delete_row_query = mysqli_query($connection,$delete_row);
        if(!($delete_row_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header("Location: /notesmarketplace/front/dashboard.php");
    }
?>
<body>
    <?php
        $page = "dashboard";
        include "includes/reg_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <section id="dashboard">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="heading">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <form class="form-inline" action="add-notes.php">

                            <button class="btn btn-add-note" type="submit">ADD NOTE</button>
                        </form>
                    </div>
                </div>

                <div id="dashboard-details">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-12 remove-col-right-padding">
                                    <div id="my-earning">
                                        <div class="stat-item text-center">
                                            <img src="images/Dashboard/earning-icon.svg">
                                            <h2>My Earning</h2>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-8 col-sm-8 col-12 remove-col-left-padding">
                                    <div id="sold-earn">
                                    
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-6">
                                            <?php
                                                $sold_query = "SELECT * FROM downloads WHERE seller = $id AND isattachmentdownloaded = 1 AND seller != downloader GROUP BY downloader,noteid";
                                                $sold_notes_query = mysqli_query($connection,$sold_query);
                                                if(!($sold_notes_query)){
                                                    die("QUERY FAILED".mysqli_error($connection));
                                                }
                                                $sold_notes_count = mysqli_num_rows($sold_notes_query);
                                            ?>

                                                <div class="stat-item text-center">
                                                    <a href="mysoldnotes.php"><h2><?php echo $sold_notes_count;?></h2></a>
                                                    <p>No. Of Notes Sold</p>
                                                </div>
                                            </div>
                                            <?php 
                                                $earn = 0; 
                                                if($sold_notes_count != 0){
                                                    while($row = mysqli_fetch_assoc($sold_notes_query)){
                                                        $purchasedprice = (int)$row['PurchasedPrice'];
                                                        $earn = $earn + $purchasedprice;
                                                    }
                                                }

                                            ?>
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <div class="stat-item text-center">
                                                    <a href="mysoldnotes.php"><h2><?php echo $earn; ?></h2></a>
                                                    <p>Money Earned</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-6">
                                    <div class="dashboard-square">
                                    <?php
                                        $download_query = mysqli_query($connection,"SELECT * FROM downloads WHERE downloader = $id AND issellerhasalloweddownload=1 AND seller != downloader GROUP BY noteid");
                                        if(!($download_query)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }
                                        $download_count = mysqli_num_rows($download_query);
                                    ?>
                                        <div class="stat-item text-center">
                                            <a href="mydownloads.php"><h2><?php echo $download_count; ?></h2></a>
                                            <p>My Downloads</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-6">
                                    <div class="dashboard-square">
                                        <?php
                                            $reject_query = mysqli_query($connection,"SELECT * FROM sellernotes WHERE status = 10 AND sellerid = $id");
                                            if(!($reject_query)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            $reject_count = mysqli_num_rows($reject_query);
                                        ?>
                                        <div class="stat-item text-center">
                                            <a href="myrejectednotes.php"><h2><?php echo $reject_count; ?></h2></a>
                                            <p>My Rejected Notes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-12">
                                    <div class="dashboard-square custom-class">
                                        <?php
                                            $buyerrequest_query = mysqli_query($connection,"SELECT * FROM downloads WHERE seller = $id AND downloader != $id AND issellerhasalloweddownload = 0 AND ispaid = 1 GROUP BY noteid,downloader");
                                            if(!($buyerrequest_query)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            $buyerrequest_count = mysqli_num_rows($buyerrequest_query);
                                        ?>
                                        <div class="stat-item text-center">
                                            <a href="buyerrequest.php"><h2><?php echo $buyerrequest_count; ?></h2></a>
                                            <p>Buyer Requests</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <section id="dashboard-table-1">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="heading">
                            <h2>In Progress Notes</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <form class="form-inline">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-7">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search" id="search" name="search1">
                                    <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                                </div>
                                <div class="col-md-4 col-sm-4 col-5">
                                    <button class="btn btn-search " type="button" id="search-btn">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                
                <?php

                    $query = "SELECT sellernotes.CreatedDate As CreatedDate,sellernotes.Title,notecategories.Name,sellernotes.ID AS ID,referencedata.value AS Value FROM sellernotes LEFT JOIN referencedata ON sellernotes.status = referencedata.ID LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                    $query .= " WHERE sellerid = $id AND (sellernotes.status= 6 OR sellernotes.status= 7 OR sellernotes.status= 8) "; 
                    
                    
                    

                    $select_progress_query = mysqli_query($connection,$query);
                    
                    if(!($select_progress_query)) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    

                ?>
                <div class="table-responsive">
                    <table class="table" id="progress-notes">
                        <thead>
                            <tr>
                                <th scope="col">ADDED DATE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_assoc($select_progress_query)){
                                
                                $date = $row['CreatedDate'];
                                $date = date('d-m-Y',strtotime($date));
                                $title = $row['Title'];
                                $category = $row['Name'];
                                $status = $row['Value'];
                                $ID = $row['ID'];
                            ?>
                            <tr>

                                <th scope="row"><?php echo $date; ?></th>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $status; ?></td>
                                <?php
                                    if($status == "Draft"){
                                       echo "<td><a href='edit-notes.php?edit=$ID'><img src='images/Dashboard/edit.png'></a><a href='?delete=$title' id='dlt-link' onclick='return chk()'><img src='images/images/delete.png'
                                       class='delete'></td>";
                                    }
                                    else{
                                        echo "<td><a href='note-details.php?note=$title'><img src='images/eye.png'></a></td>";
                                    }
                                ?>
                                



                             </tr>
                            <?php
                            }
                            ?>
                           
                        </tbody>
                    </table>
                    </div>
                
                
            </section>
            
            <section id="dashboard-table-2">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Published notes</h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">

                        <form class="form-inline">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-8">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search" id="search-1">
                                    <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                                </div>
                                <div class="col-4 col-sm-4 col-4">
                                    <button class="btn btn-search " type="button" id="publish-search-btn">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                
                
                <?php
                    $query = "SELECT * FROM sellernotes LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                    $query .= " WHERE sellerid = $id AND sellernotes.status= 9"; 
                    
                    $select_publish_query = mysqli_query($connection,$query);
                    if(!($select_publish_query)){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    
                    

                    
                ?>
                <div class="table-responsive">
                    <table class="table" id="publish-notes">
                        <thead>
                            <tr>
                                <th scope="col">ADDED DATE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">Sell Type</th>
                                <th scope="col">Price</th>
                                <th scope="col">ACTIONS</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            while($row=mysqli_fetch_assoc($select_publish_query)){
                                $date = $row['CreatedDate'];
                                $date = date('d-m-Y',strtotime($date));
                                $title = $row['Title'];
                                $category = $row['Name'];
                                $sell_type = $row['IsPaid'];
                                $sell_price = $row['SellingPrice'];
                            
                        ?>
                            <tr>

                                <th scope="row"><?php echo $date; ?></th>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $category; ?></td>
                                <?php
                                    if($sell_type == 0){
                                        $sell_type = "Free";
                                    } 
                                    else{
                                        $sell_type = "Paid";
                                    }
                                
                                ?>
                                <td><?php echo $sell_type; ?></td>
                                <td><?php echo $sell_price; ?></td>
                                <td><a href="note-details.php?note=<?php echo $title; ?>"><img src="images/eye.png"></a></td>



                            </tr>
                        <?php
                            }
                        ?>
                            
                        </tbody>
                    </table>
                    
                </div>
            </section>
            
        </div>



    </div>

    <hr>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        function chk(){
            if(confirm("Do You Really Want to delete this note?")){
                return true;
            }
            else{
                return false;
            }
        } 
    </script>
    <script>
        $(document).ready( function () {
        var progresstable = $('#progress-notes').DataTable({
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
                    targets:[4],
                    orderable:false,
                }]
                
            }

            );
        $('#search-btn').click(function(){
            var x = $('#search').val();
            
            progresstable.search(x).draw();
        });

        
        var publishtable = $('#publish-notes').DataTable({
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
                    targets:[5],
                    orderable:false,
                }]

                
            });

            
        $('#publish-search-btn').click(function(){
            var x = $('#search-1').val();
            
            publishtable.search(x).draw();
        });

        });
    </script>
</body>

</html>
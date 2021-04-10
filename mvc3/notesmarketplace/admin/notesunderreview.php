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
    else{
        $actionid = $_SESSION['ID'];
    }    
?>
<?php
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] == 3){
        header('location: ../login.php');
    }
?>
<?php

    if(isset($_GET['approve'])){
        $approve_id = $_GET['approve'];
        
        $approve_query = "UPDATE sellernotes SET status = 9 , actionedby = $actionid , publisheddate = now() WHERE ID=$approve_id";
        $approve_query = mysqli_query($connection,$approve_query);
        if(!($approve_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('location: notesunderreview.php');
    }

?>
<?php
    if(isset($_POST['reject'])){
        $reject_id = $_POST['rejectid'];
        $remarks = $_POST['remarks'];
        $reject_query = "UPDATE sellernotes SET status =10 , actionedby = $actionid , adminremarks = '{$remarks}'  WHERE ID=$reject_id";
        $reject_query=mysqli_query($connection,$reject_query);
        if(!($reject_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }        
    }

?>
<?php
    if(isset($_GET['inreview'])){
        $inreview_id = $_GET['inreview'];
        $inreview_query = "UPDATE sellernotes SET status = 8 , actionedby = $actionid WHERE ID=$inreview_id";
        $inreview_query = mysqli_query($connection,$inreview_query);
        if(!($inreview_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('location: notesunderreview.php');
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Under Review</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/notesunderreview/notesunderreview.css">
    <link rel="stylesheet" href="css/notesunderreview/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">

            <div class="notes-underreview">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Notes Under Review</h2>
                        </div>
                    </div>
                    <?php
                        $select_dropdown_query = "SELECT DISTINCT(sellerid) AS SellerID FROM sellernotes WHERE (status = 7 OR status = 8)";
                        
                        $select_dropdown_query = mysqli_query($connection,$select_dropdown_query);
                        if(!($select_dropdown_query)){
                            die("QUERY FAILED".mysqli_error($connection));
                        }
                    ?>
                    <div class="col-md-4 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="inputSeller" id="seller-label">Seller</label>
                            <select id="inputSeller" class="form-control custom-select">
                                <?php
                                if(!isset($_GET['seller'])){
                                    echo '<option value="">Select Seller</option>';
                                    while($row = mysqli_fetch_assoc($select_dropdown_query)){
                                        $sellerid = $row['SellerID'];
                                        $user_dropdown = mysqli_query($connection,"SELECT ID,firstname FROM users WHERE ID = $sellerid");
                                        if(!($user_dropdown)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }
                                        $user_row = mysqli_fetch_row($user_dropdown);
                                        $user_id = $user_row[0];
                                        $user_name = $user_row[1];
                                        echo "<option value='$user_name'>$user_name</option>";
                                    }
                                }
                                else{
                                        $getseller = $_GET['seller'];        
                                        $getsellerquery = mysqli_query($connection,"SELECT firstname FROM users WHERE ID = $getseller");
                                        if(!($getsellerquery)){
                                            die("QUERY FAILED".mysqli_error($connection));

                                        }
                                        $getsellerrow = mysqli_fetch_row($getsellerquery);
                                        $getsellerfirstname = $getsellerrow[0];
                                        echo "<option value='$getsellerfirstname'>$getsellerfirstname</option>";
                                    }
                                
                                ?>
                                <?php
                                    
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search">
                                <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search" type="button">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    $inreview_query = "SELECT * FROM sellernotes WHERE (status = 7 OR status = 8)";
                    if(isset($_GET['seller'])){
                        $inreview_query .= " AND sellerid=$getseller";
                    }
                    $inreview_query .= " ORDER BY createddate DESC";
                    $inreview_query = mysqli_query($connection,$inreview_query);
                    if(!($inreview_query)){
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
                                <th scope="col">SELLER</th>
                                <th scope="col">DATE ADDED</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTION</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $j = 1;
                             while($row = mysqli_fetch_assoc($inreview_query)){
                            $noteid = $row['ID'];
                            $title = $row['Title']; 
                            $category = $row['Category'];
                            $cat_query = mysqli_query($connection,"SELECT * FROM notecategories WHERE ID = $category");
                            if(!($cat_query)){
                                die("QUERY FAILED".mysqli_error($connection));

                            }
                            $cat_row = mysqli_fetch_assoc($cat_query);
                            $category = $cat_row['Name'];
                            $seller = $row['SellerID'];
                            $seller_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $seller");
                            if(!($seller_query)){
                                die("QUERY FAILED".mysqli_error($connection));
                            } 
                            $user_row = mysqli_fetch_row($seller_query);
                            $firstname = $user_row[0];
                            $lastname = $user_row[1];
                            $date = $row['CreatedDate'];
                            $date = date('j-n-y, h:i',strtotime($date));
                            $status = $row['Status'];
                            if($status == 7){
                                $status = "Submitted For Review"; 
                            }
                            else if($status == 8){
                                $status = "In Review"; 
                            }
                            
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $j++; ?>
                                </th>
                                <td>
                                <a href="admin_notedetails.php?note=<?php echo $noteid; ?>" style="color:#6255a5"><?php echo $title; ?></a>
                                </td>
                                <td>
                                    <?php echo $category; ?>
                                </td>
                                <td>
                                    <?php echo $firstname; ?>
                                    <?php echo $lastname; ?><a href="memberdetail.php?id=<?php echo $seller;?>"><img src="images/eye.png"></a>
                                </td>
                                <td>
                                    <?php echo $date; ?>
                                </td>
                                <td>
                                    <?php echo $status; ?>
                                </td>

                                <td>
                                    <a href="notesunderreview.php?approve=<?php echo $noteid; ?>" role="button"
                                        class="btn btn-approove">Approve</a>
                                    <a role="button" class="btn btn-reject" data-toggle="modal"
                                        data-target="#Modal<?php echo $j-1;?>">Reject</a>

                                    <a href="notesunderreview.php?inreview=<?php echo $noteid; ?>" role="button"
                                        class="btn btn-in-review">
                                        <?php if($status == "In Review"){echo "Mark Under review";}else{echo "Inreview";}?>
                                    </a>

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="admin_notedetails.php?note=<?php echo $noteid; ?>">View More Details</a>
                                            <a class="dropdown-item" href="downloadpdf.php?id=<?php echo $noteid; ?>">Download Note</a>

                                        </div>

                                    </div>
                                </td>
                                <div class="modal fade" id="Modal<?php echo $j-1;?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $title; ?>-<?php echo $category; ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">

                                                            <div class="col-md-12 col-sm-12 col-12 add-margin">

                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1"
                                                                        id="comments">Remarks</label>
                                                                    <textarea class="form-control"
                                                                        id="exampleFormControlTextarea1" rows="5"
                                                                        placeholder="Write Remarks" name="remarks"
                                                                        required></textarea>
                                                                </div>
                                                                <input type="hidden" name="rejectid"
                                                                    value="<?php echo $noteid; ?>">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-reject btn-modal-reject"
                                                        name="reject">Reject</button>
                                                    <button type="button" class="btn btn-cancel"
                                                        data-dismiss="modal">Cancel</button>

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
        $(document).ready(function () {
            var table = $('table').DataTable({
                'sDom': '"top"i',
                "iDisplayLength": 5,
                "binfo": false,
                language: {
                    paginate: {
                        next: '<img src="images/images/right-arrow.png">',
                        previous: '<img src="images/images/left-arrow.png">'
                    }
                },
                columnDefs: [{
                    targets: [6, 7],
                    orderable: false,
                }]

            }

            );
            $('select').change(function () {
                var x = $(this).val();
                
                table.columns(3).search(x).draw();
            });
            $('.btn-search').click(function () {
                var x = $('#search').val();
                var y = $('select').val();
                table.search(x).columns(3).search(y).draw();
            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $('.btn-approove').click(function () {
                if (confirm("if you approve the notes - System Will Publish the notes over portal.Please Press yes to continue..")) {
                    return true;
                }
                else {
                    return false;
                }
            });
            $('.btn-in-review').click(function () {
                if (confirm("Via marking the note review - System will let user know that review process has been initiated.. ")) {
                    return true;
                }
                else {
                    return false;
                }
            });
            $('.btn-modal-reject').click(function () {
                if (confirm("Are you sure you want to reject seller request")) {
                    return true;
                }
                else {
                    return false;
                }
            })
            
        });
    </script>
</body>

</html>
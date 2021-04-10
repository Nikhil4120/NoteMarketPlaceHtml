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

    if(isset($_GET['deactive'])){
        $deactivate_user = $_GET['deactive'];
        $update_user = mysqli_query($connection,"UPDATE users SET isactive = 0 WHERE ID = $deactivate_user");
        if(!($update_user)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $update_notes = mysqli_query($connection,"UPDATE sellernotes SET isactive = 0 , status = 11 WHERE sellerid = $deactivate_user");
        if(!($update_notes)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $update_dwld_notes = mysqli_query($connection,"UPDATE downloads SET isactive = 0  WHERE seller = $deactivate_user");
        if(!($update_dwld_notes)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('location: members.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/members/members.css">
    <link rel="stylesheet" href="css/members/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">

            <div class="members">

                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Members</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search">
                                <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search" type="submit">Search</button>
                            </div>

                        </form>
                    </div>
                </div>
                <?php
                    $member_query = "SELECT * FROM users WHERE roleid = 3 AND isactive = 1 ORDER BY createddate";
                    $member_query = mysqli_query($connection,$member_query);
                    if(!($member_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">FIRST NAME</th>
                                <th scope="col">LAST NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">JOINING DATE</th>
                                <th scope="col">UNDER REVIEW NOTES</th>
                                <th scope="col">PUBLISHED NOTES</th>
                                <th scope="col">DOWNLOADED NOTES</th>

                                <th scope="col">TOTAL EXPENSES</th>
                                <th scope="col">TOTAL EARNINGS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $j = 1;
                                while($row = mysqli_fetch_assoc($member_query)){
                                    $userid = $row['ID'];
                                    $firstname = $row['FirstName'];
                                    $lastname = $row['LastName'];
                                    $email = $row['EmailID'];
                                    $joiningdate = $row['CreatedDate'];
                                    $joiningdate = date('d-m-Y, h:i');
                                    $notes_under_review_query = "SELECT * FROM sellernotes WHERE sellerid = $userid AND (status = 7 OR Status = 8)";
                                    $notes_under_review_query = mysqli_query($connection,$notes_under_review_query);
                                    if(!($notes_under_review_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $notes_under_review_count = mysqli_num_rows($notes_under_review_query);
                                    $publish_notes_query = "SELECT * FROM sellernotes WHERE sellerid = $userid AND status = 9";
                                    $publish_notes_query = mysqli_query($connection,$publish_notes_query);
                                    if(!($publish_notes_query)){

                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $publish_notes_count = mysqli_num_rows($publish_notes_query);
                                    $downloaded_notes_query = "SELECT * FROM downloads WHERE downloader = $userid";
                                    $downloaded_notes_query = mysqli_query($connection,$downloaded_notes_query);
                                    if(!($downloaded_notes_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $downloaded_notes_count = mysqli_num_rows($downloaded_notes_query);
                                    $total_expenses_query = "SELECT * FROM downloads WHERE downloader = $userid AND seller != downloader AND isattachmentdownloaded = 1 GROUP BY noteid,downloader ";
                                    $total_expenses_query = mysqli_query($connection,$total_expenses_query);
                                    if(!($total_expenses_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $total_expenses = 0; 
                                    while($expenses_row = mysqli_fetch_assoc($total_expenses_query)){
                                        $expense_price = $expenses_row['PurchasedPrice'];
                                        $total_expenses = $total_expenses + $expense_price; 
                                    }
                                    $total_earn_query = "SELECT * FROM downloads WHERE seller = $userid AND seller != downloader AND isattachmentdownloaded = 1 GROUP BY noteid,downloader ";
                                    $total_earn_query = mysqli_query($connection,$total_earn_query);
                                    if(!($total_earn_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $total_earn = 0; 
                                    while($earn_row = mysqli_fetch_assoc($total_earn_query)){
                                        $earn_price = $earn_row['PurchasedPrice'];
                                        $total_earn = $total_earn + $earn_price; 
                                    }

                            ?>
                            <tr>
                                <th scope="row"><?php echo $j++; ?></th>
                                <td><?php echo $firstname; ?></td>
                                <td><?php echo $lastname; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $joiningdate; ?></td>
                                <td><a href="notesunderreview.php?seller=<?php echo $userid; ?>" style="color:#6255a5;"><?php echo $notes_under_review_count; ?></a></td>
                                <td><a href="publishednotes.php?publish=<?php echo $userid; ?>" style="color:#6255a5;"><?php echo $publish_notes_count; ?></a></td>
                                <td><a href="downloadednotes.php?buyer=<?php echo $userid; ?>" style="color:#6255a5;"><?php echo $downloaded_notes_count; ?></td>
                                <td><a href="downloadednotes.php?buyer=<?php echo $userid; ?>" style="color:#6255a5;"><?php echo $total_expenses; ?></a></td>
                                <td><?php echo $total_earn; ?></td>
                                <td>
                                    
                                    <div class="dropdown">
                                            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="memberdetail.php?id=<?php echo $userid;?>">View More Details</a>
                                            <a class="dropdown-item deactivate" href="members.php?deactive=<?php echo $userid;?>" >Deactivate</a>    
                                                

                                            </div>

                                    </div>
                                </td>
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
                    targets:[10],
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
        $(function(){
            $('.deactivate').click(function(){
                if(confirm('Are you sure you want to make this member inactive?')){
                    return true;
                }
                else{
                    return false;
                }
            })
        });
    </script>
</body>

</html>
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

    if(isset($_GET['id'])){
        $memberid = $_GET['id'];
        $member_user_query = mysqli_query($connection,"SELECT * FROM users WHERE id = $memberid"); 
        if(!($member_user_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $member_user_row = mysqli_fetch_assoc($member_user_query);
        $firstname = $member_user_row['FirstName'];
        $lastname = $member_user_row['LastName'];
        $email = $member_user_row['EmailID'];
        $member_query = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $memberid");
        if(!($member_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $member_row = mysqli_fetch_assoc($member_query);
        $dob = $member_row['DOB'];
        $dob = date('d-m-Y',strtotime($dob)); 
        $phone = $member_row['Phonenumber'];
        $college = $member_row['College'];
        $add1 = $member_row['AddressLine1'];
        $add2 = $member_row['AddressLine2'];
        $city = $member_row['City'];
        $state = $member_row['State'];
        $country = $member_row['Country'];
        $zipcode = $member_row['ZipCode'];
        $profile_picture = $member_row['ProfilePicture'];
        $country_query = mysqli_query($connection,"SELECT Name FROM countries WHERE ID = $country");
        if(!($country_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $country_row = mysqli_fetch_row($country_query);
        $country = $country_row[0];
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/memberdetail/memberdetail.css">
    <link rel="stylesheet" href="css/memberdetail/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="member-detail">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Member Details</h2>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                        <div id="member-image">
                            <img src="../uploads/Members/<?php echo $memberid;?>/<?php echo $profile_picture;?>" class="member-img">
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">First Name:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $firstname; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Last Name:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $lastname; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Email:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $email; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">D.O.B:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $dob; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Phone Number:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $phone; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">College/University:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $college; ?></h4>
                            </div>
                            
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Address-1:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $add1; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Address-2:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $add2; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">City:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $city; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">State:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $state; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Country:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $country; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Zipcode:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value"><?php echo $zipcode; ?></h4>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
            <hr>
            <div class="member-detail-table">
                <div class="table-heading">
                    <h2>Notes</h2>
                </div>
                <?php
                    $seller_table_query = "SELECT * FROM sellernotes WHERE sellerid = $memberid AND status != 6 AND status != 11";
                    $seller_table_query = mysqli_query($connection,$seller_table_query);
                    if(!($seller_table_query)){
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
                            <th scope="col">STATUS</th>
                            <th scope="col">DOWNLOADED NOTES</th>
                            <th scope="col">TOTAL EARNINGS</th>
                            <th scope="col">DATE ADDED</th>
                            <th scope="col">PUBLISHED DATE</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j = 1;
                            while($row = mysqli_fetch_assoc($seller_table_query)){
                                $title = $row['Title'];
                                $category = $row['Category'];
                                $cat_query = mysqli_query($connection,"SELECT Name FROM notecategories WHERE ID = $category");
                                if(!($cat_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $cat_row = mysqli_fetch_row($cat_query);
                                $category = $cat_row[0];
                                $status = $row['Status'];
                                $status_query = mysqli_query($connection,"SELECT Value FROM referencedata WHERE ID = $status");
                                if(!($status_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }     
                                $status_row = mysqli_fetch_row($status_query);
                                $status = $status_row[0];
                                $noteid = $row['ID'];
                                $count_download_query = "SELECT * FROM downloads WHERE noteid=$noteid";
                                $count_download_query = mysqli_query($connection,$count_download_query);
                                if(!($count_download_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $count_download = mysqli_num_rows($count_download_query);
                                $total_earnings_query = "SELECT * FROM downloads WHERE seller = $memberid AND seller !=downloader AND noteid=$noteid AND isattachmentdownloaded = 1 GROUP BY noteid,downloader";
                                $total_earnings_query = mysqli_query($connection,$total_earnings_query);
                                if(!($total_earnings_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $total_earning = 0;
                                while($earning_row = mysqli_fetch_assoc($total_earnings_query)){
                                    $purchasedprice = (int)$earning_row['PurchasedPrice'];
                                    $total_earning = $total_earning + $purchasedprice;
                                } 
                                $createddate = $row['CreatedDate'];
                                $createddate = date('d-n-Y, h:i',strtotime($createddate));
                                $publisheddate = $row['PublishedDate'];
                                if($publisheddate == NULL){
                                    $publisheddate = "NA";
                                }
                                else{
                                    $publisheddate = date('d-n-Y, h:i',strtotime($publisheddate));
                                }

                        ?>
                        <tr>
                            <th scope="row"><?php echo $j++; ?></th>
                            
                            <td><?php echo $title; ?></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $count_download; ?></td>
                            <td><?php echo $total_earning; ?></td>
                            <td><?php echo $createddate; ?></td>
                            <td><?php echo $publisheddate; ?></td>
                            
                            <td>
                                <div class="dropdown">
                                            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                                <a class="dropdown-item" href="downloadpdf.php?id=<?php echo $noteid; ?>">Download Note</a>

                                            </div>

                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        
                        
                    </tbody>
                </table></div>
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
                    targets: [8],
                    orderable: false,
                }]

            }

            );

            


        });
    </script>

</body>

</html>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloaded Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/downloadednotes/downloadednotes.css">
    <link rel="stylesheet" href="css/downloadednotes/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">

            <div class="downloaded-notes">



                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Downloaded Notes</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-12">
                                <?php
                                    $notes_query = mysqli_query($connection,"SELECT DISTINCT(notetitle) AS notetitle FROM downloads");
                                    
                                    if(!($notes_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="inputnotes" id="note-label">Notes</label>
                                    <select id="inputnotes" class="form-control custom-select">
                                        <?php
                                            if(isset($_GET['note'])){
                                                $getnote = $_GET['note'];
                                                $getnotequery = mysqli_query($connection,"SELECT title FROM sellernotes WHERE ID = $getnote");
                                                if(!($getnotequery)){
                                                    die("QUERY FAILED".mysqli_error($connection));
                                                }
                                                $getnoterow = mysqli_fetch_row($getnotequery);
                                                $note_select_id = $getnoterow[0];
                                                echo "<option value='$note_select_id'>$note_select_id</option>";
                                            }
                                            else{
                                                echo '<option value="">Select Notes</option>';
                                                while($noterow = mysqli_fetch_assoc($notes_query)){
                                                    $note_select_id = $noterow['notetitle'];
                                                    echo "<option value='$note_select_id'>$note_select_id</option>";
                                                }
                                            }
                                        ?>
                                        
                                        
                                    </select>
                                </div>
                            </div>
                            <?php
                                    $seller_query = mysqli_query($connection,"SELECT DISTINCT(seller) AS seller FROM downloads");
                                    if(!($seller_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                            ?>
                            <div class="col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputSeller" id="seller-label">Seller</label>
                                    <select id="inputSeller" class="form-control custom-select">
                                        <option value="" >Select Seller</option>
                                        <?php

                                    while($sellerrow = mysqli_fetch_assoc($seller_query)){
                                        $seller_dropdown = $sellerrow['seller'];
                                        $user_dropdown = mysqli_query($connection,"SELECT firstname FROM users WHERE ID = $seller_dropdown");
                                        if(!($user_dropdown)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }
                                        $user_selectrow = mysqli_fetch_row($user_dropdown);
                                        $userfirstname = $user_selectrow[0];
                                        echo "<option value='$userfirstname'>$userfirstname</option>";
                                    }

                                     ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <?php
                                    $dwlder_query = mysqli_query($connection,"SELECT DISTINCT(downloader) AS downloader FROM downloads where seller != downloader");
                                    if(!($dwlder_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                            ?>
                            <div class="col-md-4 col-sm-4 col-12">

                                <div class="form-group">
                                    <label for="inputbuyer" id="buyer-label">Buyer</label>
                                    <select id="inputbuyer" class="form-control custom-select">
                                        <?php
                                            if(isset($_GET['buyer'])){
                                                $getbuyer = $_GET['buyer'];
                                                $getbuyerquery = mysqli_query($connection,"SELECT firstname FROM users WHERE ID = $getbuyer");
                                                if(!($getbuyerquery)){
                                                    die("QUERY FAILED".mysqli_error($connection));

                                                }
                                                $getbuyerrow = mysqli_fetch_row($getbuyerquery);
                                                $getbuyerfirstname = $getbuyerrow[0];
                                                echo "<option value='$getbuyerfirstname'>$getbuyerfirstname</option>";
                                            }
                                            else{
                                                echo '<option value="">Select Buyer</option>';
                                                while($dwldrow = mysqli_fetch_assoc($dwlder_query)){
                                                    $dwlder_dropdown = $dwldrow['downloader'];
                                                    $user_dropdown = mysqli_query($connection,"SELECT firstname FROM users WHERE ID = $dwlder_dropdown");
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
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-6 col-md-12 col-sm-12 col-12">
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

                    $dwld_notes_query = "SELECT * FROM downloads WHERE seller != downloader AND isattachmentdownloaded = 1 AND isactive = 1";
                    if(isset($_GET['buyer'])){
                        $dwld_notes_query .= " AND downloader = $getbuyer ";
                    }
                    if(isset($_GET['note'])){
                        $dwld_notes_query .= " AND noteid = $getnote ";
                    }
                    $dwld_notes_query .= " GROUP BY noteid,downloader";
                    $dwld_notes_query .= " ORDER BY attachmentdownloadeddate";
                    $dwld_notes_query = mysqli_query($connection,$dwld_notes_query);
                    if(!($dwld_notes_query)){
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
                                <th scope="col">BUYER</th>
                                <th scope="col">SELLER</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>

                                <th scope="col">DOWNLOADED DATE/TIME</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $j = 1;
                            while($row = mysqli_fetch_assoc($dwld_notes_query)){
                                $noteid = $row['NoteID'];
                                $title = $row['NoteTitle'];
                                $category = $row['NoteCategory'];
                                $cat_query = mysqli_query($connection,"SELECT NAME FROM notecategories WHERE ID = $category");
                                if(!($cat_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $cat_row = mysqli_fetch_row($cat_query);
                                $category = $cat_row[0];
                                $buyer = $row['Downloader'];
                                $buyer_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $buyer");
                                if(!($buyer_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $buyer_row = mysqli_fetch_row($buyer_query);
                                $buyer_firstname = $buyer_row[0];
                                $buyer_lastname = $buyer_row[1];
                                $seller = $row['Seller'];
                                $seller_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $seller");
                                if(!($seller_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $seller_row = mysqli_fetch_row($seller_query);
                                $seller_firstname = $seller_row[0];
                                $seller_lastname = $seller_row[1];
                                $selltype = $row['IsPaid'];
                                
                                if($selltype == 0){
                                    $selltype = "FREE";
                                }
                                else{
                                    $selltype = "Paid";
                                }
                                $sellprice = $row['PurchasedPrice'];
                                $createddate = $row['CreatedDate'];
                                $createddate = date('d-m-Y, h:i',strtotime($createddate));

                        ?>
                        <tr>
                                <th scope="row"><?php echo $j++; ?></th>
                                <td><a href="admin_notedetails.php?note=<?php echo $noteid; ?>" style="color:#6255a5"><?php echo $title; ?></a></td>
                                <td><?php echo $category; ?></td>
                                <td><?php echo $buyer_firstname; ?> <?php echo $buyer_lastname; ?><span style="float: right;"><a href="memberdetail.php?id=<?php echo $buyer;?>"><img src="images/eye.png"></a></span></td>
                                <td><?php echo $seller_firstname; ?> <?php echo $seller_lastname; ?><span style="float: right;"><a href="memberdetail.php?id=<?php echo $seller;?>"><img src="images/eye.png"></a></span></td>
                                <td><?php echo $selltype; ?></td>
                                <td><?php echo $sellprice; ?></td>

                                <td><?php echo $createddate; ?></td>


                                <td>
                                <div class="dropdown">
                                            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                                <a class="dropdown-item" href="downloadpdf.php?id=<?php echo $noteid; ?>">Download Note</a>
                                                <a class="dropdown-item" href="admin_notedetails.php?note=<?php echo $noteid; ?>">View More Details</a>
                                                
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
                    targets:[8],
                    orderable:false,
                }]
                
            }

            );
        $('select').change(function(){
            alert("hii");
            var seller = $('#inputSeller').val();
            var buyer = $('#inputbuyer').val();
            var notes = $('#inputnotes').val();
            table.columns(4).search(seller).columns(3).search(buyer).columns(1).search(notes).draw();
        })
        $('.btn-search').click(function(){
            var x = $('#search').val();
            var seller = $('#inputSeller').val();
            var buyer = $('#inputbuyer').val();
            var notes = $('#inputnotes').val();
            table.search(x).columns(4).search(seller).columns(3).search(buyer).columns(1).search(notes).draw();;
        });

        });
    </script>

</body>

</html>
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

if(isset($_GET['approve'])){
    $approve_id = $_GET['approve'];
    $approve_query = "UPDATE sellernotes SET status = 9 WHERE ID=$approve_id";
    $approve_query = mysqli_query($connection,$approve_query);
    if(!($approve_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    header('location: rejectednotes.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejected Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/rejectednotes/rejectednotes.css">
    <link rel="stylesheet" href="css/rejectednotes/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">

            <div class="rejected-notes">



                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Rejected Notes</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12">
                        
                    <?php
                        $select_dropdown_query = "SELECT DISTINCT(sellerid) AS SellerID FROM sellernotes WHERE status = 10";
                        
                        $select_dropdown_query = mysqli_query($connection,$select_dropdown_query);
                        if(!($select_dropdown_query)){
                            die("QUERY FAILED".mysqli_error($connection));
                        }
                    ?>
                        <form class="select-form">
                       
                                <div class="form-group">
                                    <label for="inputSeller" id="seller-label">Seller</label>
                                    <select id="inputSeller" class="form-control custom-select">
                                    <option value="">Select Seller</option>
                                    <?php
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
                            <button class="btn btn-search" type="button">Search</button></div>

                        </form>
                    </div>
                    
                </div>
                <?php

                    $reject_query = "SELECT * FROM sellernotes WHERE status = 10";
                    $reject_query .= " ORDER BY createddate";
                    $reject_query = mysqli_query($connection,$reject_query);
                    if(!($reject_query)){
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
                            <th scope="col">REJECTED BY</th>
                            <th scope="col">REMARK</th>
                            
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j =1;
                            while($row = mysqli_fetch_assoc($reject_query)){
                                $noteid = $row['ID'];
                                $title = $row['Title'];
                                $category = $row['Category'];
                                $cat_query = mysqli_query($connection,"SELECT NAME FROM notecategories WHERE id = $category");
                                if(!($cat_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $cat_row = mysqli_fetch_row($cat_query);
                                $category = $cat_row[0];
                                $sellerid = $row['SellerID'];
                                $seller_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $sellerid");
                                if(!($seller_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $seller_row = mysqli_fetch_row($seller_query);
                                $seller_firstname = $seller_row[0];
                                $seller_lastname = $seller_row[1];
                                $createddate = $row['CreatedDate'];
                                $createddate = date('j-n-Y, h:i',strtotime($createddate));
                                $actionby = $row['ActionedBy'];    
                                $actionby_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $actionby");
                                if(!($actionby_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $action_row = mysqli_fetch_row($actionby_query);
                                $admin_firstname = $action_row[0];
                                $admin_lastname = $action_row[1];
                                $remarks = $row['AdminRemarks'];
                        ?>
                            <tr>
                            <th scope="row"><?php echo $j++; ?></th>
                            <td><a href="admin_notedetails.php?note=<?php echo $noteid; ?>" style="color:#6255a5"><?php echo $title; ?></a></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $seller_firstname; ?> <?php echo $seller_lastname; ?><a href="memberdetail.php?id=<?php echo $sellerid;?>"><img src="images/eye.png"></a></td>
                            <td><?php echo $createddate; ?></td>
                            <td><?php echo $admin_firstname; ?> <?php echo $admin_lastname; ?></td>
                            
                            
                            <td><?php echo $remarks; ?></td>
                            

                            <td>
                            <div class="dropdown">
                                        <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item approve" href="rejectednotes.php?approve=<?php echo $noteid; ?>">Approve</a>
                                            <a class="dropdown-item" href="downloadpdf.php?id=<?php echo $noteid; ?>">Download Note</a>
                                            <a class="dropdown-item" href="admin_notedetails.php?note=<?php echo $noteid; ?>">View More</a>
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
                    targets:[7],
                    orderable:false,
                }]
                
            }

            );
            $('select').change(function () {
                var x = $(this).val();
                
                table.columns(3).search(x).draw();
            });
        $('.btn-search').click(function(){
            var x = $('#search').val();
            var y = $('select').val();
            table.search(x).columns(3).search(y).draw();
            
        });

        });
    </script>

</body>

</html>
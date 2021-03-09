<?php
    include "../db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

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
    <header>
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="images/navbarbanner.png" alt="logo" class="img-responsive">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&#9776;</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="search.html"><span>Search<span class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mysoldnotes.html">Sell<span class="spacing">Your</span><span
                                    class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buyerrequest.html">Buyer<span class="spacing">Requests</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq.html">FAQ</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contactus.html">Contact<span class="spacing">Us</span></a>

                        </li>

                        <li class="nav-item dropdown">

                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="images/Dashboard/user-img.png" alt="client" class="rounded-circle seller">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">My Profile</a>
                                <a class="dropdown-item" href="#">My Downloads</a>
                                <a class="dropdown-item" href="#" style="background-color: #6255a5;">My Sold Notes</a>
                                <a class="dropdown-item" href="#">My Rejected Notes</a>
                                <a class="dropdown-item" href="#">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" style="color: #6255a5;">Logout</a>
                            </div>

                        </li>

                        <li class="nav-item">
                            <form class="form-inline" style="float:none;">

                                <button class="btn btn-outline-success btn-navbar" type="submit">Logout</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
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
                        <form class="form-inline">

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
                                                <div class="stat-item text-center">
                                                    <h2>100</h2>
                                                    <p>No. Of Notes Sold</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <div class="stat-item text-center">
                                                    <h2>$1000000</h2>
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
                                        <div class="stat-item text-center">
                                            <h2>38</h2>
                                            <p>My Downloads</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-6">
                                    <div class="dashboard-square">
                                        <div class="stat-item text-center">
                                            <h2>12</h2>
                                            <p>My Rejected Notes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-12">
                                    <div class="dashboard-square custom-class">
                                        <div class="stat-item text-center">
                                            <h2>102</h2>
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
                                    <button class="btn btn-search " type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];

                    }
                    else{

                        $page = "";
                    }

                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }
                    else{
                        $page_1 = ($page * 5) - 5;
                    }
                ?>
                <?php
                    if(isset($_GET['search1'])){
                        $search1 = $_GET['search1'];
                        $search1_query = " AND (title LIKE '%$search1%'";
                        $search1_query .= " OR name LIKE '%$search1%'";
                        $search1_query .= " OR value LIKE '%$search1%')";
                    }
                ?>
                <?php
                  $find_progress_query =   "SELECT * FROM sellernotes LEFT JOIN referencedata ON sellernotes.status = referencedata.ID LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                  
                  $find_progress_query .= " WHERE (sellernotes.status= 6 OR sellernotes.status= 7 OR sellernotes.status= 8)"; 
                  if(isset($_GET['search1'])){
                    $find_progress_query .= $search1_query;
                  }
                  $count1_query = mysqli_query($connection,$find_progress_query);
                  if(!($count1_query)){
                      die("QUERY FAILED" . mysqli_error($connection));
                  }
                  $count1 = mysqli_num_rows($count1_query);

                ?>
                <?php

                    $query = "SELECT sellernotes.CreatedDate As CreatedDate,sellernotes.Title,notecategories.Name,sellernotes.ID AS ID,referencedata.value AS Value FROM sellernotes LEFT JOIN referencedata ON sellernotes.status = referencedata.ID LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                    $query .= " WHERE (sellernotes.status= 6 OR sellernotes.status= 7 OR sellernotes.status= 8)"; 
                    
                    if(isset($_GET['search1'])){
                        $query .= $search1_query;
                    }
                    $query .= " LIMIT $page_1,5";

                    $select_progress_query = mysqli_query($connection,$query);
                    
                    if(!($select_progress_query)) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    if(mysqli_num_rows($select_progress_query) == 0){
                        echo "<h1>NO RECORD FOUND</h1>";
                    }
                    else{

                ?>
                <div class="table-responsive">
                    <table class="table">
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
                           <!-- <tr>

                                <th scope="row">11-10-2020</th>
                                <td>Accounts</td>
                                <td>Commerce</td>
                                <td>in review</td>
                                <td><img src="images/eye.png"></td>



                            </tr>
                            <tr>

                                <th scope="row">11-10-2020</th>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>Submitted</td>
                                <td><img src="images/eye.png"></td>



                            </tr>
                            <tr>

                                <th scope="row">11-10-2020</th>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td>lorem</td>
                                <td>Submitted</td>
                                <td><img src="images/eye.png"></td>



                            </tr>
                            <tr>

                                <th scope="row">11-10-2020</th>
                                <td>AI</td>
                                <td>IT</td>
                                <td>Draft</td>
                                <td><img src="images/Dashboard/edit.png"><img src="images/images/delete.png"
                                        class="delete">
                                </td>



                            </tr> -->
                        </tbody>
                    </table>
                <?php
                    }
                ?>
                </div>
            </section>
            <section id="pagination-1">
                <nav aria-label="Page navigation example">

                    <ul class="pagination">
                        <?php
                            $count1 = ceil($count1/5);
                        ?>
                        <li class="page-item"><a class="page-link" href="<?php if($page == '' || $page == 1){echo 'dashboard.php?page=1';} else {echo 'dashboard.php?page='.($page-1);}?>"><img src="images/images/left-arrow.png" class="arrow-left"></a></li>
                        <?php
                            for($i=1;$i<=$count1;$i++){
                                if($i == $page ||  ($page == "" && $i==1)){
                                    if(isset($_GET['search1'])){
                                        echo "<li class='page-item'><a class='page-link active' href='dashboard.php?page=$i&search1=$search1'>$i</a></li>";
                                    }
                                    else{
                                        echo "<li class='page-item'><a class='page-link active' href='dashboard.php?page=$i'>$i</a></li>";
                                    }
                                }
                                else{
                                    if(isset($_GET['search1'])){
                                        echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=$i&search1=$search1'>$i</a></li>";
                                    }
                                    else{
                                        echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=$i'>$i</a></li>";
                                    }
                                }
                                
                            }
                        ?>
                        
                        <li class="page-item"><a class="page-link" href="<?php if($page == $count1){echo 'dashboard.php?page='.$count1;} elseif($page == ""){echo 'dashboard.php?page=2';} else {echo 'dashboard.php?page='.($page+1);}?>"><img src="images/images/right-arrow.png" class="arrow-right"></a></li>
                    </ul>
                </nav>
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
                                        aria-label="Search" id="search-1" name="search2">
                                    <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                                </div>
                                <div class="col-4 col-sm-4 col-4">
                                    <button class="btn btn-search " type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    if(isset($_GET['page1'])){
                        $page1 = $_GET['page1'];

                    }
                    else{

                        $page1 = "";
                    }

                    if($page1 == "" || $page1 == 1){
                        $page_2 = 0;
                    }
                    else{
                        $page_2 = ($page1 * 5) - 5;
                    }
                ?>
                <?php
                    if(isset($_GET['search2'])){
                        $search2 = $_GET['search2'];
                        $search2_query = " AND (title LIKE '%$search2%'";
                        $search2_query .= " OR name LIKE '%$search2%'";
                        $search2_query .= " OR sellingprice LIKE '%$search2%')";
                }
                ?>
                <?php
                    $find_publish_query = "SELECT * FROM sellernotes LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                    $find_publish_query .= " WHERE sellernotes.status= 9"; 
                    if(isset($_GET['search2'])){
                        $find_publish_query .= $search2_query;
                    }
                    $count2_query = mysqli_query($connection,$find_publish_query);
                  if(!($count2_query)){
                      die("QUERY FAILED" . mysqli_error($connection));
                  }
                  $count2 = mysqli_num_rows($count2_query);
                ?>
                <?php
                    $query = "SELECT * FROM sellernotes LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                    $query .= " WHERE sellernotes.status= 9"; 
                    if(isset($_GET['search2'])){
                        $query .= $search2_query;
                    }
                    $query .= " LIMIT $page_2,5";
                    $select_publish_query = mysqli_query($connection,$query);
                    if(!($select_publish_query)){
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    if(mysqli_num_rows($select_publish_query) == 0){
                        echo "<h1>NO RECORD</h1>";
                    }
                    else{

                    
                ?>
                <div class="table-responsive">
                    <table class="table">
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
                                <td><img src="images/eye.png"></td>



                            </tr>
                        <?php
                            }
                        ?>
                            <!-- <tr>

                                <th scope="row">10-10-2020</th>
                                <td>Accounts</td>
                                <td>Commerce</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td><img src="images/eye.png"></td>



                            </tr>
                            <tr>

                                <th scope="row">11-10-2020</th>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td><img src="images/eye.png"></td>



                            </tr>
                            <tr>

                                <th scope="row">12-10-2020</th>
                                <td>AI</td>
                                <td>IT</td>
                                <td>Paid</td>
                                <td>$3542</td>
                                <td><img src="images/eye.png"></td>



                            </tr>
                            <tr>

                                <th scope="row">13-10-2020</th>
                                <td>Lorem ipsum dolor, sit amet </td>
                                <td>lorem</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td><img src="images/eye.png"></td>



                            </tr> -->
                        </tbody>
                    </table>
                    <?php
                     }
                    ?>
                </div>
            </section>
            <section id="pagination-2">
                <nav aria-label="Page navigation example">

                    <ul class="pagination">
                        <?php
                            $count2 = ceil($count2/5); 
                        ?>
                        <li class="page-item"><a class="page-link" href="<?php if($page1 == '' || $page1 == 1){echo 'dashboard.php?page1=1';} else {echo 'dashboard.php?page1='.($page1-1);}?>"><img src="images/images/left-arrow.png" class="arrow-left"></a></li>
                        <?php
                            for($i=1;$i<=$count2;$i++){
                                if($i == $page1 ||  ($page1 == "" && $i==1)){
                                    if(isset($_GET['search2'])){
                                        echo "<li class='page-item'><a class='page-link active' href='dashboard.php?page1=$i&search2=$search2'>$i</a></li>";
                                    }
                                    else{
                                        echo "<li class='page-item'><a class='page-link active' href='dashboard.php?page1=$i'>$i</a></li>";
                                    }
                                }
                                else{
                                    if(isset($_GET['search2'])){
                                        echo "<li class='page-item'><a class='page-link' href='dashboard.php?page1=$i&search2=$search2'>$i</a></li>";
                                    }
                                    else{
                                        echo "<li class='page-item'><a class='page-link' href='dashboard.php?page1=$i'>$i</a></li>";
                                    }
                                }
                                
                            }
                        ?>
                        <!-- <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li> -->
                        <li class="page-item"><a class="page-link" href="<?php if($page1 == $count2){echo 'dashboard.php?page1='.$count2;} elseif($page1 == ""){echo 'dashboard.php?page1=2';} else {echo 'dashboard.php?page1='.($page1+1);}?>"><img src="images/images/right-arrow.png" class="arrow-right"></a></li>
                    </ul>
                </nav>
            </section>
        </div>



    </div>

    <hr>
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
                        <li><a href="#"><img src="images/images/facebook.png"></a></li>
                        <li><a href="#"><img src="images/images/twitter.png"></a></li>
                        <li><a href="#"><img src="images/images/linkedin.png"></a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
    <script>
        function chk(){
            if(confirm("yes or no")){
                return true;
            }
            else{
                return false;
            }
        } 
    </script>
</body>

</html>
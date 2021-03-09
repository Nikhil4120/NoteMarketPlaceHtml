<?php
    include "../db.php";
?>
<?php
    session_start();
?>


<?php
   
   if(!(isset($_SESSION['ID']))){
       header("Location: /notesmarketplace/front/login.php");
   }

?>
<?php
    $user_id = $_SESSION['ID'];
    $select_user = "SELECT * FROM users WHERE ID = $user_id";
    $select_user_query = mysqli_query($connection,$select_user);
    if(!($select_user_query)){
        die("QUERY FAILED".mysqli_error);
    }
    $row = mysqli_fetch_assoc($select_user_query);
    $email = $row['EmailID'];
    $firstname = $row['FirstName'];
    $lastname = $row['LastName'];
?>
<?php

    if(isset($_GET['title'])){
        

        $subject = $firstname .  " " . $lastname . " Allows you to download a note";
        $body = "<h2>Hello $firstname, </h2><br>";
        $body .="<p>We Would like to inform that ,$firstname Allows you to download a note ,please login and see My Download tabs to Particular note"; 
        $body .= "<h4>Regards,<br>NotesMarketPlace</h4>";
        require '../phpmailer/PHPMailerAutoload.php';

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->port = 587;
        $mail->SMTPAUTH=true;
        $mail->SMTPSecure='tls';
        $mail->SMTPAuth=true;
        $mail->Username='todoapp4120@gmail.com';
        $mail->Password='nikhil1234';  

        $mail->setFrom("todoapp4120@gmail.com");
        $mail->addAddress($email);
        $mail->addReplyTo("todoapp4120@gmail.com");
        $mail->isHtml(true);
        $mail->Subject = "Email Verification" ;
        $mail->Body = $body;
        $flag = 1;   
        if(!$mail->send()){
            echo "<script>alert('something went wrong');</script>";
        }
        else{
            header("Location: /notesmarketplace/front/buyerrequest.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Request</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/buyerrequest/buyerrequest.css">
    <link rel="stylesheet" href="css/buyerrequest/responsive.css">

</head>

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

                        <li class="nav-item">
                            <img src="images/Dashboard/user-img.png" alt="client" class="rounded-circle seller">
                        </li>

                        <li class="nav-item">
                            <form class="form-inline" style="float: none;">

                                <button class="btn btn-navbar" type="submit">Logout</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <section id="my-downloads">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-12">
                        <div class="heading">
                            <h2>Buyer Request</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-12 my-2 my-lg-0">
                        <form class="form-inline" action="" method="get">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search" name="search">
                                    <img src="images/images/search-icon.png" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search" type="submit" >Search</button>
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
                        $page_1 = ($page * 10) - 10;
                    }
                ?>
            <?php
                $find_request_query = "SELECT * FROM sellernotes LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";
                if(isset($_GET['search'])){

                    $search = $_GET['search'];
                    $find_request_query .= "WHERE sellernotes.Title LIKE '%$search%'";
                    $find_request_query .= " OR  notecategories.Name LIKE '%$search%'";
                    
                    $find_request_query .= " OR sellernotes.SellingPrice LIKE '%$search%' ";
                    

                }
                
                $count_request = mysqli_query($connection,$find_request_query);
                if(!($find_request_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                $count = mysqli_num_rows($count_request);
                

            ?>
                <?php


                    $query = "SELECT * FROM sellernotes LEFT JOIN notecategories ON sellernotes.category = notecategories.ID ";

                    if(isset($_GET['search'])){
                        
                        $search = $_GET['search'];
                        
                        $query .= "WHERE sellernotes.Title LIKE '%$search%'";
                        $query .= " OR notecategories.Name LIKE '%$search%'";
                        
                        $query .= " OR sellernotes.SellingPrice LIKE '%$search%' ";
                        

                    }
                    $query .= "LIMIT $page_1,10";
                    $select_query = mysqli_query($connection,$query);

                    if(!($select_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }

                    
                    if(mysqli_num_rows($select_query) == 0 ){

                        echo "<h1>No Results</h1>";
                    }
                    else{
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
                                    <th scope="col">PHONE NUMBER</th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">DOWNLOAD DATE/TIME</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $j = $page_1 + 1;
                                    while($row = mysqli_fetch_assoc($select_query)){
                                        
                                        $title = $row['Title'];
                                        $category = $row['Category'];
                                        $category_query = "SELECT * FROM Notecategories WHERE ID = $category";
                                        $category_select_query = mysqli_query($connection,$category_query);
                                        if(!($category_select_query)){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        $category_row = mysqli_fetch_assoc($category_select_query);
                                        $category_name = $category_row['Name'];
                                        $IsPaid = $row['IsPaid'];
                                        if($IsPaid == 0){
                                            $IsPaid = "Free";
                                        }
                                        else{
                                            $IsPaid = "Paid";
                                        }
                                        $sellingprice = $row['SellingPrice'];
                                        $time = "12/12/2020";
                                ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $j++; ?></th>
                                    <td><?php echo $title ?></td>
                                    <td><?php echo $category_name ?></td>
                                    <td><?php $email ?></td>
                                    <td>+91 9874563527</td>
                                    <td><?php echo $IsPaid ?></td>
                                    <td><?php echo $sellingprice ?></td>
                                    <td><?php echo $time ?></td>
                                    <td><a href="note-details.php?note=<?php echo $title;?>"><img src="images/eye.png"></a></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="?title=<?php echo $title; ?>">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>

                                <!-- <tr>
                                    <th scope="row">2</th>
                                    <td>Accounts</td>
                                    <td>Commerce</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Paid</td>
                                    <td>$555</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>lorem ipsum</td>
                                    <td>lorem</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Accunts</td>
                                    <td>Commerce</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Paid</td>
                                    <td>$217</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Paid</td>
                                    <td>$555</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Lorem ipsum</td>
                                    <td>lorem</td>
                                    <td>testing123@gmail.com</td>
                                    <td>+91 9874563527</td>
                                    <td>Paid</td>
                                    <td>$155</td>
                                    <td>27 Nov 2020, 11:24:34</td>
                                    <td><i><img src="images/eye.png"></i></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropbtn"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-content">
                                                <a href="#">Allow Download</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
             }
            ?>
            </section>

            <section id="pagination">
                <nav aria-label="Page navigation example">

                    <ul class="pagination">
                        <?php $count = ceil($count / 10);?>
                        <li class="page-item"><a class="page-link" href="<?php if($page == '' || $page == 1){echo 'buyerrequest.php?page=1';} else {echo 'buyerrequest.php?page='.($page-1);}?>"><img src="images/images/left-arrow.png"
                                    class="arrow-left"></a></li>
                                    <?php
                                    
                                    
                                
                        for($i=1 ; $i<=$count  ; $i++){
                            if($i == $page || ($page == "" && $i ==1)){
                                if(isset($_GET['search'])){
                                    echo "<li class='page-item'><a class='page-link active' href='buyerrequest.php?page=$i&search=$search'>$i</a></li>";
                                }
                                else{
                                    echo "<li class='page-item'><a class='page-link active' href='buyerrequest.php?page=$i'>$i</a></li>";
                                }
                                
                            }
                            else{ 
                                if(isset($_GET['search'])){
                                    echo "<li class='page-item'><a class='page-link' href='buyerrequest.php?page=$i&search=$search'>$i</a></li>";
                                }
                                else{
                                    echo "<li class='page-item'><a class='page-link' href='buyerrequest.php?page=$i'>$i</a></li>";
                                }
                                
                            } 
                            

                        }
                    ?>
                    
                        <li class="page-item"><a class="page-link" href="<?php if($page == $count){echo 'buyerrequest.php?page='.$count;} elseif($page == ""){echo 'buyerrequest.php?page=2';} else {echo 'buyerrequest.php?page='.($page+1);}?>"><img src="images/images/right-arrow.png"
                                    class="arrow-right"></a></li>
                    </ul>
                </nav>
            </section>
        </div>



    </div>

    <hr>
    <div class="container">
        <footer>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <p>
                        Copyright &copy; Tatvasoft All rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-12 text-right">
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

</body>

</html>
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
    $user_id = $_SESSION['ID'];
    $select_user = "SELECT * FROM users WHERE ID = $user_id";
    $select_user_query = mysqli_query($connection,$select_user);
    if(!($select_user_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select_user_query);
    $email = $row['EmailID'];
    $firstname = $row['FirstName'];
    $lastname = $row['LastName'];
?>
<?php

    if(isset($_GET['id'])){
        
        $buyernoteID = $_GET['id'];
        $user = $_GET['buyer'];
        $attachment_query = mysqli_query($connection,"SELECT * FROM sellernotesattachments WHERE noteid = $buyernoteID");
        if(!($attachment_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $dwld_query = mysqli_query($connection,"SELECT * FROM downloads WHERE noteid = $buyernoteID AND downloader = $user");
        if(!($dwld_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $dwld_row = mysqli_fetch_assoc($dwld_query);
        $dwld_id = $dwld_row['ID'];
        while($attachment_row = mysqli_fetch_assoc($attachment_query)){
            $filepath = $attachment_row['FilePath'];
            $select_buyer = "UPDATE downloads SET issellerhasalloweddownload = 1 , attachmentpath='{$filepath}' WHERE ID = $dwld_id";
            $select_buyer_query = mysqli_query($connection,$select_buyer);
            if(!($select_buyer_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            $dwld_id = $dwld_id + 1;
        }
        
        
        $select_user = "SELECT * FROM users WHERE ID = $user";
        $select_user_query = mysqli_query($connection,$select_user);
        if(!($select_user_query)){
            die("QUERY FAILED".mysqli_error);
        }
        $row = mysqli_fetch_assoc($select_user_query);
        $buyeremail = $row['EmailID'];
        $buyerfirstname = $row['FirstName'];
        $buyerlastname = $row['LastName'];
        $subject = $firstname .  " " . $lastname . " Allows you to download a note";
        $body = "<h2>Hello $buyerfirstname $buyerlastname, </h2><br>";
        $body .="<p>We Would like to inform that ,$firstname Allows you to download a note ,please login and see My Download tabs to Particular note"; 
        $body .= "<h4>Regards,<br>NotesMarketPlace</h4>";
        include "includes/mail.php";


        $mail->setFrom("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->addAddress($buyeremail);
        $mail->addReplyTo("notesmarketplace4120@gmail.com","nikhil shah");
        $mail->isHtml(true);
        $mail->Subject = $subject ;
        $mail->Body = $body;
        $flag = 1;   
        if(!$mail->send()){
            echo "<script>alert('something went wrong');</script>";
        }
        else{
            header('Location: buyerrequest.php');
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/buyerrequest/buyerrequest.css">
    <link rel="stylesheet" href="css/buyerrequest/responsive.css">

</head>

<body>
<?php
        $page = "buyerrequest";
        include "includes/reg_header.php";
?>
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
                        <form class="form-inline">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search"
                                    aria-label="Search" id="search">
                                    <img src="images/images/search-icon.png" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search" type="button">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            
                <?php


                    $query = "SELECT * FROM  downloads WHERE seller = $user_id AND downloader != $user_id AND issellerhasalloweddownload = 0 AND ispaid = 1 GROUP BY noteid,downloader";

                    
                    $select_query = mysqli_query($connection,$query);

                    if(!($select_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }

                    
                    
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
                                    $j =1;
                                    while($row = mysqli_fetch_assoc($select_query)){
                                        
                                        $title = $row['NoteTitle'];
                                        $category = $row['NoteCategory'];
                                        $category_query = "SELECT * FROM Notecategories WHERE ID = $category";
                                        $category_select_query = mysqli_query($connection,$category_query);
                                        if(!($category_select_query)){
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        
                                        $category_row = mysqli_fetch_assoc($category_select_query);
                                        $category_name = $category_row['Name'];
                                        $buyer_id = $row['Downloader'];
                                        $buyer_email_query = "SELECT * FROM users WHERE ID = $buyer_id";
                                        $buyer_email_select_query = mysqli_query($connection,$buyer_email_query);
                                        if(!($buyer_email_select_query)){
                                            die("QUERY FAILED".mysqli_error($connection));

                                        }
                                        $row_email = mysqli_fetch_assoc($buyer_email_select_query);
                                        $buyer_email = $row_email['EmailID'];
                                        $buyer_phone_query = "SELECT * FROM userprofile WHERE userid = $buyer_id";
                                        $buyer_phone_select_query = mysqli_query($connection,$buyer_phone_query);
                                        if(!($buyer_phone_select_query)){
                                            die("QUERY FAILED".mysqli_error($connection));

                                        }
                                        $row_phone = mysqli_fetch_assoc($buyer_phone_select_query);
                                        $buyer_phone = $row_phone['Phonenumber'];
                                        $buyer_code = $row_phone['Countrycode'];
                                        $IsPaid = $row['IsPaid'];
                                        if($IsPaid == 0){
                                            $IsPaid = "Free";
                                        }
                                        else{
                                            $IsPaid = "Paid";
                                        }
                                        $sellingprice = $row['PurchasedPrice'];
                                        $time = $row['CreatedDate'];
                                        $id = $row['ID'];
                                        $noteid = $row['NoteID'];
                                ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $j++; ?></th>
                                    <td><?php echo $title ?></td>
                                    <td><?php echo $category_name ?></td>
                                    <td><?php echo $buyer_email; ?></td>
                                    <td><?php echo $buyer_code." ".$buyer_phone; ?></td>
                                    <td><?php echo $IsPaid ?></td>
                                    <td><?php echo $sellingprice ?></td>
                                    <td><?php echo $time ?></td>
                                    <td><a href="note-details.php?note=<?php echo $noteid;?>"><img src="images/eye.png"></a></td>
                                    <td>
                                        
                                        <div class="dropdown">
                                        <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="?id=<?php echo $noteid."&buyer=$buyer_id"; ?>">Allow Download</a>
                                            
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
            
            </section>

            
        </div>



    </div>

    <hr>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready( function () {
        var table = $('table').DataTable({
                'sDom' : '"top"i',
                "iDisplayLength":10,
                "binfo":false,
                language:{
                    paginate:{
                        next:'<img src="images/images/right-arrow.png">',
                        previous:'<img src="images/images/left-arrow.png">'
                    }
                }
                
            }

            );
        $('.btn-search').click(function(){
            var x = $('#search').val();
            
            table.search(x).draw();
        });

        });
    </script>
    
</body>

</html>
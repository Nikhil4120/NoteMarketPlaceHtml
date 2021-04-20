<?php
    include "../db.php";
?>

<?php 
    session_start()
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
        
        $select_email = $row['EmailID']; 
        $flag=1;
    }
?>

<?php if(isset($_POST['submit'])){
    
     $firstname  = $_POST['firstname'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $comment = $_POST['comments'];
     


     $subject = $firstname . $subject;
    
     $comment = "Hello,<br><br>" . $comment . "<br><h4> Regards,<br>" . $firstname."</h4>"; 

     $email_query = "SELECT * FROM systemconfiguration WHERE configurationkey = 'emailaddresses'";
     $email_get_query = mysqli_query($connection,$email_query);
     if(!($email_get_query)){
         die("wrong mail id" . mysqli_error($connection));

     }
     
     $row = mysqli_fetch_assoc($email_get_query);
     $emaillst = $row['value'];
     $emaillst = explode(",",$emaillst);
    include "includes/mail.php";

    $mail->setFrom($email,$firstname);
    
    foreach($emaillst as $emaillst){
        $mail->addAddress($emaillst);
    }
    $mail->addReplyTo($email,$firstname);
    $mail->isHtml(true);
    $mail->Subject = $subject ;
    $mail->Body = $comment;

    if(!$mail->send()){
        echo "<script>alert('something went wrong');</script>";
    }
    else{
        echo "<script>alert('Thanks For Contacting Us');</script>";
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/contactus/contactus.css">
    <link rel="stylesheet" href="css/contactus/responsive.css">

</head>

<body>
    <?php
        $page = "contactus";
        if(isset($_SESSION['ID'])){
            include "includes/reg_header.php";    
        }
        else
        {
            include "includes/nonreg_header.php";
        }
    ?>
    <section id="bg-image" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">Contact Us</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="contact-us">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div id="heading">
                        <h2>Get in Touch</h2>
                        <p>Let us know how to get you</p>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-12">
                    <form action="" method="post">
                        <div id="contact-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="firstname" id="fname">Firstname*</label>
                                                <input type="text" class="form-control" id="firstname"
                                                    placeholder="Enter your first name" name="firstname" <?php if(isset($flag)){echo "value='$select_firstname' readonly ";}?>required>


                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" id="email">Email*</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter your email address" name="email" <?php if(isset($flag)){echo "value='$select_email' readonly ";}?>required>


                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="subject" id="sub">Subject*</label>
                                                <input type="text" class="form-control" id="subject"
                                                    placeholder="Enter your subject" name="subject" required>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"
                                            id="comments">Comments/Questions*</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="11"
                                            placeholder="Enter your Comments" name="comments"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div id="btn-contactus">
                                    <button type="submit" class="btn btn-contactus" name="submit">SUBMIT</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </section>
    </div>
    <hr>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
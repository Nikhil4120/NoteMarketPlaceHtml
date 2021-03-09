<?php if(isset($_POST['submit'])){
    
     $firstname  = $_POST['firstname'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $comment = $_POST['comments'];
     


     $subject = $firstname . $subject;
    // // the message
     $comment = "Hello,\n\n" . $comment . "\n\n Regards,\n" . $firstname; 

    // // use wordwrap() if lines are longer than 70 characters
    // // $comment = wordwrap($comment,70);
    
    // $to = "nikhilshah4120@gmail.com" ;
    // // send email
    // mail($to,$subject,$comment,$header);
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

    $mail->setFrom($email,$firstname);
    $mail->addAddress('nikhilshah4120@gmail.com');
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
                            <a class="nav-link" href="search.php"><span>Search<span class="spacing"></span>Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mysoldnotes.php">Sell<span class="spacing">Your</span><span
                                    class="spacing">Notes</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="faq.php">FAQ</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="contactus.php">Contact<span class="spacing">Us</span></a>

                        </li>

                        <li class="nav-item">
                            <form class="form-inline">

                                <button class="btn btn-navbar" ><a href="login.php" style="color:#fff;">Login</a></button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
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
                                                    placeholder="Enter your first name" name="firstname" required>


                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" id="email">Email*</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter your email address" name="email" required>


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

</body>

</html>
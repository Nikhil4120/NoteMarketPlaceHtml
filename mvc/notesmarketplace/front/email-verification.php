<?php
    include "../db.php";
?>


<?php
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        if(isset($_POST['email_verification'])){
            $query = "SELECT * FROM users WHERE emailid = '{$email}' ";
            $select_email_query = mysqli_query($connection,$query);
            if(!($select_email_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            $row = mysqli_fetch_assoc($select_email_query);
            if($row['IsEmailVerified'] == 1){
                echo "<script>alert('Email is already verified');";
                echo "window.location.href = '/notesmarketplace/front/login.php';</script>";
            }
            elseif($row['IsEmailVerified'] == 0){
                $query = "UPDATE users SET isemailverified = 1 WHERE emailid= '{$email}' ";
                $email_query = mysqli_query($connection,$query);
                if(!($email_query)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                echo "<script>alert('email success fully verified now you can login')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email verification</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!--  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">-->




</head>

<body>
    
    <table class="table table-borderless" cellpadding="0" cellspacing="0" style="display:flex;justify-content: center;">
      
        <tbody style="margin-top:30px;">
            <tr>
                <td scope="col" style="padding:30px;"><img src="images/navbarbanner.png"></td>

            </tr>
            <tr>
                <td scope="row" 
                    style="font-family: 'Open Sans',sans-serif;font-size: 26px;font-weight: 600;line-height: 30px;color: #6255a5;padding-top:30px;padding-left: 30px;padding-bottom: 30px;">
                    Email Verification</td>

            </tr>
            <tr>
                <td scope="row"
                    style="font-family: 'Open Sans',sans-serif;font-size: 18px;font-weight: 600;line-height: 22px;color: #333333;padding-left: 30px;padding-bottom: 20px;">
                    Dear Smith</td>

            </tr>
            <tr>
                <td scope="row"
                    style="font-family: 'Open Sans',sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;color: #333333;padding-left:30px">
                    Thanks For Signing Up</td>
            </tr>
            <tr>
                <td scope="row"
                    style="font-family: 'Open Sans',sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;color: #333333;padding-left: 30px;padding-bottom: 30px;">
                    Simply Click Below For Email Verification </td>
            </tr>
            <tr>
                <td scope="row" style="padding-bottom: 30px;">
                    <form action="" method = "post">
                        <button type="submit" name="email_verification" class="btn btn-block " style="background-color: #6255a5;
                color:#ffffff;
                width: 540px;
                height: 50px;
                border-radius: 3px;
                font-family:  'Open Sans',sans-serif; font-size: 18px; font-weight: 600; line-height: 20px; ">Verify email address</button>
            </form></td>
           </tr>
        </tbody>
      </table>
    <script src=" js/jquery.min.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="js/script.js"></script>
</body>

</html>
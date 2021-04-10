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
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] != 1){
        header('location: admin_dashboard.php');
    }
?>
<?php
    $exist_configuration = mysqli_query($connection,"SELECT configurationkey,value FROM systemconfiguration");
    if(!($exist_configuration)){
        die("QUERY FAILED".mysqli_error($exist_configuration));
    }
    $exist_count = mysqli_num_rows($exist_configuration);
    $configkey = array();
    $configvalue = array();

    if($exist_count != 0){
        while($configurerow = mysqli_fetch_assoc($exist_configuration)){
            $key = $configurerow['configurationkey'];
            $value = $configurerow['value'];
            array_push($configkey,$key);
            array_push($configvalue,$value);
        }
        $flag = 1;
    }


?>
<?php

    if(isset($_POST['submit'])){
        $supportemail = $_POST['supportemail'];
        $supportphone = $_POST['supportphone'];
        $emailaddresses = $_POST['emailaddresses'];
        $facebookurl = $_POST['facebookurl'];
        $twitterurl = $_POST['twitterurl'];
        $linkedinurl = $_POST['linkedinurl'];
        $defaultprofilepicture = $_FILES['dp']['name'];
        $defaultpictmp = $_FILES['dp']['tmp_name'];
        $defaultnote = $_FILES['note']['name'];
        $defaultnotetmp = $_FILES['note']['tmp_name'];
        if(isset($flag)){
            if($defaultprofilepicture == ""){
                $defaultprofilepicture = $configvalue[6];
            }
            else{
                move_uploaded_file($defaultpictmp, "../uploads/Systemconfiguration/$defaultprofilepicture");
                $deletepicpath =  "../uploads/Systemconfiguration/".$configvalue[6];
                unlink($deletepicpath);
            }
            if($defaultnote == ""){
                $defaultnote = $configvalue[7];
            }
            else{
                move_uploaded_file($defaultnotetmp, "../uploads/Systemconfiguration/$defaultnote");
                $deletepicpath =  "../uploads/Systemconfiguration/".$configvalue[7];
                unlink($deletepicpath);
            }
            $updateconfigarray = array($supportemail,$supportphone,$emailaddresses,$facebookurl,$twitterurl,$linkedinurl,$defaultprofilepicture,$defaultnote);
            for($i=0;$i<8;$i++){
                $updatequery = "UPDATE systemconfiguration SET value = '{$updateconfigarray[$i]}' WHERE configurationkey = '{$configkey[$i]}'";
                $updatequery = mysqli_query($connection,$updatequery);
                if(!($updatequery)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
            }
        }
        else{
            $insertmanageconfiguration = "INSERT INTO systemconfiguration (configurationkey,value,createddate,createdby)VALUES('supportemail','{$supportemail}',now(),23)";
        
            $insertmanageconfiguration .= ",('supportphone','{$supportphone}',now(),23)";
            $insertmanageconfiguration .= ",('emailaddresses','{$emailaddresses}',now(),23)";
            $insertmanageconfiguration .= ",('facebookurl','{$facebookurl}',now(),23)";
            $insertmanageconfiguration .= ",('twitterurl','{$twitterurl}',now(),23)";
            $insertmanageconfiguration .= ",('linkedinurl','{$linkedinurl}',now(),23)";
            $insertmanageconfiguration .= ",('defaultprofilepicture','{$defaultprofilepicture}',now(),23)";
            $insertmanageconfiguration .= ",('defaultnote','{$defaultnote}',now(),23)";
            $insertmanageconfigurationquery = mysqli_query($connection,$insertmanageconfiguration);
            if(!($insertmanageconfigurationquery)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            if(!is_dir("../uploads/Systemconfiguration")){mkdir("../uploads/Systemconfiguration");}
            move_uploaded_file($defaultpictmp, "../uploads/Systemconfiguration/$defaultprofilepicture");
            move_uploaded_file($defaultnotetmp, "../uploads/Systemconfiguration/$defaultnote");
        }
        header('location: admin_dashboard.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage System Configuration</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/managesystemconfiguration/managesystemconfiguration.css">
    <link rel="stylesheet" href="css/managesystemconfiguration/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="manage-system-configuration">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Manage System Configuration</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="manage-system-configuration-form">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="support-email">Support emails Address*</label>
                                <input type="email" class="form-control" id="support-email" 
                                    placeholder="Enter your support email" name="supportemail" <?php if(isset($flag)){echo "value=$configvalue[0]";}?> required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="phoneno">Support Phone *</label>
                                <input type="text" class="form-control" id="phoneno" placeholder="Enter your Phone no." name="supportphone" <?php if(isset($flag)){echo "value=$configvalue[1]";}?>
                                    required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="Email">Email Address(es)(for various events system will send notification to
                                    these users)</label>
                                <input type="text" class="form-control" id="Email" placeholder="Enter email Address" name="emailaddresses" <?php if(isset($flag)){echo "value=$configvalue[2]";}?>
                                    required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="facebook-url">Facebook URL*</label>
                                <input type="text" class="form-control" id="facebook-url"
                                    placeholder="Enter facebook url" name="facebookurl" <?php if(isset($flag)){echo "value=$configvalue[3]";}?>>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="twitter-url">twitter URL*</label>
                                <input type="text" class="form-control" id="twitter-url"
                                    placeholder="Enter twitter url" name="twitterurl" <?php if(isset($flag)){echo "value=$configvalue[4]";}?>>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="linkedin-url">linkedin URL</label>
                                <input type="text" class="form-control" id="linkedin-url"
                                    placeholder="Enter linkedin url" name="linkedinurl" <?php if(isset($flag)){echo "value=$configvalue[5]";}?>>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Default image for notes(if seller do not upload)</label>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                    <label for="upload">
                                        <img src="images/images/upload-file.png">
                                        <p style="color: lightgray;" id="notename"><?php if(isset($flag)){echo $configvalue[7];}else{echo "Upload a Picture";}?></p>
                                        <input type="file" id="upload" style="display: none;" name="note">
                                    </label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Default Profile Picture(if seller do not upload)</label>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                        <label for="upload-1">
                                            <img src="images/images/upload-file.png">
                                            <p style="color: lightgray;" id="dpname"><?php if(isset($flag)){echo $configvalue[6];}else{echo "Upload a Picture";}?></p>
                                            <input type="file" id="upload-1" style="display: none;" name="dp">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn-submit" name="submit">Submit</button>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>





    <hr>

    <?php
        include "includes/admin_footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
    <script>  
        $(function() {  
        
        var note = document.getElementById("upload");
        var infoArea = document.getElementById("notename");
        note.addEventListener( 'change', showFileName );

            function showFileName( event ) {
            
            // the change event gives us the input it occurred in 
            var upload = event.srcElement;
            
            
            
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = upload.files[0].name;
            
            // use fileName however fits your app best, i.e. add it into a div
            infoArea.textContent = fileName;
            }
            var dp = document.getElementById("upload-1");
            var infoArea1 = document.getElementById("dpname");
            dp.addEventListener( 'change', shownoteName );

            function shownoteName( event ) {
            
            // the change event gives us the input it occurred in 
            var upload1 = event.srcElement;
            
            
            
            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = upload1.files[0].name;
            
            // use fileName however fits your app best, i.e. add it into a div
            infoArea1.textContent = fileName;
            }

        })     

    </script>  
</body>

</html>
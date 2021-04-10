<?php
    $user_img_id = $_SESSION['ID'];
    $user_img_query = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $user_img_id");
    if(!($user_img_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    if(mysqli_num_rows($user_img_query) == 0){
        $countimg =0;
    }    
    else{
        $img_row = mysqli_fetch_assoc($user_img_query);
        
        $img = $img_row['ProfilePicture']; 
        if($img != ""){
            $countimg=1;
        }      
        else{
            $countimg=0;
        }
        
    }

?>
<?php
    $systemdefaultpic = mysqli_query($connection,"SELECT value FROM systemconfiguration WHERE configurationkey = 'defaultprofilepicture' ");
    if(!($systemdefaultpic)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $defaultrow = mysqli_fetch_row($systemdefaultpic);
    $defaultpic = $defaultrow[0];

?>
<header>
        <nav class="navbar navbar-expand-lg  bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="admin_dashboard.php">
                    <img src="images/navbarbanner.png" alt="logo" class="img-responsive">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&#9776;</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                    <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Notes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown-1">
                                <a class="dropdown-item" href="notesunderreview.php">Notes Under Review</a>
                                <a class="dropdown-item" href="publishednotes.php">Published Notes</a>
                                <a class="dropdown-item" href="downloadednotes.php">Downloaded Notes</a>
                                <a class="dropdown-item" href="rejectednotes.php">Rejected Notes</a>

                            </div>

                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="members.php">Members</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Reports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown-2">
                                <a class="dropdown-item" href="spamreport.php">Spam Reports</a>


                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Setting</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                    if($_SESSION['roleid'] == 1){

                                ?>
                                <a class="dropdown-item" href="managesystemconfiguration.php">Manage System Configuration</a>
                                <a class="dropdown-item" href="manageadministrator.php">Manage Administrator</a>
                                <?php
                                    }
                                ?>
                                
                                <a class="dropdown-item" href="managecategory.php">Manage Category</a>
                                
                                <a class="dropdown-item" href="managetype.php">Manage Type</a>
                                <a class="dropdown-item" href="managecountry.php">Manage Countries</a>
                                
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                                    if($countimg == 0){
                                        echo "<img src='../uploads/Systemconfiguration/$defaultpic' alt='client' class='rounded-circle seller'>";
                                    }
                                    else{
                                        echo "<img src='../uploads/Members/$user_img_id/$img' alt='client' class='rounded-circle seller'>";
                                    }
                                ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="myprofile.php">Update Profile</a>

                                <a class="dropdown-item" href="../changepassword.php">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item btn-logout" href="../logout.php?logout='logout'" style="color: #6255a5;">Logout</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline" action="../logout.php">

                                <button class="btn btn-navbar btn-logout" type="submit" name="logout">Logout</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
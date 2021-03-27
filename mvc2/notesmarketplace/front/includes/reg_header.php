
<?php
    $user_img_id = $_SESSION['ID'];
    $user_img_query = mysqli_query($connection,"SELECT * FROM userprofile WHERE userid = $user_img_id");
    if(!($user_img_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    if(mysqli_num_rows($user_img_query) == 0){
        $count =0;
    }    
    else{
        $img_row = mysqli_fetch_assoc($user_img_query);
        
        $img = $img_row['ProfilePicture']; 
        
        $count=1;
    }

?>






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
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item <?php if($page=="search"){echo "active";}?>">
                            <a class="nav-link" href="search.php">Search Notes</a>
                        </li>
                        <li class="nav-item <?php if($page=="dashboard"){echo "active";}?>">
                            <a class="nav-link" href="dashboard.php">Sell Your Notes</a>
                                    
                        </li>
                        <li class="nav-item <?php if($page=="buyerrequest"){echo "active";}?>">
                            <a class="nav-link" href="buyerrequest.php">Buyer Requests</a>
                        </li>
                        <li class="nav-item <?php if($page=="faq"){echo "active";}?>">
                            <a class="nav-link" href="faq.php">FAQ</a>
                        </li>
                        <li class="nav-item <?php if($page=="contactus"){echo "active";}?>">
                            <a class="nav-link" href="contactus.php">Contact Us</a>

                        </li>

                        <li class="nav-item dropdown">

                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php
                                    if($count == 0){
                                        echo '<img src="images/Dashboard/user-img.png" alt="client" class="rounded-circle seller">';
                                    }
                                    else{
                                        echo "<img src='../uploads/Members/$user_img_id/$img' alt='client' class='rounded-circle seller'>";
                                    }
                                ?>
                                
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item <?php if($page == "userprofile"){echo "activedropdown";}?>" href="editprofile.php">My Profile</a>
                                <a class="dropdown-item <?php if($page == "mydownloads"){echo "activedropdown";}?>" href="mydownloads.php">My Downloads</a>
                                <a class="dropdown-item <?php if($page == "mysoldnotes"){echo "activedropdown";}?>" href="mysoldnotes.php" >My Sold Notes</a>
                                <a class="dropdown-item <?php if($page == "myrejectednotes"){echo "activedropdown";}?>" href="myrejectednotes.php">My Rejected Notes</a>
                                <a class="dropdown-item"  href="changepassword.php">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="includes/logout.php?logout=" style="color: #6255a5;">Logout</a>
                            </div>

                        </li>

                        <li class="nav-item">
                            <form class="form-inline" style="float:none;" method="POST" action="includes/logout.php">

                                <button class="btn btn-outline-success btn-navbar" type="submit" name="logout">Logout</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
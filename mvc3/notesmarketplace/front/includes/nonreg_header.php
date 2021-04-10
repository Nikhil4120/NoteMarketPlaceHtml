

<header>
        <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="../index.php">
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
                            <a class="nav-link" href="faq.php">FAQ</a>
                        </li>
                        <li class="nav-item <?php if($page=="contactus"){echo "active";}?>">
                            <a class="nav-link" href="contactus.php">Contact Us</a>

                        </li>

                        <li class="nav-item">
                            <form class="form-inline">

                                <button class="btn btn-navbar" ><a href="../login.php" style="color:#fff;">Login</a></button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
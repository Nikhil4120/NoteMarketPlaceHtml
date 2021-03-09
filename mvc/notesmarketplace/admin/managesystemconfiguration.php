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
                    <ul class="navbar-nav ">

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Dashboard
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown-1">
                                <a class="dropdown-item" href="notesunderreview.html">Notes Under Review</a>
                                <a class="dropdown-item" href="publishednotes.html">Published Notes</a>
                                <a class="dropdown-item" href="downloadednotes.html">Downloaded Notes</a>
                                <a class="dropdown-item" href="rejectednotes.html">Rejected Notes</a>

                            </div>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_notedetails.html">Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="members.html">Members</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Reports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown-2">
                                <a class="dropdown-item" href="spamreport.html">Spam Reports</a>


                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Setting</a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="images/Dashboard/user-img.png" alt="client" class="rounded-circle seller">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Update Profile</a>

                                <a class="dropdown-item" href="#">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" style="color: #6255a5;">Logout</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <form class="form-inline">

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
                <form>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="support-email">Support emails Address*</label>
                                <input type="email" class="form-control" id="support-email" value="John"
                                    placeholder="Enter your support email" required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="phoneno">Support Phone *</label>
                                <input type="text" class="form-control" id="phoneno" placeholder="Enter your Phone no."
                                    required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="Email">Email Address(es)(for various events system will send notification to
                                    these users)</label>
                                <input type="email" class="form-control" id="Email" placeholder="Enter email Address"
                                    required>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="facebook-url">Facebook URL*</label>
                                <input type="text" class="form-control" id="facebook-url"
                                    placeholder="Enter facebook url">
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="twitter-url">twitter URL*</label>
                                <input type="text" class="form-control" id="twitter-url"
                                    placeholder="Enter twitter url">
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-12">

                            <div class="form-group">
                                <label for="linkedin-url">linkedin URL</label>
                                <input type="text" class="form-control" id="linkedin-url"
                                    placeholder="Enter linkedin url">
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
                                        <p style="color: lightgray;">Upload a Picture</p>
                                        <input type="file" id="upload" style="display: none;">
                                    </label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <label>Default Profile Picture for notes(if seller do not upload)</label>
                                </div>
                                <div class="col-md-6 col-sm-12 col-12 text-center">
                                    <div class="add-border">
                                        <label for="upload-1">
                                            <img src="images/images/upload-file.png">
                                            <p style="color: lightgray;">Upload a Picture</p>
                                            <input type="file" id="upload-1" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <button type="submit" class="btn-submit">Submit</button>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>





    <hr>

    <footer>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-12 text-center">
                version 1.1.24
            </div>
            <div class="col-md-6 col-sm-12 col-12 text-right">
                <p>
                    Copyright &copy; Tatvasoft All rights Reserved.
                </p>
            </div>
        </div>

    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>
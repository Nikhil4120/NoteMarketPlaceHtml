<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/admin_dashboard/admin_dashboard.css">
    <link rel="stylesheet" href="css/admin_dashboard/responsive.css">

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

                        <li class="nav-item dropdown active">
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
            <div class="admin-dashboard">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">

                            <h2>Dashboard</h2>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="square-box text-center">
                            <h2>20</h2>
                            <p>Number Of notes in review for Publish</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="square-box text-center">
                            <h2>103</h2>
                            <p>Number Of new notes downloaded (last seven days)</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="square-box text-center">
                            <h2>223</h2>
                            <p>Number Of new Registration (last seven days)</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="admin-dashboard-table">

                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="table-heading">
                            <h2>Published Notes</h2>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search">
                                <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search " type="submit">Search</button>

                                <select class="month form-control custom-select">
                                    <option>Select month</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">ATACHMENT SIZE</th>

                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>

                                <th scope="col">PUBLISHER</th>
                                <th scope="col">PUBLISHED DATE</th>
                                <th scope="col">NUMBER OF DOWNLOADS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>10 KB</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>Pritesh Panchal</td>
                                <td>27 Nov 2020, 11:24:34</td>
                                <td>10</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Note</a>
                                            <a href="#">View More Details</a>
                                            <a href="#">Unpublish</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Accounts</td>
                                <td>Commerce</td>
                                <td>23 MB</td>
                                <td>Paid</td>
                                <td>$22</td>
                                <td>Rahil Shah</td>
                                <td>27 Nov 2020, 11:24:34</td>
                                <td>10</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Note</a>
                                            <a href="#">View More Details</a>
                                            <a href="#">Unpublish</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>3 MB</td>
                                <td>Paid</td>
                                <td>$56</td>
                                <td>Anish Patel</td>
                                <td>27 Nov 2020, 11:24:34</td>
                                <td>20</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Note</a>
                                            <a href="#">View More Details</a>
                                            <a href="#">Unpublish</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>AI</td>
                                <td>IT</td>
                                <td>1 MB</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>Vijay Vaishnav</td>
                                <td>27 Nov 2020, 11:24:34</td>
                                <td>34</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Note</a>
                                            <a href="#">View More Details</a>
                                            <a href="#">Unpublish</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>lorem ipsum</td>
                                <td>lorem</td>
                                <td>105 KB</td>
                                <td>Paid</td>
                                <td>$90</td>
                                <td>Mehul Patel</td>
                                <td>27 Nov 2020, 11:24:34</td>
                                <td>9</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Note</a>
                                            <a href="#">View More Details</a>
                                            <a href="#">Unpublish</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <section id="pagination">
                <nav aria-label="Page navigation example">

                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><img src="images/images/left-arrow.png" class="arrow-left"></a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#"><img src="images/images/right-arrow.png" class="arrow-right"></a></li>
                    </ul>
                </nav>
            </section>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Published Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/publishednotes/publishednotes.css">
    <link rel="stylesheet" href="css/publishednotes/responsive.css">

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
                            <form class="form-inline" style="float: none;">

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

            <div class="published-notes">

                <!--<div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Spam Reports</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                id="search">
                            <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            <button class="btn btn-search" type="submit">Search</button>

                        </form>
                    </div>
                </div>-->

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Published Notes</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-12">
                        <form class="select-form">
                        <div class="form-group">
                            <label for="inputSeller" id="seller-label">Seller</label>
                            <select id="inputSeller" class="form-control custom-select">
                                <option selected>Khyati</option>
                                <option>..</option>
                            </select>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-8 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                id="search">
                            <img src="images/Dashboard/search.jpg" alt="search" class="search-icon"></div>
                            <div id="search-btn">
                            <button class="btn btn-search" type="submit">Search</button></div>

                        </form>
                    </div>
                </div>
               <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>

                            <th scope="col">NOTE TITLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">SELL Type</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">SELLER</th>
                            <th scope="col">PUBLISHED DATE</th>
                            <th scope="col">APPROVED BY</th>
                            <th scope="col">NUMBER OF DOWNLOADS</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Software Engineer</td>
                            <td>IT</td>
                            <td>Paid</td>
                            <td>$145</td>
                            <td>Rahul Shah<img src="images/eye.png"></td>
                            <td>25-11-2020, 11:08</td>
                            <td>Raj Sheth</td>
                            <td>75</td>

                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Note</a>
                                        <a href="#">View More </a>
                                        <a href="#">Unpublish</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Computer Basic</td>
                            <td>Computer</td>
                            <td>Free</td>
                            <td>$0</td>
                            <td>Rahul Shah <img src="images/eye.png"></td>
                            <td>10-10-2020, 12:30</td>
                            <td>Khyati Patel</td>
                            <td>50</td>




                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Note</a>
                                        <a href="#">View More </a>
                                        <a href="#">Unpublish</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td>Human Body</td>
                            <td>Science</td>
                            <td>Paid</td>
                            <td>$204</td>
                            <td>Rahul Shah <img src="images/eye.png"></td>
                            <td>08-11-2020, 04:07</td>
                            <td>Raj Sheth</td>
                            <td>35</td>

                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Note</a>
                                        <a href="#">View More </a>
                                        <a href="#">Unpublish</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>world war 2</td>
                            <td>History</td>
                            <td>Paid</td>
                            <td>$58</td>
                            <td>Rahul Shah <img src="images/eye.png"></td>
                            <td>17-10-2020, 12:30</td>
                            <td>Raj Sheth</td>
                            <td>25</td>

                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Note</a>
                                        <a href="#">View More </a>
                                        <a href="#">Unpublish</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>

                            <td>Accounting</td>
                            <td>Account</td>
                            <td>Free</td>
                            <td>$0</td>
                            <td>Rahul Shah <img src="images/eye.png"></td>
                            <td>12-12-2019, 17:45</td>
                            <td>Niya Patel</td>

                            <td>8</td>
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Note</a>
                                        <a href="#">View More </a>
                                        <a href="#">Unpublish</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table></div>
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
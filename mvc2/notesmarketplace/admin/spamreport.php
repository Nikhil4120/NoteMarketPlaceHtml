<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spam Reports</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/spamreport/spamreport.css">
    <link rel="stylesheet" href="css/spamreport/responsive.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg  bg-light fixed-top">
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

            <div class="spam-reports">

                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Spam Reports</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search">
                                <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search" type="submit">Search</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SR NO.</th>
                                <th scope="col">REPRTED BY</th>
                                <th scope="col">NOTE TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">DATE EDITED</th>
                                <th scope="col">REMARK</th>
                                <th scope="col">ACTION</th>

                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Khyati Patel</td>
                                <td>Software Devlopement</td>
                                <td>IT</td>
                                <td>9-10-2020, 10:10</td>
                                <td>lorem ipsum is simply dummy text</td>
                                <td><img src="images/images/delete.png"></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Notes</a>
                                            <a href="#">View More Details</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>


                                <td>Rahul shah</td>
                                <td>Computer Basic</td>
                                <td>Computer</td>
                                <td>10-10-2020, 11:25</td>
                                <td>lorem ipsum is simply dummy text</td>
                                <td><img src="images/images/delete.png"></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Notes</a>
                                            <a href="#">View More Details</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>

                                <td>Suman Trivedi</td>
                                <td>Human Body</td>
                                <td>Science</td>
                                <td>11-10-2020, 01:00</td>
                                <td>lorem ipsum is simply dummy text</td>
                                <td><img src="images/images/delete.png"></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Notes</a>
                                            <a href="#">View More Details</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Raj Malhotra</td>
                                <td>world war 2</td>
                                <td>History</td>
                                <td>12-10-2020, 10:10</td>
                                <td>lorem ipsum is simply dummy text</td>
                                <td><img src="images/images/delete.png"></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Notes</a>
                                            <a href="#">View More Details</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>

                                <td>Niya Patel</td>
                                <td>Accounting</td>
                                <td>Account</td>
                                <td>13-10-2020, 11:25</td>
                                <td>lorem ipsum is simply dummy text</td>
                                <td><img src="images/images/delete.png"></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-content">
                                            <a href="#">Download Notes</a>
                                            <a href="#">View More Details</a>

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
                        <li class="page-item"><a class="page-link" href="#"><img src="images/images/left-arrow.png"
                                    class="arrow-left"></a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#"><img src="images/images/right-arrow.png"
                                    class="arrow-right"></a></li>
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
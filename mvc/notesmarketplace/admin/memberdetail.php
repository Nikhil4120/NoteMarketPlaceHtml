<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/memberdetail/memberdetail.css">
    <link rel="stylesheet" href="css/memberdetail/responsive.css">

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
            <div class="member-detail">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">
                            <h2>Member Details</h2>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                        <div id="member-image">
                            <img src="images/images/member.png">
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-7 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">First Name:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">Richard</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Last Name:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">Brown</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Email:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">richardbrown77@gmail.com</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">D.O.B:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">13-08-1990</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Phone Number:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">9988731221</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">College/University:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">University Of California</h4>
                            </div>
                            
                        </div>

                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Address-1:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">144-Diamond Height</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Address-2:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">Star Colony</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">City:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">New York</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">State:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">New York State</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Country:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">United State</h4>
                            </div>
                            <div class="col-md-5 col-sm-6 col-6">
                                <h4 class="name">Zipcode:</h4>
                            </div>
                            <div class="col-md-7 col-sm-6 col-6">
                                <h4 class="value">11004-05</h4>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
            <hr>
            <div class="member-detail-table">
                <div class="table-heading">
                    <h2>Notes</h2>
                </div>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>
                            
                            <th scope="col">NOTE TITLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">DOWNLOADED NOTES</th>
                            <th scope="col">TOTAL EARNINGS</th>
                            <th scope="col">DATE ADDED</th>
                            <th scope="col">PUBLISHED DATE</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            
                            <td>Software Devlopement</td>
                            <td>IT</td>
                            <td>Published</td>
                                                        <td>22</td>
                            <td>$177</td>
                            <td>9-10-2020, 10:10</td>
                            <td>9-10-2020, 10:10</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Notes</a>
                                        
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>


                            
                            <td>Computer Basic</td>
                            <td>Computer</td>
                            <td>Published</td>
                            <td>4</td>
                            <td>$125</td>
                            <td>10-10-2020, 11:25</td>
                            <td>10-10-2020, 11:25</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Notes</a>
                                        
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>

                            
                            <td>Human Body</td>
                            <td>Science</td>
                            <td>Published</td>
                            <td>17</td>
                            <td>$978</td>
                            <td>11-10-2020, 01:00</td>
                            <td>11-10-2020, 01:00</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Notes</a>
                                        
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            
                            <td>world war 2</td>
                            <td>History</td>
                            <td>Published</td>
                            <td>28</td>
                            <td>$15254</td>
                            <td>12-10-2020, 10:10</td>
                            <td>12-10-2020, 10:10</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Notes</a>
                                        
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>


                            <td>Accounting</td>
                            <td>Account</td>
                            <td>Published</td>
                            <td>0</td>
                            <td>$69</td>
                            <td>13-10-2020, 11:25</td>
                            <td>NA</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn"><img src="images/images/dots.png"></button>
                                    <div class="dropdown-content">
                                        <a href="#">Download Notes</a>
                                        
                                        
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
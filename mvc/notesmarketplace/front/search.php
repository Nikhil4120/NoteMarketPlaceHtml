<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/search/search.css">
    <link rel="stylesheet" href="css/search/responsive.css">


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
                    <ul class="navbar-nav">

                        <li class="nav-item active">
                            <a class="nav-link" href="search.html">Search<span class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mysoldnotes.html">Sell<span class="spacing">Your</span><span
                                    class="spacing">Notes</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="faq.html">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.html">Contact<span class="spacing">Us</span></a>

                        </li>

                        <li class="nav-item">
                            <form class="form-inline" style="float:none">

                                <button class="btn btn-outline-success btn-navbar" type="submit">Login</button>
                            </form>
                        </li>



                    </ul>
                </div>
            </div>
        </nav>


    </header>
    <section id="bg-image" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">Search Notes</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="search-notes">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="heading">
                        <h2>Search and Filter notes</h2>
                    </div>
                </div>
            </div>
            <div id="search-boxes">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="search-box">
                            <div class="form-group">

                                <input type="text" class="form-control" id="search" placeholder="Search Notes here...">
                                <span class="shift-left"><img src="images/images/search-icon.png"></span>

                            </div>
                        </div>
                    </div>

                </div>

                <div id="drop-downs">
                    <div class="row">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">


                                <select id="type" class="form-control custom-select">
                                    <option selected>Select type</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="category" class="form-control custom-select">
                                    <option selected>Select category</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="university" class="form-control custom-select">
                                    <option selected>Select University</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="course" class="form-control custom-select">
                                    <option selected>Select course</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="country" class="form-control custom-select">
                                    <option selected>Select country</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">

                                <select id="rating" class="form-control custom-select">
                                    <option selected>Select rating</option>
                                    <option>..</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="books">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="heading">
                        <h2>Total 18 notes</h2>
                    </div>
                </div>
            </div>

            <div class="books">
                <div class="card">
                    <img src="images/Search/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Computer Operating System - Final Exam Book With Paper Solution</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>

                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Computer Science</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>

                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Basic Computer Engineering Tech India Publication Series</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>

                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Computer Science Illuminated Seventh Edition</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/5.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">The Principles of Computer Hardware - Oxford</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/6.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">The Computer Book</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Computer Operating System - Final Exam Book With Paper Solution</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Computer Science</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/Search/3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                    <a href="note-details.php"><h5 class="card-title">Basic Computer Engineering Tech India Publication Series</h5></a>
                        <p class="card-text">
                            <img src="images/images/university.png"><span>University Of California,
                                US</span><br>
                            <img src="images/images/pages.png"><span>204 Pages</span><br>
                            <img src="images/images/calendar.png"><span>Thu, Nov 26 2020</span><br>
                            <img src="images/images/flag.png"><span class="flag">5 users marked this note as
                                inappropriate</span>
                        <div class="book-rating">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <img src="images/images/star.png">
                            <span>100 Reviews</span>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

        </section>
        <section id="pagination">
            <nav aria-label="Page navigation example">

                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><img src="images/images/left-arrow.png"
                                class="left-arrow"></a></li>
                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><img src="images/images/right-arrow.png"
                                class="right-arrow"></a></li>
                </ul>
            </nav>
        </section>
    </div>
    <hr>
    <div class="container">
        <footer>

            <div class="row">
                <div class="col-md-6 col-sm-12 col-12">
                    <p>
                        Copyright &copy; Tatvasoft All rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 col-12 text-right">
                    <ul class="social-list">
                        <li><a href="#"><img src="images/images/facebook.png"></a></li>
                        <li><a href="#"><img src="images/images/twitter.png"></a></li>
                        <li><a href="#"><img src="images/images/linkedin.png"></a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
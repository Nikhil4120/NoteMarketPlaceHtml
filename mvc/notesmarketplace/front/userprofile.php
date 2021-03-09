<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/userprofile/userprofile.css">
    <link rel="stylesheet" href="css/userprofile/responsive.css">


</head>

<body>
    <header>
      <nav class="navbar navbar-expand-lg bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="images/navbarbanner.png" alt="logo" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&#9776;</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="search.html"><span>Search<span class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mysoldnotes.html">Sell<span class="spacing">Your</span><span
                                    class="spacing">Notes</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="buyerrequest.html">Buyer<span class="spacing">Requests</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq.html">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.html">Contact<span class="spacing">Us</span></a>

                        </li>
                        <li class="nav-item">
                            <img src="images/Dashboard/user-img.png" alt="client" class="rounded-circle seller">
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
    <section id="bg-image" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 id="title">User Profile</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="user-profile-form">

            <form>
                <div id="basic-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>Basic Profile Details</h2>
                            </div>
                        </div>
                    </div>

                    <div id="basic-details-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="firstname" id="fname">Firstname*</label>
                                    <input type="text" class="form-control" id="firstname"
                                        placeholder="Enter your first name" value="John">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="lastname" id="lname">Last Name*</label>
                                    <input type="text" class="form-control" id="lastname"
                                        placeholder="Enter your last name">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" id="email">Email*</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter your email address">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="d.o.b" id="dob">Date Of Birth</label>
                                    <input type="text" class="form-control" id="d.o.b"
                                        placeholder="Enter your date of birth">
                                    <span class="shift-right-r"><img src="images/calendar.png"></span>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="gender" id="seller-label">Gender</label>
                                    <select id="gender" class="form-control custom-select">
                                        <option selected>Gender</option>
                                        <option>..</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="phoneno" id="phoneno">Phone no.</label>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3  col-5">
                                            <div id="country-code">
                                                <select class="form-control custom-select" id="countrycode">
                                                    <option selected>+91</option>
                                                    <option>..</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-9 col-sm-9 col-7">
                                            <div id="phone-no">
                                                <input type="text" class="form-control"
                                                    placeholder="Enter your phone number " id="phoneno">
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <label>Profile Picture</label>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-12 text-center">
                                        <div class="add-border">
                                        <label for="upload" class="upload-profile">
                                            <img src="images/images/upload-file.png">
                                            <p style="color: lightgray;">Upload a Picture</p>
                                            <input type="file" id="upload" style="display: none;">
                                        </label>
                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div id="address-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>Address Details</h2>
                            </div>
                        </div>
                    </div>
                    <div id="address-details-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="add1">Address Line 1*</label>
                                    <input type="text" class="form-control" id="add1" placeholder="Enter your address">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="add2">Address Line 2*</label>
                                    <input type="text" class="form-control" id="add2" placeholder="Enter your address">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="City">City*</label>
                                    <input type="text" class="form-control" id="CIty" placeholder="Enter your city">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="state">State*</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter your state">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="zip-code">ZipCode*</label>
                                    <input type="text" class="form-control" id="zip-code"
                                        placeholder="Enter your zipcode">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="coutry" id="seller-label">Country</label>
                                    <select id="country" class="form-control custom-select">
                                        <option selected>Select your country</option>
                                        <option>..</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div id="university-details">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="heading">
                                <h2>University and College Information</h2>
                            </div>
                        </div>
                    </div>
                    <div id="university-details-form">

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="university">University</label>
                                    <input type="text" class="form-control" id="university"
                                        placeholder="Enter your university">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="university">College</label>
                                    <input type="text" class="form-control" id="college"
                                        placeholder="Enter your college">


                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <button type="button" class="btn btn-user-profile">SUBMIT</button>
                    </div>
                </div>
            </form>

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
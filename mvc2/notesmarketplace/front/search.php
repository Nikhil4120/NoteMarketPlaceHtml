<?php
    include "../db.php";
?>
<?php
    session_start();
?>

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
    <?php
        $page = "search";
        if(isset($_SESSION['ID'])){
            include "includes/reg_header.php";    
        }
        else
        {
            include "includes/nonreg_header.php";
        }
        
    ?>
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
                                    <option value="" selected>Select type</option>
                                    <?php

                                            $query = "SELECT * FROM notetypes";
                                            $select_type = mysqli_query($connection,$query);
                                            if(!($select_type)){
                                                die("QUERY FAILED" . mysqli_error());
                                            }
                                            while($row = mysqli_fetch_assoc($select_type)){
                                                $type_id = $row['ID'];
                                                $type_name = $row['Name'];
                                                echo "<option value='{$type_id}'>$type_name</option>";
                                            }
                                        ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="category" class="form-control custom-select">
                                    <option value="" selected>Select category</option>
                                    <?php

                                            $query = "SELECT * FROM notecategories";
                                            $select_category = mysqli_query($connection,$query);
                                            if(!($select_category)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }

                                            while($row = mysqli_fetch_assoc($select_category)){
                                                $category_id = $row['ID'];
                                                $category_name = $row['Name'];
                                                echo "<option value='{$category_id}'>$category_name</option>";

                                            }

                                        ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="university" class="form-control custom-select">
                                    <option value="" selected>Select University</option>
                                    <?php

                                        $query = "SELECT DISTINCT(universityname) FROM sellernotes";
                                        $select_university = mysqli_query($connection,$query);
                                        if(!($select_university)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }
                                        
                                        while($row = mysqli_fetch_array($select_university)){

                                            $select_university_name = $row[0];
                                            echo "<option value='{$select_university_name}'>$select_university_name</option>";
                                            
                                        }

                                        
                                        
                                        

                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="course" class="form-control custom-select">
                                    <option value="" selected>Select course</option>
                                    <?php

                                            $query = "SELECT DISTINCT(course) FROM sellernotes";
                                            $select_course = mysqli_query($connection,$query);
                                            if(!($select_course)){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }

                                            while($row = mysqli_fetch_array($select_course)){

                                                $select_course_name = $row[0];
                                                echo "<option value='{$select_course_name}'>$select_course_name</option>";
                                                
                                            }





                                        ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12 add-margin">
                            <div class="form-group">

                                <select id="country" class="form-control custom-select">
                                    <option value="" selected>Select country</option>
                                    <?php

                                        $query = "SELECT * FROM countries";
                                        $select_countries = mysqli_query($connection,$query);
                                        if(!($select_countries)){
                                            die("QUERY FAILED".mysqli_error($connection));
                                        }

                                        while($row = mysqli_fetch_assoc($select_countries)){
                                            $country_id = $row['ID'];
                                            $country_name = $row['Name'];
                                            echo "<option value='{$country_id}'>$country_name</option>";

                                        }

                                        ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="form-group">

                                <select id="rating" class="form-control custom-select">
                                    <option value="" selected>Select rating</option>
                                    <option value="1">1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                        <option value="5">5</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <div id="below-search">
        
        
            
            
            

        
        
    </div>
    </div>
    <hr>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
    
     <script>
     $(document).ready(function(){
        var page=1;
        $('#below-search').load('filter.php');
        $('#below-search').on('click','a.page-link',function(e){
            e.preventDefault();
            var type = $('#type').val();
            var category = $('#category').val();
            var university = $('#university').val();
            var course = $('#course').val();
            var country = $('#country').val();
            var rating = $('#rating').val();
            var title = $("input").val();
            if($(this).find('.left-arrow').attr('class') == $('.left-arrow').attr("class") ){
                
                if(parseInt($('.page-link.active').text()) == 1){
                    var page = parseInt($('.page-link.active').text());
                    
                }
                else{
                    var page = parseInt($('.page-link.active').text()) - 1;
                    
                }
                
            }
            else if($(this).find('.right-arrow').attr("class") == $('.right-arrow').attr("class") ){
                if(parseInt($('.page-link.active').text()) == parseInt($(this).parent().prev().text()) )
                {
                    var page = parseInt($('.page-link.active').text());
                }
                else{
                    var page = parseInt($('.page-link.active').text()) + 1;
                }
                

            }
            else{
                var page = $(this).text();
            }
            
            
            
            
            
            $.ajax({
            type: "POST",
            url: "filter.php",
            data:{'type':type,
            'category':category,
            'course':course,
            'country':country,
            'university':university,
            'dropdown':"dropdown",
            'input':"input",
            'rating':rating,
            'page':page,
            'title':title

            },
            dataType: "text",
            success: function (res) {
                
                $('#below-search').html(res);    
            },
            error: function (err) {
                console.log(err.statusText);
            },           
            });
        });
        
        
        $("select").change(function(){
            var type = $('#type').val();
            var category = $('#category').val();
            var university = $('#university').val();
            var course = $('#course').val();
            var country = $('#country').val();
            var rating = $('#rating').val();
            var title = $("input").val();
            
            $.ajax({
            type: "POST",
            url: "filter.php",
            data:{'type':type,
            'category':category,
            'course':course,
            'country':country,
            'university':university,
            'dropdown':"dropdown",
            'rating':rating,
            'page':page,
            'input':"input",
            'title':title

            },
            dataType: "text",
            success: function (res) {
                
                $('#below-search').html(res);    
            },
            error: function (err) {
                console.log(err.statusText);
            },           
            });
        }); 
        $("input").keyup(function(){
            var title = $(this).val();
            var type = $('#type').val();
            var category = $('#category').val();
            var university = $('#university').val();
            var course = $('#course').val();
            var country = $('#country').val();
            var rating = $('#rating').val();
            $.ajax({
                type: "POST",
                url: "filter.php",
                data: {'title':title,

                       'input':"input",
                       'type':type,
                        'category':category,
                        'course':course,
                        'country':country,
                        'university':university,
                        'dropdown':"dropdown",
                        'rating':rating,
                        'page':page
                },
                dataType: "text",
                success: function (res) {
                    $('#below-search').html(res);
                },
                error: function (err) {
                    console.log(err.statusText);
                },
            });
        });
        
     });
        
        
    </script> 
    
</body>

</html>
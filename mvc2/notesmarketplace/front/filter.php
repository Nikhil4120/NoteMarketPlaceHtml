<?php
    include "../db.php";
?>
<section>
<?php
            if(isset($_POST['page'])){
                $page = (int)$_POST['page'];
                
            }
            else{

                $page = "";
            }

            if($page == "" || $page == 1){
                $page_1 = 0;
            }
            else{
                $page_1 = ($page * 9) - 9;
            }
?>

<?php
    
    $query = "SELECT *,sellernotes.id AS ID , AVG(ratings) AS avgratings  FROM sellernotes LEFT JOIN sellernotesreview ON sellernotesreview.NoteID = sellernotes.ID  WHERE status = 9";
    
    
    if(isset($_POST['dropdown'])){
        $type = $_POST['type'];
        $category = $_POST['category'];
        $course = $_POST['course'];
        $country = $_POST['country'];
        $universityname = $_POST['university'];
        $ratings = $_POST['rating'];
        
        if($type != ""){
            $query .= " AND notetype=$type";
        }
        if($category != ""){
            $query .= " AND category=$category";
        }
        if($course != ""){
            $query .= " AND course='{$course}'";
        }
        if($country != ""){
            $query .= " AND country='{$country}'";
        }
        if($universityname != ""){
            $query .= " AND universityname='{$universityname}'";
        }
        
    }
    if(isset($_POST['input'])){
        $title = $_POST['title'];
        if($title != ""){
            $query .= " AND title LIKE '%$title%'";
        }
    }
    $query .= " GROUP BY sellernotes.id";
    if(isset($ratings)){
        if($ratings != ""){
            $query .= " HAVING avgratings >= $ratings";
        }
    }
    $count_notes = mysqli_query($connection,$query);
    if(!($count_notes)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $count = mysqli_num_rows($count_notes);    
?>
<div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="heading">
                        <h2>
                            <?php 
                                if($count == 0)
                                {
                                    echo "No Notes Availiable";
                                }
                                else{
                                    echo "Total $count Notes";
                                }
                            ?>
                        </h2>

                    </div>
                </div>
            </div>
            <div class="books">
<?php
    $query .= " LIMIT $page_1,9";
    $select_query = mysqli_query($connection,$query);
    if(!($select_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_query)){
        
        $ID = $row['ID'];
        $sellerid = $row['SellerID'];
        $title = $row['Title'];
        $displaypicture = $row['DisplayPicture'];
        $publishdate = $row['PublishedDate'];
        $publishdate = date('D M j Y',strtotime($publishdate));
        $pages = $row['NumberofPages'];
        $university = $row['UniversityName'];
        $country = $row['Country'];
        if(isset($row['avgratings'])){
            $ratings = round($row['avgratings']);
        }
        else{
            $ratings = 0;
        }
        
        $country_query = mysqli_query($connection,"SELECT * FROM countries WHERE ID = $country");
        if(!($country_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $country_row = mysqli_fetch_assoc($country_query);
        $country = $country_row['Name'];
     ?>
    
<div class="card">
    <img src="../uploads/Members/<?php echo $sellerid;?>/<?php echo $ID;?>/<?php echo $displaypicture;?>" class="card-img-top img-thumbnail"
        alt="..." style="height:200px">
    <div class="card-body">
        <a href="note-details.php?note=<?php echo $title; ?>">
            <h5 class="card-title">
                <?php echo $title; ?>
            </h5>
        </a>
        <p class="card-text">
            <img src="images/images/university.png"><span>
                <?php echo $university . " , " . $country; ?>
            </span><br>
            <img src="images/images/pages.png"><span>
                <?php echo $pages; ?> Pages
            </span><br>
            <img src="images/images/calendar.png"><span>
                <?php echo $publishdate; ?>
            </span><br>
            <?php
                $count_report = mysqli_query($connection,"SELECT COUNT(noteid) FROM sellernotesreportedissues WHERE noteid = $ID");
                if(!($count_report)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                $report_row = mysqli_fetch_row($count_report);
                $report_count = $report_row[0];

            ?>
            <img src="images/images/flag.png"><span class="flag"><?php echo $report_count; ?> users marked this note as
                inappropriate</span>

        <div class="book-rating">
            <?php
                for($x = 1 ; $x <= $ratings ; $x++){
            ?>
            <img src="images/images/star.png">
            <?php
                }
                for($x = 1 ; $x <= 5 - $ratings ; $x++){
            ?>
            <img src="images/images/star-white.png">
            <?php
                }
            ?>
            <?php
                $count_review = mysqli_query($connection,"SELECT COUNT(noteid) FROM sellernotesreview WHERE noteid = $ID");
                if(!($count_review)){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                $review_row = mysqli_fetch_row($count_review);
                $review_count = $review_row[0];

            ?>
            
            <span><?php echo $review_count; ?> Reviews</span>
        </div>
        </p>

    </div>
</div>



<?php
   }
?>
</div>
</section>
<?php 
    $count = ceil($count / 9);
?>
<section id="pagination">
            <nav aria-label="Page navigation example">

                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><img src="images/images/left-arrow.png"
                                class="left-arrow"></a></li>
                    <?php
                        for($i=1 ; $i<=$count  ; $i++){
                            if($i == $page || ($page == "" && $i == 1)){
                                echo "<li class='page-item'><a class='page-link active' href=''>$i</a></li>";
                            }
                            else{
                                echo "<li class='page-item'><a class='page-link' href=''>$i</a></li>";
                            }
                            

                        }
                    ?>
                    <li class="page-item"><a class="page-link" href="#"><img src="images/images/right-arrow.png"
                                class="right-arrow"></a></li>
                </ul>
            </nav>
</section>
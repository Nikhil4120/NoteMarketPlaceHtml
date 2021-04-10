<?php
    include "../db.php";
?>
<?php
    session_start();

?>
<?php
    if(!(isset($_SESSION['ID']))){
        header("Location: ../login.php");
    }
    
?>
<?php
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] == 3){
        header('location: ../login.php');
    }
?>
<?php
    if(isset($_GET['delete'])){
        $reportdelete = $_GET['delete'];
        $report_delete_query = mysqli_query($connection,"DELETE FROM sellernotesreportedissues WHERE ID =$reportdelete");
        if(!($report_delete_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('location: spamreport.php'); 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spam Reports</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/spamreport/spamreport.css">
    <link rel="stylesheet" href="css/spamreport/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
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
                <?php
                    $reportedquery = mysqli_query($connection,"SELECT * FROM sellernotesreportedissues");
                    if(!($reportedquery)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                ?>
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
                            <?php
                                $j = 1;
                                while($row = mysqli_fetch_assoc($reportedquery)){
                                    $reportid = $row['ID'];
                                    $noteid = $row['NoteID'];
                                    $note_query = mysqli_query($connection,"SELECT title,category from sellernotes where id = $noteid");
                                    if(!($note_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $note_reported = mysqli_fetch_row($note_query);
                                    $notetitle = $note_reported[0];
                                    $notecategory = $note_reported[1];
                                    $cat_query = mysqli_query($connection,"SELECT name FROM notecategories WHERE ID = $notecategory");
                                    if(!($cat_query)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $note_categoryrow = mysqli_fetch_row($cat_query);
                                    $notecategory = $note_categoryrow[0];
                                    $reportedby = $row['ReportedByID'];
                                    $reporteduser = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $reportedby");
                                    if(!($reporteduser)){
                                        die("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $reportedrow = mysqli_fetch_row($reporteduser);
                                    $reportedfirstname = $reportedrow[0];
                                    $reportedlastname = $reportedrow[1];
                                    $remarks = $row['Remarks'];
                                    $addeddate = $row['CreatedDate'];
                                    $addeddate = date('d-m-Y, h:i',strtotime($addeddate));

                            ?>
                            <tr>
                                <th scope="row"><?php echo $j++; ?></th>
                                <td><?php echo $reportedfirstname . "" . $reportedlastname ;?></td>
                                <td><?php echo $notetitle; ?></td>
                                <td><?php echo $notecategory; ?></td>
                                <td><?php echo $addeddate?></td>
                                <td><?php echo $remarks?></td>
                                <td><a href="spamreport.php?delete=<?php echo $reportid; ?>" class="delete"><img src="images/images/delete.png"></a></td>
                                <td>
                                    
                                    <div class="dropdown">
                                            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><img src="images/images/dots.png"></button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                                <a class="dropdown-item" href="downloadpdf.php?id=<?php echo $noteid; ?>">Download Note</a>
                                                <a class="dropdown-item" href="admin_notedetails.php?note=<?php echo $noteid; ?>">View More Details</a>
                                            </div>

                                    </div>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>



    </div>

    <hr>

    <?php
        include "includes/admin_footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready( function () {
        var table = $('table').DataTable({
                'sDom' : '"top"i',
                "iDisplayLength":5,
                "binfo":false,
                language:{
                    paginate:{
                        next:'<img src="images/images/right-arrow.png">',
                        previous:'<img src="images/images/left-arrow.png">'
                    }
                },
                columnDefs:[{
                    targets:[6,7],
                    orderable:false,
                }]
                
            }

            );
        $('.btn-search').click(function(){
            var x = $('#search').val();
            
            table.search(x).draw();
        });

        });
    </script>
    <script>
        $(function(){
            $('.delete').click(function(){
                if(confirm("Are you sure want to deleted this reported issue")){
                    return true;
                }
                else{
                    return false;
                }
            })
        });
    </script>
</body>

</html>
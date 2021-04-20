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
        $inactivecountry = $_GET['delete'];
        $inactivecountryquery = "UPDATE countries SET isactive = 0 WHERE ID = $inactivecountry ";
        $inactivecountryquery = mysqli_query($connection,$inactivecountryquery);
        if(!($inactivecountryquery)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('location: managecountry.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Country</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/managecountry/managecountry.css">
    <link rel="stylesheet" href="css/managecountry/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="manage-country">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">

                            <h2>Manage Country</h2>

                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="country-dashboard-table">

                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <div class="table-heading">
                            <a href="addcountry.php"><button class="btn btn-country" type="submit">Add Country</button></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <form class="form-inline">
                            <div class="search-box">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                id="search">
                            <img src="images/Dashboard/search.jpg" alt="search" class="search-icon"></div>
                            <div class="search-btn">
                            <button class="btn btn-search" type="button">Search</button></div>
                            
                        </form>
                    </div>
                </div>
                <?php

                    $query = mysqli_query($connection,"SELECT * FROM countries");
                    if(!($query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }

                ?>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">COUNTRY NAME</th>
                            <th scope="col">COUNTRY CODE</th>
                            <th scope="col">DATE ADDED</th>

                            <th scope="col">ADDED BY</th>
                            

                            <th scope="col">ACTIVE</th>
                            <th scope="col">ACTION</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                $j=1;
                                while($row = mysqli_fetch_assoc($query)){
                                    $countryid = $row['ID'];
                                    $countryname = $row['Name'];
                                    $countrycode = $row['CountryCode'];
                                    
                                    
                                    $date = $row['CreatedDate'];
                                    $addedby = $row['CreatedBy'];
                                    $active = $row['IsActive'];
                                    if($active == 0){
                                        $active = "NO";
                                    }
                                    else if($active == 1){
                                        $active = "YES";
                                    }
                                    $user_query = mysqli_query($connection,"SELECT firstname,lastname FROM users WHERE ID = $addedby");
                                    if(!$user_query){
                                        mysqli_error("QUERY FAILED".mysqli_error($connection));
                                    }
                                    $user_row = mysqli_fetch_row($user_query);
                                    $firstname = $user_row[0];
                                    $lastname = $user_row[1];

                            ?>
                        <tr>
                            <th scope="row"><?php echo $j++; ?></th>
                            <td><?php echo $countryname; ?></td>
                            <td><?php echo $countrycode;?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $firstname . " " . $lastname ; ?></td>
                            
                            
                            
                            <td><?php echo $active; ?></td>
                            <td><a href="addcountry.php?edit=<?php echo $countryid; ?>"><img src="images/images/edit.png"><span style="float:right;"><a href="managecountry.php?delete=<?php echo $countryid; ?>" class="delete"><img src="images/images/delete.png"></a></span></td>
                        </tr>
                        <?php
                                }
                        ?>
                        
                    </tbody>
                </table></div>
            </div>
            
        </div>
    </div>



    </div>

    <hr>
    
    <?php
        include "includes/admin_footer.php";
    ?>
        <script src="js/jquery.min.js"></script>
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
                    targets:[6],
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
            $('table').on('click','.delete',function(){
                if(confirm("Are You Confirm inactive this Country?")){
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
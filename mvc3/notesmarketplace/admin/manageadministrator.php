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
    if(isset($_SESSION['roleid']) && $_SESSION['roleid'] == 3){
        header('location: admin_dashboard.php');
    }
?>
<?php
    if(isset($_GET['delete'])){
        $inactiveuser = $_GET['delete'];
        $inactiveuserquery = "UPDATE users SET isactive = 0 WHERE id = $inactiveuser";
        $inactiveuserquery = mysqli_query($connection,$inactiveuserquery);
        if(!($inactiveuserquery)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        header('location: manageadministrator.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Administrator</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/manageadministrator/manageadministrator.css">
    <link rel="stylesheet" href="css/manageadministrator/responsive.css">

</head>

<body>
<?php
        include "includes/admin_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <div class="manage-administrator">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="heading">

                            <h2>Manage Administrator</h2>

                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="admin-dashboard-table">

                <div class="row">
                    <div class="col-md-5 col-sm-12 col-12">
                        <div class="table-heading">
                            <a href="addadministrator.php"><button class="btn btn-administrator" type="submit">Add Administrator</button></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-12">
                        <form class="form-inline">
                            <div id="search-box">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                id="search"></div>
                                
                            <img src="images/Dashboard/search.jpg" alt="search" class="search-icon">
                            <div id="search-btn">  <button class="btn btn-search " type="submit">Search</button></div>
                            
                        </form>
                    </div>
                </div>
                <?php

                    $admin_query = "SELECT * FROM users WHERE roleid = 2";
                    $admin_query = mysqli_query($connection,$admin_query);
                    if(!($admin_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }

                ?>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">EMAIL</th>

                            <th scope="col">PHONE NO.</th>
                            <th scope="col">DATE ADDED</th>

                            <th scope="col">ACTIVE</th>
                            <th scope="col">ACTION</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j = 1;
                            while($row = mysqli_fetch_assoc($admin_query)){
                                $userid = $row['ID'];
                                $firstname = $row['FirstName'];
                                $lastname = $row['LastName'];
                                $email = $row['EmailID'];
                                $userprofile_query = mysqli_query($connection,"SELECT phonenumber FROM userprofile WHERE userid = $userid");
                                if(!($userprofile_query)){
                                    die("QUERY FAILED".mysqli_error($connection));
                                }
                                $userprofile_row = mysqli_fetch_row($userprofile_query);
                                $phone = $userprofile_row[0];
                                $createddate = $row['CreatedDate'];
                                $active = $row['IsActive'];
                                if($active == 0){
                                    $active = "NO";
                                }
                                else if($active == 1){
                                    $active = "YES";
                                }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $j++; ?></th>
                            <td><?php echo $firstname; ?></td>
                            <td><?php echo $lastname; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $createddate; ?></td>
                            <td><?php echo $active; ?></td>
                            <td><a href="addadministrator.php?edit=<?php echo $userid; ?>"><img src="images/images/edit.png"></a><span style="float:right;"><a href="manageadministrator.php?delete=<?php echo $userid; ?>" class="delete" ><img src="images/images/delete.png"></a></span></td>
                                
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
                if(confirm("Are You Confirm delete this administrator?")){
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
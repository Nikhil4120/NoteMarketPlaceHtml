<?php
    include "../db.php";
?>
<?php
    session_start();
?>


<?php
   
   if(!(isset($_SESSION['ID']))){
        header('Location: login.php');
   }

?>
<?php
    $user_id = $_SESSION['ID'];
    $select_user = "SELECT * FROM users WHERE ID = $user_id";
    $select_user_query = mysqli_query($connection,$select_user);
    if(!($select_user_query)){
        die("QUERY FAILED".mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($select_user_query);
    $email = $row['EmailID'];
    $firstname = $row['FirstName'];
    $lastname = $row['LastName'];
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM sellernotesattachments WHERE noteid  = $id";
        $select_pdf_query = mysqli_query($connection,$query);
        if(!($select_pdf_query)){
            die("QUERY FAILED".mysqli_error($connection));
        }
        $pdfs = [];      
        while($row = mysqli_fetch_assoc($select_pdf_query)){
            $filepath = $row['FilePath'];
        
        $pdf_file_path = "../" . $filepath;
        echo $pdf_file_path;
        
        if(file_exists($pdf_file_path)){
            $query = "SELECT * FROM sellernotes WHERE ID = $id";
            $select_query = mysqli_query($connection,$query);
            if(!($select_query)){
                die("QUERY FAILED".mysqli_error($connection));
            }
            $row = mysqli_fetch_assoc($select_query);
            $sellerid = $row['SellerID'];
            $downloaderid = $_SESSION['ID'];
            $title = $row['Title'];
            $category = $row['Category'];
            $selltype = $row['IsPaid'];
            $sellprice = $row['SellingPrice'];
            $insert_query = "INSERT INTO downloads(noteid,seller,downloader,issellerhasalloweddownload,attachmentpath,isattachmentdownloaded,attachmentdownloadeddate,ispaid,purchasedprice,notetitle,notecategory,createddate,createdby)";
            $insert_query .= "VALUES($id,$sellerid,$downloaderid,1,'{$filepath}',1,now(),$selltype,$sellprice,'{$title}',$category,now(),$downloaderid)";
            $insert_select_query = mysqli_query($connection,$insert_query);
            if(!($insert_select_query)){
                die("QUERY  FAILED".mysqli_error($connection));
            }
            
                      
            
        }
        else{
            echo "file not found";
        }
        }
        $zipname = time() . ".zip";
        $zip = new ZipArchive;
        $zip->open($zipname,ZipArchive::CREATE | ZipArchive::OVERWRITE);
        foreach($pdfs as $file){
            $zip->addFile($file,basename($file));
        }
        $zip->close();
        header('Content-type: application/zip');
        header('Content-Disposition: attachment;filename='.$zipname);
        readfile($zipname);
        unlink($zipname);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Rejected Notes</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/myrejectednotes/myrejectednotes.css">
    <link rel="stylesheet" href="css/myrejectednotes/responsive.css">

</head>

<body>
    <?php
        $page = "myrejectednotes";
        include "includes/reg_header.php";
    ?>
    <div class="flex-shrink-0" id="padding-navbar">
        <div class="container">
            <section id="my-downloads">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-12">
                        <div class="heading">
                            <h2>My Rejected Notes</h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-12 my-2 my-lg-0">
                        <form class="form-inline">
                            <div id="search-box">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" id="search">
                                <img src="images/images/search-icon.png" class="search-icon">
                            </div>
                            <div id="search-btn">
                                <button class="btn btn-search" type="button">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    $query = "SELECT sellernotes.title AS Title,Name,sellernotes.id AS ID FROM sellernotes LEFT JOIN notecategories ON sellernotes.category = notecategories.ID  WHERE status = 10 AND sellerid = $user_id";
                    $select_query = mysqli_query($connection,$query);
                    if(!($select_query)){
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                ?>
                <div class="download-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">REMARKS</th>
                                    <th scope="col">CLONE</th>

                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $j=1;
                                    while($row = mysqli_fetch_assoc($select_query)){
                                        $title = $row['Title'];
                                        $category = $row['Name'];
                                        $noteid = $row['ID'];
                                ?>
                                <tr>
                                <th scope="row"><?php echo $j++;?></th>
                                    <td><a href="note-details.php?note=<?php echo $title;?>"><?php echo $title ?></a></td>
                                    <td><?php echo $category;?></td>
                                    <td>lorem ipsum is simply dummy text</td>
                                    <td>clone</td>

                                    <td>
                                        <div class="dropdown">
                                        <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/images/dots.png"></button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="myrejectednotes.php?id=<?php echo $noteid; ?>">Download Note</a>
                                            
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
            </section>


        </div>



    </div>

    <hr>
    <?php
        include "includes/footer.php";
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="js/script.js"></script>
    <script>
      $(document).ready( function () {
        var table = $('table').DataTable({
                'sDom' : '"top"i',
                "iDisplayLength":10,
                "binfo":false,
                language:{
                    paginate:{
                        next:'<img src="images/images/right-arrow.png">',
                        previous:'<img src="images/images/left-arrow.png">'
                    }
                },
                columnDefs:[{
                    targets:[5],
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
</body>

</html>
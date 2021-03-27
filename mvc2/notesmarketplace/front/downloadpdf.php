<?php
    include "../db.php";
?>
<?php
    session_start();
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
            
            array_push($pdfs,$pdf_file_path);       
            
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
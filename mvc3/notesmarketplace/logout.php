<?php
    session_start();
?>

<?php

    if(isset($_REQUEST['logout'])){
        session_destroy();
        header('Location: login.php');
    }

?>
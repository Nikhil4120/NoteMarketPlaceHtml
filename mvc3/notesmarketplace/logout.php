<?php
    session_start();
?>

<?php

    if(isset($_REQUEST['logout'])){
        session_destroy();
        setcookie('emailcookie','',time()-86400);
        setcookie('passwordcookie','',time()-86400);
        header('Location: login.php');
    }

?>
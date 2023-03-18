<?php
    session_start();

    $_SESSION['ranking'][$_SESSION['username']] = $_SESSION['dollar'];
    $str_temp1 = '';
    foreach ($_SESSION['ranking'] as $user=>$money){
        $str_temp1 = $str_temp1." ".$user." ".$money;
    }
    file_put_contents('rank.txt',$str_temp1);

    session_destroy();
    header("location:login.php");
    exit();
?>
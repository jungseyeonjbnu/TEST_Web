<?php
    session_start(); 

    unset($_SESSION['isLoginId']);

    Header("Location: ../index.php"); //수정한 코드
?>
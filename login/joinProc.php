<?php

    include "dbClass.php";

    $data = array($_POST['user_id'],$_POST['pwd'],$_POST['name'],$_POST['email']);

    $data[] = date("Y-m-d H:i:s");


    $query = "insert into member(user_id, pwd, name, email, regdate) values(?,password(?),?,?,?) "; // 수정한 코드
    $insert  = $db->query($query,$data);
    $cnt = $insert->affectedRows();

    if($cnt!=1){
        echo $cnt;
        exit;
    }
    Header("Location: login.php");
?>
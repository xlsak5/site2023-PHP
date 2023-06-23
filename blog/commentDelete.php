<?php
    include "../connect/connect.php";

    $commentPass = $_POST['commentPass'];
    $commentID = $_POST['commentID'];


    $slq = "DELETE FROM blogComment WHERE commentID = '$commentID' ;
    $result = $connect -> query($sql);


    echo json_encode(array("info" => $sql ));
?>
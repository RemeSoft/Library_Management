<?php
function notifications($message,$status){
    include "../database/connection.php";
    $sql = "INSERT INTO notifications (message,status) VALUE ('$message','$status')";
    $conn->query($sql);
}


?>
<?php
session_start();
//require_once '../controller/authentication.php';
require_once '../model/database.php';
require_once '../controller/User.php';

if(isset($_SESSION['admin_level'])&&isset($_SESSION['user_id'])){
    if($_SESSION['admin_level']==10){
        $result = queryMysql("SELECT user_id, first_name, last_name, email, phone, receive_discount FROM users");
        if($result->num_rows!=0){
            $row = array();
            while ($rows = $result->fetch_assoc()) {
                array_push($row, $rows);
            }
            print_r(json_encode($row));
        }
            //Close the connection
        $connection->close();
    } else{
        echo 'Error, You are not one of the administrator!';
    }
}else{
    echo 'Error, Session is not set!';
}



?>
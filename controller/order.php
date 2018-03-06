<?php
session_start();
//require_once '../controller/authentication.php';
require_once '../model/database.php';

if (isset($_SESSION['user_id'])&&isset($_SESSION['password'])){
    $user_id = $_SESSION['user_id'];

    if(isset($_GET['action'])){
        //view order
        if($_GET['action'] == 'view_order'){
            if (isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
                $result = queryMysql("SELECT food_id, food_name, food_price, note 
                                      FROM food 
                                      WHERE (user_id='$user_id')
                                      ORDER BY food_name ASC ");
                if($result->num_rows!=0){
                    $row = array();

                    while ($rows = $result->fetch_assoc()) {
                        array_push($row, $rows);
                    }
                    print_r(json_encode($row));
                }
                //Close the connection
                $connection->close();
            }
        }


        //Add order
        if($_GET['action'] == 'add_order'){
            if(isset($_POST['order_name']) &&isset($_POST['order_price'])){
                $order_name = mysqli_real_escape_string($connection, sanitizeString($_POST['order_name']));
                $order_price = mysqli_real_escape_string($connection, sanitizeString($_POST['order_price']));
                //Insert into database
                $result = queryMysql("INSERT INTO food (user_id, food_name, food_price)
                                  VALUES ( '$user_id' , '$order_name', '$order_price');");
                //Close the connection
                $connection->close();
            }
            else{
                //Send message to client side
                echo 'Error, missing important info!';
            }
        }
        //Delete order
        if($_GET['action'] == 'delete_order'){
            if(isset($_POST['food_id'])){
                $food_id = $_POST['food_id'];
                $result_delete = queryMysql("DELETE FROM food WHERE food_id='$food_id';");
                //Close the connection
                $connection->close();
            }else{
                //Send message to client side
                echo 'Missing food ID !';
            }
        }
        //Add note
        if($_GET['action'] == 'add_note'){
            if(isset($_POST['food_id'])){
                $food_id = $_POST['food_id'];
                $result_addNote = queryMysql("SELECT food_id, food_name, food_price, note FROM food WHERE food_id='$food_id';");
                if($result_addNote->num_rows!=0){
                    $row = array();
                    while ($rows = $result_addNote->fetch_assoc()) {
                        array_push($row, $rows);
                    }
                    print_r(json_encode($row));
                }
                //Close the connection
                $connection->close();
            }else{
                //Send message to client side
                echo 'Missing food ID !';
            }
        }

        //Save note
        if($_GET['action'] == 'save_note'){
            if(isset($_POST['food_id'])&&isset($_POST['note']))
            {
                $food_id = mysqli_real_escape_string($connection, sanitizeString($_POST['food_id']));
                $note = mysqli_real_escape_string($connection, sanitizeString($_POST['note']));

                $result= queryMysql("UPDATE food 
                                  SET note = '$note'
                                  WHERE food.food_id = '$food_id'");
                print_r('update has been done');
                //Close the connection
                $connection->close();
            }else{
                //Send message to client side
                echo 'Missing food ID !';
            }
        }

        //Save note
        if($_GET['action'] == 'add_same_food'){
            if(isset($_POST['food_id'])&&isset($_SESSION['user_id']))
            {
                $food_id = mysqli_real_escape_string($connection, sanitizeString($_POST['food_id']));
                $user_id = mysqli_real_escape_string($connection, sanitizeString($_SESSION['user_id']));
                $result= queryMysql("SELECT * FROM food 
                                     WHERE food_id = '$food_id'");
                if($result->num_rows!=0){
                    $row = $result->fetch_assoc();
                   // print_r($row['food_name']);
                    $food_name = $row['food_name'];
                    $food_price = $row['food_price'];
                    $food_note = $row['note'];
                    $result_insert_food=queryMysql("INSERT INTO food (user_id, food_name, food_price, note)
                                                    VALUES ( '$user_id' , '$food_name', '$food_price', '$food_note');");
                    echo 'all set';
                }else{
                    echo 'Error';
                }
                //Close the connection
                $connection->close();
            }else{
                //Send message to client side
                echo 'Missing food ID !';
            }
        }

    }else{
        //Send message to client side
        echo 'Error, Action is not set!';
    }
}

else{
    //Send message to client side
    echo 'Please sign in or sign up!';
}










?>
<?php
    session_start();
    //require_once '../controller/authentication.php';
    require_once '../model/database.php';
    //Make reservation
    If(isset($_SESSION['user_id'])&&isset($_SESSION['password'])){
        if($_GET['action']=='make_reservation'){
            if(isset($_POST['num_of_people']) &&isset($_POST['reservation_time']) &&isset($_POST['reservation_date'])){
                $people = mysqli_real_escape_string($connection, sanitizeString($_POST['num_of_people']));
                $time = mysqli_real_escape_string($connection, sanitizeString($_POST['reservation_time']));
                $date = mysqli_real_escape_string($connection, sanitizeString($_POST['reservation_date']));
                $user_id = $_SESSION['user_id'];
                //check reservation avaliability
                $result_check = queryMysql("SELECT * FROM reservation 
                                                WHERE reservation_date = '$date' 
                                                  AND reservation_time = '$time';");
                if($result_check->num_rows>=3){
                    echo 'Failed';
                }else{
                    $result = queryMysql("INSERT INTO reservation (user_id, people, reservation_date, reservation_time)
                                                              VALUES ( '$user_id' ,'$people','$date','$time');");
                    //Send message to client side
                    echo 'Successfully';
                    //Close the connection
                    $connection->close();
                }
            }
        }
        //Reservation status
        if($_GET['action']=='check_reservation'){
            $user_id = $_SESSION['user_id'];
            $result = queryMysql("SELECT reservation_id, people, reservation_date, reservation_time 
                                      FROM reservation
                                      WHERE user_id='$user_id'");
            if($result->num_rows!=0){
                $row = array();
                while ($rows = $result->fetch_assoc()) {
                    array_push($row, $rows);
                }
                print_r(json_encode($row));
                //Close the connection
                $connection->close();
            }else{
                //Send message to client side
                echo 'Whoops, no reservation has been made!';
            }
        }
    }
    else{
       echo 'Please sign in or sign up to make a reservation!' ;
    }
























?>
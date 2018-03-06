<?php
session_start();
//require_once '../controller/authentication.php';
require_once '../model/database.php';
require_once '../controller/User.php';

if(isset($_GET['action'])){
    /*--------------------------------Sign Up-------------------------------*/
    if($_GET['action'] == 'signUp'){
        //Declare an Array to hold Errors
        $error = array();
        if(isset($_POST['first_name'])&& isset($_POST['last_name'])&& isset($_POST['email_address'])
            && isset($_POST['phone'])&&isset($_POST['receive_discount'])&&isset($_POST['password'])
            &&isset($_POST['confirm_password']))
        {
            $fname = mysqli_real_escape_string($connection, sanitizeString($_POST['first_name']));
            $lname = mysqli_real_escape_string($connection, sanitizeString($_POST['last_name']));
            $email_signUp = mysqli_real_escape_string($connection, sanitizeString($_POST['email_address']));
            $phone_signUp = mysqli_real_escape_string($connection, sanitizeString($_POST['phone']));
            $password = mysqli_real_escape_string($connection, sanitizeString($_POST['password']));
            $confirm_password = mysqli_real_escape_string($connection, sanitizeString($_POST['confirm_password']));
            $discount = mysqli_real_escape_string($connection, $_POST['receive_discount']);

            $user_signUp = new User($fname,$lname, $email_signUp, $phone_signUp,$password,$confirm_password,$discount );
            $user_signUp->data_validation_user();
            $error = $user_signUp->get_error();

            //If no error happens
            if (strlen($error) == 0){
                $result_check_email = queryMysql("SELECT email FROM users WHERE email = '$email_signUp'");
                if($result_check_email->num_rows!=0){
                    echo "Whoops, this email address has already been registered, please use another one!";
                }
                //If email usable , insert into database
                else{
                    //Hash the password
                    $salt1= 'dota$#';
                    $salt2= 'cdn*$';
                    $hash = hash('ripemd128',  $salt1.$user_signUp->get_password(). $salt2);

                    $_SESSION['password'] = $hash;
                    $result = queryMysql("INSERT INTO users (first_name, last_name,email, phone, password, 	receive_discount)
                                  VALUES ( '$fname' ,'$lname','$email_signUp','$phone_signUp','$hash','$discount');");

                    //Get user id from customer table
                    $user_table = queryMysql("SELECT * FROM users ORDER BY user_id DESC LIMIT 1");
                    $row = mysqli_fetch_assoc($user_table);

                    $temp= $row['user_id'];
                    //Add to foreign key tables1
                    $food_table =queryMysql("INSERT INTO food (user_id)
				  VALUES ( '$temp' )");
                    $reservation_table =queryMysql("INSERT INTO reservation (user_id)
				  VALUES ( '$temp' )");

                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['first_name'] = $user_signUp->get_first_name();
                    $_SESSION['last_name'] = $user_signUp->get_last_name();
                    $_SESSION['email'] = $user_signUp->get_email();
                    $_SESSION['phone_number'] =  $user_signUp->get_phone();
                    $_SESSION['receive_discount'] =  $user_signUp->get_discount();
                    //Close the connection
                    $connection->close();
                    //Send message to client side
                    echo 'Welcome to The Cafe Corner';
                }
            }else{
                echo $error;
            }
        }
    }

    /* --------------------Sign In --------------------------*/
    if ($_GET['action'] == 'signIn') {
        //Declare an Array to hold Errors
        $error_signIn = array();

        if(isset($_POST['email_address_signIn'])&& isset($_POST['password_signIn'])){
            $email_signIn = mysqli_real_escape_string($connection, sanitizeString($_POST['email_address_signIn']));
            $password_signIn = mysqli_real_escape_string($connection, sanitizeString($_POST['password_signIn']));

            if(strlen($email_signIn)==0 || strlen($password_signIn)==0){
                $error1 = "Not all field were entered!";
                array_push($error_signIn, $error1);
            }else{
                $result_db = queryMysql("SELECT * FROM users WHERE email = '$email_signIn'");
                if($result_db->num_rows == 0){
                    $error2 = "Invalid email or password!";
                    array_push($error_signIn, $error2);
                }else{
                    $row = $result_db->fetch_array(MYSQLI_ASSOC);
                    $db_password = $row['password'];
                    $salt1= 'dota$#';
                    $salt2= 'cdn*$';
                    $hash = hash('ripemd128',  $salt1.$password_signIn.$salt2);

                   if ($hash == $db_password) {
                       $_SESSION['user_id'] = $row['user_id'];
                       $_SESSION['first_name'] = $row['first_name'];
                       $_SESSION['last_name'] = $row['last_name'];
                       $_SESSION['email'] = $row['email'];
                       $_SESSION['phone_number'] = $row['phone'];
                       $_SESSION['password'] = $row['password'];
                       $_SESSION['receive_discount'] = $row['receive_discount'];
                       $_SESSION['admin_level'] = $row['admin_level'];

                       //Close the connection
                       $connection->close();
                       //Send message to client side
                       echo 'Welcome back';
                   }
                   else{
                       //Send message to client side
                       echo 'Error, Invalid email or password!';
                   }

                }
            }
        }
        foreach ($error_signIn as $info){
            echo $info;
        }
    }

    /* --------------------Log Out-------------------------*/
    if($_GET['action'] == 'logOut'){
        session_destroy();
        echo ' Logout...';
    }

    /* -------------------Update user info yourself -------------------------*/
    if($_GET['action'] == 'display'){
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $result = queryMysql("SELECT user_id, first_name, last_name, email, phone, receive_discount 
                                  FROM users
                                  WHERE user_id='$user_id'");
            if($result->num_rows!=0){
                $row = array();
                while ($rows = $result->fetch_assoc()) {
                    array_push($row, $rows);
                }
                print_r(json_encode($row));
            }
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, Session is not set!';
        }

    }

    if($_GET['action'] == 'update'){
        //Declare an Array to hold Errors
        $error = array();
        if(isset($_POST['user_id'])&&isset($_POST['first_name'])&& isset($_POST['last_name'])&& isset($_POST['email'])
            && isset($_POST['phone'])&&isset($_POST['discount'])&&isset($_POST['password']))
        {
            $user_id = mysqli_real_escape_string($connection, sanitizeString($_POST['user_id']));
            $fname = mysqli_real_escape_string($connection, sanitizeString($_POST['first_name']));
            $lname = mysqli_real_escape_string($connection, sanitizeString($_POST['last_name']));
            $email = mysqli_real_escape_string($connection, sanitizeString($_POST['email']));
            $phone = mysqli_real_escape_string($connection, sanitizeString($_POST['phone']));
            $password = mysqli_real_escape_string($connection, sanitizeString($_POST['password']));
            $confirm_password = mysqli_real_escape_string($connection, sanitizeString($_POST['password']));
            $discount = mysqli_real_escape_string($connection, $_POST['discount']);

            $user_update = new User($fname,$lname, $email, $phone,$password,$confirm_password,$discount );
            $user_update->data_validation_user();
            $error = $user_update->get_error();

            //If no error happens
            if (strlen($error) == 0){
                //Hash the password
                $salt1= 'dota$#';
                $salt2= 'cdn*$';
                $hash = hash('ripemd128',  $salt1.$user_update->get_password(). $salt2);

                $result= queryMysql("UPDATE users 
                                     SET first_name = '$fname',last_name='$lname', email='$email',
                                         phone='$phone', password='$hash', receive_discount ='$discount'
                                     WHERE users.user_id = '$user_id'");


                $_SESSION['user_id'] = $user_id;
                $_SESSION['first_name'] = $user_update->get_first_name();
                $_SESSION['last_name'] = $user_update->get_last_name();
                $_SESSION['email'] = $user_update->get_email();
                $_SESSION['phone_number'] =  $user_update->get_phone();
                $_SESSION['password'] =  $user_update->get_password();
                $_SESSION['receive_discount'] =  $user_update->get_discount();
                //Close the connection
                $connection->close();
                //Send message to client side
            }else{
                echo $error;
            }
        }
    }

    /* -------------------Display reservation -------------------------*/
    if($_GET['action'] == 'displayReservation'){
        if(isset($_SESSION['user_id'])){
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
            }
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, Session is not set!';
        }

    }

    /* -------------------Reservation -------------------------*/
    if($_GET['action'] == 'reservation'){
        if(isset($_POST['reservation_id'])){
            $reservation_id = $_POST['reservation_id'];
            $result = queryMysql("SELECT reservation_id, people, reservation_date, reservation_time 
                                  FROM reservation
                                  WHERE reservation_id='$reservation_id'");
            if($result->num_rows!=0){
                $row = array();
                while ($rows = $result->fetch_assoc()) {
                    array_push($row, $rows);
                }
                print_r(json_encode($row));
            }
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, id is not set!';
        }
    }

    /* -------------------Edit Reservation -------------------------*/
    if($_GET['action'] == 'editReservation'){
        if(isset($_POST['reservation_date'])&&isset($_POST['reservation_time'])
             &&isset($_POST['num_of_people']) &&isset($_POST['reservation_id']))
        {
            $reservation_date = mysqli_real_escape_string($connection, sanitizeString($_POST['reservation_date']));
            $reservation_time = mysqli_real_escape_string($connection, sanitizeString($_POST['reservation_time']));
            $people = mysqli_real_escape_string($connection, sanitizeString($_POST['num_of_people']));
            $reservation_id = mysqli_real_escape_string($connection, sanitizeString($_POST['reservation_id']));

            //check reservation avaliability
            $result_check = queryMysql("SELECT * FROM reservation
                                        WHERE reservation_date = '$reservation_date'
                                        AND reservation_time = '$reservation_time';");
            if($result_check->num_rows>=3) {
                echo 'Failed';
            }else {
                $result = queryMysql("UPDATE reservation 
                                  SET reservation_date = '$reservation_date',reservation_time='$reservation_time',
                                      people ='$people'
                                  WHERE reservation_id = '$reservation_id'");
                echo 'Successfully';
            }
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, something is not set!';
        }
    }

    /* -------------------Delete Reservation -------------------------*/
    if($_GET['action'] == 'deleteReservation'){
        if(isset($_POST['reservation_id'])){
            $reservation_id = mysqli_real_escape_string($connection, sanitizeString($_POST['reservation_id']));
            $result_reservation = queryMysql("DELETE FROM reservation WHERE reservation_id='$reservation_id'");
            echo 'Delete Successfully!';
        }
        //Close the connection
        $connection->close();
    }


}
/*-------------------------if action is not set---------------------------------*/
else{
    echo "Action is not set!";
}

?>
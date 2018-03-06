<?php
session_start();
//require_once '../controller/authentication.php';
require_once '../model/database.php';
require_once '../controller/User.php';

if(isset($_GET['action'])){
    //Action  =   Edit
    if ($_GET['action'] == 'edit'){
        if(isset($_POST['user_id'])){
            $user_id = mysqli_real_escape_string($connection, sanitizeString($_POST['user_id']));
            $result= queryMysql("SELECT user_id, first_name, last_name, email, phone, receive_discount 
                                  FROM users 
                                  WHERE user_id = '$user_id'");
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

    //Action  =   Delete
    if ($_GET['action'] == 'delete'){
        if(isset($_POST['user_id'])){
            $user_id = mysqli_real_escape_string($connection, sanitizeString($_POST['user_id']));
            if($user_id ==96){
                echo 'Error';
            }else{
                $result_food = queryMysql("DELETE FROM food WHERE user_id='$user_id'");
                $result_reservation = queryMysql("DELETE FROM reservation WHERE user_id='$user_id'");
                $result_users= queryMysql("DELETE FROM users WHERE user_id='$user_id'");
                echo 'Delete Successfully!';
            }

        }
        //Close the connection
        $connection->close();
    }

    //Action  =   Search
    if ($_GET['action'] == 'search'){
        if(isset($_POST['txtSearch'])&&isset($_POST['txtSearchLabel'])){
            $txtSearch = mysqli_real_escape_string($connection, sanitizeString($_POST['txtSearch']));
            $txtSearchLabel = mysqli_real_escape_string($connection, sanitizeString($_POST['txtSearchLabel']));

            //Search depend on search label
            switch ($txtSearchLabel) {
                //First name
                case "first_name":
                    $result = queryMysql("SELECT user_id, first_name, last_name, email, phone, receive_discount 
                                          FROM users
                                          WHERE users.first_name LIKE '%$txtSearch%'");
                    if($result->num_rows!=0){
                        $row = array();
                        while ($rows = $result->fetch_assoc()) {
                            array_push($row, $rows);
                        }
                        print_r(json_encode($row));
                    }else{
                        print_r('No result found!');
                    }
                    break;

                //Last name
                case "last_name":
                    $result = queryMysql("SELECT user_id, first_name, last_name, email, phone, receive_discount 
                                  FROM users
                                  WHERE users.last_name LIKE '%$txtSearch%'");
                    if($result->num_rows!=0){
                        $row = array();
                        while ($rows = $result->fetch_assoc()) {
                            array_push($row, $rows);
                        }
                        print_r(json_encode($row));
                    }else{
                        print_r('No result found!');
                    }
                    break;
                //Default is user id
                default:
                    $result = queryMysql("SELECT user_id, first_name, last_name, email, phone, receive_discount 
                                  FROM users
                                  WHERE users.user_id = '$txtSearch'");
                    if($result->num_rows!=0){
                        $row = array();
                        while ($rows = $result->fetch_assoc()) {
                            array_push($row, $rows);
                        }
                        print_r(json_encode($row));
                    }else{
                        print_r('No result found!');
                    }

            }

            //If no the search text or search label is not set
        }else{
            print_r('Error, Missing search text or search label!');
        }
        //Close the connection
        $connection->close();
    }


    //Action  =   viewOrder
    if ($_GET['action'] == 'viewOrder'){
        if(isset($_POST['user_id'])){
            $user_id = mysqli_real_escape_string($connection, sanitizeString($_POST['user_id']));
            $result= queryMysql("SELECT food_name, food_price, note 
                                  FROM food 
                                  WHERE food.user_id = '$user_id'");
            if($result->num_rows!=0){
                $row = array();
                while ($rows = $result->fetch_assoc()) {
                    array_push($row, $rows);
                }
                print_r(json_encode($row));
            }else{
                print_r('No result found!');
            }
            //Close the connection
            $connection->close();
        }
    }

    //Action  =  Update user
    if ($_GET['action'] == 'updateUser'){
        if(isset($_POST['user_id'])&& isset($_POST['first_name'])&& isset($_POST['last_name'])&& isset($_POST['email'])
            && isset($_POST['phone'])&&isset($_POST['discount']))
        {
            $user_id = mysqli_real_escape_string($connection, sanitizeString($_POST['user_id']));
            $first_name = mysqli_real_escape_string($connection, sanitizeString($_POST['first_name']));
            $last_name = mysqli_real_escape_string($connection, sanitizeString($_POST['last_name']));
            $email = mysqli_real_escape_string($connection, sanitizeString($_POST['email']));
            $phone = mysqli_real_escape_string($connection, sanitizeString($_POST['phone']));
            $discount = mysqli_real_escape_string($connection, sanitizeString($_POST['discount']));
            $result= queryMysql("UPDATE users 
                                  SET first_name = '$first_name',last_name='$last_name', email='$email',
                                      phone='$phone', receive_discount ='$discount'
                                  WHERE users.user_id = '$user_id'");
            print_r('update has been done');
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, missing important attribute';
        }
    }

    //Action  =  Add Product
    if ($_GET['action'] == 'addProduct'){
        if(isset($_POST['productName'])&&isset($_POST['productPrice'])&& isset($_POST['productDesc'])&&isset($_POST['productCategory']))
        {
            $productName = mysqli_real_escape_string($connection, sanitizeString($_POST['productName']));
            $productPrice = mysqli_real_escape_string($connection, sanitizeString($_POST['productPrice']));
            $productDesc = mysqli_real_escape_string($connection, sanitizeString($_POST['productDesc']));
            $productCategory = mysqli_real_escape_string($connection, sanitizeString($_POST['productCategory']));

            $result = queryMysql("INSERT INTO product (product_name, product_price, product_desc, product_category)
                                  VALUES ( '$productName' ,'$productPrice','$productDesc', '$productCategory');");
            print_r('Insert has been done');
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, missing important attribute';
        }
    }

    //Action  =  display all  Product
    if ($_GET['action'] == 'displayProduct'){

        $result= queryMysql("SELECT * FROM product");
        if($result->num_rows!=0){
            $row = array();
            while ($rows = $result->fetch_assoc()) {
                array_push($row, $rows);
            }
            print_r(json_encode($row));
        }else{
            die ('No result found');
        }

        //Close the connection
        $connection->close();
    }

    //Action  =  Edit Product
    if ($_GET['action'] == 'editProduct'){
        if(isset($_POST['product_id'])){
            $product_id = mysqli_real_escape_string($connection, sanitizeString($_POST['product_id']));
            $result= queryMysql("SELECT * 
                                  FROM product 
                                  WHERE product_id = '$product_id'");
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

    //Action  =  Update Product
    if ($_GET['action'] == 'updateProduct'){
        if(isset($_POST['product_id'])&& isset($_POST['product_name'])&& isset($_POST['product_price'])
            && isset($_POST['product_desc'])&& isset($_POST['product_category']))
        {
            $product_id = mysqli_real_escape_string($connection, sanitizeString($_POST['product_id']));
            $product_name = mysqli_real_escape_string($connection, sanitizeString($_POST['product_name']));
            $product_price = mysqli_real_escape_string($connection, sanitizeString($_POST['product_price']));
            $product_desc = mysqli_real_escape_string($connection, sanitizeString($_POST['product_desc']));
            $product_category = mysqli_real_escape_string($connection, sanitizeString($_POST['product_category']));

            $result= queryMysql("UPDATE product 
                                  SET product_name = '$product_name',product_price='$product_price',
                                      product_desc ='$product_desc',  product_category ='$product_category'
                                  WHERE product_id = '$product_id'");
            print_r('update has been done');
            //Close the connection
            $connection->close();
        }else{
            echo 'Error, missing important attribute';
        }
    }

    //Action  =   Delete product
    if ($_GET['action'] == 'deleteProduct'){
        if(isset($_POST['product_id'])){
            $product_id = mysqli_real_escape_string($connection, sanitizeString($_POST['product_id']));
            $result_product = queryMysql("DELETE FROM product WHERE product_id='$product_id'");
            echo 'Delete Successfully!';
        }
        //Close the connection
        $connection->close();
    }

}

//If action is not set
else{
    die('Action is not set!');
}

?>
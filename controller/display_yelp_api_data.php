<?php
    require_once('../controller/Yelp.php');
//uncomment for error reporting
error_reporting("E_ALL");
ini_set('display_errors', '1');
if(isset($_GET['location'])==false){
    die('There is an Error Here with location!');
}else{
    $location = $_GET['location'];
    $consumer_key = "h7ZCoVwCNDFOh6xedrCZMA";
    $consumer_secret = "3vf4z8Er2PCdvvd3yc_1ut9R554";
    $token = "XyldRJFSsWAyTIpjgRBElX5ZQER3Hj3l";
    $token_secret = "FCwxB8j_UB2P1zVpx1pqjXl1Ltw";

    $yelp = new Yelp($consumer_key, $consumer_secret, $token, $token_secret);
    $yelp->setSearch($location,'cafe rouge');
    $response = $yelp->getSearch(true);
    //var_dump($response);
    echo json_encode($response, JSON_PRETTY_PRINT);
}



?>
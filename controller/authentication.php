<?php
$userName = "admin";
$userPW = "admin";

if (isset($_SESSION['email'],  $_SESSION['password'])){
    $_SERVER['PHP_AUTH_USER'] = $_SESSION['email'];
    $_SERVER['PHP_AUTH_PW'] = $_SESSION['password'];
}
else{
    if(isset($_SERVER['PHP_AUTH_USER'])&&isset($_SERVER['PHP_AUTH_PW']))
    {
        if($_SERVER['PHP_AUTH_USER'] == $userName && $_SERVER['PHP_AUTH_PW'] ==$userPW)
        {
            echo "<script type='text/javascript'>
                        alert('You are now login as an admin!');
                  </script> ";
        }else {
            echo "<script type='text/javascript'>
  				    alert(' Invalid password and email address! You are not authorised to view this page.');
  				    window.location = '../view/index.php';
  			    </script> ";

            //header('Location: http://localhost:8081/CapstoneProject/index.php');
        }

    }
    else{
        header('www-Authenticate: Basic realm="Restricted Section"');
        header('HTTP/1.0 401 Unauthorized');
        echo "<script type='text/javascript'>
  				alert('Please enter the password and email Address if you want see this page');
  				window.location ='../view/index.php';
  			</script> ";

    }
}

?>
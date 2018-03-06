<?php
    echo ' <nav class="navbar navbar-inverse navbar-fixed-top animated slideInDown hidden-xs" id="slideInNav">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <img class="img-responsive logo-nav" src="../images/logo-sm.png">
                 <div class="space"></div>
                <button style="border: none" type="button" class="navbar-toggle collapsed" data-toggle="modal"
                        data-target="#full-page-nav"  aria-expanded="false">
                    <i class="fa fa-bars fa-2x"></i>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="flex-nav-div">
                    <ul class="nav navbar-nav" >
                        <li><a class="hvr-radial-out hvr-push" href="index.php">HOME</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="menu.php">MENU</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="find-us-directory.php">FIND US</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="offers.php">OFFERS</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="news.php">NEWS</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="about.php">ABOUT US</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="event.php">EVENTS</a></li>
    ';

    if(isset($_SESSION['admin_level'])){
        if($_SESSION['admin_level']==10){
            echo ' <li><a class="hvr-radial-out hvr-push" href="administrator.php">ADMIN</a></li>';
        }
    }

    echo '
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav><!-- End of Nav-->';
?>
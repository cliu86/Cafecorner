<?php
echo '
    <nav class="navbar navbar-inverse" id="nav" >
            <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header container-fluid">
     ';

if(!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    echo'        <a href="#animatedModal" class="btn btnJoinUs hidden-md hidden-lg hidden-sm">
                   <i class="fa  fa-2x fa-user" aria-hidden="true"></i>
                </a>
        ';
}else{
    echo' 
              <div class="btn-group hidden-md hidden-lg hidden-sm" title="btnGroup">
                  <buttion id="btnUserProfile" class="btn dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                             <i class="fa  fa-2x fa-user" aria-hidden="true"></i>
                  </buttion>
    
                  <ul class="dropdown-menu" title="drpDown">
                    <li><a title="btnReservationStatus" href="#" class="hvr-pop">Reservation Status</a></li>
                    <li role="separator" class="divider" style="background-color:#fbf7ef"></li>
                    <li><a title="btnLogOut" href="#" class="hvr-pop">
                             LogOut<i class="fa fa-sign-out" aria-hidden="true" style="margin-left:11px"></i>
                        </a>
                    </li>
                 </ul>
              </div>
       ';
}


    echo '
                <a href="index.php"><img class="img-responsive logo-nav hvr-glow" src="../images/logo-sm-2.png" ></a>
                
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="modal"
                        data-target="#full-page-nav"  aria-expanded="false">
                    <i class="fa fa-bars fa-2x"></i>
                </button>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="flex-nav-div">
                    <ul class="nav navbar-nav hidden-xs" >
                        <li><a class="hvr-radial-out hvr-push" href="index.php" >HOME</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="menu.php">MENU</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="find-us-directory.php">FIND US</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="offers.php">OFFERS</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="news.php" >NEWS</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="about.php">ABOUT US</a></li>
                        <li><a class="hvr-radial-out hvr-push" href="event.php">EVENTS</a></li>
                        
      ';

    if(isset($_SESSION['admin_level'])){
        if($_SESSION['admin_level']==10){
            echo ' <li><a class="hvr-radial-out hvr-push" href="administrator.php">ADMIN</a></li>';
        }
    }



     echo'
                        <li><a href="#animatedModal" class="btn btnJoinUs visible-xs">SIGN IN / SIGN UP
                                <i class="fa fa-hand-pointer-o"></i></a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
    </nav><!-- End of Nav-->
   ';





    /*-----------------------Login to order ------------------------ */
       if(!isset($_SESSION['password'] )|| !isset($_SESSION['email'] )){
           echo '
                  <script>
                        can_order = false;
                  </script>
                ';
       }else{
           echo '<script>
                        can_order = true;
                  </script>
                ';
       }
?>
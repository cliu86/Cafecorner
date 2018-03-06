<?php
echo '
  <!--  Full page nav Modal -->
    <div id="full-page-nav" class="modal fade row" role="dialog">
        <div class="modal-dialog" rel="main-modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" rel="main-modal-content">
                <div class="modal-header" rel="modal-header">
                    <button type="button" class="close center-block" data-dismiss="modal">
                        <i class="fa fa-times-circle fa-2x" title="btnClose"></i>
                    </button>
                </div>
                <div class="modal-body" rel="modal-body">
                    <a class="hvr-radial-out hvr-push" href="index.php" target="_self">
                        <i class="fa fa-home fa-lg" title="icon"></i><span>HOME</span>
                    </a>
                    <a class="hvr-radial-out hvr-push" href="menu.php" target="_self">
                        <i class="fa fa-list fa-lg" title="icon"></i><span>MENU</span>
                    </a>
                    <a class="hvr-radial-out hvr-push" href="find-us-directory.php" target="_self">
                        <i class="fa fa-map-marker fa-lg" title="icon"></i><span>FIND US</span>
                    </a>
                    <a class="hvr-radial-out hvr-push" href="offers.php" target="_self">
                        <i class="fa fa-cutlery fa-lg" title="icon"></i><span>OFFERS</span>
                    </a>
                    <a class="hvr-radial-out hvr-push" href="news.php" target="_self">
                        <i class="fa fa-newspaper-o fa-lg" title="icon"></i><span>NEWS</span>
                    </a>
                    <a class="hvr-radial-out hvr-push" href="about.php" target="_self">
                        <i class="fa fa-eye fa-lg" title="icon"></i><span>ABOUT US</span>
                    </a>
                    <a class="hvr-radial-out hvr-push" href="event.php" target="_self">
                        <i class="fa fa-history fa-lg" title="icon"></i><span>EVENT</span>
                    </a>
 ';
                    if(isset($_SESSION['admin_level'])){
                        if($_SESSION['admin_level']==10){
                            echo '   <a class="hvr-radial-out hvr-push" href="administrator.php" target="_self">
                                 <i class="fa fa-child fa-lg" title="icon"></i> <span>ADMIN</span>
                            </a>';
                        }
                    }

    echo '
                </div>
                <div class="modal-footer" rel="modal-footer">                  
                    <div class="center-block" title="social-icon">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse" title="facebook"></i>
                        </span>
                       <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-twitter fa-stack-1x fa-inverse" title="twitter"></i>
                        </span>
                       <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-instagram fa-stack-1x fa-inverse" title="instagram"></i>
                        </span>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    ';
?>
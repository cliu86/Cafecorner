<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <!-- Head-->
    <?php include_once '_head.php';?>
    <script src="../js/jquery-2.1.4.js"></script>
    <script src="../js/lib/fakeLoader.js"></script>
    <script src="../js/lib/jquery.vide.js"></script>
<body>
    <?php
    if(!isset($_SESSION['password'] )|| !isset($_SESSION['email'] )){
        echo '
                      <div id="fakeLoader"></div>
                      <script>
                              $("#fakeLoader").fakeLoader({
                                 zIndex:"9999",
                                 timeToHide:1700,
                                 bgColor:"#9b1b25",
                                 spinner:"spinner1"
                               });
                                var can_order = false;
                      </script>
                     ';
    }else{
        echo '<script>
                         var can_order = true;
                      </script>
                      ';
    }
    ?>
    <!-- Banner-->
    <?php include_once '_banner.php';?>
    <?php include_once '_fullPage-nav.php';?>
    <!-- NAV-->
    <?php include_once '_nav.php';?>
    <!--SlideInNav-->
    <?php include_once '_slideInNav.php';?>

    <!-- Empty Carousel Slider-->
    <div id="carousel-example-generic"></div>

    <div class="container-fluid" id="mainContent">
        <!-- Opening video-->
        <div class="row opening-video-wrapper">
            <img src="../images/opening-image-4.jpg" class="poster img-responsive">
            <div id="opening-video" data-vide-bg="mp4: ../images/day-in-the-life, webm: ../images/day-in-the-life, ogv: ../images/day-in-the-life"
                 data-vide-options="loop: true, muted: true, position: 50% 50%">
            </div>
        </div>

        <!-- Book a table form-->
        <?php include_once '_book-a-table.php'; ?>

        <!--Store Description up-->
        <div class="description-up row">
            <div class="description-text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 title="home-page-up">OUR FOOD</h4>
                <span class="fa fa-skyatlas fa-2x" title="underline"></span>
                <p>
                    Situm erant at demus locus sequi se me parum. Indidisse proponere co at instituti extitisse infigatur
                    si interitum ei. Major falso atqui ac at essem ei de. Existendi at gi praesenti dubitavit.
                </p>
                <a href="javascript:void();" class="btn-get-offer btn center-block hvr-radial-out">
                    <span>View More</span><i class="fa fa-angle-right"></i>
                </a>
                <br>
            </div>
            <div class="description-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/french-cafe-4.jpg " class="img-responsive">
            </div>
        </div>

        <!-- Mid Logo-->
        <div class="mid-logo-symbol row">
            <img src="../images/mid-logo-cafe-rouge.png" class="hidden-xs hvr-grow">
        </div>

        <!--Store Description up-->
        <div class="description-down row">
            <div class="description-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/french-cafe-12.jpg" class="img-responsive">
            </div>
            <div class="description-text-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 style="border-color: #fbf7ef">OUR CLASS</h4>
                <span class="fa fa-skyatlas fa-2x" style="color: #fbf7ef"></span>
                <p>
                    Cur habebo natura veluti genera paucos nec usu negans. Tacitus at corpori positis ex
                    numerum actione. Gi ab materialis respondere desiderant explicatur. To caloris motarum
                    similis ideoque attendo si gallico.
                </p>
                <a href="javascript:void();" class="btn-get-offer btn center-block hvr-shutter-out-horizontal">
                    <span>View More</span><i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!-- End of Store Description-->

        <!-- Menu -->
        <div class="row">
            <?php include_once '_menu.php'; ?>
            <!-- Ending Image-->
            <img src="../images/french-cafe-long-1.jpg" class="img-responsive" style="min-height: 15em">
        </div>
    </div><!-- End of home page content-->


    <!-- Footer-->
    <footer class="container-fluid">
        <div class="footer-content col-lg-offset-1 col-lg-10 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12" >
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-left">
                <h2>Subscribe to Cafe Corner</h2>
                <p>Get all the latest news, competitions and promotions straight to your inbox!</p>
                <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    <input id="email_subscribe" class="form-control"  type="email" placeholder="Email address ">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-right">
                <div class="social-icon">
                    <a href="https://www.facebook.com/caferouge.co.uk" target="_blank" class="hvr-bounce-in">
                        <span class="fa-stack fa-2x">
                             <i class="fa fa-circle fa-stack-2x "></i>
                             <i class="fa fa-facebook fa-stack-1x fa-inverse "></i>
                        </span>
                    </a>
                    <a href="https://twitter.com/caferougetweet" target="_blank" class="hvr-bounce-in">
                         <span class="fa-stack fa-2x">
                             <i class="fa fa-circle fa-stack-2x" ></i>
                             <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>

                    <a href="https://www.instagram.com/Cafe_Rouge/" target="_blank" class="hvr-bounce-in">
                        <span class="fa-stack fa-2x">
                             <i class="fa fa-circle fa-stack-2x"></i>
                             <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </div>
                <div class="info">
                    <h3>View More at Cafecorner.club</h3>
                    <p>Contact us cliu86@bu.edu</p>
                    <p>401-333-2222 | 403-223-3232</p>
                </div>
            </div>
        </div>

        <div class="footer-links col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <span class="hvr-underline-reveal">Enquiries</span>
            <span class="hvr-underline-reveal">FAQs</span>
            <span class="hvr-underline-reveal">Social</span>
            <span class="hvr-underline-reveal">Groups & Events</span>
            <span class="hvr-underline-reveal">Careers</span>
            <span class="hvr-underline-reveal">Franchises</span>
            <span class="hvr-underline-reveal">Corporate</span>
            <span class="hvr-underline-reveal">Privacy & Cookies</span>
            <span class="hvr-underline-reveal">Ethical Policy</span>
        </div>
    </footer>

    <!-- Link the javascript source code -->
    <script src="../js/lib/jquery-ui.min.js"></script>
    <script src="../js/lib/bootstrap.min.js"></script>
    <script src="../js/lib/jquery-confirm.js"></script>
    <script src="../js/lib/animatedModal.js"></script>
    <script src="../js/form-validation.js"></script>
    <script src="../js/signIn_signUp.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/admin.js"></script>

    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>

</body>
</html>
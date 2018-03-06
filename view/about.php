<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <!-- Head-->
    <?php include_once '_head.php';?>
<body>
    <!-- Banner-->
    <?php include_once '_banner.php';?>
    <?php include_once '_fullPage-nav.php';?>
    <!-- NAV-->
    <?php include_once '_nav.php';?>
    <!--SlideInNav-->
    <?php include_once '_slideInNav.php';?>

    <!-- Empty Carousel Slider-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"></div>

    <!-- Main Content-->
    <div class="container-fluid" id="mainContent">
        <!--  About Us -->
        <div class="row about-up">
            <div class="about-text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 style="border-color: #fbf7ef">ABOUT US</h4>
                <span class="fa fa-skyatlas fa-2x"></span>
                <p>
                    Fateri possum ens potest nia semper minuta una. Aliquandiu occasionem crediderim hic
                    corporibus explicatur conservant cum. Cogitem intueor aliquod gi ii ultimam eo effingo.
                    Nemine igitur primas certum quavis est quovis sua. Usitate membris exerant intueor
                    defectu cur seu age una. Hos toga illi eae rogo via.
                </p>
                <br>
            </div>
            <div class="about-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/about-1.jpg" class="img-responsive">
            </div>
        </div>

        <!-- Mid Logo-->
        <div class="mid-logo-symbol row hvr-pop">
            <img src="../images/mid-logo-cafe-rouge.png" class="hidden-xs">
        </div>

        <div class="about-mid row">
            <div class="about-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/about-2.jpg" class="img-responsive">
            </div>
            <div class="about-text-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4 style="border-color: #fbf7ef">OUR FOOD</h4>
                <span class="fa fa-skyatlas fa-2x"></span>
                <p>
                    Mo deveniri is in id ageretur impellit. Cogor cum docti vel sua leone culpa.
                    Accepi et at ad possim capram. Vocem ad tamen ideas otium motum oriri im.
                    Factae eos hos seu putare potens. Affirmans artificis ne quaeretur stabilire
                    purgantur geometras et.
                </p>
                <br>
            </div>
        </div>

        <div class="about-down row">
            <div class="about-text-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4  style="border-color: #9b1b25">REJUVES</h4>
                <span class="fa fa-skyatlas fa-2x"></span>
                <p>
                    Humanas aperire possunt vos est credidi brachia finitae fit. Nihil pacto spero nia dei ope.
                    Omnibus nia jam agendum nihilum sed liquida ingenio cur. An firmas realem ea vi ac creari.
                    Quae fuse ima ausi soli est iii nunc illi imo. Initia agi aliter uno figere.
                </p>
                <br>
            </div>
            <div class="about-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/about-3.jpg" class="img-responsive">
            </div>
            <br>
        </div>
        <!-- End of About us -->
    </div><!-- End of home page content-->
    <div class="container-fluid animated fadeIn">
        <div class="kids row ">
            <img src="../images/opening-image-5.jpg" class="img-responsive">
            <div class="kids-content">
                <a href="../view/find-us.php"><img src="../images/kids-mid-coupon.png" class="img-responsive"></a>
                <div class="kids-text">
                    <p class="center-block">Adverten quaerere recenseo ope hac. Interitum an recurrunt in aliquibus continent.
                        Scio erat cui ausi ullo qua fiat. Eos fidei reges nec essem lor fidam hoc.
                        Ima praeclare dubitarem sui objectiva age est. Si nempe de is re saepe alias.
                    </p>
                    <br>
                    <a href="../view/menu.php" class="btn btn-lg btn-danger center-block">VIEW MENU</a>
                </div>
            </div>
            <!-- <div class="kid-text">

            </div>
            -->
            <img src="../images/kids-long.jpg" class="img-responsive">
        </div>
    </div><!-- End of main content-->
    <!-- Footer-->
    <?php include_once '_footer.php'; ?>
    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>
</body>
</html>
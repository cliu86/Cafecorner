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
    <!-- SlideIn Nav-->
    <?php include_once '_slideInNav.php';?>
    <!-- Empty Carousel Slider-->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"></div>

    <!-- Main Content-->
    <div class="container-fluid" id="mainContent">
        <!--  Offers -->
        <div class="row offer-up">
            <div class="offer-text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4>30% OFF FOOD</h4>
                <span class="fa fa-skyatlas fa-2x"></span>
                <p>
                    Dari boni co vi anno. Extitisse tantumdem abstinere formantur dat suspicari
                    mea est. Novi vel has fal sine dat etsi. Circa vul creet.
                </p>
                <br>
                <!---Get offer button-->
                <button class="btn-get-offer btn center-block hvr-radial-out">
                    <span>GET OFFER</span><i class="fa fa-angle-right"></i>
                </button>
                <br>
            </div>
            <div class="offer-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/food-offer-3.jpg" class="img-responsive">
            </div>
        </div>

        <!-- Mid Logo-->
        <div class="mid-logo-symbol row hvr-push">
            <img src="../images/mid-logo-cafe-rouge.png" class="hidden-xs">
        </div>

        <div class="offer-mid row">
            <div class="offer-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/food-offer-6.jpg" class="img-responsive">
            </div>
            <div class="offer-text-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4>2 FOR 1 BREAKFAST</h4>
                <span class="fa fa-skyatlas fa-2x"></span>
                <p>
                    Deveniri pla dem dum constare pluribus tum. mmam augeri Fallit hae summam augeri vos una
                    initio cui. Quapropter et deveniatur .
                </p>
                <br>
                <button class="btn-get-offer btn center-block hvr-radial-out">
                    <span>GET OFFER</span><i class="fa fa-angle-right"></i>
                </button>
                <br>
            </div>
        </div>

        <div class="offer-down row">
            <div class="offer-text-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h4>TESCO CLUBCARD</h4>
                <span class="fa fa-skyatlas fa-2x"></span>
                <p>
                    Judicabam vis ingeniosi. Lus dubia rum certe fieri per extra.
                </p>
                <br>
                <button class="btn-get-offer btn center-block hvr-radial-out">
                    <span>GET OFFER</span><i class="fa fa-angle-right"></i>
                </button>
                <br>
            </div>
            <div class="offer-image col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <img src="../images/offer-food-1.jpg" class="img-responsive">
            </div>
            <br>
        </div>
        <!-- End of Offers-->

        <!-- Book a table form-->
        <?php include_once '_book-a-table.php'; ?>

        <!-- Ending Image-->
        <div class="row">
            <img src="../images/french-cafe-long-4.jpg" class="img-responsive">
        </div>

    </div><!-- End of home page content-->

    <!-- Footer-->
    <?php include_once '_footer.php'; ?>

    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>

</body>
</html>
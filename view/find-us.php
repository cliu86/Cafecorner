<?php
    session_start();
    if(isset($_GET['action'])==false) {
        die('<h2>There is an Error Here with phone number!</h2>');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Head-->
    <?php include_once '_head.php';?>
    <style>
        #map {
            height: 34em;
            width: auto;
        }
        #map+button{
            background-color: #9b1b25;
            z-index: 99;
            margin-top: -4em;
            color: #fbf7ef;
            border-bottom-right-radius: 21px;
            border-top-left-radius: 21px;
            height: 3em;
            width: 14em;
            font-size: larger;
            border: 1px solid;
        }
        #map+button i{
            margin-left: 0.6em;
            animation-name: tada;
            animation-iteration-count: infinite;
            animation-duration: 1.2s;
        }
    </style>
<body>
    <!-- Banner-->
    <?php include_once '_banner.php';?>
    <?php include_once '_fullPage-nav.php';?>
    <!-- NAV-->
    <?php include_once '_nav.php';?>
    <!--SlideInNav-->
    <?php include_once '_slideInNav.php';?>
    <!-- Empty Carousel Slider-->
    <div id="carousel-example-generic"></div>

    <!-- Main Content-->
    <div class="container-fluid" id="mainContent">
        <!--  Find us Description-->
        <div class="find-us">
            <div class="row find-us-content animated fadeIn">
                <div class="find-us-text animated zoomIn">
                    <h4 style="font-size: 1.5em">YOUR LOCAL CAFÉ CORNER</h4>
                    <h3 class="restaurant-name"></h3>
                    <span class="fa fa-skyatlas fa-2x"></span>
                    <h4 style="margin-top: -1em" class="ratings center-block">
                        <img src=""><br><span style="color: #1d1d1d;font-size: medium;font-weight: 300"></span>
                    </h4>
                    <h5 style="font-size: medium;font-style: italic" class="restaurant_categories">French rouge, Bar</h5>
                    <p class="snippet_text">
                        Are sentiments apartments decisively the especially alteration. Thrown shy denote ten ladies
                        though ask saw. Or by to he going
                        think order event music. Incommode so intention defective at convinced
                    </p>
                </div>
            </div>
        </div><!--  End of Find us Description -->

        <!-- For small device only-->
        <div id="xsFindUs" class="find-us row hidden-lg hidden-sm hidden-md">
            <img src="../images/bg-img.jpg" class="img-responsive">
            <div class="find-us-content" >
                <div class="find-us-text">
                    <h4>YOUR LOCAL CAFÉ CORNER</h4>
                    <h3 class="restaurant-name"></h3>
                    <span class="fa fa-skyatlas fa-2x"></span>
                    <h4 style="margin-top: -1em" class="ratings center-block"> <img src=""></h4>
                    <h5 style="font-size: medium;font-style: italic" class="restaurant_categories"></h5>
                    <p class="snippet_text"></p>
                </div>
            </div>
        </div><!--  End of Find us Description -->


        <!-- Book a table form-->
        <?php include_once '_book-a-table.php'; ?>


        <!--  Store location -->
        <div class="location row" >
            <div class="address col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <dl>
                    <dt class="restaurant-address"><i class="fa fa-map-marker fa-lg ">
                        </i><span style="text-indent: 1em">STORE LOCATION</span>
                    </dt>
                    <dt style="margin-top: 1em;margin-bottom: 1em"><i class="fa fa-phone fa-lg "></i>
                        <span class="restaurant-phone"></span>
                    </dt>
                    <dt><i class="fa fa-clock-o fa-lg "></i><span>OPENING HOURS</span></dt>
                        <dd>Monday - Saturday: </dd>
                        <dd>9.00am - 11.00pm</dd>
                        <dd>Sunday: 9am -</dd>
                        <dd style="margin-bottom: 1em">10.00pm</dd>
                    <dt><i class="fa fa-wifi fa-lg "></i><span style="text-indent: 1em">FREE WIFI</span></dt>
                </dl>
            </div>

            <!-- Google map-->
            <div class="map col-lg-4  col-md-4 hidden-sm col-xs-12" >
                <div id="map"></div>
                <button id="btnGetDirection" data-toggle="modal" data-target="#directionModal"
                        class="center-block hvr-shutter-out-horizontal">
                    GET DIRECTION<i class="fa fa-hand-pointer-o"></i>
                </button>
            </div>

            <div class="facilities col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h3>FACILITIES</h3>
                <!--<i class="fa fa-foursquare fa-lg" style="display:block;height: 10px;margin-top: -5px"></i>-->
                <br>
                <ul>
                    <li>Outside seats</li>
                    <li>Step free access</li>
                    <li>Private room</li>
                    <li>Accessible toilets</li>
                    <li>Large print menu</li>
                    <li>Free WiFi</li>
                </ul>
            </div>
        </div><!-- End of Store location-->
        <!-- Menu -->
        <?php include_once '_menu.php'; ?>

        <!-- Direction Modal -->
        <div class="modal fade" id="directionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table id="direction_results" class="table">
                            <thead>
                                <tr style="font-style: italic;font-size: large">
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: #1d1d1d;color: seashell"
                                class="btn hvr-radial-out" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End of home page content-->

    <!-- Footer-->
    <?php include_once '_footer.php'; ?>
    <script src="../js/find-us.js"></script>
    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>
    <!-- Google map API-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgAv0LOr4FVC96glcyN8HywyoFoG5OREY"></script>

</body>
</html>
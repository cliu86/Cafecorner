<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" >
<!-- Head-->
<?php include_once '_head.php';?>
<body  ng-app="myApp">
    <!-- Banner-->
    <?php include_once '_banner.php';?>
    <?php include_once '_fullPage-nav.php';?>
    <!-- NAV-->
    <?php include_once '_nav.php';?>
    <!--SlideInNav-->
    <?php include_once '_slideInNav.php';?>
    <!-- Empty Carousel Slider-->
    <div id="carousel-example-generic"></div>

    <!-- Content-->
    <div class="container-fluid" id="find-us-directory" ng-controller="searchController">
        <!--  Find us Directory-->
        <div class="find-us">
            <div class="row find-us-content ">
                <div class="find-us-text animated zoomIn">
                    <img src="../images/mid-logo-cafe-rouge.png">
                    <h3 style="font-family: sans-serif">FIND YOUR NEAREST</h3>
                    <span class="fa fa-skyatlas fa-2x "></span>
                    <h5 >Please tell us your current location</h5>
                    <!-- Search area-->
                    <div class="input-group margin-bottom-sm">
                        <input id="txtEnterLocation" class="form-control" ng-model="location"
                               type="search" placeholder="Location/Zip Code">
                        <span class="input-group-addon"><i class="fa fa-location-arrow fa-fw"></i></span>
                    </div>
                    <button id="btnSearchLocation" class="hvr-radial-out" ng-click="getData()">
                        SEARCH<i class="fa fa-hand-pointer-o"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Search result-->
        <div class="search-results row">
            <div class="list animated zoomIn">
                <img src="../images/mid-logo-cafe-rouge.png" class="center-block" width="55" height="55" style="margin-top: 1.5em">
                <h3 class="center-block" style="font-family: sans-serif">Search Results</h3>
                <span class="fa fa-skyatlas fa-2x center-block"></span>

                <div class="media restaurant-detail hvr-grow-shadow" ng-repeat="business in businesses" >
                    <div class="media-left">
                        <a href="{{business.url}}" target="_blank">
                            <img class="media-object" src="{{business.image_url}}"/>
                        </a>
                    </div>
                    <div class="media-body" style="padding-top: 0.5em">
                        <h4 class="media-heading">
                            <a href="find-us.php?action={{business.phone}}"  target="_blank">{{business.name}}</a>
                            <img src="{{business.rating_img_url}}">
                        </h4>
                        <p>
                            {{business.location.address[0]}} &nbsp;{{business.location.state_code}}, {{business.location.postal_code}}
                        </p>
                        <p style="color: #9b1b25" class="hvr-pulse">
                            <i class="fa fa-mobile fa-lg"  aria-hidden="true"></i> &nbsp; &nbsp;{{business.display_phone}}
                        </p>
                    </div>
                    <div class="media-right" style="font-size: 1.5em;padding-right: 2em" >
                        <br>
                        <a href="find-us.php?action={{business.phone}}" style="color: #1d1d1d">
                            <i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <button id="btnSearchAgain" class="hvr-radial-out center-block">
                    SEARCH AGAIN<i class="fa fa-hand-pointer-o"></i>
                </button>
            </div>
        </div>
    </div>


    <!-- Footer-->
    <?php include_once '_footer.php'; ?>
    <!-- Link AngularJS-->
    <script src="../js/lib/angular.js"></script>
    <script src="../js/find-us-directory.js"></script>
    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>

</body>
</html>
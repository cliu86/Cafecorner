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
    <div id="carousel-example-generic"></div>
    <!-- Menu -->
    <?php include_once '_menu.php'; ?>
    <!-- Order list-->
    <div class="order-list">
        <button id="btnOrderList"  class="btn hvr-trim hvr-bounce-in" type="button" data-toggle="collapse"
                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            YOUR ORDER LIST
        </button>
        <div class="collapse" id="collapseExample">
            <div class="well">
                <table class="table table-striped animated lightSpeedIn">
                    <thead>
                    <tr>
                        <th colspan="1">Food Name</th>
                        <th colspan="1">Price</th>
                        <th colspan="2" class="hidden-xs">Note</th>
                    </tr>
                    </thead>
                    <tbody id="order_result">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Ending Image-->
    <img src="../images/french-cafe-long-2.jpg" class="img-responsive" style="min-height: 18em">
    <!-- Footer-->
    <?php include_once '_footer.php'; ?>
    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>
</body>
</html>
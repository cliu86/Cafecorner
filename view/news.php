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
    <div class="news container animated fadeIn">
        <div class="news-left col-lg-4  col-md-4 col-sm-4 col-xs-12 ">
            <img src="../images/news-logo-2.png"  class="center-block img-responsive">
            <button class="center-block hvr-bounce-to-top" title="news-button">
                <span class="hvr-pop">VIEW ARCHIVE</span><i class="fa fa-angle-right animated slideInRight"></i>
            </button>
            <br>
            <div class="news-list col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 ">
                <br>
                <ul title="news-list" class="col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10">
                    <li></li>
                    <li><a href="#">JOYEUX NOËL - A GIFT FROM CAFE CORNER!!</a></li>
                    <li><i class="fa fa-skyatlas fa-2x"></i></li>
                    <li><a href="">NEW DISHES MADE WITHOUT GLUTEN</a></li>
                    <li><i class="fa fa-skyatlas fa-2x"></i></li>
                    <li><a href="">LAUNCHING TUESDAY 29TH SEPTEMBER</a></li>
                    <li><i class="fa fa-skyatlas fa-2x"></i></li>
                    <li><a href="">BIJOUX EGGS BENEDICT</a></li>
                    <li><i class="fa fa-skyatlas fa-2x"></i></li>
                    <li><a href="">KIDS LOVE CAFE CORNER!!</a></li>
                    <li></li>
                </ul>
            </div>
        </div <!-- End of news left-->
        <br>
        <div class="news-right col-lg-8 col-md-8 col-sm-8 col-xs-12" >
            <br>
            <img src="../images/food-offer-7.jpg" class="img-responsive">
            <article title="article-news">
                <h2>JOYEUX NOËL - A GIFT FROM CAFE CORNER!!</h2>
                <h4>Posted on 16 March 2016</h4><br>
                <p>In suam ille illa quia fiat ut etsi. Actu inde tius du to ii?</p><br>
                <p>Bonus timeo ad si ex eadem mirum potui. Aeternum vim hoc res ens ignorata lectores putandum.
                    Re quaesita totamque ea refutent secundum in. Nia dum pla credo illis cogor solem illam.
                    Illi esto fato nudi idem mo tius re.
                </p><br>
                <p>Sic sae lor tot apti igni quae toga aër. Conjunctam persuadeam perspicuae rem evidentius vel
                    mea uno. Hic mei est loquebar liberius caeteris ignorans memoriae. Eaedem falsum habeat me
                    ha quavis tandem ad de vitari. Timet jaceo vapor libet eo nulla ne aliae de.
                </p><br>
                <p>Vulgus qualia unitas rantem haberi volent ubi etc. Profecto ii obnoxius du scriptum imponere
                    exsurgit mentibus. Neque ipsam co me ullos majus totum cujus.
                </p>
            </article>

        </div>
    </div>
    <!-- End of home page content-->
    <br><br>

    <!-- Footer-->
    <?php include_once '_footer.php'; ?>
    
    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>

</body>
</html>
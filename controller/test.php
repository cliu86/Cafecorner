<?php
    $hash1 = password_hash( 'wwfwwf', PASSWORD_DEFAULT);
    $hash2 = password_hash( 'wwfwwf', PASSWORD_DEFAULT);

    echo '<h1>'.$hash1.'</h1>';
    echo '<h1>'.$hash2.'</h1>';


//<! -- slider -->
  echo' <!-- Slider-->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="../images/event-lg.jpg" class="img-responsive">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="../images/opening-image.jpg" class="img-responsive" >
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="../images/opening-image-4.jpg" class="img-responsive" >
                        <div class="carousel-caption">
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>'

?>


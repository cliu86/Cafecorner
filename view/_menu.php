<?php
    require_once '../model/database.php';
echo'
     <div class="container big-menu">
         <div class="menu-section col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1
                    col-sm-12 col-xs-12" style="margin-top: 4em">
            <a class="hvr-trim menu dinner-menu" 
               href="javascript:void(0)">DINNER MENU<i class="fa fa-angle-right"></i></a>
            <a class="hvr-trim menu dinner-menu"
               href="javascript:void(0)">MAIN MENU<i class="fa fa-angle-right"></i></a>
            <a class="hvr-trim menu dinner-menu"
               href="javascript:void(0)">DESSERT MENU<i class="fa fa-angle-right"></i></a>
        </div>
         <div class="menu-section col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <a class="hvr-trim menu dinner-menu"
                   href="javascript:void(0)">LUNCH MENU<i class="fa fa-angle-right"></i></a>
                <a class="hvr-trim menu dinner-menu"
                   href="javascript:void(0)">KIDS MENU<i class="fa fa-angle-right"></i></a>
                <a class="hvr-trim menu dinner-menu"
                   href="javascript:void(0)">WINE MENU<i class="fa fa-angle-right"></i></a>
         </div>
         <div class="menu-section col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="margin-bottom: 4em">
                <a class="hvr-trim menu dinner-menu-drink"
                   href="javascript:void(0)">DRINK MENU<i class="fa fa-angle-right"></i></a>
                <a class="hvr-trim menu dinner-menu-new"
                   href="javascript:void(0)">UPCOMING MENU<i class="fa fa-angle-right"></i></a>
                <a class="hvr-trim menu dinner-menu-special"
                   href="javascript:void(0)">SPECIAL MENU<i class="fa fa-angle-right"></i></a>
         </div>
    </div>
    
    <!--Order menu  -->
    <div class="order-menu-main container hidden animated fadeInUp">
        <button type="button" class="btnCloseMenu center-block">
            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
        </button>
        <h2>DINNER MENU</h2>
        <div class="order-menu-left col-lg-6">
            <!--APERITIFS-->
            <h3>APERITIFS</h3>
            <br>
            <h4><span class="dish-name">ROUGE ROYAL</span>
                <span class="pull-right">
                    $<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                </span>
            </h4>
            <p>Blanc de Blancs Brut with Chambord </p>
            <br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br>

            <h4><span class="dish-name">CRÊPE AUX CHOCOLAT</span>
                <span class="pull-right">
                    $<span class="dish-price">6.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                </span>
            </h4>
            <p>baked pancake with raspberries, banana and tarte tatin ice cream</p>
            <br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br> <br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br><br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br>

            <!-- BOISSONS CHAUDES-->
            <h3>BOISSONS CHAUDES</h3>
            <br>
            <h4><span class="dish-name">ESPRESSO</span>
                <span class="pull-right">$<span class="dish-price">3</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>
            <h4><span class="dish-name">CAFÉ AU LAIT</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p> add a shot of hazelnut, vanilla or almond syrup for 35p</p>
            <br>
            <h4><span class="dish-name">CAPPUCCINO</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>
            <h4><span class="dish-name">MOCHA</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>
            <h4><span class="dish-name">Coffee</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>
            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br>

            <h4><span class="dish-name">CRÊPE CHOCOLAT BLANC</span>
                <span class="pull-right">$<span class="dish-price">6.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>baked pancake with raspberries, banana and tarte tatin ice cream</p>
            <br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br>
        </div>

        <div class="order-menu-right col-lg-6">
            <h3 >PETITS PLATS</h3>
            <br>

            <h4><span class="dish-name">CORNER GOURMAND</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p >smoked saucisson and wild boar saucisson with caper berries</p>
            <br>

            <h4><span class="dish-name">CROQUETTES DE CANARD</span>
                <span class="pull-right">$<span class="dish-price">6</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p >duck croquettes, pea shoots and frisée with orange & chilli marmalade</p>
            <br>

            <h4><span class="dish-name"> AUX CHOCOLAT BLANC</span>
                <span class="pull-right">$<span class="dish-price">6.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p >baked pancake, chocolate and tarte tatin ice cream</p>
            <br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p >vodka with spicy tomato juice and celery</p>
            <br><br>

            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>vodka with spicy tomato juice and celery</p>
            <br>

            <h4><span class="dish-name">BLANC BANANE</span>
                <span class="pull-right">$<span class="dish-price">6.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>baked pancake with raspberries, banana and tarte tatin ice cream</p>
            <br>

            <!--BOISSONS FROIDES-->
            <h3>BOISSONS FROIDES</h3>
            <br>
            <h4><span class="dish-name">ESPRESSO</span>
                <span class="pull-right">$<span class="dish-price">3</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>

            <h4><span class="dish-name">BELU MINERAL WATER</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p>still or sparkling</p>
            <br>

            <h4><span class="dish-name">FRESH ORANGE JUICE</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>

            <h4><span class="dish-name">ORANGINA</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>
            <h4><span class="dish-name">COKE OR LEMONADE</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <br>
            <h4><span class="dish-name">BOTTLEGREEN PRESSÉ</span>
                <span class="pull-right">$<span class="dish-price">2.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p> choose from cos apple or elderflower </p >
            <br>
            <h4> <span class="dish-name">CITRON PRESSÉ</span>
                <span class="pull-right">$<span class="dish-price">3.5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4 >
            <p> pressed lemons, just add water and gomme syrup to taste </p >
            <br>
            <h4><span class="dish-name">BLOODY MARY</span>
                <span class="pull-right">$<span class="dish-price">5</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i></span>
            </h4>
            <p >vodka with spicy tomato juice and celery</p>
            <br><br>
        </div>
    </div>
 ';
    echo'
           <!----------------------- Upcoming menu -------------------------->
    <div class="order-menu-new order-menu-main container hidden animated fadeInUp">
        <button type="button" class="btnCloseMenu center-block">
            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
        </button>
        <h2>Upcoming Menu</h2>
         <br>
    ';


    $result_upcoming = queryMysql("SELECT product_name, product_price, product_desc
                          FROM product
                          WHERE product_category = 'upcoming_menu'");
    $row_upcoming = array();
    if($result_upcoming->num_rows!=0){
        while ($rows = $result_upcoming->fetch_assoc()) {
            array_push($row_upcoming, $rows);
        }
    }

    for ($i =0;$i<count($row_upcoming);$i++){
       echo ' <div class="order-menu-left col-lg-6">
                    <h4>
                    <span class="dish-name">' .$row_upcoming[$i]["product_name"] .'</span>'.
                   '<span class="pull-right">
                         $<span class="dish-price">'.$row_upcoming[$i]["product_price"].'</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                    </span>
                    </h4>
                    <p>'.$row_upcoming[$i]["product_desc"].'</p>
              </div>
           ';
    }

    echo '</div>';


echo'
           <!----------------------- Special Menu -------------------------->
    <div class="order-menu-special order-menu-main container hidden animated fadeInUp">
        <button type="button" class="btnCloseMenu center-block">
            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
        </button>
        <h2>Special Menu</h2>
         <br>
    ';


    $result_special = queryMysql("SELECT product_name, product_price, product_desc
                                  FROM product
                                  WHERE product_category = 'special_menu'");
    $row_special = array();
    if($result_special->num_rows!=0){
        while ($rows_special = $result_special->fetch_assoc()) {
            array_push($row_special, $rows_special);
        }
    }

    for ($i =0;$i<count($row_special);$i++){
        echo ' <div class="order-menu-left col-lg-6">
                        <h4>
                        <span class="dish-name">' .$row_special[$i]["product_name"] .'</span>'.
                         '<span class="pull-right">
                             $<span class="dish-price">'.$row_special[$i]["product_price"].'</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                        </span>
                        </h4>
                        <p>'.$row_special[$i]["product_desc"].'</p>
                  </div>
               ';
    }

    echo '</div>';


echo'
           <!----------------------- Drink Menu -------------------------->
    <div class="order-menu-drink order-menu-main container hidden animated fadeInUp">
        <button type="button" class="btnCloseMenu center-block">
            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
        </button>
        <h2>Drink Menu</h2>
         <br>
    ';


    $result_drink = queryMysql("SELECT product_name, product_price, product_desc
                                      FROM product
                                      WHERE product_category = 'drink_menu'");
    $row_drink = array();
    if($result_drink->num_rows!=0){
        while ($rows_drink = $result_drink->fetch_assoc()) {
            array_push($row_drink, $rows_drink);
        }
    }

    for ($i =0;$i<count($row_drink);$i++){
        echo ' <div class="order-menu-left col-lg-6">
                            <h4>
                            <span class="dish-name">' .$row_drink[$i]["product_name"] .'</span>'.
            '<span class="pull-right">
                                 $<span class="dish-price">'.$row_drink[$i]["product_price"].'</span><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i>
                            </span>
                            </h4>
                            <p>'.$row_drink[$i]["product_desc"].'</p>
                      </div>
                   ';
    }

    echo '</div>';
?>
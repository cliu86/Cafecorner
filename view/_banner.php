<?php
echo '
    <div id="banner" class="container-fluid">
        <div class="row">
            <div class="social-icon col-lg-3 col-md-3 hidden-sm hidden-xs">
                <a href="https://www.facebook.com/caferouge.co.uk" target="_blank">
                    <span class="fa-stack fa-2x">
                         <i class="fa fa-circle fa-stack-2x "></i>
                         <i class="fa fa-facebook fa-stack-1x fa-inverse "></i>
                    </span>
                </a>
                <a href="https://twitter.com/caferougetweet" target="_blank">
                     <span class="fa-stack fa-2x">
                         <i class="fa fa-circle fa-stack-2x" ></i>
                         <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
               
                <a href="https://www.instagram.com/Cafe_Rouge/" target="">
                    <span class="fa-stack fa-2x">
                         <i class="fa fa-circle fa-stack-2x"></i>
                         <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
            <div class="banner-logo col-lg-6 col-md-6 col-sm-8 hidden-xs ">
                <img src="../images/logo.png" class="img-responsive center-block hvr-bob">
            </div>
            <div class="join-us col-lg-3 col-md-3 col-sm-4 hidden-xs" >
               
 ';

if(!isset($_SESSION['email']) || !isset($_SESSION['password']) ) {
    echo'   <a href="#animatedModal" class="btn btnJoinUs hvr-shutter-out-horizontal">
                <span style="margin-left: 1.1em">SIGN IN / SIGN UP</span><i class="fa fa-hand-pointer-o"></i>
            </a>
            <script>
                can_order =  false;
            </script>
         ';
}else{
    echo' 
          <div class="btn-group">
              <buttion id="btnUserProfile" class="btn dropdown-toggle hvr-shutter-out-horizontal"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span>Hello, '.$_SESSION['first_name']. '</span><i class="fa fa-user fa-lg"></i><span class="caret">
              </buttion>
              <ul class="dropdown-menu">
                 <!-- reservation status-->
                 <li>
                     <a title="btnReservationStatus" href="javascript:void(0);" class="hvr-pop">
                        <i class="fa fa-sign-out" aria-hidden="true" style="margin-left:1.2em"></i> 
                        Reservation Status 
                     </a>      
                 </li>    
                 <!-- Account settings-->
                 <li>
                     <a title="btnAccountSettings" href="userProfile.php" class="hvr-pop">
                       <i class="fa fa-cog" aria-hidden="true" style="margin-left:1.2em"></i> 
                       Account Settings
                     </a>
                 </li>
     ';
        if(isset($_SESSION['admin_level'])){
            if($_SESSION['admin_level']==10){
                echo ' 
                      <!-- Add Product -->
                     <li>
                         <a id="btnAddProduct" href="javascript:void(0);" class="hvr-pop" data-toggle="modal" data-target=".product_add">
                           <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-left:1.2em"></i> 
                           Add Product
                         </a>
                     </li>
                    ';
            }
        }

    echo'                 <!-- Logout -->
                 <li role="separator" class="divider" style="background-color:#fbf7ef"></li>
                 <li>
                     <a title="btnLogOut" href="javascript:void(0);" class="hvr-pop">
                           <i class="fa fa-sign-out" aria-hidden="true" style="margin-left:1.2em"></i> 
                            Logout
                     </a>
                 </li>
              </ul>
          </div>
         ';
    }

echo'                   
            </div>
        </div>
    </div><!-- End of Banner-->
    ';


echo '
               <!-- Add product Modal -->
                <div class="modal fade product_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header " 
                                    style="background-color: rgb(29,29,29);color:#fbf7ef;display: flex;align-items: center">
                                <h4 class="modal-title" style="margin: auto">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-right: 9px"></i>
                                        Add New Product
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                                    <span aria-hidden="true">x</span> 
                                </button>
                            </div>
                            <div class="form-horizontal" id="product_add_form">
                                <br><br>
                                 <div class="form-group" id="addProductCategory">
                                     <label for="productCategory" class="col-sm-4 control-label">Product Category:</label>
                                     <div class="col-sm-6 col-sm-offset-1">
                                            <select id="productCategory" class="form-control" aria-describedby="productCategoryError">
                                                <option value="">Please select one</option>
                                                <option value="drink_menu">Drink Menu</option>
                                                <option value="special_menu">Special Menu</option>
                                                <option value="upcoming_menu">Upcoming Menu</option>
                                            </select>
                                            <span id="productCategoryError" style="color:#9b1b25" class="help-block hidden">Please select one !</span>
                                     </div>
                                 </div>
                                <div class="form-group" id="addProductName">
                                    <label class=" col-sm-4 control-label" for="productName"> Product Name:</label>
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <input type="text" class="form-control" id="productName" aria-describedby="productNameError">
                                        <span id="productNameError" class="help-block hidden" style="color:#9b1b25">
                                             Food name can not be empty !
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" id="addProductPrice">
                                    <label class=" col-sm-4 control-label" for="productPrice">Product Price</label>
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <input type="number" class="form-control" id="productPrice" aria-describedby="productPriceError">
                                        <span id="productPriceError" class="help-block hidden" style="color:#9b1b25">
                                             Please enter the price!
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group" id="addProductDesc">
                                    <label class="control-label col-sm-4" for="productDesc">Product DESC</label>
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <input type="text" class="form-control" id="productDesc" aria-describedby="productDescError">
                                        <span id="productDescError" class="help-block hidden" style="color:#9b1b25">
                                            Please enter the food description.
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6 hvr-pop" >
                                        <button type="submit" id="btnAddProductSubmit" class="btn btn-block"
                                                style="background-color: rgb(29,29,29);color: #fbf7ef;border:none ">
                                            SUBMIT
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
';

?>
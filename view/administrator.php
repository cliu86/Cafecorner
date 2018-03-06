<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<!-- Head-->
<?php include_once '_head.php';?>
<body>
    <!-- Banner-->
    <?php include_once   '_banner.php';?>
    <?php include_once '_fullPage-nav.php';?>
    <!-- NAV-->
    <?php include_once '_nav.php';?>
    <!--SlideInNav-->
    <?php include_once '_slideInNav.php';?>

    <!-- Empty Carousel Slider-->
    <div id="carousel-example-generic"></div>
    <!-- Main Content-->
    <div class="container-fluid" >
        <div class="row" >
            <div class="col-lg-6 animated slideInLeft " style=" height:65em;overflow: auto;">
                <div class="col-lg-12 " id="searchPage">
                    <div class="col-lg-3">
                        <select id="searchLabel" name="searchLabel" class="form-control" required>
                            <option value="first_name">First Name</option>
                            <option value="last_name">Last Name</option>
                            <option value="user_id">User ID</option>
                        </select>
                    </div>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input id="txtSearchResult" type="text" class="form-control " placeholder="Search for...">
                            <span class="input-group-btn">
                     <button  id="btnSearch" class="btn btn-default" type="button">Search</button>
                 </span>
                        </div><!-- /input-group -->
                    </div>
                </div>

                <div id="admin_page" style="font-size: 12px">
                    <table class="table" style="margin-top: 10em">
                        <thead id="heading">
                        <tr>
                            <th>ID#</th>
                            <th>FName</th>
                            <th>LName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="user_list"></tbody>
                    </table>
                </div>
            </div>

            <!-- Add product to menu -->
            <div class="col-lg-6 animated slideInRight " id="formProduct" style=" height:65em;overflow: auto;">
                <!-- Edit product -->
                <div class="form-horizontal col-lg-12" style="margin-top: -2em">
                    <h3 title="title" style="border: none">Edit Product</h3>
                    <table class="table" style="margin-top: 1em">
                        <thead>
                        <tr>
                            <th>Product ID#</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="product_list"></tbody>
                    </table>
                </div>
                <!-- end of edit product -->
        </div>
    </div>

    <!-- Admin Edit Modal -->
    <div class="modal fade admin_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-users" aria-hidden="true" style="margin-right: 9px"></i>
                        Update User Info
                    </h4>
                </div>
                <form method="post" id="admin_form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="admin_user_id">User ID</label>
                            <input type="text" class="form-control" id="admin_user_id" disabled>
                        </div>
                        <!-- First name -->
                        <div class="form-group " id="fn_input">
                            <label class="control-label" for="admin_first_name">First Name</label>
                            <input type="text" class="form-control" id="admin_first_name" aria-describedby="helper_fn">
                            <span id="helper_fn" class="help-block hidden">Invalid First name, must be 3 to 16 letters!</span>
                        </div>
                        <!-- Last name -->
                        <div class="form-group" id="ln_input">
                            <label class="control-label" for="admin_last_name">Last Name</label>
                            <input type="text" class="form-control" id="admin_last_name" aria-describedby="helper_ln">
                            <span id="helper_ln" class="help-block hidden">Invalid Last name,must be 3 to 16 letters! </span>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label class="control-label" for="admin_email_address">Email Address</label>
                            <input type="text" class="form-control" id="admin_email_address"  readonly>
                        </div>
                        <!-- Phone number -->
                        <div class="form-group" id="phone_input">
                            <label class="control-label" for="admin_phone_number">Phone number</label>
                            <input type="text" class="form-control" id="admin_phone_number" aria-describedby="helper_phone">
                            <span id="helper_phone" class="help-block hidden">Invalid Phone number format, must be 10 digit !  </span>
                        </div>
                        <!-- Receive discount-->
                        <div class="form-group" id="discount_input">
                            <label for="admin_receive_discount" class="control-label">Receive Discount</label>
                            <select id="admin_receive_discount" name="admin_receive_discount" class="form-control" aria-describedby="helper_discount">
                                <option value="">PLEASE SELECT ONE</option>
                                <option value="yes">YES</option>
                                <option value="no">NO</option>
                            </select>
                            <span id="helper_discount" class="help-block hidden">Please select one !  </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default  pull-left hvr-pulse-grow" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary  pull-right btn_admin_submit hvr-bounce-to-top"  data-dismiss="">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Product Edit Modal -->
        <div class="modal fade product_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(29,29,29);color:#fbf7ef">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-users" aria-hidden="true" style="margin-right: 9px"></i>
                            Update Product Info
                        </h4>
                    </div>
                    <form method="post" id="product_edit_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="product_id">Product ID</label>
                                <input type="text" class="form-control" id="product_id" disabled>
                            </div>
                            <!-- Product Category-->
                            <div class="form-group" id="pc_input">
                                <label for="product_category" class="control-label">Product Category:</label>
                                <select id="product_category" class="form-control" aria-describedby="helper_pc">
                                    <option value="">Please select one</option>
                                    <option value="drink_menu">Drink Menu</option>
                                    <option value="special_menu">Special Menu</option>
                                    <option value="upcoming_menu">Upcoming Menu</option>
                                </select>
                                <span id="helper_pc" style="color:#9b1b25" class="help-block hidden">Please select one !</span>
                            </div>
                            <!-- Product name -->
                            <div class="form-group " id="pn_input">
                                <label class="control-label" for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" aria-describedby="helper_pn">
                                <span id="helper_pn" class="help-block hidden">Invalid Product name!</span>
                            </div>
                            <!-- Product price -->
                            <div class="form-group" id="pp_input">
                                <label class="control-label" for="product_price">Product Price</label>
                                <input type="text" class="form-control" id="product_price" aria-describedby="helper_pp">
                                <span id="helper_pp" class="help-block hidden">Invalid product price! </span>
                            </div>
                            <!-- Product desc -->
                            <div class="form-group" id="pd_input">
                                <label class="control-label" for="product_desc">Product Desc</label>
                                <input type="text" class="form-control" id="product_desc" aria-describedby="helper_pd">
                                <span id="helper_pd" class="help-block hidden">Product Description ! </span>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color: rgb(29,29,29)">
                            <button type="button" class="btn btn-default  pull-left hvr-pulse-grow" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary  pull-right btn_product_submit hvr-bounce-to-top"
                                    data-dismiss="" style="background-color: #9b1b25;color:#fbf7ef;border-color: #9b1b25">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <div class="row">
            <?php include_once '_footer.php'; ?>
        </div>

    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>

</body>
</html>
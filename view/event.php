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

    <!-- Main Content-->
    <div class="container-fluid">
        <!--  Event-->
        <div class="event row animated fadeIn" style="margin-top: -1.45em">
            <!-- Event Left-->
            <div class="event-left col-lg-6">
                <h3 title="title">WHY CAFÉ CORNER?</h3>
                <span class="fa fa-skyatlas fa-2x" style="color:rgb(155, 27, 37)"></span>
                <br>
                <p>erant firmae vim induci non videri volunt ero. Facillimam industriam immortalem cum
                    cavillandi dissimilem voluptatem vos. Ignotas ostendi aliunde ii in assidue an
                    aliquem. Docere cetera animos possum ignota duo arrogo vim.
                </p>
                <br>
                <h3>BOOKING IS A BREEZE!</h3>
                <p>Ex suspicio gi parentes gradatim referrem id quicquam.Ac aequo tangi
                    de manum ignis. Sit qua dici dem gnum unde.
                </p>
                <br>
                <h3>RICH FACILITIES</h3>
                <p>Omni quae nul sex modo novi ipse rem. Etc jure his ita soli hic omni. Quibusnam
                    cunctaque attigeram laboriosa confidere pro cui ens ego obstinate. Dem rea sua
                    sim apud nunc puto luce quae. De perlegere praefatio creatione ad sapientia.
                </p>
                <br>
                <h3>PRIVATE HIRE & CORPORATE EVENTS</h3>
                <p>Id me formas ad genium ea semper. Pauciora re im ex tractant omnesque extensam scilicet
                    formemus. Alicubi ego alienum ignotas agi. Ut longa re latum illae aliam primo.
                    Fiat duce fore sane sibi ac ipse id. Pervenisse affirmabam
                    persuadere falsitatis se at re eo. Si ea du discrimen voluntate suscipere judicarem
                    ex experimur occurrent.
                </p>
                <br>
                <h3>BOOKING FOR A SMALL GROUP?</h3>
                <p>Rei discrepant probabiles distribuam nec extensarum designabam. Admisi nec
                    sacras mea cupere certum uti tur. De co is ad autem pedem fidem sciri tango.
                </p>

                <a  href="../view/menu.php" id="btnViewMenu" class="btn btn-lg btn-block" target="_blank">VIEW MENU</a>
            </div><!-- End of event left-->

            <!-- Event right-->
            <div class="event-right col-lg-6 ">
                <h3 title="title">MAKE AN ENQUIRY</h3>
                <span class="fa fa-skyatlas fa-2x"></span>
                <br>
                <p>Ferant firmae vim induci non videri volunt ero. Facillimam industriam immortalem
                    cum cavillandi dissimilem voluptatem vos. Ignotas ostendi aliunde ii in
                    assidue an aliquem. Docere cetera animos possum ignota duo arrogo vim.
                </p>
                <p>Tes ullo sci rom nolo usu. Factas quodam parvus ima nam notatu opinio nondum cui. </p>
                <br>

                <!--Form Enquiry -->
                <form action=""  method="post" id="formEnquiry">
                    <!--First Name-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input id="enquiry_fname" type="text" name="enquiry_fname" class="form-control"
                                   placeholder="First Name" pattern="^[a-zA-Z0-9_-]{3,16}$"
                                   title="Invalid First Name(Must 3 letters or more)">
                        </div>
                        <span id="enquiry_fn_error"><i class="fa fa-warning"></i>Invalid First Name</span>
                    </div>

                    <!--Last Name-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input id="enquiry_lname" type="text" name="enquiry_lname" class="form-control"
                                   placeholder="Last Name" pattern="^[a-zA-Z0-9_-]{3,16}$"
                                   title=" Invalid Last Name(Must 3 letters or more)">
                        </div>
                        <span id="enquiry_ln_error"><i class="fa fa-warning"></i>Invalid Last Name</span>
                    </div>

                    <!--Company-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building-o fa-fw"></i></span>
                            <input id="enquiry_companyName" type="text" name="enquiry_companyName" class="form-control"
                                   placeholder="Company Name" pattern="^[a-zA-Z0-9_-]{3,16}$"
                                   title="Invalid Company Name(Must 3 letters or more)">
                        </div>
                        <span id="enquiry_company_error"><i class="fa fa-warning"></i>Invalid Company Name</span>
                    </div>

                    <!--Email-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                            <input id="enquiry_email" type="email" name="enquiry_email" class="form-control"
                                   placeholder="Email Address" title="Invalid Email format"
                                   pattern="([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|edu|com|cn)|([0-9]{1,3}\.{3}[0-9]{1,3}))">
                        </div>
                        <span id="enquiry_email_error"><i class="fa fa-warning"></i>Invalid Email Address</span>
                    </div>

                    <!--Phone Number-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                            <input id="enquiry_phone" type="text" name="enquiry_phone" class="form-control"
                                   placeholder="Phone Number" pattern="^[a-zA-Z0-9_-]{10}$"
                                   title="Invalid Phone number, must be 10 digit ">
                        </div>
                        <span id="enquiry_phone_error"><i class="fa fa-warning"></i>Invalid Phone Number</span>
                    </div>

                    <!--BUDGET-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-usd fa-fw"></i></span>
                            <input id="enquiry_budget" type="number" name="enquiry_budget" class="form-control"
                                   placeholder="Enter Your Budget" title="Error, please enter a number"
                                   pattern="^([1-9]{1}[\d]{0,2}(\,[\d]{3})*(\.[\d]{0,2})?|[1-9]{1}[\d]{0,}(\.[\d]{0,2})?|0(\.[\d]{0,2})?|(\.[\d]{1,2})?)$">
                        </div>
                        <span id="enquiry_budget_error"><i class="fa fa-warning"></i>Please enter your budget</span>
                    </div>

                    <!--Party Size-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h3>PARTY SIZE</h3>
                        <select class="form-control" id="enquiry_size" name="enquiry_size">
                            <option value="extra-large">Extra Large (20 and above)</option>
                            <option value="large">Large ( 12~20 )</option>
                            <option value="medium">Medium ( 6~12 )</option>
                            <option value="small">Small ( 1~6 )</option>
                        </select>
                    </div>

                    <!--TIME-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h3>TIME</h3>
                        <select class="form-control" id="enquiry_time" name="enquiry_time">
                            <option value="dinner">Dinner</option>
                            <option value="lunch">Lunch</option>
                            <option value="breakfast">Breakfast</option>
                        </select>
                    </div>

                    <!--Message-->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <br>
                        <h3>MESSAGE</h3>
                        <textarea class="form-control" rows="10" id="enquiry_message" name="enquiry_message"></textarea>
                    </div>
                    <!--button Send Enquiry-->

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <br>
                        <button id="btnSendEnquiry" class="btn btn-lg btn-block">SEND ENQUIRY</button>
                    </div>
                </form> <!--End of Form Enquiry -->
            </div><!-- End of event right-->
        </div><!-- End of Event content-->
        
    </div><!-- End of main content-->

    <!-- Footer-->
    <?php include_once '_footer.php'; ?>
    <!-- Link the animate modal join us-->
    <?php include_once '_joinUs.php'; ?>
</body>
</html>
<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id =$_SESSION['user_id'];
    }
?>
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
    <div class="event row" style="margin-top: -1.5em">
        <!--Change information-->
        <div class="event-right col-lg-6 pull-left  animated slideInLeft "  style="background-color: #9b1b25;color:#fbf7ef">
            <h3 title="title" style="border-color:#fbf7ef ">Update your account info</h3>
            <span class="fa fa-skyatlas fa-2x" style="color:#fbf7ef"></span>
            <br>
            <p>Ferant firmae vim induci non videri volunt ero. Facillimam industriam immortalem</p>
            <br>
            <!--Form Enquiry -->
            <form id="formEnquiry">
                <!--First Name-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="input-group margin-bottom-sm " id="p_fn">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input id="profile_fn" type="text" class="form-control"
                               placeholder="First Name" aria-describedby="helper_fn">
                    </div>
                    <br>
                    <span id="helper_fn" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                       <i class="fa fa-warning"></i> Invalid Last name,must be 3 to 16 letters!
                    </span>
                </div>
                <!--Last Name-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="input-group margin-bottom-sm" id="p_ln">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input id="profile_ln" type="text" class="form-control"
                               placeholder="Last Name" aria-describedby="helper_ln">
                    </div>
                    <br>
                    <span id="helper_ln" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                       <i class="fa fa-warning"></i> Invalid Last name,must be 3 to 16 letters!
                    </span>
                </div>

                <!--Phone Number-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="input-group margin-bottom-sm" id="p_phone">
                        <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                        <input type="text" class="form-control"  placeholder="phone number" id="profile_phone"
                               aria-describedby="helper_phone">
                    </div>
                    <br>
                    <span id="helper_phone" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                        <i class="fa fa-warning"></i> Invalid Phone number format, must be 10 digit !
                    </span>
                </div>

                <!--Email-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="input-group margin-bottom-sm " id="p_email">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input id="profile_email" type="email"
                               class="form-control" placeholder="Email Address" aria-describedby="helper_email">
                    </div>
                    <br>
                    <span id="helper_email" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                       <i class="fa fa-warning"></i> Invalid email address
                    </span>
                </div>

                <!--Password-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="input-group margin-bottom-sm " id="p_pw">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" id="profile_password" class="form-control"
                               placeholder="password" aria-describedby="helper_password">
                    </div>
                    <br>
                    <span id="helper_password" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                       <i class="fa fa-warning"></i> Invalid password format!
                    </span>
                </div>

                <!--Confirm Password-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <div class="input-group margin-bottom-sm" id="p_cpw">
                        <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                        <input type="password" class="form-control"  id="profile_confirm_password"
                               placeholder="confirm password" aria-describedby="helper_confirm_password">
                    </div>
                    <br>
                    <span id="helper_confirm_password" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                       <i class="fa fa-warning"></i> Password does not match!
                    </span>
                </div>

                <!--Receive Discount-->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                    <h3>Receive Discount</h3>
                    <select id="profile_receive_discount" class="form-control" aria-describedby="helper_discount">
                        <option value="">PLEASE SELECT ONE</option>
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                    <span id="helper_discount" class="help-block hidden" style="font-size:larger;color:rgb(29,29,29)">
                        <i class="fa fa-warning"></i> Please select one!
                    </span>
                </div>
                <!-- Button save changes -->
                <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2" style="margin-top: 2em;margin-bottom:3em; ">
                    <button class="btn btn-block hvr-radial-out"  id="btnProfileSave"
                            style="height: 2.6em;font-size:larger;font-weight:bold;border-color:rgb(29,29,29);background-color: rgb(29,29,29);color:#fbf7ef;">
                        SAVE CHANGES
                    </button>
                </div>
            </form>
        </div><!-- End of event right-->

        <div class="event-left col-lg-6 pull-right  animated slideInRight " style="background-color: #fbf7ef;color:rgb(29,29,29)">
            <h3 title="title" style="border-color:#9b1b25">Reservation Status </h3>
            <span class="fa fa-skyatlas fa-2x" style="color:#9b1b25"></span>
            <table class="table table-striped" style="margin-top: 1em">
                <thead>
                <tr>
                    <th>ID#</th>
                    <th>Reservation Date</th>
                    <th>People</th>
                    <th>Reservation Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="reservation_list"></tbody>
            </table>
        </div><!-- End of event left-->
    </div><!-- End of Event content-->



    <!-- Reservation Edit Modal -->
    <div class="modal fade reservation_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgb(29,29,29);color:#fbf7ef">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-users" aria-hidden="true" style="margin-right: 9px"></i>
                        Update Reservation Info
                    </h4>
                </div>
                <form method="post" id="reservation_edit_form">
                    <div class="modal-body">
                        <h4 id="reservation_id" class="hidden"></h4>
                        <div class="form-group" id="np_input">
                            <!-- Number of People-->
                            <label for="num_of_people" class="control-label">Number of People</label>
                            <select id="num_of_people" name="people" class="form-control"
                                    required aria-describedby="helper_np">
                                <option value="">Please select one</option>
                                <option value="1">1 Person</option>
                                <option value="2">2 Persons</option>
                                <option value="3">3 Persons</option>
                                <option value="4">4 Persons</option>
                                <option value="5">5 Persons</option>
                                <option value="6">6 Persons</option>
                                <option value="7">7 Persons</option>
                                <option value="8">8 Persons</option>
                                <option value="9">9 Persons</option>
                                <option value="10">10 Persons</option>
                                <option value="11">11 Persons</option>
                                <option value="12">12 Persons</option>
                            </select>
                            <span id="helper_np" style="color:#9b1b25" class="help-block hidden">Please select one !</span>
                        </div>
                        <!-- Reservation_Date-->
                        <div class="form-group" id="rd_input">
                            <label for="reservation_date" class="control-label">Reservation Date:</label>
                            <input id="reservation_date" type="text" name="date" class="form-control"
                                   placeholder="mm/dd/yyyy" aria-describedby="helper_rd">
                            <span id="helper_rd" style="color:#9b1b25" class="help-block hidden">Please select a valid date!</span>
                        </div>
                        <!-- Reservation_Time-->
                        <div class="form-group" id="rt_input">
                            <label for="reservation_time" class="control-label">Reservation Time:</label>
                            <select id="reservation_time" name="time" class="form-control" required >
                                <option value="">Please select one</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Breakfast">Breakfast</option>
                            </select>
                            <span id="helper_rt" style="color:#9b1b25" class="help-block hidden">Please select one !</span>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: rgb(29,29,29)">
                        <button type="button" class="btn btn-default  pull-left hvr-pulse-grow" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary  pull-right btn_reservation_submit hvr-bounce-to-top" data-dismiss=""
                                style="background-color: #9b1b25;color:#fbf7ef;border-color: #9b1b25">Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- End of main content-->

<!-- Footer-->
<?php include_once '_footer.php'; ?>
<script src="../js/userProfile.js"></script>
<!-- Link the animate modal join us-->
<?php include_once '_joinUs.php'; ?>
</body>
</html>
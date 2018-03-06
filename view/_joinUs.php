<?php
echo'
    <!---------------------------- SignIn / SignUp  Modal---------------------------------->
    <div id="animatedModal">
        <div class="close-animatedModal" >
            <span class="btn btn-lg glyphicon glyphicon-remove center-block hvr-pulse-grow"></span>
        </div>

        <div class="modal-content">
                <!--Form Sign In -->
                <form action="../controller/membership.php?action=signIn" id="formSignIn"  method="post"
                      class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
                    <br><br>
                    <h3 class="center-block">Memebership Sign In</h3>
                    <br><br>
                    <!--Email-->
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                            <input id="signIn_email" class="form-control"  name="email_address_signIn" 
                                type="email" placeholder="Email address" >
                        </div>
                        <p id="email_signIn_error"><i class="fa fa-warning"></i>Invalid Email Address</p>
                    </div>
                    <!--Password-->
                   <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input id="pw_signIn" class="form-control" name="password_signIn"  
                                    type="password" placeholder="Password">
                        </div>
                        <p id="pw_signIn_error"><i class="fa fa-warning"></i>Invalid Password</p>
                    </div>
                    <!--Button Sign In-->
                    <button id="btnSignIn"  class="btn center-block hvr-bounce-to-right">
                        <span class="hvr-pop">SIGN IN </span><i class="fa fa-angle-right"></i>
                    </button>
                    <br><br>
                </form>  <!--End of Form Sign In-->
            
                <!--Form Sign Up -->
                <form action="../controller/membership.php?action=signUp"  id="formSignUp" method="post"
                      class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
                    <h3 class="center-block">Memebership Sign Up</h3>
                    <br><br>
                    <!--First Name-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input id="fname" type="text" name="fname" class="form-control" placeholder="First Name" value="Test">
                        </div>
                        <p id="fn_error"><i class="fa fa-warning"></i>First Name can not be empty</p>
                    </div>
                    <!--Last Name-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input id="lname" type="text" name="lname" class="form-control"  placeholder="Last Name" value="Test">
                        </div>
                        <p id="ln_error"><i class="fa fa-warning"></i>Last Name can not be empty</p>
                    </div>

                    <!--Email-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                            <input id="email_signUp" type="email" name="email_signUp" class="form-control" placeholder="Email Address" value="test@test.com">
                        </div>
                        <p id="email_signUp_error"><i class="fa fa-warning"></i>Email can not be empty</p>
                    </div>
                    <!--Phone Number-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                            <input id="phone_signUp" type="text" name="phone_signUp" class="form-control"  placeholder="Phone number, 10 digit only" value="1234567890">
                        </div>
                        <p id="phone_signUp_error"><i class="fa fa-warning"></i>Phone Number can not be empty</p>
                    </div>
                    <!--Password-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input id="pw_signUp" type="password" name="password" class="form-control"  placeholder="Password,6 characters only" value="">
                        </div>
                        <p id="pw_signUp_error"><i class="fa fa-warning"></i>Password can not be empty</p>
                    </div>
                    <!--Confirm Password-->
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input id="cpw_signUp" type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password" value="">
                        </div>
                        <p id="cpw_signUp_error"><i class="fa fa-warning"></i>Password does not match! </p>
                    </div>
                    <!--Receive Discount-->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="center-block">WANT TO RECEIVE WEEKLY DISCOUNT ?</h4>
                        <select id="discount" name="receive_discount" class="form-control">
                            <option value="">PLEASE SELECT ONE</option>
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select>
                        <p id="discount_error">Please select one</p>
                    </div>
                    
                    <!--Button Sign Up-->
                    <button id="btnSignUp" class="btn center-block hvr-bounce-to-right">
                        <span class="hvr-pop">SIGN UP </span><i class="fa fa-angle-right"></i>
                    </button>
                </form> <!--End pf Form Sign Up -->
          
        </div> <!--End of modal content-->
    </div>
    <!-------------------------End of SignIn / SignUp  Modal------------------------>
    ';
?>
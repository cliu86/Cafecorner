$(function(){
    /*-----------------------Sign Up -----------------------*/
    $('#formSignUp').on('submit',function(e){
        e.preventDefault();
    });
    $('#btnSignUp').on('click',function(){
        function trim(value) {
            return value.replace(/^\s+|\s+$/gm,'');
        }
        var fname = trim($('#fname').val());
        var lname = trim($('#lname').val());
        var email_signUp = trim($('#email_signUp').val());
        var phone_signUp = trim($('#phone_signUp').val());
        var password = trim($('#pw_signUp').val());
        var confirm_password = trim($('#cpw_signUp').val());
        var discount = $('#discount').val();
        var admin_level = $('#admin_level').val();

        var newUser = new User(fname, lname, email_signUp, phone_signUp, password, confirm_password, discount);
        newUser.check_fname(fname);
        newUser.check_lname(lname);
        newUser.check_email(email_signUp);
        newUser.check_phone(phone_signUp);
        newUser.check_password(password);
        newUser.check_discount(discount);

        if(confirm_password.length==0){
            $('#cpw_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Required Field Must be filled!');
        }else{
            if(password != confirm_password){
                $('#cpw_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Password does not match!');
                cpwe = true;
            }else{
                $('#cpw_signUp_error').css('visibility','hidden');
                cpwe = false;
            }
        }
        //If every field is all right post the data to user_signUp.php
        if(fe==false && le==false && pe==false && ee==false && pwe==false && cpwe==false && de==false) {
            $.post('../controller/membership.php?action=signUp', {
                    first_name: newUser.fname,
                    last_name: newUser.lname,
                    email_address: newUser.email,
                    phone: newUser.phone,
                    password: newUser.password,
                    confirm_password: newUser.confirm_password,
                    receive_discount: newUser.discount
                }, function (data) {
                    if(data =='Welcome to The Cafe Corner'){
                        $.alert({
                            content: 'url:../readme.txt',
                            columnClass: 'col-md-6 col-md-offset-3',
                            animation: 'RotateXR',
                            theme: 'black',
                            title: '<i class="fa fa-spinner fa-spin"></i>Working on it.....',
                            contentLoaded: function(data, status, xhr){
                                var self = this;
                                setTimeout(function(){
                                    self.setContent('<h3>Congratulations!<br><br>'
                                                    +'You are now a member of our award-winning restaurant.</h3><br><br>'
                                                    + '<h4>Dear Customer, this is the read-me part.<br><br></h4>'
                                                    + '<h4>' +self.content+ '</h4><br><br>'
                                                    + '<h4>Thank you very much and have a lovely day!'
                                                    +'<i class="fa fa-smile-o" style="padding-left: 11px" aria-hidden="true"></i><br><br> Chang Liu</h4>');
                                    self.setTitle('<i class="fa fa-check-square-o" style="padding-right: 11px" ></i>Welcome to The Cafe Corner!');
                                }, 2000);
                            },
                            confirm: function(){
                                window.location = '../view/index.php';
                            }
                        });
                    }else{
                        $.dialog({
                            columnClass: 'col-md-6 col-md-offset-3',
                            animation: 'RotateXR',
                            theme: 'black',
                            icon: 'fa fa-warning',
                            title: 'Error!',
                            content: data
                        });
                    }
                }
            );
        }
    });

    /*-------------------------Sign In --------------------------*/
    $('#formSignIn').on('submit',function(e){
        e.preventDefault();
    });
    $('#btnSignIn').on('click',function(){
        var signIn_email = $('#signIn_email').val();
        var password_signIn = $('#pw_signIn').val();
        var email_error, pw_error;

        if(signIn_email.length==0){
            $('#email_signIn_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Email can not be empty!');
        }else{
            var validEmail = new RegExp("([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|edu|com|cn)|([0-9]{1,3}\.{3}[0-9]{1,3}))");
            if(signIn_email.match(validEmail)){
                $('#email_signIn_error').css('visibility','hidden');
                email_error = false;
            }else{
                $('#email_signIn_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid Email format!');
                email_error = true;
            }
        }

        if(password_signIn.length==0){
            $('#pw_signIn_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Password can not be empty!');
        }else{
            var validPassword = new RegExp("^(?![0-9]{6})[0-9a-zA-Z]{6}$");
            if(password_signIn.match(validPassword)){
                $('#pw_signIn_error').css('visibility','hidden');
                pw_error= false;
            }else{
                $('#pw_signIn_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid password format!');
                pw_error = true;
            }
        }

        if( pw_error==false &&  email_error==false){
            $.post('../controller/membership.php?action=signIn',
                {
                    email_address_signIn: signIn_email,
                    password_signIn: password_signIn
                }, function (data) {
                    if(data =='Welcome back'){
                        $.dialog({
                            columnClass: 'col-md-6 col-md-offset-3',
                            animation: 'RotateXR',
                            theme: 'black',
                            icon: 'fa fa-spinner fa-spin',
                            title: '<h3>' + data + '</h3>',
                            content: ''
                        });
                        setTimeout(function(){  window.location = '../view/index.php'; }, 1400);
                    }
                    else{
                        $.dialog({
                            columnClass: 'col-md-6 col-md-offset-3',
                            animation: 'RotateXR',
                            theme: 'black',
                            icon: 'fa fa-warning',
                            title: 'Error!',
                            content: '<h4>'+ data + '</h4>'
                        });
                    }
                }
            );
        }
    });

    /*-------------------------LogOut --------------------------*/
    $('div.btn-group a[title=btnLogOut]').on('click', function(){
        $.confirm({
            columnClass: 'col-md-8 col-md-offset-2',
            animation: 'RotateXR',
            autoClose: 'cancel|5000',
            theme: 'black',
            icon: 'fa fa-check-square-o',
            title: 'Confirmation Required!',
            content: '<h4>Do you really want to log out?</h4>',
            confirm: function(){
                $.post('../controller/membership.php?action=logOut', function(data){
                    {
                        if(data ==' Logout...'){
                            $.dialog({
                                columnClass: 'col-md-6 col-md-offset-3',
                                animation: 'RotateXR',
                                theme: 'black',
                                icon: 'fa fa-spinner fa-spin',
                                title: '<h3>' + data + '</h3>',
                                content: '<h4><i style="margin-right: 11px" class="fa fa-smile-o" aria-hidden="true"></i> See you next time</h4> '
                            });
                            setTimeout(function(){  window.location = '../view/index.php'; }, 1500);
                        }
                    }
                });
            },
            cancel: function(){
                // $.alert('Canceled!')
            }
        });
    });
});




























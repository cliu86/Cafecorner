//Define global variable for errors, fe = first_name_error, return false means no error.
var fe,le,ee,pe,pwe,cpwe,de;
//Object User
function User(fname, lname, email, phone, password, confirm_password, discount) {
    this.fname = fname;
    this.lname = lname;
    this.email = email;
    this.phone = phone;
    this.password= password;
    this.confirm_password= confirm_password;
    this.discount = discount;
}

User.prototype.check_fname = function(name) {
    if(name.length==0){
        $('#fn_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'First name can not be empty!');
    }else{
        var validName = new RegExp("^[a-zA-Z0-9_-]{3,16}$");
        if(name.match(validName)){
            $('#fn_error').css('visibility','hidden');
            fe = false;
        }else{
            $('#fn_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid First name!');
            fe = true;
        }
    }
};

User.prototype.check_lname = function(name) {
    if(name.length==0){
        $('#ln_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Last name can not be empty!');
    }else{
        var validName = new RegExp("^[a-zA-Z0-9_-]{3,16}$");
        if(name.match(validName)){
            $('#ln_error').css('visibility','hidden');
            le = false;
        }else{
            $('#ln_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid Last name!');
            le = true;
        }
    }
};

User.prototype.check_email =function(email){
    if(email.length==0){
        $('#email_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Email can not be empty!');
    }else{
        var validEmail = new RegExp("([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|edu|com|cn)|([0-9]{1,3}\.{3}[0-9]{1,3}))");
        if(email.match(validEmail)){
            $('#email_signUp_error').css('visibility','hidden');
            ee = false;
        }else{
            $('#email_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid Email format!');
            ee = true;
        }
    }
};

User.prototype.check_phone= function(phone){
    if(phone.length==0){
        $('#phone_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Phone number can not be empty!');
    }else{
        var validPhone = new RegExp("^[a-zA-Z0-9_-]{10}$");
        if(phone.match(validPhone)){
            $('#phone_signUp_error').css('visibility','hidden');
            pe = false;
        }else{
            $('#phone_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid Phone Number, must be 10 digit!');
            pe = true;
        }
    }
};

User.prototype.check_password = function(password){
    if(password.length==0){
        $('#pw_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Password can not be empty!');
    }else{
        var validPassword = new RegExp("^(?![0-9]{6})[0-9a-zA-Z]{6}$");
        if(password.match(validPassword)){
            $('#pw_signUp_error').css('visibility','hidden');
            pwe = false;
        }else{
            $('#pw_signUp_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Invalid password format!');
            pwe = true;
        }
    }
};

User.prototype.check_discount= function(discount){
    if(discount.length!=0){
        $('#discount_error').css('visibility','hidden');
        de=false;
    }else{
        $('#discount_error').css('visibility',' visible').html('<i class="fa fa-warning animated shake"></i>'+'Please select one!');
        de=true;
    }
};














































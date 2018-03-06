<?php
class User
{
    private $first_name ;
    private $last_name ;
    private $email;
    private $phone;
    private $password;
    private $confirm_password;
    private $discount;
    private $error = array();

    function __construct( $first_name, $last_name, $email, $phone, $password, $confirm_password, $discount)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->discount = $discount;
    }
    //First name
    public function get_first_name(){
        return $this->first_name;
    }
    public function set_first_name($value){
       $this->first_name =$value;
    }
    public function get_valid_first_name()
    {
        if (preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $this->first_name) == 0) {
            $error_fn = "First name is invalid!";
            array_push($this->error, $error_fn);
            return $error_fn;
        } else {
            return true;
        }
    }
    //Last name
    public function get_last_name(){
        return $this->last_name;
    }
    public function set_last_name($value){
        $this->last_name =$value;
    }
    public function get_valid_last_name()
    {
        if (preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $this->last_name) == 0) {
            $error_fn = "Last name is invalid!";
            return $error_fn;
        } else {
            return true;
        }
    }
    //Email
    public function get_email(){
        return $this->email;
    }
    public function set_email($value){
        $this->email =$value;
    }
    public function get_valid_email(){
        if (preg_match("/([a-z0-9][-a-z0-9_\+\.]*[a-z0-9])@([a-z0-9][-a-z0-9\.]*[a-z0-9]\.(arpa|edu|com|cn)|([0-9]{1,3}\.{3}[0-9]{1,3}))/", $this->email)== 0){
            $error_email = "Not a valid email format!";
            array_push($this->error, $error_email);
            return $error_email;
        }else{
            return true;
        }
    }
    //phone
    public function get_phone(){
        return $this->phone;
    }
    public function set_phone($value){
        $this->phone =$value;
    }
    public function get_valid_phone(){
        if ( preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $this->phone)== 0){
            $error_phone = "Not a valid phone number!";
            array_push($this->error, $error_phone);
            return $error_phone;
        }else{
            return true;
        }
    }
    //Password
    public function get_password(){
        return $this->password;
    }
    public function set_password($value){
        $this->password =$value;
    }
    public function get_valid_password()
    {
        if (preg_match("/^(?![0-9]{6})[0-9a-zA-Z]{6}$/", $this->password) == 0) {
            $error_pw = "Invalid password , 6 characters only!";
            array_push($this->error, $error_pw);
            return $error_pw;
        } else {
            return true;
        }
    }
    //Confirm password
    public function get_confirm_password(){
        return $this->confirm_password;
    }
    public function set_confirm_password($value){
        $this->confirm_password =$value;
    }
    public function get_valid_confirm_password()
    {
        if ($this->password != $this->confirm_password) {
            $error_cpw = "Passwords do not match!";
            array_push($this->error, $error_cpw);
            return $error_cpw;
        } else {
            return true;
        }
    }
    //Discount
    public function get_discount(){
        return $this->discount;
    }
    public function set_discount($value){
        $this->discount =$value;
    }
    public function get_valid_discount(){
        if(strlen($this->discount)==0){
            $error_discount = "Please select one!";
            array_push($this->error, $error_discount);
            return $error_discount;
        }else{
            return true;
        }
    }

    public function data_validation_user ()
    {
        $this->get_valid_first_name();
        $this->get_valid_last_name();
        $this->get_valid_email();
        $this->get_valid_phone();
        $this->get_valid_password();
        $this->get_valid_confirm_password();
        $this->get_valid_discount();
    }

    public function get_error(){
        return implode('<br>', $this->error);
    }
}
?>
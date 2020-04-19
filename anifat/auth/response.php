<?php
$response_mail = "";
$response_success = "";
session_start();
if(!is_null($response)){
    if (isset($_SESSION['response'])) {
        # code...
        $response = $_SESSION['response'];
    }else{
    $response = $response;
}
if ($response_mail == '402') {
	$response_success = "a mail has been sent to you";
}else if($response_mail == '401'){
	$response_success = "a mail has been sent to you";
}
}

switch($response){
	case "100":$response = "Continue";break;
	case "200":$response = "<div class='uk-alert uk-alert-success col-md-12'>Registration Successful &nbsp <p>".$response_success." containing <b>Activation Link</b></p> </div>";break;
	case "201":$response = "<div class='uk-alert uk-alert-success col-md-12'>Registration Successful &nbsp <p>".$response_success." containing <b>Activation Link</b></p><p>we appriciate your interest to volunteer. please activate your account to have full priviledge</p> </div>";break;
	case "202":$response = "<div class='uk-alert uk-alert-success col-md-12'>Subscription Successful &nbsp <p> </p><p>we now have you in our subscription list</p> </div>";break;
	case "440":$response = "Login Timeout";break;
	case "400":$response = "<div class='uk-alert uk-alert-danger  col-md-12'> Password Mismatched </div>";break;
	case "401":$response = "<div class='uk-alert uk-alert-warning col-md-12 '>Email Has Already Been Used </div>";break;
	case "402":$response = "<div class='uk-alert uk-alert-warning col-md-12 '>Email Has Already Been Used </div>";break;
	case "403":$response = "Forbidden";break;
	case "404":$response = "Not Found";break;
	case "502":$response = "Bad Gateway";break;
	case "503":$response = "Service Unavailable";break;
	case "000":$response = " ";break;
	case "":$response = " ";break;

	default:;break;
}
unset($_SESSION['response']);
?>
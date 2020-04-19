<?php
class Phpmailer_lib
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        require_once(APPPATH."third_party/mails/PHPMailerAutoload.php");
        $mail = new PHPMailer;
        return $mail;
    }
}
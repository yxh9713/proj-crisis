<?php

namespace App\Controllers;


class Email extends \Core\Controller
{
    protected $params;

    public function __construct ($params) {
        $this->params = $params;
    }

    public function sendAction()
    {
        $email = filter_var($_POST['femail'], FILTER_SANITIZE_STRING);

        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     return $this->json_response("$email is a valid email address.", 400);
        // };
        $country = filter_var($_POST['scountry'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['fsendmail'], FILTER_SANITIZE_STRING);

        $to = 'casper@clubspeed.com, walterbode@optimum.net';

        $subject = 'Contact From Crisis Chronology';

        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: ". $email . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $message = '<html><body>';
        $message .= '<p><b>Email: </b>'.$email.'</p>';
        $message .= '<p><b>Country: </b>'.$country.'</p>';
        $message .= '<p><b>Subject: </b>'.$content.'</p>';
        $message .= '</body></html>';

        if(mail($to, $subject, $message, $headers)) {
            echo $this->json_response("success", 200);
        } else {
            echo $this->json_response("Fail to send message.", 400);
        }
    }
}

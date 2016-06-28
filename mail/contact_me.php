<?php
// Check for empty fields
require("./lib/loger.php");
    $log = logger::getInstance();
    $log->logfile = 'l1.log';
    //$log->write('Test', __FILE__, __LINE__);

if(empty($_POST['name'])  	||
    empty($_POST['email']) 	||
    empty($_POST['phone']) 	||
    empty($_POST['message'])	||
    !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        echo "No arguments Provided!";
        return false;
   }


$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$HTTP_HOST = parse_url('http://'.$_SERVER["HTTP_HOST"]);
$HTTP_HOST = str_replace(array("http://","www."),"", $HTTP_HOST['host']);
$from = "noreply@".$HTTP_HOST; // отправитель
//    $log->write('Loging - '.$from, __FILE__, __LINE__);

//require("smtp.php");

// Create the email and send the message
$to = "mastescript@gmail.com"; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	

         $str = $name." | ".$email_address." | ".$phone." | ".$message;
         $log->write($str);
//         $log->write('Loging - ', __FILE__, __LINE__);
//         $log->write($to." - ".$email_subject." - ".$email_body." - ".$headers);

//@MailSmtp($to, $email_subject, $email_body, $headers);
return true;
?>
<?php include "connection.php"  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


    <div class="login_wrapper">

        <section class="login_content">
            <form name="form1" action="send_mail.php" method="post">
                <h1>User Login Form</h1>

                <div>
                    <input type="text" name="email" class="form-control" placeholder="To Email" required="" />
                </div>
                <div>
                    <input type="subject" name="subject" class="form-control" placeholder="Subject" required="" />
                </div>
                <div>
                    <input type="message" name="message" class="form-control" placeholder="Message" required="" /><br>
                </div>
                <div>

                    <input class="btn btn-default submit" type="submit" name="submit1" value="Login">

                </div>

                <div class="clearfix"></div>


            </form>
        </section>
        <?php
        if(isset($_POST['submit1'])){
        require 'PHPMailerAutoload.php';
        require 'credential.php'  ;

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'OYNDRILA');
$mail->addAddress($_POST['email']);     // Add a recipient
        // Name is optional
$mail->addReplyTo(EMAIL);

     // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
$mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
$mail->AltBody = $_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
        }
        ?>


    </div>


</body>

</html>
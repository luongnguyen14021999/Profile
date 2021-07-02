<?php
//Include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name= "";
$email = "";
$subject = "";
$message = "";
$nameMsg = "";
$emailMsg = "";
$subjectMsg = "";
$messageMsg = "";
$successMsg = "";
if(isset($_POST['submit'])) {
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        if (empty($_POST['name'])) {
            $nameMsg = "<span class='errorMsg' style='color: red'>**Your name is empty! Please fill in your empty space</span>";
        } else {
            $name = $_POST['name'];
        }
        if (empty($_POST['email'])) {
            $emailMsg = "<span class='errorMsg' style='color: red'>**Your email is empty! Please fill in your empty space</span>";
        } else {
            $email = $_POST['email'];
        }
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailMsg = "<span class='errorMsg' style='color: red'>**Invalid email format! Please fill again</span>";
        } else  {
            $email = $_POST['email'];
        }
        if (empty($_POST['subject'])) {
            $subjectMsg = "<span class='errorMsg' style='color: red'>**Your subject is empty! Please fill in your empty space</span>";
        } else {
            $subject = $_POST['subject'];
        }
        if (empty($_POST['message'])) {
            $messageMsg = "<span class='errorMsg' style='color: red'>**Your message is empty! Please fill in your empty space</span>";
        } else {
            $message = $_POST['message'];
        }
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        //create instance of phpmailer
        $mail = new PHPMailer();
        //set mailer to use smtp
        $mail->isSMTP();
        //define smtp host
        $mail->Host = "smtp.gmail.com";
        //enable smtp authentication
        $mail->SMTPAuth = "true";
        //set type of encryption (ssl/tls)
        $mail->SMTPSecure = "tls";
        //set port to connect smtp
        $mail->Port = "587";
        //set gmail username
        $mail->Username = "luongnguyendinh1999@gmail.com";
        //set gmail password
        $mail->Password = "Hinhvuong1234";
        //set email subject
        $mail->Subject = "Test Email Using PHPMailer";
        //Set sender email
        $mail->setFrom("ansar_tawakal@hotmail.com");
        //Enable HTML
        $mail->isHTML(true);
        //Add recipient
        $mail->addAddress("ansar_tawakal@hotmail.com");
        //email body
        $mail->Body = "<h1>Name: $name</h1><br><h2>Email: $email</h2><br><h3>Subject: $subject</h3><br><h4>Message: $message</h4>";

        if ($mail->send()) {
            $successMsg = "<h4><span class=successMsg' style='color: greenyellow; position: center' >Your message has been sent. Thank you!</span></h4>";
        } else {
            echo '<div class="error-message"></div>';
        }
        $mail->smtpClose();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contact</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: DevFolio - v2.4.1
* Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    * Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<!-- ======= Header/ Navbar ======= -->
<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll" href="#page-top">DevFolio</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll active" href="index.html">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ======= Contact Section ======= -->
<section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact-mf">
                    <div id="contact" class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="title-box-2">
                                    <h5 class="title-left">
                                       Send Message Us
                                    </h5>
                                </div>
                                <div>
                                    <form action="form_contact.php" method="post" role="form" class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo htmlspecialchars($name); ?>"/>
                                                    <?php echo $nameMsg; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo htmlspecialchars($email); ?>"/>
                                                    <?php echo $emailMsg; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?php echo htmlspecialchars($subject); ?>"/>
                                                    <?php echo $subjectMsg; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo htmlspecialchars($message)?></textarea>
                                                    <?php echo $messageMsg; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mb-3">
                                                <div class="loading">Loading</div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" name="submit" id="submit" class="button button-a button-big button-rouded">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php echo $successMsg; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title-box-2 pt-4 pt-md-0">
                                    <h5 class="title-left">
                                       Get in Touch
                                    </h5>
                                </div>
                                <div class="more-info">
                                    <p class="lead">
                                        I love Sydney
                                    </p>
                                    <ul class="list-ico">
                                        <li><span class="ion-ios-location"></span>88 Church Street Parramatta 2150</li>
                                        <li><span class="ion-ios-telephone"></span>(+61) 0403629275</li>
                                        <li><span class="ion-email"></span>luongnguyendinh1999@gmail.com</li>
                                    </ul>
                                </div>
                                <div class="socials">
                                    <ul>
                                        <li><a href="https://www.facebook.com/luong140299/"><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                                        <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                                        <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                                        <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->
</body>
</html>
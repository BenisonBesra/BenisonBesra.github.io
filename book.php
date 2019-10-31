<?php
  $result="";
  if(isset($_POST['submit'])){
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.google.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Username   = 'besraservice@gmail.com';                     // SMTP username
    $mail->Password   = '@123pass123@';                               // SMTP password
    
    //Recipients
    $mail->setFrom($_POST['email'],$_POST['name']);     //Customer address and name
    $mail->addAddress('besraservice@gmail.com', 'Benison Besra');     // Add a recipient
    $mail->addReplyTo($_POST['email'],$_POST['name']);
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Form Submission: '.$_POST['subject'];
    $mail->Body    = '<h1 align=center>Name : '.$_POST['name'].'<br>Email:'.$_POST['email'].'<br>Message: '.$_POST['msg'].'</h1>';
    
    if(!$mail->send()){
      $result="Something went wrong. Please try again.";
    }
    else{
      $result="Thanks ".$_POST['name']."for contacting us. We will get to you soon.";
    }
  }
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Benison Besra">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Form Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Contact Us</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"><?= $result; ?></h5>
        <form action="" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
            </div>
            <textarea name="msg" id="msg" class="form-control" placeholder="Write your message" cols="30" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
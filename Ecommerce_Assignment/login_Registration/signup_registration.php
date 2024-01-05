<?php
  
  include "database_con.php";
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';

  if (isset($_POST["register"])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST["password"];
    $c_password= $_POST["c_password"];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $mail = new PHPMailer(true);

    try {
      
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = 'smptp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'webdevkazipractice@gmail.com';
      $mail->Password = $smtpPassword;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;
      $mail->setFrom('webdevkazipractice@gmail.com');
      $mail->addAddress($email. $name);
      $mail->isHTML(true);

      function generateVerificationCode() {
        return sprintf("%04d", mt_rand(0, 9999));
      }
      $v_Code = generateVerificationCode();

      // $mail->Subject = 'Email verification';
      // $mail->Body = '<p>Your verification code is <b style="font-size: 30px;>' . $v_Code . '</b></p>';

      // $mail->send();

      if ($password !== $c_password) {
        echo "Passwords don't match. Please try again.";
      }

      else {

        $mail->Subject = 'Email verification';
        $mail->Body = '<p>Your verification code is <b style="font-size: 30px;>' . $v_Code . '</b></p>';
        $mail->send();

        $sql = "INSERT INTO email_verify (name, email, password_hash, v_code, v_status) VALUES ('$name', '$email', '$password_hash', '$v_Code', NULL)";
        $query = mysqli_query($database_con, $sql );

        if($query){
          echo "inserted successfully";
          }
    
          else{
          echo "failed to insert";
          }
      }
   
      header("Location: email-verification.php?email=" . $email);
    
    } catch(Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
 
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head> 
<body>
  <h1>Registration</h1>
  <div class="initiate">
    <form action="" method="POST">
      <div>
        <label>Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>
      </div>
      <div>
        <label>email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email id" required>
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter password" value="password" required>
      </div>
      <div>
        <label>Repeat password</label>
        <input type="password" name="c_password" id="c_password" placeholder="Confirm password" value="c_password" required>
      </div>
      
      <input type="submit" name="register" value="Register" >

    </form>

  </div>
  
</body>

</html>
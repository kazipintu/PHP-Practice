<?php
include "database_con.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST["register"])) {
    $name = mysqli_real_escape_string($database_con, $_POST['name']);
    $email = mysqli_real_escape_string($database_con, $_POST['email']);
    $password = mysqli_real_escape_string($database_con, $_POST["password"]);
    $c_password = mysqli_real_escape_string($database_con, $_POST["c_password"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists in the database
    $checkEmailQuery = mysqli_query($database_con, "SELECT * FROM email_verify WHERE email='$email'");
    if (mysqli_num_rows($checkEmailQuery) > 0) {
        echo "Email already exists. Please use a different email.";
        exit;
    }

    function generateVerificationCode() {
        return sprintf("%04d", mt_rand(0, 9999));
    }

    $v_code = generateVerificationCode();

    if ($password !== $c_password) {
        echo "Passwords do not match. Please try again";
    } else {
        // Save user data, verification code, and expiration time to the database
        $userTimeZone = isset($_POST['user_timezone']) ? $_POST['user_timezone'] : 'UTC'; // Default to UTC if not provided
        $now = new DateTime('now', new DateTimeZone($userTimeZone));
        $expirationTime = $now->modify('+5 minutes')->format('Y-m-d H:i:s');

        $sql = "INSERT INTO email_verify (name, email, password_hash, v_code, v_status, v_code_expiration) VALUES ('$name', '$email', '$password_hash', '$v_code', 0, '$expirationTime')";
        $query = mysqli_query($database_con, $sql);

        if ($query) {
            // Use PHPMailer with SMTP configuration
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'username@gmail.com';  // insert your username
                $mail->Password = 'AppPassword'; // insert google app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('smtpusername@gmail.com');
                $mail->addAddress($email, $name);
                $mail->isHTML(true);

                $mail->Subject = 'Email verification';
                $mail->Body = '<p>Your verification code is <b style="font-size: 30px;">' . $v_code . '</b></p>';

                $mail->send();

                echo "Inserted successfully and Verification code sent successfully. Redirecting...";
                header("Location: code_verify.php?email=" . $email . "&v_code=" . $v_code);
                exit;
            } catch (Exception $e) {
                echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to insert";
        }
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
    <h1 style="color: blue;">Registration</h1>
    <div>
        <form action="" method="POST">
            <div>
                <label style="color: purple;">Name</label>
                <input style="color: green;" type="text" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div>
                <label style="color: purple;">Email</label>
                <input style="color: green;" type="email" name="email" id="email" placeholder="Enter your email id" required>
            </div>
            <div>
                <label style="color: purple;">Password</label>
                <input style="color: green;" type="password" name="password" id="password" placeholder="Enter password" required>
            </div>
            <div>
                <label style="color: purple;">Repeat password</label>
                <input style="color: green;" type="password" name="c_password" id="c_password" placeholder="Confirm password" required>
            </div>
            <div>
                <label style="color: purple;">User Timezone</label>
                <select style="color: green;" name="user_timezone">
                    <?php
                    $timezones = timezone_identifiers_list();
                    foreach ($timezones as $timezone) {
                        echo "<option value=\"$timezone\">$timezone</option>";
                    }
                    ?>
                </select>
            </div>

            <input style="color: blue;" type="submit" name="register" value="Register">

        </form>
    </div>
</body>

</html>

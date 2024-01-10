<?php

include "database_con.php";

if (isset($_POST["verify"])) {
    $v_code = mysqli_real_escape_string($database_con, $_POST['v_code']);
    $email = mysqli_real_escape_string($database_con, $_GET['email']); // Assuming email is passed as a query parameter

    // Check if the verification code and email match in the database
    $checkCodeQuery = mysqli_query($database_con, "SELECT * FROM email_verify WHERE email='$email' AND v_code='$v_code' AND v_status=0 AND NOW() <= v_code_expiration");
    
    if (mysqli_num_rows($checkCodeQuery) > 0) {
        // Verification code is valid and within the time window
        $updateStatusQuery = mysqli_query($database_con, "UPDATE email_verify SET v_status=1 WHERE email='$email'");
        
        if ($updateStatusQuery) {
            echo "Email verified successfully!";
        } else {
            echo "Failed to update verification status";
        }
    } else {
        echo "Invalid or expired verification code. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <h1>Email verification</h1>
    <div>
        <form action="" method="POST">
            <div>
                <label>Code (Valid for 5 minutes) </label>
                <input type="text" name="v_code" id="v_code" placeholder="Enter code to verify email" autocomplete="off">
            </div>        
            <input type="submit" name="verify" value="Verify">
        </form>
    </div>
</body>

</html>

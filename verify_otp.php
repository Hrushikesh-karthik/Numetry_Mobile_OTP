<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_otp = $_POST['otp'];

    // Check if OTP is set and not expired
    if (isset($_SESSION['otp']) && time() < $_SESSION['otp_expiry']) {
        if ($_SESSION['otp'] == $user_otp) {
            echo "OTP verified successfully";
            unset($_SESSION['otp']); // Remove OTP after successful verification
            unset($_SESSION['otp_expiry']);
        } else {
            echo "Invalid OTP";
        }
    } else {
        echo "OTP expired or not set";
    }
} else {
    echo "Invalid request method";
}
?>

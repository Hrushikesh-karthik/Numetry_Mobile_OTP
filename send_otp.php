<?php
session_start();
require 'vendor/autoload.php'; // Include the Twilio SDK

use Twilio\Rest\Client;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST['phone'];

    // Generate a 6-digit OTP
    $otp = rand(100000, 999999);

    // Store OTP in session
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_expiry'] = time() + 300; // OTP expires in 5 minutes

    // Twilio credentials
   $sid = 'your_account_sid';
$token = 'your_auth_token';
$twilioNumber = 'your_twilio_phone_number';


    $client = new Client($sid, $token);

    try {
        $client->messages->create(
            $phoneNumber,
            [
                'from' => $twilioNumber,
                'body' => 'Your OTP code is: ' . $otp
            ]
        );
        echo "OTP sent successfully";
    } catch (Exception $e) {
        echo "Failed to send OTP. Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method";
}
?>

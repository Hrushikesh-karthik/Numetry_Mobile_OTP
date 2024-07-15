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
    $sid = 'AC10f7809f383085300d4e52c84a29df7c';
    $token = '8f0518ba289e5335ef3a2fb74d6692a8';
    $twilioNumber = '12088861522';

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Number OTP Authentication</title>
</head>
<body>
    <h2>Phone Number OTP Authentication</h2>

    <form action="send_otp.php" method="post">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        <button type="submit">Get OTP</button>
    </form>

    <form action="verify_otp.php" method="post" style="margin-top: 20px;">
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>

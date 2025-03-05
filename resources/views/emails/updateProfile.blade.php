<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .footer {
            background: #f1f1f1;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>OTP Verification</h1>
        </div>
        <div class="content">
            <p>Dear {{ $name }},</p>
            <p>We are excited to introduce our newly developed platform FYND CONCEPTS which can be found on Play store and IOS Store– a more advanced, user-friendly, and feature-rich experience designed to help you navigate effortlessly and manage your business more efficiently.</p>
            <h2>What’s New?</h2>
            <p>✅ A sleek and intuitive design for seamless navigation.</p>
            <p>✅ Enhanced features to improve your business visibility.</p>
            <p>✅ A fully integrated mobile app for easier access on the go.</p>
            <h2>Action Required: Update Your Profile</h2>
            <p>To ensure your business remains visible on our new platform and mobile app, we require you to update your profile.</p>
            <h3>Your Login Credentials:</h3>
            <p>📧 Email: {{ $email }}</p>
            <p>🔑 Password: {{ $password }}</p>
            <p style="padding:8px; background:ghostwhite; border-left:2px solid steelblue;">Important: For security reasons, we strongly recommend updating your password after logging in.</p>
            <p>Click below to use the web and update your profile:</p>
            <p><a href="{{env('APP_URL').'/authenticate'}}">{{env('APP_URL').'/authenticate'}}</a></p>
            <p>If you have any questions, feel free to reach out to our support team.</p>
            <p>Thank you for being a valued part of our community. We can’t wait for you to experience the new platform!</p>
            <p>Best regards,</p>
            <p>Fynd Concepts</p>
            <p><a href="mailto:info@fyndconcepts.com">info@fyndconcepts.com</a> | <a href="https://app.fyndconcepts.org/">https://app.fyndconcepts.org/</a>

        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Fynd Concepts. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

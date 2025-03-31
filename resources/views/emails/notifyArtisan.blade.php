<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Mail</title>
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
            <h1> Account Approved</h1>
        </div>
        <div class="content">
            <p>Dear Artisan,</p>
            <p>We are pleased to inform you that your account, registered with the email {{$email}}, has been successfully approved!</p>
            <p>Your profile is now live on our platform, making it visible to clients who are actively searching for the services you offer. This means potential customers can now find, contact, and engage with you directly through the application.</p>
            <p>
                To get started, we recommend:<br>
                ✅ Ensuring all your contact details and service offerings are accurate.<br>
                ✅ Responding promptly to inquiries to build trust and attract more clients.
            </p>
            <p>
                We are excited to have you on board and look forward to supporting your journey in connecting with clients effortlessly.
            </p>
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

<?php
session_start();

// Simulating user authentication
if (!isset($_SESSION['user_id'])) {
    // For testing, auto-login as user 1
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = 'admin';
}

// This page simulates a user dashboard with sensitive information
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - WCD Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Dashboard</h1>
        <div class="user-info">
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            
            <!-- This is sensitive information that should not be cached -->
            <div class="sensitive-data">
                <h3>Your Sensitive Information:</h3>
                <p>User ID: <?php echo $_SESSION['user_id']; ?></p>
                <p>Account Number: ACC-<?php echo rand(1000000, 9999999); ?></p>
                <p>API Key: <?php echo md5($_SESSION['user_id'] . time()); ?></p>
                <p>Last Login: <?php echo date('Y-m-d H:i:s'); ?></p>
            </div>
        </div>
        
        <div class="info-box">
            <h3>What is Web Cache Deception?</h3>
            <p>Web Cache Deception is a vulnerability that occurs when an attacker tricks a web cache into storing sensitive content that should not be cached.</p>
            <p>This demo shows how appending a static resource path to a dynamic URL might cause it to be cached.</p>
        </div>
        
        <p><strong>Test the vulnerability by accessing:</strong> /index.php/style.css</p>
    </div>
</body>
</html>

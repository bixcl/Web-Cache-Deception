<?php
session_start();

// Get the URI path
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if the URL ends with "style.css" (demonstration of web cache deception vulnerability)
$is_css_path = (substr($uri_path, -9) === 'style.css');

// Handle the vulnerability demo
if ($is_css_path) {
    // For the demo vulnerability, we'll pretend this is sensitive data being leaked
    // In a real scenario, this would be cached by a CDN
    
    // Set a flag to indicate exploitation
    $exploit_demo = true;
} 
// For normal access, check login
else if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// This page simulates a user dashboard with sensitive information

// When accessed via the style.css path (web cache deception), add cache headers
// This simulates how a CDN might treat this request in a real environment
if ($is_css_path) {
    // Simulate what a CDN might do - mark as cacheable because of the .css extension
    header("Cache-Control: public, max-age=3600");
    header("Content-Type: text/html");  // But actually serve HTML content
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - WCD Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>    <div class="container">
        <h1>User Dashboard</h1>
        <div style="text-align: right;">
            <a href="logout.php" style="background-color: #f44336; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px;">Logout</a>
        </div>        <div class="user-info">
            <h2>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h2>
            
            <!-- This is sensitive information that should not be cached -->
            <div class="sensitive-data">
                <h3>Your Sensitive Information:</h3>
                <p>User ID: <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'Unknown'; ?></p>
                <p>Account Number: ACC-<?php echo rand(1000000, 9999999); ?></p>
                <p>API Key: <?php echo md5((isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '0') . time()); ?></p>
                <p>Last Login: <?php echo date('Y-m-d H:i:s'); ?></p>
            </div>
        </div>        <div class="info-box">
            <h3>What is Web Cache Deception?</h3>
            <p>Web Cache Deception is a vulnerability that occurs when an attacker tricks a web cache into storing sensitive content that should not be cached.</p>
            <p>This demo shows how appending a static resource path to a dynamic URL might cause it to be cached.</p>            <p style="color: #f44336;"><strong>You are seeing this page because:</strong> 
            <?php 
            if(isset($_SESSION['user_id']) && !$is_css_path) {
                echo 'You are logged in normally.';
            } elseif($is_css_path) {
                echo 'You are exploiting the web cache deception vulnerability!';
            } else {
                echo 'You accessed this page through an unexpected method.';
            }
            ?>
            </p>
        </div>
          <div class="info-box" style="background-color: #ffebcd; border-left-color: #ff9800;">
            <h3>How to Test the Web Cache Deception Vulnerability</h3>
            <p>1. Copy this URL while logged in: <strong><?php echo (!empty($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/') . '/index.php/style.css'; ?></strong></p>
            <p>2. Log out by clicking the Logout button</p>
            <p>3. Paste and access the URL from step 1 - if vulnerable, you should see the sensitive data without being logged in</p>
            <p><strong>Note:</strong> In a real-world scenario with a CDN, this page would be cached and accessible to anyone.</p>
        </div>
    </div>
</body>
</html>

<?php
// filepath: c:\Users\qgamr\Desktop\Drive\Projects\WCD\WCD.PHP
// Web Cache Deception Test Suite
// This is the main entry point for the WCD test environment
?>

<!DOCTYPE html>
<html>
<head>
    <title>Web Cache Deception Test Suite</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .test-button {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border-radius: 5px;
            text-decoration: none;
        }
        
        .test-button:hover {
            background: #45a049;
        }
        
        .warning {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Web Cache Deception (WCD) Test Suite</h1>
        
        <div class="info-box">
            <h2>What is Web Cache Deception?</h2>
            <p>Web Cache Deception is a vulnerability where an attacker manipulates a URL to make a web cache store sensitive content that should never be cached.</p>
            <p>In this attack, a specially crafted URL (e.g., <code>/profile.php/style.css</code>) might cause the server to:</p>
            <ol>
                <li>Execute the PHP file (showing sensitive data)</li>
                <li>The CDN/cache sees the <code>.css</code> extension and caches it</li>
                <li>Later visitors to this URL see the cached sensitive content</li>
            </ol>
        </div>
        
        <h2>Test Pages</h2>
        <ul>
            <li><a class="test-button" href="index.php">Normal Page Access</a> - User dashboard with sensitive data</li>
            <li><a class="test-button" href="index.php/style.css">Vulnerable URL</a> - Same page, but with URL that might be cached</li>
            <li><a class="test-button" href="how-it-works.php">How It Works</a> - Technical explanation</li>
        </ul>
        
        <h2>Testing Instructions</h2>
        <p>1. Start a PHP development server:</p>
        <pre>cd /path/to/this/folder
php -S localhost:8000</pre>

        <p>2. Visit the pages listed above to see how the vulnerability works</p>
        
        <div class="sensitive-data">
            <h3 class="warning">⚠️ Educational Use Only</h3>
            <p>This demonstration is for educational purposes only. Testing for web cache deception vulnerabilities on production systems without permission is unauthorized and potentially illegal.</p>
        </div>
    </div>
</body>
</html>
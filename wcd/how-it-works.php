<?php
// This file demonstrates how the cache stores the content

// Set headers to display plaintext
header('Content-Type: text/plain');

echo "WEB CACHE DECEPTION - HOW IT WORKS\n";
echo "==================================\n\n";

echo "1. NORMAL REQUEST FLOW\n";
echo "   Client requests: /index.php\n";
echo "   Server: Executes PHP, no caching\n";
echo "   Result: Dynamic content, different for each user\n\n";

echo "2. VULNERABLE SCENARIO\n";
echo "   Step 1: Client requests /index.php/style.css\n";
echo "   Step 2: Server still executes index.php (returns sensitive data)\n";
echo "   Step 3: CDN sees .css extension and caches the response\n";
echo "   Step 4: Attacker visits same URL and gets cached sensitive data\n\n";

echo "3. TESTING INSTRUCTIONS\n";
echo "   - First, visit: http://localhost:8000/index.php (normal page)\n";
echo "   - Then visit:   http://localhost:8000/index.php/style.css (demonstrates the vulnerability)\n";
echo "   - In a real scenario with a CDN, the second URL would be cached and show the same content to all users\n\n";

echo "4. CURRENT SERVER INFO\n";
echo "   Current time: " . date('Y-m-d H:i:s') . "\n";
echo "   Server software: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "   PHP version: " . phpversion() . "\n\n";

echo "5. REQUEST DETAILS\n";
echo "   Requested URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "   Request method: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "   User agent: " . $_SERVER['HTTP_USER_AGENT'] . "\n\n";

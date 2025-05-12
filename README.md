# Web Cache Deception Test Environment

This program is fully built by AI in order to test the Web cache deciption vulnerability<br>
in order to run the web app, forget what is written by ai down, and run xampp, but the webapp inside htdocs folder and navigete to wcd/index.php page.<br>



This is a simple environment to demonstrate the Web Cache Deception vulnerability.

## What is Web Cache Deception?

Web Cache Deception (WCD) is a vulnerability where an attacker tricks a web cache into storing sensitive content that should not be cached. The attack involves manipulating URLs to make the cache believe it's dealing with a static resource when it's actually caching a dynamic page with sensitive information.

## How to Test

1. Set up a local PHP server:
   ```
   php -S localhost:8000
   ```

2. Access the normal page:
   http://localhost:8000/index.php
   
   This should display a user dashboard with "sensitive information".

3. Test the vulnerability:
   http://localhost:8000/index.php/style.css
   
   In a vulnerable configuration, the server would:
   - Execute index.php (showing the sensitive content)
   - The CDN/cache would see the URL ending with .css and cache it
   - Subsequent visitors to this strange URL would see the cached sensitive content

## Security Implications

In a real-world scenario, if a website is vulnerable:

1. An attacker could trick a user into visiting a specially crafted URL
2. The CDN would cache the sensitive page thinking it's a static resource
3. The attacker could then visit the same URL and see the victim's sensitive information

## Prevention

To prevent Web Cache Deception:

- Implement proper URL validation
- Configure your web server to respond with 404 for paths like file.php/nonexistent.css
- Configure CDN to only cache based on file extension AND proper Content-Type headers
- Use appropriate cache-control headers

## Note

This is for educational purposes only. Do not test this vulnerability on production systems without permission.

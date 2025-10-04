Backend folder (PHP)
=====================

This folder is a lightweight PHP backend scaffold for serving simple API endpoints and connecting to a database.

Files:
- api/db.php — PDO connection helper (configure your DB credentials)
- api/hello.php — sample API endpoint that returns JSON

How to run (development):

1. From this repository root run PHP's built-in server:

   php -S localhost:8000 -t backend

2. Open http://localhost:8000/api/hello.php

Notes:
- Configure `api/db.php` with your database credentials before using production queries.
- For production you should host under Apache/Nginx with PHP-FPM and secure credentials outside of webroot.

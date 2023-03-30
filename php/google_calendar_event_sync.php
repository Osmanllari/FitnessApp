<?php

define('DB_HOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','fitness_db');

define('GOOGLE_CLIENT_ID', '1046904792522-0oejvp1l9p7ctepnkumqrev6npcmsrdl.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_OAUTH_SCOPE', 'http://www.googleapis.com/auth/calendar');
define('REDIRECT_URI', 'http://localhost/WebProgCwk/WebProgramming/php');

$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope='.urlencode(GOOGLE_OAUTH_SCOPE).'&redirect_uri='.REDIRECT_URI.'&response_type=code$client_id='.GOOGLE_CLIENT_ID.'&access_type=online';
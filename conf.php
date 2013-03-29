<?php

$key          = 'sLyW2th_deMcr8Sl94f1';
$secret       = 'TRcp5-vQAfWsUxbljH1dXFVxG';

$env_url      = getenv('SITE_URL');
$site_url     = (isset($env_url)) ? $env_url : 'http://api-demo.local/';
$callback_url = 'index.php?page=callback'; // Your relative callback URL


?>
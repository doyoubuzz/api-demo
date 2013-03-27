<?php

$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
$OAUTH->set_callback($callback_url);
    
$OAUTH->get_request_token()
    ->get_user_authorization();
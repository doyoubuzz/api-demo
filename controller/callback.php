<?php

    $OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
    
    // Request the access token ...        
    $token = $OAUTH->get_access_token($_GET['oauth_token'], $_GET['oauth_verifier'], $_SESSION['token_secret']);
    
    // ... and store the access token and token secret in session to access the user's datas (in production you should save these tokens in the database)
    $_SESSION['access_token'] = $token['access_token'];
    $_SESSION['token_access_secret'] = $token['token_secret'];

    // Redirect on the homepage
    header('Location: /');    

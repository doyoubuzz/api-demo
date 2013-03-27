<?php

// If the user has authorized the app (= if he is logged)

if(isset($_SESSION['access_token'])) { 

    // Configure oAuth
    $OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
    $OAUTH->set_callback($callback_url);

    // Get the user resource
    $a = $OAUTH->request('http://api.doyoubuzz.com/user', array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);    
    $response = json_decode($a, true);

    // Set the variable for the template
    $data = array(
        'title'    => 'Well done '.$response['user']['firstname'].'!',
        'subtitle' => 'You just authorized the demo site to access your DoYouBuzz datas. Check the top menu to see what datas the demo site now has access.',
        'cta' => array('href' => '?page=logout', 'title' => 'Logout')
    );


} else {

    $data = array(
        'title'    => 'Welcome visitor',
        'subtitle' => 'This is a demo site site to show how easy it is to use the DoYouBuzz API. Just click on the authorize link below to start the process.',
        'cta' => array('href' => '?page=auth', 'title' => 'Authorize')
    );

}
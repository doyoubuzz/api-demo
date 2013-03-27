<?php

$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
$a = $OAUTH->request('http://api.doyoubuzz.com/user', array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);    
$response = json_decode($a, true);

$avatar    = (isset($response['user']['avatars']['normal'])) ? $response['user']['avatars']['normal'] : null;
$nbResumes = sizeof($response['user']['resumes']['resume']);

$memberSince = new DateTime($response['user']['registeredAt']);

foreach($response['user']['resumes']['resume'] as $resume) {
    if($resume['main'] == 1) { 
        $mainResume = $resume;
        break;
    }
}

?>

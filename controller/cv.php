<?php
$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
$user = $OAUTH->request('http://api.doyoubuzz.com/user', array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);    

$response = json_decode($user, true);

foreach($response['user']['resumes']['resume'] as $resume) {
    if($resume['main'] == 1) { 
        $mainResumeId = $resume['id'];
        break;
    }
}

$cv = $OAUTH->request('http://api.doyoubuzz.com/cv/'.$mainResumeId, array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);

$response = json_decode($cv, true);
$mainResume = $response['resume'];

$nbExperiences = sizeof($mainResume['experiences']['experience'])+1;
$nbEducations  = sizeof($mainResume['educations']['education'])+1;

$updatedAt = new DateTime($mainResume['updatedAt']);
?>

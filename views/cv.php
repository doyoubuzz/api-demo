

<div style="height:100px;">

<p class="lead">
Your main resume is <a href="http://www.doyoubuzz.com/<?php echo $response['user']['slug'];?>" target="_blank"><?php echo $mainResume['title'];?></a> and describe <?php echo $nbExperiences;?> experiences. It has been last updated the <?php echo $updatedAt->format('jS \of M, Y');?>. Oh, you can also <a href="<?php echo $mainResume['printable']['pdf'] ;?>">download the PDF version</a>, sweet!

</p>
</div>

<h4>Your experiences</h4>
<table class="table table-striped">
        <tr>
            <th>Job title</th>
            <th colspan="2">Company</th>
        </tr>
<?php

foreach ($mainResume['experiences']['experience'] as $experience) {
    echo '<tr>';
    echo '<td style="width:200px;">'.$experience['title'].'</td>';    
    echo '<td>';
    if(!empty($experience['logo'])) echo '<img src="http://www.doyoubuzz.com'.$experience['logo'].'"></td>';  
    echo '<td>'.$experience['company'].'</td>';
    echo '</tr>';
}
?>
</table>


<h4>How did we get these informations ?</h4>

<pre><code data-language="php">
// Configure oAuth
$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);

// Get the user information
$user = $OAUTH->request('http://api.doyoubuzz.com/user', array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);    

$response = json_decode($user, true);

// Get the main resume
foreach($response['user']['resumes']['resume'] as $resume) {
    if($resume['main'] == 1) { 
        $mainResumeId = $resume['id'];
        break;
    }
}

// Request the main resume information
$cv = $OAUTH->request('http://api.doyoubuzz.com/cv/'.$mainResumeId, array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);
$mainResume = json_decode($cv);
</code>
</pre>


<h4>And here is the the data returned by the API</h4>
<pre><code data-language="php">
<?php print_r($response); ?>
</code>
</pre>



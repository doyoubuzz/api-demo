

<div style="height:100px;">

<p class="lead">
<?php if(!empty($avatar)) { ?>
    <img src="<?php echo $avatar;?>" class="img-polaroid" style="float:left;margin-right: 10px;">
<?php } ?>
Hi <?php echo $response['user']['firstname'];?>, your main resume is <a href="http://www.doyoubuzz.com/<?php echo $response['user']['slug'];?>" target="_blank"><?php echo $mainResume['title'];?></a> and you are a member of DoYouBuzz since the <?php echo $memberSince->format('jS \of M, Y');?></a>.

</p>
</div>

<h4>Here is a list of your resumes</h4>
<table class="table table-striped" style="width:450px;">
        <tr>
            <th>Title</th>
            <th>Completeness</th>
        </tr>
<?php
foreach ($response['user']['resumes']['resume'] as $resume) {
    echo '<tr>';
    echo '<td style="width:200px;">'.$resume['title'].'</td>';
    echo '<td><div class="progress progress-striped" style="margin-bottom:0;">
                <div class="bar" style="width: '.($resume['completion']*100).'%;">'.($resume['completion']*100).'%</div>
              </div>
          </td>';
    echo '</tr>';
}
?>
</table>


<h4>How did we get these informations ?</h4>

<pre><code data-language="php">
// Configure oAuth
$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);

// Send the request with the user tokens (also, we want the data to be returned as JSON)
$a = $OAUTH->request('http://api.doyoubuzz.com/user', array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);    

$response = json_decode($a, true);
</code>
</pre>


<h4>And here is the the data returned by the API</h4>
<pre><code data-language="php">
<?php print_r($response); ?>
</code>
</pre>


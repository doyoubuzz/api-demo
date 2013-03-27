

<?php
if (!isset($_SESSION['access_token'])) { 
?>
<h2><?php echo $data['title'];?></h2>

<p class="lead"><?php echo $data['subtitle'];?></p>
<a class="btn" href="<?php echo $data['cta']['href'];?>"><?php echo $data['cta']['title'];?></a>

<?php
} else { 
?>

<h2><?php echo $data['title'];?></h2>

<p class="lead"><?php echo $data['subtitle'];?></p>


<h3>What just happened ?</h3>

<div class="accordion" id="accordion2">
  <div class="accordion-group">


    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        1st: We got your authorization
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
            <p>When you clicked the "Authorize" button, we redirected you to the auth.php page that does:</p>

<pre><code data-language="php">
// Configure OAuth
$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
$OAUTH->set_callback($callback_url);
    
// Get the request token and redirect the user to the authorization page
$OAUTH->get_request_token()
      ->get_user_authorization();
  </code>
</pre>

            <p>This code does a token exchange and redirect the user to the DoYouBuzz authentication page. When the user accepts the authorization, he is redirected to the URL defined in $callback_url<p>        
      </div>
    </div>
</div>


    <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
            2nd: We saved your tokens
          </a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
          <div class="accordion-inner">
                <p>On the callback page, we saved your user access token and token secret. These tokens will allow us to access your datas in the future (see step 3).</p>
<pre><code data-language="php">
$OAUTH->set_site("http://www.doyoubuzz.com/fr/", $key, $secret);
    
// Request the access token ...        
$token = $OAUTH->get_access_token($_GET['oauth_token'], $_GET['oauth_verifier'], $_SESSION['token_secret']);

// ... and store the access token and token secret in session to access the user's datas (in production you should save these tokens in the database)
$_SESSION['access_token'] = $token['access_token'];
</code>
</pre>
          </div>
        </div>  
    </div>  

    <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree">
            3rd: We accessed some ressources on the API
          </a>
        </div>
        <div id="collapseThree" class="accordion-body collapse">
          <div class="accordion-inner">
                <p>Then, we sent a request to get the user ressource and display a personalized message</p>
<pre><code data-language="php">
$a = $OAUTH->request('http://api.doyoubuzz.com/user', array('format' => 'json'), $_SESSION['access_token'], $_SESSION['token_access_secret']);    
$response = json_decode($a, true);

echo 'Well done '.$response['user']['firstname'].'!';
</code>
</pre>
          </div>
        </div>  
    </div>    





  </div>


<?php
}
?>







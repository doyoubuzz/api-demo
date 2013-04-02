<?php 

    // Bootstrap

    session_start();
    date_default_timezone_set('Europe/Paris');
    require 'conf.php';                                                                  // Load the configuration options
    require 'lib/oauth.php';                                                             // Load the oAuth library
    $OAUTH = new DoYouBuzz\Oauth($site_url);                                             // Configure the oAuth library 
    $page = (isset($_GET['page'])) ? $_GET['page'] : 'home';                             // Just some stuff for routing
    if (file_exists('controller/'.$page.'.php')) require 'controller/'.$page.'.php';     // Load a specific script for the requested page
        
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>DoYouBuzz Integration example</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
</head>
<body>

    <div class="container" style="padding:20px;">
        <div class="row">
            <div class="span9">
                <?php require 'views/menu.php';?>
            </div>
        </div>
        <div class="row">
            <div class="span9">
                <?php require 'views/'.$page.'.php';?>
            </div>
        </div>
    </div>


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="rainbow/obsidian.css"></link>
<script language="javascript" src="rainbow/rainbow-custom.min.js"></script>


<footer style="text-align: center;
padding: 30px 0;
margin-top: 70px;
border-top: 1px solid #e5e5e5;
background-color: #f5f5f5;
position:fixed;
bottom:0;
width:100%;
">
<div class="container" style="margin: auto;">
<p>This is a demo website to show how to use the DoYouBuzz API</p>
<p>You can <a href="https://github.com/doyoubuzz/api-demo">see the source code on <img src="http://www.google.com/s2/u/0/favicons?domain=github.com" alt="github"></a></p>
</footer>

</body>
</html>

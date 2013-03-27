

    
 
    
    <?php 
    if(isset($_SESSION['access_token'])) { 
    ?>

    <ul class="nav nav-pills">
    
        <li<?php if ($page == 'home') echo ' class="active"'; ?>><a href="/index.php?page=home">Home</a></li>
        <li<?php if ($page == 'user') echo ' class="active"'; ?>><a href="/index.php?page=user">User</a></li>
        <li<?php if ($page == 'cv') echo ' class="active"'; ?>><a href="/index.php?page=cv">CV</a></li>
        <li class="pull-right"><a href="?page=logout">Logout</a></li>
    
    </ul>

    <?php
    }
    ?>
    

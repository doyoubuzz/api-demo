# API Demo Website

This is the source code of the DoYouBuzz API Demo Website available on [http://api-demo.doyoubuzz.com](http://api-demo.doyoubuzz.com)

# Install on your own server 

    git clone https://github.com/doyoubuzz/api-demo.git

Update the $site_url in the conf.php file to match your local URL (example: http://localhost/doyoubuzz-demo/).

# Architecture

The interesting files and directories are: 

    /
    |- index.php     
    |- conf.php
    |- /controller
    |- /views
    |- /libs

## index.php

Bootstraping the app with libraries and configuration files.

## conf.php

Contains the configuration information for the API (including API Keys)

## /controller

Contains the logic, mainly to request the API

## /views

Contains the views


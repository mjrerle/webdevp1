<?php
  $sessname="p1_project_with_mjrerle_and_camja";
  session_name($sessname);
  session_start();
  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  if(!isset($_SESSION['startTime']))  $_SESSION['startTime']=time();
  if(!isset($_SESSION['userName']))  $_SESSION['userName']="Guest";
?> 

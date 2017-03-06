<?php
  session_name("something");
  session_start();
  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  if(!isset($_SESSION['startTime']))  $_SESSION['startTime']=time();
  if(!isset($_SESSION['userName']))  $_SESSION['userName']="Guest";
?> 

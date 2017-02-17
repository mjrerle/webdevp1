<?php
   ob_start();
   session_start();
?>
<?php include 'templates/header.php';?>
<div class="jumbotron">
           <div class="container">
               <h1>Hello, world!</h1>
               <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a star    ting point to create something more unique.</p>
               <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
           </div>
       </div>

<div class="container">
<div class = "container form-signin">
<?php
  $msg='';                    
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $hash1 = "c963e367f63428189a6fa9cbd9e71a83";
    //mjrerle
    //
    $hash2 = "48f2f942692b08ec9de1ef9ada5230a3";
    //Segovia
    $hash3 = "f82e20303393b2022146969d860ea0bf";
    //camja
    $store = md5($_POST['password']);
    $auth= 'Correct Password!'."<br>".date('l jS \of F Y h:i:s A')."<br>Welcome user ".$user;
    $user=$_POST['username'];
      if ($user == 'mjrerle' && ($store==$hash1)){
      $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['username'] = 'mjrerle';
      $msg=$auth; 
      }
      elseif($user == 'ct310' && $store==$hash2){
      $_SESSION['valid']=true;
      $_SESSION['timeout']=time();
      $_SESSION['username']='ct310';       
      $msg=$auth;
      }
      elseif($user == 'camja' && $store==$hash3){
      $_SESSION['valid']=true;
      $_SESSION['timeout']=time();
      $_SESSION['username']='camja';                
      $msg=$auth;
      }
      else {$msg = "Wrong username or Password";}
  }
  elseif (isset($_POST['username']) && !isset($_POST['password'])){
    $msg= "Please set password";
  }
  elseif (!isset($_POST['username']) && isset($_POST['password'])){
    $msg= "Please set username";
  }
  elseif (!empty($_SESSION['username'])){
    $msg= "You are logged in as ".$_SESSION['username'];
  }
  else{$msg="Welcome";}
?>

</div>

  <div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4">

      <div class="wrapper">
        <form action="login.php" method="post" name="Login_Form" class="form-signin">
          <h2 class= "form-signin-heading">Login</h2>
          <p><?php echo $msg;?></p>
	     	  <hr class="colorgraph"><br>
		      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
		      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  	 
 			    <button class="btn btn-lg btn-primary btn-block"  name="submit" value="login" type="Submit">Login</button><br><br>  			
        </form>
        <a href="logout.php">Click here to logout.</a>      
      </div>
    <div class="col-md-4"></div>
  </div>
</div>
<?php include 'templates/footer.php';?>

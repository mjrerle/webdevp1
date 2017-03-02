<?php
  include 'templates/header.php';
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Ingredients Emporium</h1>
            <p>Fresh, Local, Your Way.</p>
            <p><a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
    <div class = "container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Contact Us</h1>
        <p class="lead">Contact our experienced Customer Service team to provide a comment or ask a question about your local store</p>
        <p><strong>Call 1-800-555-1234 or email ify@ingredientsforyou.com</strong><br>
        Address: 123 Main Street, Fort Collins, CO 80521<br>
        Fax Number: 970-232-0005
        </p>
        <p class="lead">Have a question or want further information?</p>
        
        <p>Fill in the short form and we will get back to you as soon as possible.</p> <br> 
      </div>   
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <!-- BEGIN DOWNLOAD PANEL -->
        <div class="panel panel-default well">
<?php 
  include 'includes/contact_form_submission.php';
?> 
        </div><!-- end panel-body -->
        </div><!-- end panel -->
        <!-- END DOWNLOAD PANEL -->
      </div>
      </div><!-- end col-md-8 -->
      <div class="col-md-2"> </div>
        </div>

    </div>

<?php include 'templates/footer.php';?>

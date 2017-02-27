<?php include 'templates/header.php'; ?>

<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="img/background-1932466_1920.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Fresh Food Your Way.</h1>
                    <p></p>
                    <p><a class="btn btn-lg btn-primary" href="products.php" role="button">Shop Now</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="img/watermelon-815072_1920.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Food delivery has never been this simple</h1>
                    <p>Local. Organic. Fresh.</p>
                    <p><a class="btn btn-lg btn-primary" href="about.php" role="button">Learn more about us</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="img/apple-661726_1920.jpg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Our mission is simple</h1>
                    <p>We want satisfied customers the old fashioned way: by quality food and quality service.</p>
                    <p><a class="btn btn-lg btn-primary" href="contact.php" role="button">Tell us how we're doing</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

<div class="marketing container">
    <div class="jumpbar">

    </div>
    <div class="row" id="marketingOverview">
        <div class="col-sm-4 featurette">
            <img src="#" alt="image">
        </div>
        <div class="col-sm-4 featurette">
            <img src="#" alt="image">
        </div>
        <div class="col-sm-4 featurette">
            <img src="#" alt="image">
        </div>
    </div>
    <div class="row" id="marketingQuality">

    </div>
    <div class="row" id="marketingShipping">

    </div>
    <div class="row" id="marketingSomething">

    </div>
</div>

<?php include 'templates/footer.php'; ?>

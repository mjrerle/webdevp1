<?php include 'templates/header.php'; ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-lg-3" id="filtersCol">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-md-9" id="productsCol">
            <div class="row">
                <?php
                $ingredientstore = simplexml_load_file("ingredients.xml") or die("Error: Cannot create object.");
                foreach ($ingredientstore as $ingredient) {
                    echo '<div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="http://placehold.it/320x150" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$' . $ingredient->price . '</h4>
                                    <h4><a href="#">'. $ingredient->name .'</a>
                                    </h4>
                                    <p>' . $ingredient->description . '</a></p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">15 reviews</p>
                                    <p>';
                    for ($i=0; $i < $ingredient->rating; $i++) {
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    }
                    echo '          </p>
                                </div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>

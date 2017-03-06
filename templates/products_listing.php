<?php
require 'templates/header.php';
require_once 'includes/ingredients.php';
require_once 'includes/reviews.php';
$ingredientStore = new IngredientStore('data/ingredients.xml');
$reviewStore = new ReviewStore('data/comments.xml');
$ingredientArray = $ingredientStore->getIngredientList();
?>
<div class="jumbotron">
    <div class="container">
        <h1>Ingredients Emporium</h1>
        <p>Fresh, Local, Your Way.</p>
        <p><a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more &raquo;</a></p>
    </div>
</div>

<div class="container-fluid" id="content">
    <div class="row">
        <div class="col-lg-2" id="filtersCol">
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
        <div class="col-md-8" id="productsCol">
            <div class="row">
                <?php
                foreach ($ingredientArray as $ingredient) {
                    // check if search term was included in GET request
                    if(isset($_GET['search'])) {
                        // Filter and sanitize input
                        $search_term = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);
                        $search_term = strtolower($search_term);
                        if(strcmp(strtolower($ingredient->name),$search_term) != 0) {
                            continue; // if strings do not match, continue to next ingredient.
                        }
                    }
                    $productID = $ingredient['id'];
                    $price = $ingredient->price;
                    $detailsURL = htmlspecialchars($_SERVER['PHP_SELF']) . '?action=view&id=' . $productID;
                    $imageURL = $ingredient->imgURL;
                    $name = $ingredient->name;
                    $description = $ingredient->description;
                    $reviewCount = count($reviewStore->getProductReviews($productID));
                    $rating = $reviewStore->getProductAvgRating($productID);
                    $stars = $reviewStore->getRatingStars($rating);
                    echo '<div class="col-md-3 col-lg-3 col-md-3 product-listing">
                            <div class="thumbnail">
                                <a href="'. $detailsURL .'">
                                    <img src="' . $imageURL . '" alt="" style="width:320px;">
                                </a>
                                <div class="caption">
                                    <h4 class="pull-right">$' . $price . '</h4>
                                    <h4><a href="' . $detailsURL . '">'. $name .'</a>
                                    </h4>
                                    <p>' . $description . '</a></p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">'.$reviewCount.' reviews</p>
                                    <p>'.$stars.'</p>
                                </div>
                            </div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php require 'templates/footer.php'; ?>

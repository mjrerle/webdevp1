<?php
require 'templates/header.php';
require_once 'includes/ingredients.php';
require_once 'includes/reviews.php';
$ingredientStore = new IngredientStore('data/ingredients.xml');
$reviewStore = new ReviewStore('data/comments.xml');
$ingredientArray = $ingredientStore->getIngredientList();
?>

<?php include 'templates/jumbotron.php'; ?>

<div class="container-fluid product-list" id="content" style="">
    <div class="row">
        <div class="col-md-12" id="productsCol" >
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
                    echo '<div class="col-sm-3 col-md-3 col-xs-3 product-listing">
                            <div class="thumbnail">
                                <a href="'. $detailsURL .'">
                                    <img src="' . $imageURL . '" alt="thumbnail">
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

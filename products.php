<?php
include 'templates/header.php';
include 'includes/comments.php';

$ingredientstore = simplexml_load_file("ingredients.xml") or die("Error: Cannot create object.");

if (isset($_GET['id'])) {
    # show product specifics
    $id = $_GET['id'];
    $ingredient = $ingredientstore->xpath("//ingredient[@id='$id']");
    $ingredient = $ingredient[0];
    include 'templates/product_page.php';
} else {
    # show product listing
    include 'templates/products_listing.php';
}

include 'templates/footer.php';
?>

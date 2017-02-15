<?php
include 'templates/header.php';

$ingredientstore = simplexml_load_file("ingredients.xml") or die("Error: Cannot create object.");

if (isset($_GET['id'])) {
    # show product specifics
    include 'templates/product_page.php';
} else {
    # show product listing
    include 'templates/products_listing.php';
}

include 'templates/footer.php';
?>

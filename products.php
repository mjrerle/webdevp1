<?php
include 'templates/header.php';
<<<<<<< HEAD
$ingredientstore = simplexml_load_file("ingredients.xml") or die("Error: Cannot create object.");
=======
include 'includes/comments.php';

$ingredientstore = simplexml_load_file("ingredients.xml") or die("Error: Cannot create object.");

>>>>>>> f2307949895493cd6e123333399d7e94adcd0e42
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
<<<<<<< HEAD
=======

>>>>>>> f2307949895493cd6e123333399d7e94adcd0e42
include 'templates/footer.php';
?>

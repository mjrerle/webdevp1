<?php
// require_once 'ingredients.php';
require_once 'includes/reviews.php';

$ingredientstore = simplexml_load_file('data/ingredients.xml') or die("Error: Cannot create object.");

$reviewStore = new ReviewStore('data/comments.xml');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if($action == 'view') {
        actionView();
    }
    elseif ($action == 'review') {
        actionReview();
    }
    elseif ($action == 'list') {
        actionList();
    }
}
else {
    actionList();
}

function actionView()
{
    global $ingredientstore, $reviewStore;
    if ( !isset($_GET['id']) ) {
        die("Error: No ID specified.");
    }
    else {
        $productID = $_GET['id'];
        include 'templates/product_page.php';
    }
}

function actionList()
{
    global $ingredientstore, $reviewStore;
    include 'templates/products_listing.php';
}

function actionReview()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ( !isset($_GET['id']) ) {
            die("Error: No ID specified.");
        }
    }
    else {
        die('ERROR: No post data submitted');
    }
}
?>

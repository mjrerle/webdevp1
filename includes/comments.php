<?php
$reviewStore = '';
loadReviewStore($reviewStore);
function getRating(&$reviewStore, $productID='')
{
    $reviewArray = $reviewStore->xpath("//review[@productID='$productID']");
    if(count($reviewArray) == 0) { // prevent divide by zero error
        return 0;
    }
    $avgRating = 0;
    foreach ($reviewArray as $review) {
        $avgRating += $review->rating;
    }
    $avgRating /= count($reviewArray);
    $avgRating = round($avgRating);
    return $avgRating;
}
function getRatingStars(&$reviewStore, $numStars)
{
    $stars = "";
    for ($i=0; $i < 5; $i++) {
        if($i < $numStars) {
            $stars .= "<span class=\"glyphicon glyphicon-star\"></span>\n";
        } else {
            $stars .= "<span class=\"glyphicon glyphicon-star-empty\"></span>\n";
        }
    }
    return $stars;
}
function getReviewCount(&$reviewStore, $productID='')
{
    $reviewArray = $reviewStore->xpath("//review[@productID='$productID']");
    return count($reviewArray);
}
function loadReviews(&$reviewStore, $productID='')
{
    $reviewArray = $reviewStore->xpath("//review[@productID='$productID']");
    foreach ($reviewArray as $review) {
        echo   '<div class="review panel panel-default">
                    <h4>'.$review->title.'</h4>
                    <h5> Posted by <i>'.$review->author.'</i> on '.$review->date.'</h5>
                    <p>'.getRatingStars($reviewStore, $review->rating).'</p>
                    <p>'.$review->comment.'</p>
                </div>';
    }
}
function loadReviewStore(&$reviewStore)
{
    $reviewStore = simplexml_load_file("comments.xml") or die("Error: Cannot create object.");
}
?>

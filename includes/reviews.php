<?php
/**
 *
 */
class ReviewStore
{
    private $__file;
    private $__reviewStore;
    function __construct($file='')
    {
        $this->__file = $file;
        $this->__reviewStore = simplexml_load_file($file) or die("Error: Cannot create object.");
    }
    public function getProductAvgRating($productID='')
    {
        $reviewArray = $this->__reviewStore->xpath("//review[@productID='$productID']");
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
    function getRatingStars($numStars)
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
    public function getProductReviews($productID='')
    {
        $reviewArray = $this->__reviewStore->xpath("//review[@productID='$productID']");
        return $reviewArray;
    }
    public function addReview($reviewArray='')
    {
        try {
            $review = $this->__reviewStore->addChild('review');
            $review->addAttribute('id', 0);
            $review->addAttribute('productID', $reviewArray['productID']);
            $review->addChild('author', $reviewArray['author']);
            $review->addChild('title', $reviewArray['title']);
            $review->addChild('date', $reviewArray['date']);
            $review->addChild('rating', $reviewArray['rating']);
            $review->addChild('comment', $reviewArray['comment']);
            $this->__reviewStore->asXML($this->__file);
        } catch (Exception $e) {
            die("Error occurred");
        }
    }
    
    private function reloadReviewStore()
    {
        $this->__reviewStore = simplexml_load_file($this->__file) or die("Error: Cannot create object.");
    }
}
?>

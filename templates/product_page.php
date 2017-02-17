<?php
require 'templates/header.php';

$reviewArray = $reviewStore->getProductReviews($productID);
$reviewCount = count($reviewArray);
?>
<div class="container-fluid" id="detailsContent">
    <div class="row">
        <div class="col-sm-3" id="productImgCol">
            <img src="<?php echo $ingredient->imgURL; ?>" alt="product image" style="width:320px;">
        </div>
        <div class="col-sm-3" id="productDetailsCol">
            <h3><?php echo $ingredient->name; ?></h3>
            <p><?php echo $ingredient->description; ?></p>
            <?php echo $reviewStore->getRatingStars($reviewStore->getProductAvgRating($ingredient['id'])); ?>
            <span class=""><a href="#reviewList"><?php echo $reviewCount; ?> Reviews</a></span>
        </div>
        <div class="col-sm-4" id="productPurchaseCol">

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6" id="reviewList">
            <h3>Reviews and Comments</h3>
            <p><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#reviewForm">Review this product</button></p>
            <div id="reviewForm" class="collapse">
                <div class="alert alert-danger" id="formError">

                </div>
                <form>
                    <div class="form-group">
                        <label for="emailInput">Email address *</label>
                        <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="nameInput">Your name *</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="ratingInput">Your rating *</label>
                        <select class="form-control" id="ratingInput">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="commentsInput">Comments</label>
                        <textarea class="form-control" id="commentsInput" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <?php
            foreach ($reviewArray as $review) {
                echo   '<hr>
            <div class="review">
            <h4>'. $review->title .'</h4>
            <h5> Posted by <i>' . $review->author . '</i> on ' . $review->date . '</h5>
            <p>' . $reviewStore->getRatingStars($review->rating) . '</p>
            <p>' . $review->comment . '</p>
            </div>';
            }
            ?>
        </div>
    </div>
</div>
<?php require 'templates/footer.php'; ?>

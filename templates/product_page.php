<div class="container-fluid" id="detailsContent">
    <div class="row">
        <div class="col-sm-3" id="productImgCol">
            <img src="<?php echo $ingredient->imgURL; ?>" alt="product image">
        </div>
        <div class="col-sm-3" id="productDetailsCol">
            <h3><?php echo $ingredient->name; ?></h3>
            <p><?php echo $ingredient->description; ?></p>
            <?php echo getRatingStars($reviewStore, getRating($reviewStore, $ingredient['id'])); ?>
            <span class=""><a href="#reviewList"><?php echo getReviewCount($reviewStore, $ingredient['id']); ?> Reviews</a></span>
        </div>
        <div class="col-sm-4" id="productPurchaseCol">

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6" id="reviewList">
            <h3>Reviews and Comments</h3>
            <?php loadReviews($reviewStore, $ingredient['id']); ?>
        </div>
    </div>
</div>

<?php
class IngredientStore {
    private $__ingredientStore;
    private $__file;
    function __construct($file='') {
        $this->__file = $file;
        $this->__ingredientStore = simplexml_load_file($file) or die("Error: Cannot create object.");
    }
    public function addIngredient() {
        die("Error: Unimplemented function.");
    }
    public function getIngredient($productID='') {
        $ingredientArray = $this->__ingredientStore->xpath("//ingredient[@id='$productID']");
        if (count($ingredientArray) > 1) { // data inconsistency
            die("Error: More than one product with ID of '$productID'.");
        }
        return $ingredientArray[0];
    }
    public function getIngredientList() {
        return $this->__ingredientStore;
    }
    private function reloadIngredientstore() {
        $this->__ingredientStore = simplexml_load_file($this->__file) or die("Error: Cannot create object.");
    }
}

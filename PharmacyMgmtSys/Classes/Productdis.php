<?php

class Productdis{
    private $imagename;

    public function __construct($imagename) {
        $this->imagename = $imagename;
    }

    public function display(){
        echo "<img src='".$this->imagename['source']."' id='productimg".$this->imagename['productid']."' alt='image'>";?>
        <button onclick="nextImage('productimg<?php echo$this->imagename['productid']?>')" id="previewBtn">Preview</button>;
        <?php
        echo "<button id='addcartBtn'>Add to Cart</button>";
    }
}
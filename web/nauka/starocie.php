<?php

class products {
    public $content;
    public $img;
    public $price;

    public function __construct($id,$content,$img,$price)
    {
        $this->id = $id;
        $this->content = $content;
        $this->img = $img;
        $this->price = $price;
    }

    public function __toString()
    {
        return $this->content.$this->img.$this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function getImg()
    {
        return $this->img;
    }

    public function getContent()
    {
        return $this->content;
    }
}

$product1 = new products('1','Papiery powlekane','/images/grafikaproduktu.jpg','Cena netto 1zł');
$product2 = new products('2','Kartony graficzne','/images/grafikaproduktu.jpg','Cena netto 2zł');
$product3 = new products('3','Kartony opakowaniowe','/images/grafikaproduktu.jpg','Cena netto 3zł');
$product4 = new products('4','Papiery etykietowe','/images/grafikaproduktu.jpg','Cena netto 4zł');
$product5 = new products('5','Papiery samokopiujące','/images/grafikaproduktu.jpg','Cena netto 5zł');
$product6 = new products('6','Papier offsetowy','/images/grafikaproduktu.jpg','Cena netto 6zł');

$products = array($product1,$product2,$product3,$product4,$product5,$product6);


//            if ($products[$x]->getId() === $page) {
//                $imgUrl = $products[$x]->getImg();
//                $productPrice = $products[$x]->getPrice();
//                echo '<article>'.htmlEscape($products[$x]->getContent()).'<img src='.$products[$x]->getImg().' class="imgView">'.'<p class="price">'.$products[$x]->getPrice().'</p>'.'</article>';
//                require('../productNavi.php');
//
//            }
//        }

?>
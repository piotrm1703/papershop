<?php
 class samochod {
     protected  $marka;
     protected  $model;
     protected  $iloscPaliwa = 50;
     protected  $spalanie = 7;

     public function setMarka($marka)
     {
         $this->marka = $marka;
     }
     public function getMarka()
     {
         return $this->marka;
     }
     public function setModel($model)
     {
         $this->model = $model;
     }

     public function getModel()
     {
         return $this->model;
     }
     public function tankuj($ileLitrow){
         $this->iloscPaliwa += $ileLitrow;
     }
     public function ilePrzejedzie(){
         if(empty($this->spalanie))
             return 0;
         return $this->iloscPaliwa /$this ->spalanie *100;
     }
 }
 $auto = new samochod();
 $auto->tankuj(20);
 $auto->setMarka('Opel');
 $auto->setModel('Astra');
 echo  $auto->getMarka().' '.$auto->getModel().' '.'przejedzie '.$auto->ilePrzejedzie().'km';
 echo '<br>';

 class terenowka extends samochod {
     private $kola;
     public $iloscZapasowych;

     public function setKola($rozmiar){
         $this->kola = $rozmiar;
     }
     public function czyZmienicKola(){
         if($this->kola < 20)
             $this->setKola(20);
     }

     public function getKola()
     {
         return $this->kola;
     }
 }
 $jeep = new terenowka();
 $jeep->iloscZapasowych = 2;
 $jeep->setKola(15);
 $jeep->czyZmienicKola();
echo $jeep->getKola();
echo '<br>';

class coupe extends samochod{
    public $iloscDrzwi;

    public function zmienAuto(){
        if($this->iloscDrzwi == 3){
            $this->iloscDrzwi = '5';
            return $this->iloscDrzwi;
        } else {
            return $this->iloscDrzwi;
        }
    }
}
$audi = new coupe();
$audi->iloscDrzwi = 2;
echo $audi->zmienAuto();
echo '<br>';

class Drzwi {
    public $wysokosc = 200;
    public $szerokosc = 80;
    private $czyZamkniete = true;
    public function otworz() {
        $this->czyZamkniete = false;
    }
    public function zamknij() {
        $this->czyZamkniete = true;
    }
    public function sprawdzCzyZamkniete() {
        return $this->czyZamkniete;
    }
}
$drzwi = new Drzwi();
$drzwi->otworz();
//$drzwi->czyZamkniete = false; nie można tak zmieniac prywatnych pól
echo 'Czy drzwi są zamknięte?'.' ';
echo $drzwi->sprawdzCzyZamkniete() ? 'tak' : 'nie' ;
echo '<br>';

class samochod1 {
    private $iloscPaliwa = 40;
    private $spalanie = 10;

    private function obliczZasieg(){
        return $this->iloscPaliwa / $this-> spalanie *100;
    }

    public function czyPrzejedzieTrase($dlugoscTrasy){
        echo 'Czy uda Ci się przejechać trase?'.' ';
        return $this->obliczZasieg() > $dlugoscTrasy ? 'tak' : 'nie';
    }
}
$auto1 = new samochod1();
echo $auto1->czyPrzejedzieTrase(1300);
echo '<br>';


abstract class rower {
    private $wlasciciel;


    public function setWlasciciel($wlasciciel)
    {
        $this->wlasciciel = $wlasciciel;
    }
    public function getWlasciciel($wlasciciel)
    {
        $this->wlasciciel = $wlasciciel;
    }
    abstract public function jedz();
}

class gorski extends rower{

    private $kola;

    public function jedz()
    {
        echo 'Jedzie rower gorski';
        echo '<br>';
    }
    public function setKola($kola){
        $this->kola = $kola;
    }
}

class miejski extends rower{
    public function jedz()
    {
        echo 'Jedzie rower miejski';
        echo '<br>';
    }
}

$goral = new gorski();
$goral->jedz();

$mieszczuch = new miejski();
$mieszczuch->jedz();

class owoce{
    protected $ilosc;

    public function __construct($ilosc)
    {
        $this->ilosc = $ilosc;
    }
}

class jablka extends owoce{
    private $kolor;
    private $srednica;
    private $rodzaj;

    public function __construct($kolor, $srednica, $rodzaj)
    {
//        parent:: __construct($ilosc);
      $this->kolor = $kolor;
      $this->srednica = $srednica;
      $this->rodzaj = $rodzaj;
    }

    public function getKolor()
    {
        return $this->kolor;
    }

    public function getSrednica()
    {
        return $this->srednica;
    }

    public function getRodzaj()
    {
        return $this->rodzaj;
    }
}

$szampion = new jablka('czerwony',6,'szampion');

echo $szampion->getKolor().' '.$szampion->getSrednica().' '.$szampion->getRodzaj();
echo '<br>';

abstract class Home {
    protected $wlasciciel;


    abstract function setWlasciciel($wlasciciel);

    abstract function getWlasciciel();

    abstract function clean();
}

class myHome extends Home{

    function setWlasciciel($wlasciciel)
    {
        $this->wlasciciel = $wlasciciel;
    }
    function getWlasciciel()
    {
        return $this->wlasciciel;
    }
    function clean()
    {
        echo "Posprzątałem swój dom!";
        echo '<br>';
    }
}

class mFriend extends Home{

    function setWlasciciel($wlasciciel)
    {
        $this->wlasciciel = $wlasciciel;
    }
    function getWlasciciel()
    {
        return $this->wlasciciel;
    }
    function clean()
    {
        echo "Jego dom też jest posprzątany";
        echo '<br>';
    }
}

$moj = new myHome();
$moj->setWlasciciel('Ja jestem wlascicielem');
echo $moj->getWlasciciel();
echo '<br>';
$moj->clean();

$kolega = new mFriend();
$kolega->setWlasciciel('On jest wlascicielem');
echo $kolega->getWlasciciel();
echo '<br>';
$kolega->clean();

class productys {
    public $content;
    public $img;
    public $price;


    public function __construct($content,$img,$price)
    {
        $this->content = $content;
        $this->img = $img;
        $this->price = $price;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

$product1 = new productys(1,'<img src="../images/grafikaproduktu.jpg">',123);
$product2 = new productys(2,'<img src="../images/grafikaproduktu.jpg">',123);
$product3 = new productys(3,'<img src="../images/grafikaproduktu.jpg">',123);
$product4 = new productys(4,'<img src="../images/grafikaproduktu.jpg">',123);
$product5 = new productys(5,'<img src="../images/grafikaproduktu.jpg">',123);
$product6 = new productys(6,'<img src="../images/grafikaproduktu.jpg">',123);

$products = array($product1,$product2,$product3,$product4,$product5,$product6);


foreach($products as $product){
    echo 'To są '.$product->getContent().' '.$product->getPrice().' '.$product->getImg();
    echo '<br>';


}









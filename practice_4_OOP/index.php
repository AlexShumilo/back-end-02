<?php

abstract class ShopProduct {
    protected $name;
    protected $author;
    protected $type;
    protected $price;
    protected $discount;

    public function __construct($name, $author, $type, $price, $discount) {
        $this->name = $name;
        $this->author = $author;
        $this->type = $type;
        $this->price = $price;
        $this->discount = $discount;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        return $this->name = $name;
    }
    public function getAuthor() {
        return $this->author;
    }
    public function setAuthor($author) {
        return $this->author = $author;
    }
    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        return $this->type = $type;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setPrice($price) {
        return $this->price = $price;
    }
    public function getDiscount() {
        return $this->discount;
    }
    public function setDiscount($discount) {
        return $this->discount = $discount;
    }

    public function getGeneralInfo() {
        return "Наименование: ".$this->name."<br>Производитель: ".$this->author."<br>Жанр: ".$this->type."<br>Цена товара: ".$this->price."<br>Скидка (%): ".$this->discount;
    }

    public function getDiscountPrice() {
        $discountPrice = $this->price - ($this->price / 100 * $this->discount);
        return $discountPrice;
    }
}

class BookProduct extends ShopProduct {
    private $publisher;

    public function __construct($name, $author, $type, $price, $discount, $publisher) {
        parent::__construct($name, $author, $type, $price, $discount);
        $this->publisher = $publisher;
    }
    public function getPublisher() {
        return $this->publisher;
    }
    public function setPublisher($publisher) {
        return $this->publisher = $publisher;
    }

    public function getBookInfo() {
        $parentResult = parent::getGeneralInfo();
        $discountPrice = parent::getDiscountPrice();
        return "<h2>Информация о книге:</h2>".$parentResult."<br>Издательство: ".$this->publisher."<br><i>Стоимость с учётом скидки: ".$discountPrice."</i><p></p>";
    }
}

class CdProduct extends ShopProduct {
    private $cdType;

    public function __construct($name, $author, $type, $price, $discount, $cdType) {
        parent::__construct($name, $author, $type, $price, $discount);
        $this->cdType = $cdType;
    }
    public function getCdType() {
        return $this->cdType;
    }
    public function setCdType($cdType) {
        return $this->cdType = $cdType;
    }

    public function getCdInfo() {
        $parentResult = parent::getGeneralInfo();
        $discountPrice = parent::getDiscountPrice();
        return "<h2>Информация о cd-диске:</h2>".$parentResult."<br>Тип: ".$this->cdType."<br><i>Стоимость с учётом скидки: ".$discountPrice."</i><p></p>";
    }
}

abstract class ShopProductWrite {
    private $product;

    public function addProducts(ShopProduct $object) {
        $this->product = $object;
    }

    public function getProductInformation() {
        return $this->product->getGeneralInfo();
    }
    abstract function write();
}

class TxtWriter extends ShopProductWrite {
    public function write(){
        $productInformation = $this->getProductInformation();
        var_dump($productInformation);

    }
}
class XmlWrite extends ShopProductWrite {
    public function write(){
        $productInformation = $this->getProductInformation();
    }
}

$firstBook = new BookProduct("Дракула", "Брэм Стокер", "роман", 100, 5, "Эксмо");
$txtObject = new TxtWriter();
$txtObject->addProducts($firstBook);
$txtObject->write();



//$firstCd = new CdProduct("Sale", "The Maneken", "indy-pop", 120, 7, "mp3");

//echo $firstBook->getBookInfo();
//echo $firstCd->getCdInfo();

?>

<style>
    body {background: #dcdcdc;}
</style>

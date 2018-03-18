<?php

interface ITransport {
    public function getPrice();
}

abstract class Transport implements ITransport {
    protected $brand;
    protected $speed;
    protected $color;

    public function __construct($brand, $speed, $color) {
        $this->brand = $brand;
        $this->speed = $speed;
        $this->color = $color;
    }

    public function getInformation() {
        return "Brand: ". $this->brand ."<br>Speed: ".$this->speed ."<br>Color: ". $this->color;
    }

    public function getPrice() {
        // TODO: Implement getPrice() method.
    }

    public function setBrand($brand) {
        return $this->brand = $brand;
    }
}

class Car extends Transport {
    private $fuel;

    public function __construct($brand, $speed, $color, $fuel) {
        parent::__construct($brand, $speed, $color);
        $this->fuel = $fuel;
    }

    public function getInformation() {
        $result = parent::getInformation();
        return "Характеристики автомобиля:<br>". $result . "<br>Fuel: ". $this->fuel;
    }
}

class Bicycle extends Transport {
    private $type;

    public function __construct($brand, $speed, $color, $type) {
        parent::__construct($brand, $speed, $color);
        $this->type = $type;
    }

    public function getInformation() {
        $result = parent::getInformation();
        return "Характеристики велосипеда:<br>" . $result . "<br>Type: " . $this->type;
    }

}

$transportCollection = [];

$transportCollection[] = new Car('AUDI', 300, 'black', 20);
$transportCollection[] = new Car('BMW', 250, 'green', 25);

$transportCollection[] = new Bicycle('Oskar', 30, 'red', 'детский велосипед');
$transportCollection[] = new Bicycle('Oskar2', 35, 'blue', 'взрослый велосипед');

foreach ($transportCollection as $transport){
    showObjectInformation($transport);
}

function showObjectInformation(Transport $transport) {
    echo "<p>" . $transport->getInformation() . "</p>";
}

?>
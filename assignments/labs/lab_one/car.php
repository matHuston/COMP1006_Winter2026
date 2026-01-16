<?php
declare(strict_types = 1);

//class for car object
class Car{
    public string $make;
    public string $model;
    public int $year;
    //constructor method
    public function __construct(string $make, string $model, int $year){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    //method to create a new Car object
    public function getCarInfo(): string {
    return "<p> Make: {$this->make}, Model: {$this->model}, Year: {$this->year}</p>";
    }
}
//create a new Car object
$car1 = new Car("Ford", "Thundercougarfalconbird", 3001);
echo $car1->getCarInfo();
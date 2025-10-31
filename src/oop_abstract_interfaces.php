<?php

interface Drawable {
    public function draw(): void;
}

interface Fuelable {
    public function refuel(): void;
}


abstract class Shape {
    abstract public function getArea(): float;
}


class Rectangle extends Shape implements Drawable{
    public function __construct(
        private float $width,
        private float $height
    ) {}

    public function getArea(): float {
        return $this->width * $this->height;
    }

	public function draw(): void {
        echo "Рисую прямоугольник шириной {$this->width} и высотой {$this->height}";
    }
}


class Circle extends Shape implements Drawable{
    public function __construct(
        private float $radius
    ) {}

    public function getArea(): float {
        return pi() * $this->radius ** 2;
    }

	public function draw(): void {
        echo "Рисую круг радиусом {$this->radius}";
    }
}

function renderShape(Shape $shape) {
    $shape->draw();
    echo "Площадь: " . round($shape->getArea(), 2) . PHP_EOL;
}



abstract class Vehicle {
    abstract public function move(): void;
}


class Car extends Vehicle implements Fuelable{
    public function move(): void{
		echo "Машина едет";
	}

	public function refuel(): void{
		echo "Машина заправлена";
	}
}


class Bike extends Vehicle{
    public function move(): void{
		echo "Велосипед едет";
	}
}

?>
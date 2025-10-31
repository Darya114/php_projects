<?php

interface Movable {
    public function move(): string;
}

trait Loggable {
    final public function log(string $message): void {
        echo "[LOG]: $message";
    }
}


class Car implements Movable{
	use Loggable;

	public function __construct(
		private string $brand,
		private string $model,
		private int $year
	) {}
	
	public function getCarInfo(): string{
		return "$this->brand $this->model, $this->year";
	}

	public function setYear(int $year): void{
		$this->year = $year;
	}

	public function getYear(): int{
		return $this->year;
	}

	public function move(): string{
		return "Машина едет";
	}
}

class ElectricCar extends Car {
	public function __construct(
		string $brand,
		string $model,
		int $year,
		public int $batteryCapacity
	) {parent::__construct($brand, $model, $year);}
	
	public function getBatteryInfo(): string {
        return "Батарея: " . $this->batteryCapacity . " kWh";
    }
}

class Bicycle implements Movable{
	public function move(): string{
		return "Велосипед движется";
	}
}

?>
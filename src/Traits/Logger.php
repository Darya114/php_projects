<?php

namespace App\Traits;

trait Logger {
	final public function log(string $status): void{
		echo "[LOG]: $status";
	}
}

?>
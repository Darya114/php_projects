<?php

namespace App\Models;

class User {
	public function __construct(
		private readonly string $name
	) {}
	
	public function getName(): string{
		return $this->name;
	}
}

?>
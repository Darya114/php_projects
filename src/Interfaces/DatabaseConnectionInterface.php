<?php
declare(strict_types=1);

namespace App\Interfaces;

use PDO;

interface DatabaseConnectionInterface {
    public function connect(): PDO;
}
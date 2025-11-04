<?php

declare(strict_types=1);

namespace App;

use PDO;

// Sigleton
class Database implements DatabaseConnectionInterface // почти абстрактный для других бд
{
    protected static ?self $instance = null;
    protected ?PDO $connection = null;
    protected readonly array $config;
    protected readonly UserValidator $validator;
    protected readonly UserRepository $userRepository;

    // private function __construct(){$this->loadConfig();}

    public function __construct(?DbConfig $dbConfig = null, ?UserValidatorInterface $validator = null, ?UserRepository $userRepository = null){
        $this->validator = new UserValidator();
        $this->userRepository = new UserRepository($this, new UserValidator());
        $dbConfig ??= new DbConfig(__DIR__ . '/../config/config.ini');
        $this->config = $dbConfig->getConfig($this->getDriverName());
    }

    final public static function getInstance(): static {
        if (static::$instance === null) {
            static::$instance = new static(); //для других бд
        }
        return static::$instance;
    }

    protected function getDriverName(): string {return 'mysql';} //для других бд, Open/Closed Principle

    protected function buildDsn(): string {
        return sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
            $this->config['db_host'],
            $this->config['db_port'],
            $this->config['db_name']
        );
    } //для других бд, Open/Closed Principle

    final public function connect(): PDO //изменила на PDO вместо string
    {
        if ($this->connection === null) {
            try {
                $this->connection = new PDO(
                    $this->buildDsn(),
                    $this->config['db_user'],
                    $this->config['db_pass']
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo $this->testConnection();
            } catch (\PDOException $e) {
                die("Ошибка подключения: " . $e->getMessage());
            }
        }
        return $this->connection;
        // return $this->testConnection();
    }

    public function testConnection(): string {return $this->connection ? "Подключение успешно" : "Подключение не установлено";}

    public function getUsers(): array {return $this->userRepository->getUsers();}

    public function getUserByEmail(string $email, bool $flag = false): array|bool {
        return $this->userRepository->getUserByEmail($email, $flag);
    }

    public function addUser(string $name, string $email, string $password = '123456'): void{
        $this->userRepository->addUser($name, $email, $password);
    }

    public function deleteUser($id): void{$this->userRepository->deleteUser($id);}
}

?>
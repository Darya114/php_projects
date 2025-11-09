<?php
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/vendor/autoload.php';

$config = ORMSetup::createAttributeMetadataConfig([__DIR__."/src/Entity"], true);
$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('Proxies');

$conn = DriverManager::getConnection([
    'dbname'   => 'my_database',
    'user'     => 'dasha',
    'password' => '1234',
    'host'     => 'localhost',
    'driver'   => 'pdo_mysql',
    'charset' => 'utf8mb4',
], $config);


$entityManager = new EntityManager($conn, $config);

?>
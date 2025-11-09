<?php

use React\Http\HttpServer;
use React\Socket\SocketServer;
use Psr\Http\Message\ServerRequestInterface;
use React\Http\Browser;

require 'vendor/autoload.php';

$server = new HttpServer(function (ServerRequestInterface $request) {
    return new React\Http\Message\Response(
        200,
        ['Content-Type' => 'text/plain; charset=utf-8'],
        "Привет от ReactPHP!"
    );
});

$socket = new SocketServer('127.0.0.1:8080');
$server->listen($socket);

echo "Сервер запущен на http://127.0.0.1:8080\n";

$browser = new Browser();

$urls = [
    'https://jsonplaceholder.typicode.com/posts/1',
    'https://jsonplaceholder.typicode.com/posts/2',
    'https://jsonplaceholder.typicode.com/posts/3',
];

foreach ($urls as $url) {
    $browser->get($url)->then(
        function (Psr\Http\Message\ResponseInterface $response) use ($url) {
            echo "Ответ с {$url} получен:\n";
            echo substr($response->getBody(), 0, 60) . "...\n\n";
        }
    );
} //все параллельно и поэтому ответ не обязательно 123

echo "Запрос отправлен, ждем ответа...\n";
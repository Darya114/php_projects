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

$browser->get('https://jsonplaceholder.typicode.com/posts/1')
    ->then(function (Psr\Http\Message\ResponseInterface $response) {
        echo "Ответ получен!\n";
        echo $response->getBody() . "\n";
    });

echo "Запрос отправлен, ждем ответа...\n";
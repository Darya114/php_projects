<?php

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$server = new Server("127.0.0.1", 9501);

$server->on("start", function () {
    echo "Сервер запущен на http://127.0.0.1:9501\n";

    Swoole\Timer::tick(5000, function () {
        echo "Прошло 5 секунд!\n";
    });
});

$server->on("request", function (Request $request, Response $response) {
    $response->header("Content-Type", "text/plain; charset=utf-8");
    $response->end("Сервер работает!\n");
});

$server->start();

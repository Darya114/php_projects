<?php

require 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, false, false, false);

$callback = function ($msg) {
    $task = json_decode($msg->body, true);
    file_put_contents(__DIR__ . '/rabbitmq.log', date('H:i:s') . " — {$msg->body}\n", FILE_APPEND);
    echo "Обработка задачи: {$task['id']} — {$task['message']}\n";
    sleep(2);
    echo "Задача {$task['id']} обработана!\n";
    $msg->ack();
};

$channel->basic_consume('task_queue', '', false, false, false, false, $callback);

while ($channel->is_consuming()) {
    $channel->wait();
}


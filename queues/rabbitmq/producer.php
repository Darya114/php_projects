<?php

require 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, false, false, false);

for ($i = 1; $i <= 5; $i++) {
    $task = [
        'id' => uniqid(),
        'message' => "Задача №{$i}"
    ];

    $msg = new AMQPMessage(json_encode($task, JSON_UNESCAPED_UNICODE));

    $channel->basic_publish($msg, '', 'task_queue');
    echo "Добавлена {$task['message']} ({$task['id']})\n";
}

echo "Задачи добавлены в RabbitMQ.\n";

$channel->close();
$connection->close();



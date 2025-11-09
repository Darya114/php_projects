<?php

require 'vendor/autoload.php';

$redis = new Predis\Client();

for ($i = 1; $i <= 5; $i++) {
    $task = [
        'id' => uniqid(),
        'message' => "Задача №{$i}"
    ];

    $redis->lpush("queue:tasks", json_encode($task));
    echo "Добавлена {$task['message']} ({$task['id']})\n";
}


echo "Задачи добавлены в очередь\n";

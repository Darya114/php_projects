<?php

require 'vendor/autoload.php';

$redis = new Predis\Client();

echo "Ожидание задач...\n";

while (true) {
    $task = $redis->rpop("queue:tasks");
    if ($task) {
        $task = json_decode($task, true);
        echo "Обработка задачи: {$task['id']} — {$task['message']}\n";
        sleep(2);
        echo "Задача {$task['id']} обработана!\n";
    } else {
        echo "Нет задач, жду...\n";
        sleep(5);
    }
}

<?php

declare(strict_types=1);

namespace App;

final class DbConfig
{
    protected array $config;

    public function __construct(string $configPath) {
        if (!file_exists($configPath)) {
            throw new \RuntimeException("Файл конфигурации не найден: $configPath");
        }

        $this->config = parse_ini_file($configPath, true);
    }

    public function getConfig(string $type): array {
        $sectionKey = "database.$type";
        if (!isset($this->config[$sectionKey])) {
            throw new \RuntimeException("Секция [$sectionKey] отсутствует в config.ini");
        }
        return $this->config[$sectionKey];
    }
}



?>
<?php

namespace Core;

class Logger
{
    public static function Log()
    {

        $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $clientIp = $_SERVER['REMOTE_ADDR'];
        $timestamp = date('Y-m-d H:i:s');

        $logMessage = "[$timestamp] [$clientIp] [$requestMethod] /$requestUri" . PHP_EOL;

        $logFolder = __DIR__ . '/log';
        $logFileName = date('Y-m-d') . '.log';
        $logFilePath = $logFolder . '/' . $logFileName;

        if (!is_dir($logFolder)) {
            mkdir($logFolder, 0755, true);
        }

        file_put_contents($logFilePath, $logMessage, FILE_APPEND);

        echo "log kaydedildi";
    }

    public static function dbLog() {}
}
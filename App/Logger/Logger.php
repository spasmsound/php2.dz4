<?php

namespace App\Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;


class Logger extends AbstractLogger
{

    public function log($level, $message, array $context = [])
    {
        $date = getdate();
        $data = [
            'level' => 'Уровень: ' . $level,
            'date' => 'Дата: ' . $date['mday'] . '.' . $date['mon'] . '.' . $date['year']
            . '//' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'],
            'message' => 'Сообщение: ' . $message
        ];

        file_put_contents(__DIR__ . '/../../log.txt',
            $data['level'] . '; ' . $data['message'] . '; ' . $data['date'] . PHP_EOL,
            FILE_APPEND);
    }

}
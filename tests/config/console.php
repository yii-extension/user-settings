<?php

declare(strict_types=1);

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Db\Sqlite\Connection;

return [
    LoggerInterface::class => NullLogger::class,

    ConnectionInterface::class => [
        '__class' => Connection::class,
        '__construct()' => [
            'dsn' => 'sqlite:' . __DIR__ . '/yiitest.sq3',
        ],
    ],
];

<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings\Tests;

use PHPUnit\Framework\TestCase as AbstractTestCase;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Cache\ArrayCache;
use Yiisoft\Cache\Cache;
use Yiisoft\Cache\CacheInterface;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Db\Sqlite\Connection;
use Yiisoft\Di\Container;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Profiler\Profiler;
use Yiisoft\Yii\Db\Migration\Command\CreateCommand;
use Yiisoft\Yii\Db\Migration\Command\DownCommand;
use Yiisoft\Yii\Db\Migration\Command\HistoryCommand;
use Yiisoft\Yii\Db\Migration\Command\ListTablesCommand;
use Yiisoft\Yii\Db\Migration\Command\NewCommand;
use Yiisoft\Yii\Db\Migration\Command\RedoCommand;
use Yiisoft\Yii\Db\Migration\Command\UpdateCommand;
use Yiisoft\Yii\Db\Migration\Service\MigrationService;

class TestCase extends AbstractTestCase
{
    protected ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp();

        $this->configContainer();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->container);
    }

    protected function configContainer(): void
    {
        $this->container = new Container($this->config());
    }


    private function config(): array
    {
        $params = $this->params();

        return [
            Aliases::class => [
                '@yiisoft/yii/db/migration' => dirname(__DIR__) . '/vendor/yiisoft/yii-db-migration',
            ],

            CacheInterface::class => [
                '__class' => Cache::class,
                '__construct()' => [
                    Reference::to(ArrayCache::class),
                ],
            ],

            LoggerInterface::class => NullLogger::class,

            Profiler::class => [
                '__class' => Profiler::class,
                '__construct()' => [
                    Reference::to(LoggerInterface::class),
                ],
            ],

            ConnectionInterface::class => [
                '__class' => Connection::class,
                '__construct()' => [
                    'dsn' => $params['yiisoft/db-sqlite']['dsn'],
                ],
            ],

            MigrationService::class => [
                '__class' => MigrationService::class,
                'updateNamespace()' => [['Yii\Extension\User\Settings\Migration']],
            ],
        ];
    }

    protected function params(): array
    {
        return [
            'yiisoft/aliases' => [
                'aliases' => [
                    '@yiisoft/yii/db/migration' => dirname(__DIR__, 1),
                ],
            ],

            'yiisoft/db-sqlite' => [
                'dsn' => 'sqlite:' . __DIR__ . '/config/yiitest.sq3'
            ],

            'yiisoft/yii-console' => [
                'commands' => [
                    'generate/create' => CreateCommand::class,
                    'database/list' => ListTablesCommand::class,
                    'migrate/down' => DownCommand::class,
                    'migrate/history' => HistoryCommand::class,
                    'migrate/new' => NewCommand::class,
                    'migrate/redo' => RedoCommand::class,
                    'migrate/up' => UpdateCommand::class,
                ],
            ],
        ];
    }
}

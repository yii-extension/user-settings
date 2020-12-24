<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings\Tests;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\CommandLoader\ContainerCommandLoader;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;
use Yiisoft\Files\FileHelper;
use Yiisoft\Yii\Console\ExitCode;
use Yiisoft\Yii\Db\Migration\Helper\ConsoleHelper;
use Yiisoft\Yii\Db\Migration\Service\MigrationService;

final class MigrationSettingTest extends TestCase
{
    public function testMigrationSetting(): void
    {
        $file = __DIR__ . '/config/yiitest.sq3';
        $consoleHelper = $this->container->get(ConsoleHelper::class);
        $migration = $this->container->get(MigrationService::class);

        $consoleHelper->output()->setVerbosity(OutputInterface::VERBOSITY_QUIET);
        $migration->compact(true);

        if (file_exists($file)) {
            FileHelper::unlink($file);
        }

        $application = $this->container->get(Application::class);

        $loader = new ContainerCommandLoader(
            $this->container,
            $this->params()['yiisoft/yii-console']['commands']
        );

        $application->setCommandLoader($loader);

        $command = new CommandTester($application->find('migrate/up'));

        $command->setInputs(['yes']);

        $this->assertEquals(ExitCode::OK, $command->execute([]));
    }
}
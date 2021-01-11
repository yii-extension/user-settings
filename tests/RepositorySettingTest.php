<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings\Tests;

use Yii\Extension\User\Settings\RepositorySetting;

final class RepositorySettingTest extends TestCase
{
    public function testGetEmailChangeStrategy(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            1,
            $repositorySetting->getEmailChangeStrategy(),
        );
    }

    public function testGetMessageHeader(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            'System Notification',
            $repositorySetting->getMessageheader()
        );
    }

    public function testGetTokenConfirmWithin(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            86400,
            $repositorySetting->getTokenConfirmWithin()
        );
    }

    public function testGetTokenRecoverWithin(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            86400,
            $repositorySetting->getTokenRecoverWithin()
        );
    }

    public function testGetUsernameCaseSensitive(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            true,
            $repositorySetting->getUsernameCaseSensitive()
        );
    }

    public function testGetUsernameRegExp(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            '/^[-a-zA-Z0-9_\.@]+$/',
            $repositorySetting->getUsernameRegExp()
        );
    }

    public function testIsConfirmation(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            false,
            $repositorySetting->isConfirmation()
        );
    }

    public function testIsDelete(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            false,
            $repositorySetting->isDelete()
        );
    }

    public function testIsGeneratingPassword(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            false,
            $repositorySetting->isGeneratingPassword()
        );
    }

    public function testIsPasswordRecovery(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            true,
            $repositorySetting->isPasswordRecovery()
        );
    }

    public function testIsRegister(): void
    {
        $repositorySetting = $this->container->get(RepositorySetting::class);

        $this->assertEquals(
            true,
            $repositorySetting->isRegister()
        );
    }
}

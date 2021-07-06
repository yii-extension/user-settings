<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings\Tests;

use PHPUnit\Framework\TestCase;
use Yii\Extension\User\Settings\SettingsDto;

final class SettingsDtoTest extends TestCase
{
    public function testGetEmailChangeStrategy(): void
    {
        $this->assertEquals(SettingsDto::STRATEGY_DEFAULT, $this->createSettings()->getEmailChangeStrategy());
    }

    public function testGetTokenConfirmWithin(): void
    {
        $this->assertEquals(86400, $this->createSettings()->getTokenConfirmWithin());
    }

    public function testGetTokenRecoverWithin(): void
    {
        $this->assertEquals(21600, $this->createSettings()->getTokenRecoverWithin());
    }

    public function testGetUsernameCaseSensitive(): void
    {
        $this->assertEquals(true, $this->createSettings()->getUsernameCaseSensitive());
    }

    public function testGetUsernameRegExp(): void
    {
        $this->assertEquals('/^[-a-zA-Z0-9_\.@]+$/', $this->createSettings()->getUsernameRegExp());
    }

    public function testIsConfirmation(): void
    {
        $this->assertEquals(false, $this->createSettings()->isConfirmation());
    }

    public function testIsDelete(): void
    {
        $this->assertEquals(false, $this->createSettings()->isDelete());
    }

    public function testIsGeneratingPassword(): void
    {
        $this->assertEquals(false, $this->createSettings()->isGeneratingPassword());
    }

    public function testIsPasswordRecovery(): void
    {
        $this->assertEquals(true, $this->createSettings()->isPasswordRecovery());
    }

    public function testIsRegister(): void
    {
        $this->assertEquals(true, $this->createSettings()->isRegister());
    }

    private function createSettings(): SettingsDto
    {
        return new SettingsDto(
            false,
            false,
            false,
            true,
            true,
            86400,
            21600,
            true,
            '/^[-a-zA-Z0-9_\.@]+$/',
            SettingsDto::STRATEGY_DEFAULT
        );
    }
}

<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings;

/**
 * Implementation of the configuration module with DTO.
 */
final class SettingsDto implements ModuleSettings
{
    /* Email is changed right after user enter's new email address. */
    public const STRATEGY_INSECURE = 0;

    /* Email is changed after user clicks confirmation link sent to his new email address. */
    public const STRATEGY_DEFAULT = 1;

    /* Email is changed after user clicks both confirmation links sent to his old and new email addresses. */
    public const STRATEGY_SECURE = 2;

    private bool $confirmation;
    private bool $delete;
    private bool $generatingPassword;
    private bool $passwordRecovery;
    private bool $register;
    private int $tokenConfirmWithin;
    private int $tokenRecoverWithin;
    private bool $userNameCaseSensitive;
    private string $userNameRegExp;
    private int $emailChangeStrategy;

    public function __construct(
        bool $confirmation,
        bool $delete,
        bool $generatingPassword,
        bool $passwordRecovery,
        bool $register,
        int $tokenConfirmWithin,
        int $tokenRecoverWithin,
        bool $userNameCaseSensitive,
        string $userNameRegExp,
        int $emailChangeStrategy
    ) {
        $this->confirmation = $confirmation;
        $this->delete = $delete;
        $this->generatingPassword = $generatingPassword;
        $this->passwordRecovery = $passwordRecovery;
        $this->register = $register;
        $this->tokenConfirmWithin = $tokenConfirmWithin;
        $this->tokenRecoverWithin = $tokenRecoverWithin;
        $this->userNameCaseSensitive = $userNameCaseSensitive;
        $this->userNameRegExp = $userNameRegExp;
        $this->emailChangeStrategy = $emailChangeStrategy;
    }

    public function getEmailChangeStrategy(): int
    {
        return $this->emailChangeStrategy;
    }

    public function getTokenConfirmWithin(): int
    {
        return $this->tokenConfirmWithin;
    }

    public function getTokenRecoverWithin(): int
    {
        return $this->tokenRecoverWithin;
    }

    public function getUserNameCaseSensitive(): bool
    {
        return $this->userNameCaseSensitive;
    }

    public function getUsernameRegExp(): string
    {
        return $this->userNameRegExp;
    }

    public function isConfirmation(): bool
    {
        return $this->confirmation;
    }

    public function isDelete(): bool
    {
        return $this->delete;
    }

    public function isGeneratingPassword(): bool
    {
        return $this->generatingPassword;
    }

    public function isPasswordRecovery(): bool
    {
        return $this->passwordRecovery;
    }

    public function isRegister(): bool
    {
        return $this->register;
    }
}

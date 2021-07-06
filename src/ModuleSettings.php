<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings;

interface ModuleSettings
{
    /**
     * @return int When user tries change his password, there are three ways how this change will happen:
     *
     * STRATEGY_DEFAULT This is default strategy. Confirmation message will be sent to new user's email and user must
     * click confirmation link.
     * STRATEGY_INSECURE Email will be changed without any confirmation.
     * STRATEGY_SECURE Confirmation messages will be sent to both new and old user's email addresses and user must click
     * both confirmation links.
     */
    public function getEmailChangeStrategy(): int;

    /**
     * @return int The time before a confirmation token becomes invalid.
     */
    public function getTokenConfirmWithin(): int;

    /**
     * @return int The time before a recovery token becomes invalid.
     */
    public function getTokenRecoverWithin(): int;

    /**
     * @return bool If you use user name case sensitive.
     */
    public function getUserNameCaseSensitive(): bool;

    /**
     * @return string Regex user name.
     */
    public function getUsernameRegExp(): string;

    /**
     * @return bool Whether user has to confirm his account.
     */
    public function isConfirmation(): bool;

    /**
     * @return bool When a user can be deleted
     */
    public function isDelete(): bool;

    /**
     * @return bool Whether to remove password field from registration form.
     */
    public function isGeneratingPassword(): bool;

    /**
     * @return bool Whether to enable password recovery.
     */
    public function isPasswordRecovery(): bool;

    /**
     * @return bool Whether to enable registration.
     */
    public function isRegister(): bool;
}

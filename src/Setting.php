<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings;

use Yiisoft\ActiveRecord\ActiveRecord;

/**
 * Module Setting Active Record - Module AR User.
 *
 * Database fields:
 *
 * @property integer $id
 * @property bool    $confirmation
 * @property bool    $delete
 * @property bool    $generatingPassword
 * @property string  $messageHeader
 * @property bool    $passwordRecovery
 * @property bool    $register
 * @property int     $tokenConfirmWithin
 * @property int     $tokenRecoverWithin
 * @property bool    $userNameCaseSensitive
 * @property string  $userNameRegExp
 * @property int     $emailChangeStrategy
 */
final class Setting extends ActiveRecord
{
    public function tableName(): string
    {
        return '{{%settings}}';
    }

    public function getEmailChangeStrategy(): int
    {
        return (int) $this->getAttribute('emailChangeStrategy');
    }

    public function getMessageHeader(): string
    {
        return (string) $this->getAttribute('messageHeader');
    }

    public function getTokenConfirmWithin(): int
    {
        return (int) $this->getAttribute('tokenConfirmWithin');
    }

    public function getTokenRecoverWithin(): int
    {
        return (int) $this->getAttribute('tokenRecoverWithin');
    }

    public function getUsernameCaseSensitive(): bool
    {
        return (bool) $this->getAttribute('userNameCaseSensitive');
    }

    public function getUsernameRegExp(): string
    {
        return (string) $this->getAttribute('userNameRegExp');
    }

    public function isConfirmation(): bool
    {
        return (bool) $this->getAttribute('confirmation');
    }

    public function isDelete(): bool
    {
        return (bool) $this->getAttribute('delete');
    }

    public function isGeneratingPassword(): bool
    {
        return (bool) $this->getAttribute('generatingPassword');
    }

    public function isPasswordRecovery(): bool
    {
        return (bool) $this->getAttribute('passwordRecovery');
    }

    public function isRegister(): bool
    {
        return (bool) $this->getAttribute('register');
    }
}

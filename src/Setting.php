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
        return $this->getAttribute('emailChangeStrategy');
    }

    public function getMessageHeader(): string
    {
        return $this->getAttribute('messageHeader');
    }

    public function getTokenConfirmWithin(): int
    {
        return $this->getAttribute('tokenConfirmWithin');
    }

    public function getTokenRecoverWithin(): int
    {
        return $this->getAttribute('tokenRecoverWithin');
    }

    public function getUsernameCaseSensitive(): bool
    {
        return $this->getAttribute('userNameCaseSensitive');
    }

    public function getUsernameRegExp(): string
    {
        return $this->getAttribute('userNameRegExp');
    }

    public function isConfirmation(): bool
    {
        return $this->getAttribute('confirmation');
    }

    public function isDelete(): bool
    {
        return $this->getAttribute('delete');
    }

    public function isGeneratingPassword(): bool
    {
        return $this->getAttribute('generatingPassword');
    }

    public function isPasswordRecovery(): bool
    {
        return $this->getAttribute('passwordRecovery');
    }

    public function isRegister(): bool
    {
        return $this->getAttribute('register');
    }
}

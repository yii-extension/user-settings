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
}

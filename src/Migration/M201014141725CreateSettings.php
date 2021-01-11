<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings\Migration;

use Yiisoft\Yii\Db\Migration\Migration;
use Yiisoft\Yii\Db\Migration\RevertibleMigrationInterface;

/**
 * Class M201014141725CreateSettings
 */
final class M201014141725CreateSettings extends Migration implements RevertibleMigrationInterface
{
    public function up(): void
    {
        $tableOptions = null;

        if ($this->db->getDriverName() === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_bin ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%settings}}',
            [
                'id' => $this->primaryKey(),
                'confirmation' => $this->boolean(),
                'delete' => $this->boolean(),
                'generatingPassword' => $this->boolean(),
                'messageHeader' => $this->string(100),
                'passwordRecovery' => $this->boolean(),
                'register' => $this->boolean(),
                'tokenConfirmWithin' => $this->integer(),
                'tokenRecoverWithin' => $this->integer(),
                'userNameCaseSensitive' => $this->boolean(),
                'userNameRegExp' => $this->string(25),
                'emailChangeStrategy' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('id', '{{%settings}}', ['id'], true);

        $this->batchInsert(
            '{{%settings}}',
            [
                'confirmation',
                'delete',
                'generatingPassword',
                'messageHeader',
                'passwordRecovery',
                'register',
                'tokenConfirmWithin',
                'tokenRecoverWithin',
                'userNameCaseSensitive',
                'userNameRegExp',
                'emailChangeStrategy'
            ],
            [
                [
                    false,
                    false,
                    false,
                    'System Notification',
                    true,
                    true,
                    86400,
                    86400,
                    true,
                    '/^[-a-zA-Z0-9_\.@]+$/',
                    1,
                ]
            ]
        );
    }

    public function down(): void
    {
        $this->dropTable('{{%settings}}');
    }
}

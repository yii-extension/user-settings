<?php

declare(strict_types=1);

use Yii\Extension\User\Settings\RepositorySetting;
use Yiisoft\User\User;
use Yiisoft\Factory\Definitions\Reference;

return [
    'yiisoft/yii-db-migration' => [
        'updateNamespace' => [
            'Yii\\Extension\\User\\Settings\\Migration',
        ],
    ],
];

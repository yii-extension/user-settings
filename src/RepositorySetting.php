<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings;

use Yiisoft\ActiveRecord\ActiveQueryInterface;
use Yiisoft\ActiveRecord\ActiveRecordFactory;
use Yiisoft\ActiveRecord\ActiveRecordInterface;
use Yiisoft\Db\Exception\InvalidConfigException;

/**
 * Repository for active record setting.
 */
final class RepositorySetting
{
    private ActiveRecordFactory $activeRecordFactory;
    private Setting $settings;

    /**
     * RepositorySetting constructor.
     *
     * @param ConnectionInterface $db
     *
     * @throws InvalidConfigException
     */
    public function __construct(ActiveRecordFactory $activeRecordFactory)
    {
        $this->activeRecordFactory = $activeRecordFactory;
        $this->loadSettings();
    }

    public function getEmailChangeStrategy(): int
    {
        return $this->settings->emailChangeStrategy;
    }

    public function getTokenConfirmWithin(): int
    {
        return $this->settings->tokenConfirmWithin;
    }

    public function getTokenRecoverWithin(): int
    {
        return $this->settings->tokenRecoverWithin;
    }

    public function getUsernameCaseSensitive(): bool
    {
        return $this->settings->userNameCaseSensitive;
    }

    public function getUsernameRegExp(): string
    {
        return $this->settings->userNameRegExp;
    }

    public function isConfirmation(): bool
    {
        return $this->settings->confirmation;
    }

    public function isDelete(): bool
    {
        return $this->settings->delete;
    }

    public function isGeneratingPassword(): bool
    {
        return $this->settings->generatingPassword;
    }

    public function isPasswordRecovery(): bool
    {
        return $this->settings->passwordRecovery;
    }

    public function isRegister(): bool
    {
        return $this->settings->register;
    }

    /**
     * @return ActiveRecordInterface|null
     *
     * @throws InvalidConfigException
     */
    private function loadSettings(): ?ActiveRecordInterface
    {
        /** @psalm-suppress PropertyTypeCoercion */
        return $this->settings = $this->createQuerySettings()->findOne(1);
    }

    private function createQuerySettings(): ActiveQueryInterface
    {
        return $this->activeRecordFactory->createQueryTo(Setting::class);
    }
}

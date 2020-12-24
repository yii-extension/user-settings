<?php

declare(strict_types=1);

namespace Yii\Extension\User\Settings;

use Yiisoft\ActiveRecord\ActiveQuery;
use Yiisoft\ActiveRecord\ActiveQueryInterface;
use Yiisoft\ActiveRecord\ActiveRecordInterface;
use Yiisoft\Db\Connection\ConnectionInterface;
use Yiisoft\Db\Exception\InvalidConfigException;

/**
 * Repository for active record setting.
 */
final class RepositorySetting
{
    private ConnectionInterface $db;
    private ?Setting $settings;
    private ?Activequery $querySettings = null;

    /**
     * RepositorySetting constructor.
     *
     * @param ConnectionInterface $db
     *
     * @throws InvalidConfigException
     */
    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
        $this->createQuerySettings();
        $this->loadSettings();
    }

    public function getEmailFrom(): string
    {
        return $this->settings->emailFrom;
    }

    public function getMessageHeader(): string
    {
        return $this->settings->messageHeader;
    }

    public function getSubjectConfirm(): string
    {
        return $this->settings->subjectConfirm;
    }

    public function getSubjectPassword(): string
    {
        return $this->settings->subjectPassword;
    }

    public function getSubjectRecovery(): string
    {
        return $this->settings->subjectRecovery;
    }

    public function getSubjectWelcome(): string
    {
        return $this->settings->subjectWelcome;
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
        return $this->settings = $this->querySettings->findOne(1);
    }

    private function createQuerySettings(): ActiveQueryInterface
    {
        if ($this->querySettings === null) {
            $this->querySettings = new ActiveQuery(Setting::class, $this->db);
        }

        return $this->querySettings;
    }
}

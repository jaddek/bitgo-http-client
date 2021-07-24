<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Webhook;

class Endpoint
{
    private $id;
    private $label;
    private $created;
    private $coin;
    private $type;
    private $url;
    private $version;
    private $numConfirmations;
    private $state;
    private $lasAttempt;
    private $failingSince;
    private $successiveFailedAttempts;
    private $walletId;
    private $allToken;

    public function __construct(array $data)
    {
        foreach ($data as $key => $field) {
            if (property_exists($this, $key)) {
                $this->$key = $field;
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getCoin()
    {
        return $this->coin;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getNumConfirmations()
    {
        return $this->numConfirmations;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getLasAttempt()
    {
        return $this->lasAttempt;
    }

    public function getFailingSince()
    {
        return $this->failingSince;
    }

    public function getSuccessiveFailedAttempts()
    {
        return $this->successiveFailedAttempts;
    }

    public function getWalletId()
    {
        return $this->walletId;
    }

    public function getAllToken()
    {
        return $this->allToken;
    }
}
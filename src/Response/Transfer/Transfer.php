<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Transfer;

use Jaddek\Bitgo\Http\Client\SetterTrait;

class Transfer
{
    use SetterTrait;

    private const TYPE_SEND = 'send';
    private const TYPE_RECEIVED = 'receive';

    private $id;
    private $coin;
    private $wallet;
    private $txid;
    private $height;
    private $heightId;
    private $date;
    private $confirmation;
    private $type;
    private $value;
    private $valueString;
    private $baseValue;
    private $baseValueString;
    private $feeString;
    private $payGoFee;
    private $payGoFeeString;
    private $usd;
    private $usdRate;
    private $state;
    private $comment;
    private $instant;
    private $isFee;
    private $history;
    private $userNotified;
    private $confirmedTime;
    private $unconfirmedTime;
    private $createdTime;
    private array $entries = [];
    private array $outputs = [];
    private array $inputs  = [];
    private $label;
    private $sequenceId;
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        
        $attributes = [
            'id',
            'coin',
            'wallet',
            'txid',
            'height',
            'heightId',
            'date',
            'confirmation',
            'type',
            'value',
            'valueString',
            'baseValue',
            'baseValueString',
            'freeString',
            'payGoFee',
            'payGoFeeString',
            'usd',
            'usdRate',
            'state',
            'comment',
            'instant',
            'isFee',
            'userNotified',
            'unconfirmedTime',
            'createdTime',
            'label',
            'sequenceId',
        ];

        foreach ($attributes as $attribute) {
            $this->setAttribute($data, $attribute, $this->toStringModifier());
        }

        $this->setCollectionByKeyword($data, 'history', HistoryEntry::class);
        $this->setCollectionByKeyword($data, 'entries', Entry::class);
        $this->setCollectionByKeyword($data, 'outputs', Output::class);
        $this->setCollectionByKeyword($data, 'inputs', Input::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCoin()
    {
        return $this->coin;
    }

    public function getWallet()
    {
        return $this->wallet;
    }

    public function getTxid()
    {
        return $this->txid;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getHeightId()
    {
        return $this->heightId;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getConfirmation()
    {
        return $this->confirmation;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isTypeSend(): bool
    {
        return $this->type === self::TYPE_SEND;
    }

    public function isTypeReceived(): bool
    {
        return $this->type === self::TYPE_RECEIVED;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getValueString()
    {
        return $this->valueString;
    }

    public function getBaseValue()
    {
        return $this->baseValue;
    }

    public function getBaseValueString()
    {
        return $this->baseValueString;
    }

    public function getFeeString()
    {
        return $this->feeString;
    }

    public function getPayGoFee()
    {
        return $this->payGoFee;
    }

    public function getPayGoFeeString()
    {
        return $this->payGoFeeString;
    }

    public function getUsd()
    {
        return $this->usd;
    }

    public function getUsdRate()
    {
        return $this->usdRate;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getInstant()
    {
        return $this->instant;
    }

    public function getIsFee()
    {
        return $this->isFee;
    }

    public function getHistory()
    {
        return $this->history;
    }

    public function getUserNotified()
    {
        return $this->userNotified;
    }

    public function getEntries(): array
    {
        return $this->entries;
    }

    public function getConfirmedTime()
    {
        return $this->confirmedTime;
    }

    public function getUnconfirmedTime()
    {
        return $this->unconfirmedTime;
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    public function getOutputs(): array
    {
        return $this->outputs;
    }

    public function getInputs(): array
    {
        return $this->inputs;
    }

    public function getLabel()
    {
        return $this->label;
    }
    
    public function getComment()
    {
        return $this->comment;
    }
    
    public function getData(): array
    {
        return $this->data;
    }
}

<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Transfer;

class Entry
{
    private $address;
    private $wallet;
    private $value;
    private $valueString;
    private $isChange;
    private $isPayGo;
    private $label;

    public function __construct(array $data)
    {
        $this->address     = $data['address'] ?? null;
        $this->wallet      = $data['wallet'] ?? null;
        $this->value       = $data['value'] ?? null;
        $this->valueString = $data['valueString'] ?? null;
        $this->isChange    = $data['isChange'] ?? null;
        $this->isPayGo     = $data['isPayGo'] ?? null;
        $this->label       = $data['label'] ?? null;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getWallet()
    {
        return $this->wallet;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getValueString()
    {
        return $this->valueString;
    }

    public function getIsChange()
    {
        return $this->isChange;
    }

    public function getIsPayGo()
    {
        return $this->isPayGo;
    }

    public function getLabel()
    {
        return $this->label;
    }
}

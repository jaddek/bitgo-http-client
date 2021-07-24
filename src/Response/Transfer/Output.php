<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Transfer;

class Output
{
    private $id;
    private $address;
    private $value;
    private $valueString;
    private $wallet;
    private $chain;
    private $index;
    private $redeemScript;
    private $isSegwit;

    public function __construct(array $data)
    {
        $this->id           = $data['id'] ?? null;
        $this->address      = $data['address'] ?? null;
        $this->value        = $data['value'] ?? null;
        $this->valueString  = $data['valueString'] ?? null;
        $this->wallet       = $data['wallet'] ?? null;
        $this->chain        = $data['chain'] ?? null;
        $this->index        = $data['index'] ?? null;
        $this->redeemScript = $data['redeemScript'] ?? null;
        $this->isSegwit     = $data['isSegwit'] ?? null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getValueString()
    {
        return $this->valueString;
    }

    public function getWallet()
    {
        return $this->wallet;
    }

    public function getChain()
    {
        return $this->chain;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function getRedeemScript()
    {
        return $this->redeemScript;
    }

    public function getIsSegwit()
    {
        return $this->isSegwit;
    }
}

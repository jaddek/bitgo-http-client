<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Transfer;

use Jaddek\Bitgo\Http\Client\SetterTrait;

class Payment
{
    use SetterTrait;

    private Transfer $transfer;
    private string   $txid;
    private string   $tx;
    private string   $status;
    private array    $data;

    public function __construct(array $data)
    {
        $this->setAttributes($data, ['txid', 'tx', 'status']);
        $this->transfer = new Transfer($data['transfer'] ?? []);
        $this->data     = $data;
    }

    public function getTransfer(): Transfer
    {
        return $this->transfer;
    }

    public function getTxid(): string
    {
        return $this->txid;
    }

    public function getTx(): string
    {
        return $this->tx;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getData(): array
    {
        return $this->data;
    }
}

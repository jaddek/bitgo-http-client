<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Wallet;

use Jaddek\Bitgo\Http\Client\Response\Transfer\Transfer;

final class TransferList
{
    private array $list = [];

    public function __construct(array $data)
    {
        if (!isset($data['transfers']) || !is_array($data['transfers']) || $data['transfers'] === null) {
            $data['transfers'] = [];
        }

        foreach ($data['transfers'] ?? [] as $transfer) {
            $this->list[] = new Transfer($transfer);
        }
    }

    public function getList(): array
    {
        return $this->list;
    }
}
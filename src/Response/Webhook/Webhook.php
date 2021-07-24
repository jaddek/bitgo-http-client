<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Response\Webhook;

use App\Core\SetterTrait;

class Webhook
{
    use SetterTrait;

    private const STATE_UNCONFIRMED = 'unconfirmed';
    private const STATE_CONFIRMED = 'confirmed';

    private ?string $hash;
    private ?string $transfer;
    private ?string $coin;
    private ?string $type;
    private ?string $state;
    private ?string $wallet;

    public function __construct(array $data)
    {
        $modifier = $this->toStringModifier();

        $this->setAttribute($data, 'hash', $modifier);
        $this->setAttribute($data, 'transfer', $modifier);
        $this->setAttribute($data, 'coin', $modifier);
        $this->setAttribute($data, 'type', $modifier);
        $this->setAttribute($data, 'state', $modifier);
        $this->setAttribute($data, 'wallet', $modifier);
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function getTransfer(): ?string
    {
        return $this->transfer;
    }

    public function getCoin(): ?string
    {
        return $this->coin;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function getWallet(): ?string
    {
        return $this->wallet;
    }

    public function isStateConfirmed(): bool
    {
        return $this->state === self::STATE_CONFIRMED;
    }
    
    public function isStateUnConfirmed(): bool
    {
        return $this->state === self::STATE_UNCONFIRMED;
    }
}

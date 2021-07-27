<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client;

use Symfony\Contracts\HttpClient\ResponseInterface;;

interface UserInterface
{
    public function unlock(): ResponseInterface;
}
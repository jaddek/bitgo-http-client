<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client\Client;

use Jaddek\Bitgo\Http\Client\AbstractClient;
use Symfony\Contracts\HttpClient\ResponseInterface;;

class User extends AbstractClient implements UserInterface
{
    public function unlock(): ResponseInterface
    {
        return $this->bitgoClient->request('POST', 'user/unlock');
    }
}

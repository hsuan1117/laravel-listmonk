<?php

namespace Hsuan\Listmonk\Http;

use Illuminate\Http\Client\PendingRequest;

class Client
{
    protected $http;

    public function __construct(PendingRequest $http)
    {
        $this->http = $http;
    }

    public function request($method, $endpoint, $data = [])
    {
        return $this->http->{strtolower($method)}($endpoint, $data)
            ->throw()
            ->json();
    }
}

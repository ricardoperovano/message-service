<?php

namespace App\Contracts;

interface IBroker
{
    public function initialize(array $data): IBroker;
}

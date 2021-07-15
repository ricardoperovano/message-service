<?php

namespace App\Models\Contracts;

use App\Contracts\IBroker;

interface IMessageable
{
    public function setBroker(IBroker $broker): void;
    public function send(): array;
}

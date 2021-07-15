<?php

namespace App\Models;

use App\Models\Contracts\IMessageable;

abstract class Message implements IMessageable
{
    protected $type;
    protected $text;
    protected $to;
    protected $from;
    protected $user;
    protected $broker;
    protected $channelId;

    public function __construct(array $attributes = [])
    {
        $this->type         = $attributes['type'];
        $this->from         = $attributes['from'];
        $this->to           = $attributes['to'];
        $this->text         = $attributes['text'];
        $this->user         = $attributes['user'];
        $this->channelId    = $attributes['channel_id'];
    }

    public function getType()
    {
        return $this->type;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getChannelId()
    {
        return $this->channelId;
    }
}

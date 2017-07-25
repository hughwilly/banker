<?php

namespace HughWilly\Banker\Drivers;

use HughWilly\Banker\Contracts\Driver as DriverContract;

abstract class Driver implements DriverContract
{
    protected $config = [];

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function config($key = null, $value = null)
    {
        if (is_null($key)) {
            return $this->config;
        }
        if (is_string($key)) {
            if (! is_null($value)) {
                return array_set($this->config, $key, $value);
            }
            return array_get($this->config, $key);
        }
        throw new \InvalidArgumentException;
    }
}

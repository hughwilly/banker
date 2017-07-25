<?php

namespace HughWilly\Banker;

use HughWilly\Banker\Exceptions\InvalidDriverException;

class Banker
{
    protected $driver;

    protected $config;

    public function __construct($driver = null)
    {
        $this->config = config('banker');

        if ($driver = $driver ?: array_get($this->config, 'default')) {
            $this->driver($driver);
        }
    }

    public function driver($name)
    {
        if (! $driver_config = array_get($this->config, 'drivers.' . $name)) {
            throw new InvalidDriverException;
        }

        if (! class_exists($driver = array_get($driver_config, 'driver'))) {
            throw new InvalidDriverException;
        }

        $this->driver = new $driver($driver_config);

        return $this;
    }

    public function __call($name, $arguments)
    {
        if (! $this->driver) {
            throw new InvalidDriverException;
        }

        return $this->driver->$name(...$arguments);
    }
}

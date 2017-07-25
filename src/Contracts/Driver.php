<?php

namespace HughWilly\Banker\Contracts;

interface Driver
{
    public function login($user, $password);
}

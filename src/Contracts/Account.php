<?php

namespace HughWilly\Banker\Contracts;

interface Account
{
    public function transactions($perPage = 50, $page = 0, $search = '');

    public function balance();
}

<?php

namespace HughWilly\Banker;

class Transaction
{
    public $statement;

    public $amount;

    public $status;

    public $extra;

    public function __construct($statement, $amount, $status, $extra = null)
    {
        $this->statement = $statement;
        $this->amount = $amount;
        $this->status = $status;
        $this->extra = $extra;
    }
}

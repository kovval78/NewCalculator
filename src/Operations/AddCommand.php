<?php

declare(strict_types=1);

namespace App\Operations;

use App\Receivers\Calculator;

class AddCommand
{
    protected Calculator $calculator;
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }


    public function execute(): float
    {
        return $this->calculator->add();
    }
}
<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Money;

use App\Shared\Domain\Money\Currency;
use App\Shared\Domain\Money\Money;

class MoneyMother
{
    public static function USD(int $amount): Money
    {
        return Money::fromAmountAndCurrency($amount, Currency::fromValue('USD'));
    }

    public static function EUR(int $amount): Money
    {
        return Money::fromAmountAndCurrency($amount, Currency::fromValue('EUR'));
    }
}

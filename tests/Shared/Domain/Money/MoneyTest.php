<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Money;

use App\Shared\Domain\Money\Currency;
use App\Shared\Domain\Money\Money;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testGetters(): void
    {
        $money = Money::fromAmountAndCurrency(100, Currency::fromValue('EUR'));

        $this->assertSame(100, $money->amount);
        $this->assertSame('EUR', $money->currency->isoCode);
    }

    public function testEquality(): void
    {
        $money1 = Money::fromAmountAndCurrency(100, Currency::fromValue('EUR'));
        $money2 = Money::fromAmountAndCurrency(100, Currency::fromValue('EUR'));
        $money3 = Money::fromAmountAndCurrency(20, Currency::fromValue('EUR'));
        $money4 = Money::fromAmountAndCurrency(100, Currency::fromValue('USD'));

        $this->assertTrue($money1->equals($money2));
        $this->assertFalse($money1->equals($money3));
        $this->assertFalse($money1->equals($money4));
    }

    public function testImmutability(): void
    {
        $money1 = Money::fromAmountAndCurrency(100, Currency::fromValue('EUR'));
        $money1->increaseAmountBy(20);

        $this->assertSame(100, $money1->amount);
    }

    public function testMoniesShouldBeAdded(): void
    {
        $money1 = Money::fromAmountAndCurrency(100, Currency::fromValue('EUR'));
        $money2 = $money1->increaseAmountBy(20);

        $this->assertSame(120, $money2->amount);
    }

    public function testInvalidCurrencyOperation(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Currencies do not match');

        $money1 = Money::fromAmountAndCurrency(100, Currency::fromValue('EUR'));
        $money2 = Money::fromAmountAndCurrency(20, Currency::fromValue('USD'));

        $money1->add($money2);
    }
}

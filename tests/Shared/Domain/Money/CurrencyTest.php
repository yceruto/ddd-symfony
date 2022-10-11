<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Money;

use App\Shared\Domain\Money\Currency;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testGetters(): void
    {
        $currency = Currency::fromValue('EUR');

        $this->assertSame('EUR', $currency->isoCode);
    }

    public function testEquality(): void
    {
        $currency1 = Currency::fromValue('EUR');
        $currency2 = Currency::fromValue('EUR');
        $currency3 = Currency::fromValue('USD');

        $this->assertTrue($currency1->equals($currency2));
        $this->assertFalse($currency1->equals($currency3));
    }

    public function testInvalidCurrency(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Currency "XXX" is not a valid ISO code.');

        Currency::fromValue('XXX');
    }
}

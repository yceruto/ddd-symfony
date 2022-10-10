<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Money;

use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testGetters(): void
    {
        $this->markTestSkipped();
    }

    public function testEquality(): void
    {
        $this->markTestSkipped();

        //$this->assertTrue($currency1->equals($currency2));
        //$this->assertFalse($currency1->equals($currency3));
    }

    public function testInvalidCurrency(): void
    {
        //$this->expectException(InvalidArgumentException::class);
        //$this->expectExceptionMessage('Currency "XXX" is not a valid ISO code.');

        $this->markTestSkipped();
    }
}

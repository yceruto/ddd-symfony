<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Money;

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testGetters(): void
    {
        $this->markTestSkipped();
    }

    public function testEquality(): void
    {
        $this->markTestSkipped();

        //$this->assertTrue($money1->equals($money2));
        //$this->assertFalse($money1->equals($money3));
        //$this->assertFalse($money1->equals($money4));
    }

    public function testImmutability(): void
    {
        $this->markTestSkipped();

        //$this->assertSame(100, $money1->amount());
    }

    public function testMoniesShouldBeAdded(): void
    {
        $this->markTestSkipped();

        //$this->assertSame(120, $money3->amount());
    }

    public function testInvalidCurrencyOperation(): void
    {
        //$this->expectException(InvalidArgumentException::class);
        //$this->expectExceptionMessage('Currencies do not match.');

        $this->markTestSkipped();
    }
}

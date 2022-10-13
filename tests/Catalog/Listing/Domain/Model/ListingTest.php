<?php

declare(strict_types=1);

namespace App\Tests\Catalog\Listing\Domain\Model;

use App\Tests\Shared\Domain\Money\MoneyMother;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ListingTest extends TestCase
{
    public function testPriceChangeIsValid(): void
    {
        $listing = ListingMother::create('Listing Good', 100, 'USD');

        $listing->changePrice(MoneyMother::USD(20));

        self::assertSame(20, $listing->price()->amount);
    }

    public function testListingPriceCannotBeNegative(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Listing price cannot be less than zero');

        ListingMother::create('Listing Good', -10, 'USD');
    }
}

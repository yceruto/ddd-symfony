<?php

declare(strict_types=1);

namespace App\Tests\Catalog\Listing\Domain\Model;

use App\Catalog\Listing\Domain\Model\Listing;
use App\Catalog\Listing\Domain\Model\ListingId;
use App\Shared\Domain\Money\Currency;
use App\Shared\Domain\Money\Money;

class ListingMother
{
    public static function create(string $title, int $amount, string $currency): Listing
    {
        return Listing::create(
            ListingId::create(),
            $title,
            Money::fromAmountAndCurrency($amount, Currency::fromValue($currency)),
        );
    }
}

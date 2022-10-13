<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Create;

class CreateListingCommand
{
    public function __construct(
        public readonly string $title,
        public readonly int $amount,
        public readonly string $currency,
    ) {
    }
}

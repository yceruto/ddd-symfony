<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Domain\Model;

interface ListingRepository
{
    public function add(Listing $listing): void;

    public function all(): iterable;
}

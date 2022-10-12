<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Domain\Model;

interface ListingRepository
{
    public function all(): iterable;
}

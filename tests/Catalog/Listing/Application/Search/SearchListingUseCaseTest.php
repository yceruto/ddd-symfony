<?php

declare(strict_types=1);

namespace App\Tests\Catalog\Listing\Application\Search;

use App\Catalog\Listing\Application\Search\ListingSearcher;
use App\Catalog\Listing\Domain\Model\Listing;
use App\Catalog\Listing\Domain\Model\ListingRepository;
use App\Tests\Catalog\Listing\Domain\Model\ListingMother;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SearchListingUseCaseTest extends KernelTestCase
{
    protected function setUp(): void
    {
        $listing = ListingMother::create('Listing One', 100, 'EUR');
        $repository = self::getContainer()->get(ListingRepository::class);
        $repository->add($listing);
    }

    public function testSearch(): void
    {
        $listingSearcher = self::getContainer()->get(ListingSearcher::class);
        $listings = $listingSearcher->search([]);

        self::assertCount(1, $listings);
        self::assertContainsOnlyInstancesOf(Listing::class, $listings);
        self::assertSame('Listing One', $listings[0]->title());
    }
}

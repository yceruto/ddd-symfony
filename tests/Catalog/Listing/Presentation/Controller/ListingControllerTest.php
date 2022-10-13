<?php

declare(strict_types=1);

namespace App\Tests\Catalog\Listing\Presentation\Controller;

use App\Catalog\Listing\Domain\Model\ListingRepository;
use App\Tests\Catalog\Listing\Domain\Model\ListingMother;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ListingControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();

        $listing = ListingMother::create('Listing One', 100, 'EUR');
        $repository = self::getContainer()->get(ListingRepository::class);
        $repository->add($listing);
    }

    public function testSearchListing(): void
    {
        $crawler = $this->client->request('GET', '/');

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('table', 'Title Price Listing One 100 EUR');
        self::assertCount(1, $crawler->filter('tbody > tr'));
    }
}

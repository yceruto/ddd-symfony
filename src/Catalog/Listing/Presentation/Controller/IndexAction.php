<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Presentation\Controller;

use App\Catalog\Listing\Application\Search\ListingSearcher;
use App\Catalog\Listing\Application\Search\SearchListingQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;

class IndexAction extends AbstractController
{
    public function __construct(
        private readonly MessageBusInterface $queryBus,
    ) {
    }

    #[Route('/', name: 'app_index_catalog')]
    public function index(): Response
    {
        $listings = $this->queryBus->dispatch(new SearchListingQuery())->last(HandledStamp::class)->getResult();

        return $this->render('catalog/listing/index.html.twig', [
            'listings' => $listings,
        ]);
    }
}

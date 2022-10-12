<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Presentation\Controller;

use App\Catalog\Listing\Application\Search\SearchListingUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    public function __construct(
        private readonly SearchListingUseCase $searchListingUseCase,
    ) {
    }

    #[Route('/', name: 'app_index_catalog')]
    public function index(): Response
    {
        return $this->render('catalog/listing/index.html.twig', [
            'listings' => $this->searchListingUseCase->search(),
        ]);
    }
}

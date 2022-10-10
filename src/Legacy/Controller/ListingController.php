<?php

declare(strict_types=1);

namespace App\Legacy\Controller;

use App\Legacy\Entity\Listing;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListingController extends AbstractController
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/', name: 'app_index_catalog')]
    public function index(): Response
    {
        return $this->render('catalog/listing/index.html.twig', [
            'listings' => $this->entityManager->getRepository(Listing::class)->findAll(),
        ]);
    }
}

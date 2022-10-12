<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Infrastructure\Percistence\Doctrine;

use App\Catalog\Listing\Domain\Model\Listing;
use App\Catalog\Listing\Domain\Model\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineListingRepository implements ListingRepository
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function all(): iterable
    {
        return $this->entityManager->getRepository(Listing::class)->findAll();
    }
}

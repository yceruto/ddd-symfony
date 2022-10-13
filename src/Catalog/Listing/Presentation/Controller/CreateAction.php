<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Presentation\Controller;

use App\Catalog\Listing\Application\Create\CreateListingCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/new')]
class CreateAction extends AbstractController
{
    public function __construct(
        private readonly MessageBusInterface $commandBus,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        // transform the request into a command object

        $this->commandBus->dispatch(new CreateListingCommand(
            'New Listing',
            2300,
            'USD',
        ));

        return $this->redirectToRoute('app_index_catalog');
    }
}

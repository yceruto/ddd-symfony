<?php

declare(strict_types=1);

namespace App\Catalog\Listing\Application\Create;

use App\Catalog\Listing\Domain\Model\ListingId;
use App\Shared\Domain\Bus\MessageHandler;
use App\Shared\Domain\Money\Currency;
use App\Shared\Domain\Money\Money;

class CreateListingCommandHandler implements MessageHandler
{
    public function __construct(
        private readonly ListingCreator $creator,
    ) {
    }

    public function __invoke(CreateListingCommand $command): void
    {
        $this->creator->create(
            ListingId::create(),
            $command->title,
            Money::fromAmountAndCurrency($command->amount, Currency::fromValue($command->currency))
        );
    }
}

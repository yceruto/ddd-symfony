<?php

declare(strict_types=1);

namespace App\Shared\Domain\Money;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use InvalidArgumentException;
use Symfony\Component\Intl\Currencies;

#[Embeddable]
class Currency
{
    public static function fromValue(string $isoCode): self
    {
        return new self($isoCode);
    }

    public function equals(self $other): bool
    {
        return $this->isoCode === $other->isoCode;
    }

    private function __construct(
        #[Column] public readonly string $isoCode,
    ) {
        if (!Currencies::exists($this->isoCode)) {
            throw new InvalidArgumentException(sprintf('Currency "%s" is not a valid ISO code.', $this->isoCode));
        }
    }
}

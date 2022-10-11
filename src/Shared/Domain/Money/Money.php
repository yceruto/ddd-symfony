<?php

declare(strict_types=1);

namespace App\Shared\Domain\Money;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;
use Doctrine\ORM\Mapping\Embedded;
use InvalidArgumentException;

#[Embeddable]
class Money
{
    public static function fromMoney(Money $other): self
    {
        return new self($other->amount, $other->currency);
    }

    public static function fromCurrency(Currency $currency): self
    {
        return new self(0, $currency);
    }

    public static function fromAmountAndCurrency(int $amount, Currency $currency): self
    {
        return new self($amount, $currency);
    }

    public function add(self $other): self
    {
        if (!$this->currency->equals($other->currency)) {
            throw new InvalidArgumentException('Currencies do not match');
        }

        return new self($this->amount + $other->amount, $this->currency);
    }

    public function increaseAmountBy(int $amount): self
    {
        return new self($this->amount + $amount, $this->currency);
    }

    public function equals(self $other): bool
    {
        return $this->currency->equals($other->currency) && $this->amount === $other->amount;
    }

    private function __construct(
        #[Column] public readonly int $amount,
        #[Embedded] public readonly Currency $currency,
    ) {
    }
}

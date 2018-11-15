<?php

declare(strict_types=1);

/*
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace FAPI\Sylius\Model\Cart;

use FAPI\Sylius\Model\CreatableFromArray;
use FAPI\Sylius\Model\Customer\Customer;

/**
 * @author Kasim Taskin <taskinkasim@gmail.com>
 */
final class Cart implements CreatableFromArray
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * @var string
     */
    private $localeCode;

    /**
     * @var string
     */
    private $checkoutState;

    /**
     * @var CartItem[]
     */
    private $items;

    /**
     * CartCreated constructor.
     */
    private function __construct(
        int $id,
        Customer $customer,
        string $currencyCode,
        string $localeCode,
        string $checkoutState,
        array $items
    ) {
        $this->id = $id;
        $this->customer = $customer;
        $this->currencyCode = $currencyCode;
        $this->localeCode = $localeCode;
        $this->checkoutState = $checkoutState;
        $this->items = $items;
    }

    /**
     * @return Cart
     */
    public static function createFromArray(array $data): self
    {
        $id = -1;
        if (isset($data['id'])) {
            $id = $data['id'];
        }

        $customer = Customer::createFromArray([]);
        if (isset($data['customer'])) {
            $customer = Customer::createFromArray($data['customer']);
        }

        $currencyCode = '';
        if (isset($data['currencyCode'])) {
            $currencyCode = $data['currencyCode'];
        }

        $localeCode = '';
        if (isset($data['localeCode'])) {
            $localeCode = $data['localeCode'];
        }

        $checkoutState = '';
        if (isset($data['checkoutState'])) {
            $checkoutState = $data['checkoutState'];
        }
        /** @var CartItem[] $items */
        $items = [];
        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $items[] = CartItem::createFromArray($item);
            }
        }

        return new self($id, $customer, $currencyCode, $localeCode, $checkoutState, $items);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function getLocaleCode(): string
    {
        return $this->localeCode;
    }

    public function getCheckoutState(): string
    {
        return $this->checkoutState;
    }

    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}

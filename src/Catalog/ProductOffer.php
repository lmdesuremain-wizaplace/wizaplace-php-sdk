<?php

/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace Wizaplace\SDK\Catalog;

use Wizaplace\SDK\Pim\Product\ExtendedPriceTier;
use Wizaplace\SDK\Pim\Product\ProductStatus;

class ProductOffer
{
    /** @var int */
    private $productId;
    /** @var int */
    private $companyId;
    /** @var float */
    private $price;
    /** @var array */
    private $divisions;
    /** @var ProductStatus|null  */
    private $status;
    /** @var array */
    private $priceTiers;
    /**
     * ProductOffer constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->productId = (int) $data['productId'];
        $this->companyId = (int) $data['companyId'];
        $this->price     = (float) $data['price'];
        $this->divisions = \is_array($data['divisions']) ? array_filter($data['divisions']) : [];

        if (isset($data['status']) && \in_array($data['status'], ProductStatus::toArray())) {
            $this->status = new ProductStatus($data['status']);
        }

        $this->priceTiers = [];
        if (\array_key_exists('priceTiers', $data) && \is_array($data['priceTiers'])) {
            foreach ($data['priceTiers'] as $priceTier) {
                $this->addPriceTier($priceTier);
            }
        }
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDivisions(): array
    {
        return $this->divisions;
    }

    public function getStatus(): ?ProductStatus
    {
        return $this->status;
    }

    public function getPriceTiers(): array
    {
        return $this->priceTiers;
    }

    public function addPriceTier(array $priceTier): void
    {
        $this->priceTiers[] = new ExtendedPriceTier($priceTier);
    }
}

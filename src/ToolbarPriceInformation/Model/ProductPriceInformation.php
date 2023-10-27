<?php
/**
 * Copyright © Hibrido. All rights reserved.
 * https://www.hibrido.com.br/
 */

declare(strict_types=1);

namespace Hibrido\ToolbarPriceInformation\Model;

use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Hibrido\ToolbarPriceInformation\Model\Config;

class ProductPriceInformation
{
    /**
     * Summary of __construct
     * @param ProductRepository $productRepository
     * @param PriceCurrencyInterface $priceCurrencyInterface
     */
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly PriceCurrencyInterface $priceCurrencyInterface,
        private readonly Config $config
    ) {}

    /**
     * Summary of getProductPrice
     * @param mixed $productId
     * @return string
     */
    public function getProductPrice($productId)
    {
        $product = $this->productRepository->getById($productId);
        $tierPrice = $product->getTierPrice();
        $useTier = false;
        $price = $product->getData('price');

        if(!empty($tierPrice)) {
            $tierPrice = reset($tierPrice)['price'];
            $useTier = (float) $tierPrice < (float) $price;
        }

        return $useTier ? $this->formatPrice($tierPrice): $this->formatPrice($price);
    }

    /**
     * Summary of formatPrice
     * @param mixed $price
     * @return string
     */
    private function formatPrice($price)
    {
        return $this->priceCurrencyInterface->format($price, false, 2);
    }
}

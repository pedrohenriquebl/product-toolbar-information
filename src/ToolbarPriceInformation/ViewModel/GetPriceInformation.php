<?php
/**
 * Copyright © Hibrido. All rights reserved.
 * https://www.hibrido.com.br/
 */

declare(strict_types=1);

namespace Hibrido\ToolbarPriceInformation\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Hibrido\ToolbarPriceInformation\Model\ProductPriceInformation;
use Hibrido\ToolbarPriceInformation\Model\Config;
use Hibrido\ToolbarPriceInformation\Model\ToolbarColors;

class GetPriceInformation implements ArgumentInterface
{

    /**
     * Summary of __construct
     * @param ProductPriceInformation $productPriceInformation
     * @param Config $config
     */
    public function __construct(
        private readonly ProductPriceInformation $productPriceInformation,
        private readonly Config $config,
        private readonly ToolbarColors $toolbarColors
    ) {}

    /**
     * Summary of getPriceInformation
     * @param mixed $productId
     * @return string
     */
    public function getPriceInformation($productId)
    {
        return $this->productPriceInformation->getProductPrice($productId);
    }

    /**
     * Summary of isEnabled
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled();
    }

    /**
     * Summary of getBackgroundColor
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->toolbarColors->getConfigs()['backgroundColor'];
    }

    /**
     * Summary of getButtonTextColor
     * @return string
     */
    public function getButtonTextColor(): string
    {
        return $this->toolbarColors->getConfigs()['buttonTextColor'];
    }

    /**
     * Summary of getButtonBackgroundColor
     * @return string
     */
    public function getButtonBackgroundColor(): string
    {
        return $this->toolbarColors->getConfigs()['buttonBackgroundColor'];
    }

    /**
     * Summary of isVisibleOnMobile
     * @return string
     */
    public function isVisibleOnMobile()
    {
        return $this->toolbarColors->getConfigs()['showInMobile'];
    }

    /**
     * Summary of isVisibleOnDesktop
     * @return string
     */
    public function isVisibleOnDesktop()
    {
        return $this->toolbarColors->getConfigs()['showInDesktop'];
    }
}

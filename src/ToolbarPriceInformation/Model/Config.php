<?php
/**
 * Copyright © Hibrido. All rights reserved.
 * https://www.hibrido.com.br/
 */

declare(strict_types=1);

namespace Hibrido\ToolbarPriceInformation\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const PRODUCT_PRICE_INFORMATION = 'hb_product_price/general/active';
    const BACKGROUND_COLOR = 'hb_product_price/settings/background_color';
    const BUTTON_TEXT_COLOR = 'hb_product_price/settings/button_text_color';
    const BUTTON_BACKGROUND_COLOR = 'hb_product_price/settings/button_background_color';

    const SHOW_IN_MOBILE = 'hb_product_price/visibility/mobile';
    const SHOW_IN_DESKTOP = 'hb_product_price/visibility/desktop';

    /**
     * Summary of __construct
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfigInterface
     */
    public function __construct(
       private readonly ScopeConfigInterface $scopeConfigInterface
    ) {}

    /**
     * Summary of isEnabled
     * @param mixed $storeId
     * @return bool
     */
    public function isEnabled($storeId = null): bool
    {
        return $this->scopeConfigInterface->isSetFlag(
            self::PRODUCT_PRICE_INFORMATION,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Summary of getBackgroundColor
     * @param mixed $storeId
     * @return string
     */
    public function getBackgroundColor($storeId = null): string
    {
        return $this->scopeConfigInterface->getValue(
            self::BACKGROUND_COLOR,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Summary of getButtonTextColor
     * @param mixed $storeId
     * @return string
     */
    public function getButtonTextColor($storeId = null): string
    {
        return $this->scopeConfigInterface->getValue(
            self::BUTTON_TEXT_COLOR,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Summary of getButtonBackgroundColor
     * @param mixed $storeId
     * @return string
     */
    public function getButtonBackgroundColor($storeId = null): string
    {
        return $this->scopeConfigInterface->getValue(
            self::BUTTON_BACKGROUND_COLOR,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Summary of isEnabledMobile
     * @param mixed $storeId
     * @return bool
     */
    public function isEnabledMobile($storeId = null): bool
    {
        return $this->scopeConfigInterface->isSetFlag(
            self::SHOW_IN_MOBILE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Summary of isEnabledDesktop
     * @param mixed $storeId
     * @return bool
     */
    public function isEnabledDesktop($storeId = null): bool
    {
        return $this->scopeConfigInterface->isSetFlag(
            self::SHOW_IN_DESKTOP,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}

<?php
/**
 * Copyright © Hibrido. All rights reserved.
 * https://www.hibrido.com.br/
 */

declare(strict_types=1);

namespace Hibrido\ToolbarPriceInformation\Model;

use Hibrido\ToolbarPriceInformation\Model\Config;

class ToolbarColors
{
    /**
     * Summary of __construct
     * @param \Hibrido\ToolbarPriceInformation\Model\Config $config
     */
    public function __construct(
        private readonly Config $config
    ) {}

    /**
     * Summary of getColors
     * @return array
     */
    public function getConfigs()
    {
        return [
            'backgroundColor'       => $this->config->getBackgroundColor(),
            'buttonTextColor'       => $this->config->getButtonTextColor(),
            'buttonBackgroundColor' => $this->config->getButtonBackgroundColor(),
            'showInMobile'          => $this->config->isEnabledMobile(),
            'showInDesktop'         => $this->config->isEnabledDesktop()
        ];
    }
}

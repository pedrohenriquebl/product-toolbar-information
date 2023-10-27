/**
 * Copyright © Hibrido. All rights reserved.
 * https://www.hibrido.com.br/
 */

define([
    'jquery',
    'ko',
    'uiComponent'
], function ($, ko, Component) {
    'use strict'

    return Component.extend({

        defaults: {
            toolbarSelector: document.getElementById('price-information'),
            isMobileViewport: ko.observable(false)
        },

        /**
        * Initialize
        */
        initialize: function () {
            this._super();
            this.hideToolbar();
            this.handleVisibility();
            this.setupResizeObserver();
        },

        setupResizeObserver: function () {
            const self = this;

            let resizeObserver = new ResizeObserver(function (entries) {
                for (let entry of entries) {
                    if (entry.target === window.document.documentElement) {
                        self.updateViewport(entry.contentRect.width);
                    }
                }
            });

            resizeObserver.observe(window.document.documentElement);
        },

        updateViewport: function (width) {
            this.isMobileViewport(width < 768);
            this.handleVisibility();
        },

        handleVisibility: function () {
            const isDesktopViewEnabled = this.isDesktopViewEnabled();
            const isMobileViewEnabled = this.isMobileViewEnabled();

            if (window.innerWidth < 768 && isMobileViewEnabled) {
                this.showToolbar();
            }

            if (window.innerWidth >= 768 && isDesktopViewEnabled) {
                this.showToolbar();
            }

            this.hideToolbar();
        },

        hideToolbar: function () {
            this.toolbarSelector.classList.add('hideToolbar');
        },

        handleScroll: function (y) {
            $('.fixed-add-to-cart').toggleClass('hideToolbar', y < 450);
        },

        isMobileVisible: function () {
            return !!this.viewportOnMobile;
        },

        isDesktopVisible: function () {
            return !!this.viewportOnDesktop;
        },

        showToolbar: function () {
            const self = this;

            $(document).scroll(function () {
                const y = $(this).scrollTop();
                self.handleScroll(y);
            });
        }
    })
})

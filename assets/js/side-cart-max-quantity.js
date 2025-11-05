/**
 * Max Quantity on Hands validation for WooCommerce Side Cart Premium
 * Limits quantity based on _max_quantity_on_hands product meta field
 */
(function ($) {
  'use strict';

  let maxQtyLimitsByKey = {};
  let maxQtyLimitsByProduct = {};

  /**
   * Initialize max quantity limits from PHP data
   */
  function initMaxQuantityLimits(limitsByKey, limitsByProduct) {
    maxQtyLimitsByKey = limitsByKey || {};
    maxQtyLimitsByProduct = limitsByProduct || {};
  }

  /**
   * Get max quantity limit for a product
   */
  function getMaxQuantityLimit($prod) {
    const cartKey = $prod.attr('data-key') || $prod.data('key') || '';
    const productId = $prod.attr('data-product_id') || $prod.data('product_id') ||
                     $prod.attr('data-product-id') || $prod.data('product-id') || '';

    let limit = 0;

    if (cartKey && maxQtyLimitsByKey[cartKey]) {
      limit = parseInt(maxQtyLimitsByKey[cartKey]) || 0;
    } else if (productId && maxQtyLimitsByProduct[productId]) {
      limit = parseInt(maxQtyLimitsByProduct[productId]) || 0;
    }

    return limit;
  }

  /**
   * Update quantity buttons state based on limits
   */
  function updateQtyButtons() {
    $('.xoo-wsc-product, .xoo-wsc-item, .xoo-wsc-prod').each(function () {
      const $prod = $(this);
      const $input = $prod.find('.xoo-wsc-qty').first();
      const $plus = $prod.find('.xoo-wsc-plus').first();

      if (!$input.length || !$plus.length) return;

      const limit = getMaxQuantityLimit($prod);
      const currentQty = parseInt($input.val()) || 0;

      if (limit > 0) {
        $input.attr('max', limit);
      } else {
        $input.removeAttr('max');
      }

      if (limit > 0 && currentQty >= limit) {
        $plus.prop('disabled', true).addClass('xoo-disabled');
      } else {
        $plus.prop('disabled', false).removeClass('xoo-disabled');
      }
    });
  }

  /**
   * Handle plus button click
   */
  $(document).on('click', '.xoo-wsc-plus', function (e) {
    const $plus = $(this);
    const $prod = $plus.closest('.xoo-wsc-product, .xoo-wsc-item, .xoo-wsc-prod');
    const $input = $prod.find('.xoo-wsc-qty').first();

    if (!$input.length) return;

    const limit = getMaxQuantityLimit($prod);
    const currentQty = parseInt($input.val()) || 0;

    if (limit > 0 && currentQty >= limit) {
      e.preventDefault();
      e.stopImmediatePropagation();
      $plus.prop('disabled', true).addClass('xoo-disabled');
      return false;
    }

    setTimeout(updateQtyButtons, 250);
  });

  /**
   * Handle minus button click
   */
  $(document).on('click', '.xoo-wsc-minus', function () {
    setTimeout(updateQtyButtons, 250);
  });

  /**
   * Handle quantity input change
   */
  $(document).on('change input', '.xoo-wsc-qty', function () {
    const $input = $(this);
    const $prod = $input.closest('.xoo-wsc-product, .xoo-wsc-item, .xoo-wsc-prod');
    const limit = getMaxQuantityLimit($prod);
    let val = parseInt($input.val()) || 0;

    if (limit > 0 && val > limit) {
      $input.val(limit);
      $input.trigger('change');
    }

    setTimeout(updateQtyButtons, 150);
  });

  /**
   * Initialize on document ready
   */
  $(document).ready(function () {
    updateQtyButtons();
  });

  /**
   * Update on cart update event
   */
  $(document).on('xoo_wsc_cart_updated', function () {
    // Limits will be updated via fragments script
    setTimeout(updateQtyButtons, 200);
  });

  /**
   * Update on fragments loaded
   */
  $(document).on('wc_fragments_loaded', function () {
    setTimeout(updateQtyButtons, 200);
  });

  // Expose init function globally
  window.geffenMaxQuantityInit = initMaxQuantityLimits;

})(jQuery);


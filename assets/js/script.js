/* eslint-disable no-undef */
/* eslint-disable eqeqeq */
/* eslint-disable no-console */
/* eslint-disable indent */
(function ($) {
$(document).ready(function () {
  let dir = $('html').attr('dir') == 'rtl' ? true : false;

  // remove labal if input not empty
  $('.label-top input').each(function (i, item) {
    if ($(item).val()) {
      $(item).addClass('not-empty')
    }
  })
  $('.label-top input').on('change', function () {
    if ($(this).val()) {
      $(this).addClass('not-empty')
    }
  })

  // Burger menu change style
  $('.burger-menu').on('click', function () {
    this.classList.toggle('change');
    $('.main-navigation').toggleClass('active');
    $('.bg-overlay.black').fadeToggle(1000);
    $('body').toggleClass('active');
  });

  $('.category-sub-menu').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('.main-navigation-category-wrap .category-sub-menu').toggleClass('active');
    if (screen.width > 980) {
      $('.main-navigation-category').slideToggle();
    } else {
      $('.main-navigation-category').toggleClass('active-category');
      $('#primary-menu').toggleClass('active-category');
    }
  });

  $('#site-navigation button').on('click', function () {
    $('ul#libre-menu').toggleClass('active');
    $('ul#omnipod-menu').toggleClass('active');
    $('ul#libre-menu>li.menu-item-has-children').removeClass('active');
    $('ul#libre-menu>li.menu-item-has-children>ul.sub-menu').removeClass('active');
    $('ul#omnipod-menu>li.menu-item-has-children').removeClass('active');
    $('ul#omnipod-menu>li.menu-item-has-children>ul.sub-menu').removeClass('active');
  });
  $('ul#libre-menu>li.menu-item-has-children').on('click', function () {
    this.classList.toggle('active');
    $(this).find('.sub-menu').toggleClass('active');

  });
  $('ul#omnipod-menu>li.menu-item-has-children').on('click', function () {
    this.classList.toggle('active');
    $(this).find('.sub-menu').toggleClass('active');

  });

  if ($('.blog-article-subcategory').length) {
    $('.blog-article-subcategory a').each(function () {
      $(this).removeClass('active');
      if (window.location.href == $(this).attr('href')) {
        $(this).addClass('active');
      }
    });
  }

  if (screen.width < 560) {
    /*  ---------------------  Blog categories slick  -----------------------*/
    if ($('.blog-article-subcategory').length) {

      $('.blog-article-subcategory').not('.slick-initialized').slick({
        infinite: false,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 2,
        rtl: dir,
        responsive: [{
            breakpoint: 590,
            settings: {
              slidesToShow: 3.3,
              slidesToScroll: 2,
              arrows: false,
            }
          },
          {
            breakpoint: 430,
            settings: {
              slidesToShow: 3.2,
              slidesToScroll: 2,
              arrows: false,
            }
          },
          {
            breakpoint: 340,
            settings: {
              slidesToShow: 2.5,
              slidesToScroll: 2,
              arrows: false,
            }
          }
        ]
      });
    }
    /*  ---------------------  Blog categories slick  -----------------------*/
  }
  /* ------------------  Blog  Page sliders --------------------------*/

  if ($('.blog-row.slick-slider-mobile').length) {
    $('.blog-row.slick-slider-mobile').not('.slick-initialized').slick({
      infinite: false,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 2,
      rtl: dir,
    });
  }


  /* ------------------  End Blog  Page sliders ---------------- ------*/

  if ($('.multiple-items').length) {
    $('.multiple-items').not('.slick-initialized').slick({
      infinite: false,
      arrows: true,
      slidesToShow: 7,
      slidesToScroll: 2,
      rtl: dir,
      responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 4.5,
            slidesToScroll: 2,
            arrows: false,
          }
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 4.3,
            slidesToScroll: 2,
            arrows: false,
          }
        }
      ]
    });
  }

  /* ------------------  Product tabs Page sliders --------------------------*/

  if ($('.tabs-slider').length) {
    $('.tabs-slider').not('.slick-initialized').slick({
      infinite: false,
      arrows: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      rtl: dir,
      prevArrow: '<button type="button" class="slick-prev"><img src="/wp-content/themes/geffenmedical/assets/img/icons/slider-tabs-l.svg" alt="" srcset=""></button>',
      nextArrow: '<button type="button" class="slick-next"><img src="/wp-content/themes/geffenmedical/assets/img/icons/slider-tabs-r.svg" alt="" srcset=""></button>',
      responsive: [{
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    });
  }

  /* ------------------  END Product tabs Page sliders --------------------------*/

  if ($('.companies-represented-mobile').length) {
    $('.companies-represented-mobile').not('.slick-initialized').slick({
      infinite: true,
      arrows: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      rtl: dir,
      autoplay: true,
      autoplaySpeed: 1000,
    });
  }

  if ($('.multiple-items2').length) {
    $('.multiple-items2').not('.slick-initialized').slick({
      infinite: false,
      arrows: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      rtl: dir,
      responsive: [{
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3
          }
        },
        {
          breakpoint:600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        }
      ]
    });
  }

  if ($('.multiple-items3').length) {
    $('.multiple-items3').not('.slick-initialized').slick({
      infinite: true,
      rtl: dir,
      arrows: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      prevArrow: '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="16" viewBox="0 0 8 16" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.214815 15.5158C0.499688 15.8165 0.974388 15.8293 1.27509 15.5445L7.13141 9.99637C8.27635 8.91169 8.27635 7.0883 7.13141 6.00363L1.27509 0.455534C0.974389 0.17066 0.499688 0.18349 0.214815 0.48419C-0.0700579 0.784889 -0.0572282 1.25959 0.243471 1.54446L6.09979 7.09256C6.62022 7.58559 6.62022 8.4144 6.09979 8.90744L0.243471 14.4555C-0.0572288 14.7404 -0.0700586 15.2151 0.214815 15.5158Z" fill="#0A3B64"/></svg></button>',
      nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="16" viewBox="0 0 8 16" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.78519 15.5158C7.50031 15.8165 7.02561 15.8293 6.72491 15.5445L0.868591 9.99637C-0.276346 8.91169 -0.276347 7.0883 0.868589 6.00363L6.72491 0.455534C7.02561 0.17066 7.50031 0.18349 7.78518 0.48419C8.07006 0.784889 8.05723 1.25959 7.75653 1.54446L1.90021 7.09256C1.37978 7.58559 1.37978 8.4144 1.90021 8.90744L7.75653 14.4555C8.05723 14.7404 8.07006 15.2151 7.78519 15.5158Z" fill="#0A3B64"/></svg></button>',
      responsive: [{
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: false,
          }
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: false,
          }
        }
      ]
    });
  }
  if ($('.responsive-us').length) {
    $('.responsive-us').not('.slick-initialized').slick({
      infinite: true,
      arrows: true,
      rtl: dir,
      dots: true,
      speed: 500,
      autoplay: true,
      autoplaySpeed: 3000,
      slidesToShow: 2,
      slidesToScroll: 2,
      responsive: [{
        breakpoint: 450,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          centerMode: true,
        }
      }]
    });
  }
  if ($('.thumbnails-images').length) {
    $('.gallery-images').not('.slick-initialized').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.thumbnails-images',
      adaptiveHeight: true,
      infinite: true,
      vertical: true,
      verticalSwiping: true,
      arrows: false,
      dots: false,
      rtl: false,
      responsive: [{
        breakpoint: 430,
        settings: {
          slidesToShow: 1.2,
          slidesToScroll: 1,
          adaptiveHeight: true,
          infinite: false,
          vertical: false,
          verticalSwiping: false,
          dots: true,
          rtl: true,
        }
      }]
    });
    $('.thumbnails-images').not('.slick-initialized').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.gallery-images',
      infinite: true,
      vertical: true,
      verticalSwiping: true,
      arrows: false,
      dots: false,
      focusOnSelect: true,
      rtl: false,
    });
    setTimeout(function () {
      $('.gallery-images').slick('slickGoTo', 0);
      $('.thumbnails-images').slick('slickGoTo', 0);
    }, 100); // Adjust the timeout as needed
  }
  /* ------------------  Header sliders --------------------------*/

  if ($('.header-slider').length) {
    $('.header-slider').slick({
      infinite: true,
      arrows: true,
      rtl: dir,
      dots: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 15000,
      responsive: [{
        breakpoint: 450,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          centerMode: true,
        }
      }]
    });
  }

  /* ------------------  END PHeader sliders --------------------------*/
  /*contact page popup*/
  if ($('.show-contact-form').length) {
    $('.show-contact-form').on('click', function () {
      const popup = $(this).closest('.contact-icon').find('.popup-content-contactpage');
      show_popup(popup)
    });
  }

  /*login form*/
  if ($('.show-login-popup').length || $('#cart_register').length || $('.show-login-popup-block').length ) {
    $('.show-login-popup, #cart_register, .show-login-popup-block').on('click', function () {
      const popup = $('#login_form_popup .popup-content-contactpage');
      show_popup(popup)
    });
  }

  /*show billing form*/
  if ($('#show_billing_edit').length) {
    $('#show_billing_edit').on('click', function () {
      const popup = $('#billing_form_popup .popup-content-contactpage');
      show_popup(popup)
    });
  }

  /*show shipping form*/
  if ($('#show_shipping_edit').length) {
    $('#show_shipping_edit').on('click', function () {
      const popup = $('#shipping_form_popup .popup-content-contactpage');
      show_popup(popup)
    });
  }

  /*show shipping form*/
  if ($('#show_continue_registration').length) {
    $('#show_continue_registration').on('click', function (e) {
      e.preventDefault()
      const popup = $('#continue_registration_popup .popup-content-contactpage');
      show_popup(popup)
    });
  }

  // Close popup
  $('.close-contactpage, .page-overlay').on('click', function () {
    $('.popup-content-contactpage, .page-overlay').fadeOut();
  })

  // Show popup
  function show_popup(popup) {
    $(popup).fadeIn();
    $('.page-overlay').fadeIn();
  }

  /*show profile menu popup*/
  if ($('#show_profile_menu_popup').length) {
    $('#show_profile_menu_popup').on('click', function () {
      const popup = $('#profile_menu_popup');
      $(popup).fadeToggle();
    });
  }

  /* Show Login Form Tab */
  if ($('#show_login_form_tab').length) {
    $('#show_login_form_tab').on('click', function () {
      $('#popup_login_form').show();
      $('#popup_register_form').hide();
    });
  }

  /* Show Login Form Tab */
  if ($('#show_register_form_tab').length) {
    $('#show_register_form_tab').on('click', function (event) {
      event.preventDefault();
      $('#popup_login_form').hide();
      $('#popup_register_form').show();
    });
  }

  /* Show Logout Popup */
  if ($('#show_logout_popup').length) {
    $('#show_logout_popup').on('click', function () {
      $('#confirm_logout_popup').fadeIn();
    });
  }

  /* Hide Logout Popup */
  if ($('#close_confirm_logout').length) {
    $('#close_confirm_logout, #cancel_confirm_logout').on('click', function () {
      $('#confirm_logout_popup').fadeOut();
    });
  }


  /* Show search form */
  if ($('.search__popup').length) {
    $('#show_search_popup').on('click', function (e) {
      e.preventDefault()
      $('#search_popup').fadeIn()

      $('#search_close').on('click', function () {
        $('#search_popup').fadeOut()
      })
    })
  }

  // Like button
  $('.post-review__like').on('click', function () {
    const security = $(this).attr('data-nonce'),
      likeCount = $(this).find('.post-review__like-count'),
      likeIcon = $(this).find('.post-review__like-icon'),
      postID = $(this).attr('data-post-id');

    // AJAX call goes to our endpoint url
    $.ajax({
      url: window.geffen.ajax_url,
      type: 'post',
      data: {
        post: postID,
        nonce: security,
        num: $(likeCount).text(),
        action: 'process_simple_like', //callback function
      },
      success: function (response) {
        if (response.count) {
          let count = response.count
          let updated_likes = parseInt(count);
          $(likeCount).html(updated_likes);
        }

        let icon = response.icon

        $(likeIcon).html(icon);
      },
      error: function (response) {
        console.log('error', response);
      },
    });
  });


  if ($("#openPopupButton").length) {
    $("#openPopupButton").on("click", function () {
      $("#popup").css('display', 'inline-flex');
    });

    $("#closePopupButton").on("click", function () {
      $("#popup").css('display', 'none');
    });
  }


  $('.star-input').on('change', function () {
    $('.star-checkbox .star').removeClass('checked');

    $('.star-checkbox .star').each((i, item) => {
      i++;
      if (i <= $(this).val()) {
        $(item).addClass('checked')
      }
    });
  });

  //Team Member page show/hide tab
  if ($('.tab-member-team').length) {
    $('.tab-text-member-team').on('click', function () {
      const container = $(this).closest('.tab-member-team')

      $(container).find('.tab-content-member-team').css('display', 'flex')
      $(container).find('.tab-toggle-member-team').html('-')
      $(this).hide()
      $(container).find('.tab-text-member-team-hidden').show()
    });

    $('.tab-text-member-team-hidden').on('click', function () {
      const container = $(this).closest('.tab-member-team')

      $(container).find('.tab-content-member-team').css('display', 'none')
      $(container).find('.tab-toggle-member-team').html('+')
      $(this).hide()
      $(container).find('.tab-text-member-team').show()
    });
  }

  // Team Member Page POPUP
  if ($('.member-popup').length) {
    //Close Popup
    $('.member-popup-close').on('click', function () {
      $('.member-popup').fadeOut()
    });

    //Show Popup
    $('.customer-club-button a').on('click', function () {
      const title = $(this).attr('data-name')
      const id = $(this).attr('data-id')

      $('#job-name').val(title)
      $('#job-id').val(id)

      $('.member-popup').fadeIn()
    });
  }

  // Single Product TABs
  if ($('.product-description-tab').length) {
    $('.product-description-tab').on('click', function () {
      const tab = $(this).attr('data-tab')

      $('.product-description-tab-content, .product-description-tab').removeClass('active')

      $(this).addClass('active')
      $('#' + tab).addClass('active')
    })
  }

  // Change Quantity on click PLus / Minus
  if ($('.change-quantity').length) {
    $(document).on('change input', '.quantity input.qty', function (e) {
      e.preventDefault();
      const that = $(this)
      const max = $(that).attr('max') ? parseInt($(that).attr('max')) : 999999;

      if ($(that).val() > max) {
        $(that).val(max)
      }

      calculateProduct(that);

      // Cart page
      if ($('.woocommerce-cart').length) {
        $('.shop_table button[name="update_cart"]').trigger('click')
      }

      // Checkout page
      if ($('.woocommerce-checkout').length) {
        const itemKey = $(that).closest('.product-quantity').data('item-key')
        const qty = $(that).val()
        update_product_items(itemKey, qty, that)
      }
    });

    $(document).on('click', '.quantity__plus', function (e) {
      e.preventDefault();
      const that = $(this)
      $(that).prop('disabled', true)
      const parent = $(that).closest('.change-quantity');
      const input = $(parent).find('input.qty');
      let value = parseInt($(input).val());
      const max = $(input).attr('max') ? parseInt($(input).attr('max')) : 999999;
      const step = $(input).attr('step') ? parseInt($(input).attr('step')) : 1;

      if (value < max) {
        $(input).val(value + step);
        $(input).trigger('change');
      }

      // Cart page
      if ($('.woocommerce-cart').length) {
        $('.shop_table button[name="update_cart"]').trigger('click')
      }

      // Checkout page
      if ($('.woocommerce-checkout').length) {
        const itemKey = $(input).closest('.product-quantity').data('item-key')
        const qty = $(input).val()
        update_product_items(itemKey, qty, input)
      }

      $(that).prop('disabled', false)
    });

    $(document).on('click', '.quantity__minus', function (e) {
      e.preventDefault();
      const that = $(this)
      $(that).prop('disabled', true)
      const parent = $(that).closest('.change-quantity');
      const input = $(parent).find('input.qty');
      const value = parseInt($(input).val());
      const min = $(input).attr('min') ? parseInt($(input).attr('min')) : 0;
      const step = $(input).attr('step') ? parseInt($(input).attr('step')) : 1;

      if (value > min) {
        $(input).val(value - step);
        $(input).trigger('change');
      }

      // Cart page
      if ($('.woocommerce-cart').length) {
        $('.shop_table button[name="update_cart"]').trigger('click')
      }

      // Checkout page
      if ($('.woocommerce-checkout').length) {
        const itemKey = $(input).closest('.product-quantity').data('item-key')
        const qty = $(input).val()
        update_product_items(itemKey, qty, input)
      }

      $(that).prop('disabled', false)
    });
  }

  // Change Variation product option
  if ($('.radio-product').length) {
    $('.radio-product').on('change', function () {
      const label = $(this).closest('.product-info-package-tastes-label');
      const block = $(this).closest('#singular-content');
      const varID = $(this).attr('data-var-id');
      $(block).find('.variation_id').val(varID);
      $(block).find('.variation-info').removeClass('active')
      $(block).find('#variation_' + varID).addClass('active')

      $(block).find('.single-package-quantity').prop('disabled', true);
      $(label).find('.single-package-quantity').prop('disabled', false);
    });
  }

  // Switch Tab on variable product
  if ($('.product-info-tab').length) {
    $('.product-info-tab').on('click', function () {
      const attr = $(this).attr('id');
      $('.product-info-tab-content').removeClass('active')
      $('.product-info-tab').removeClass('active')
      $('.product-info-tab-content').find('input, select').attr('disabled', true);
      $(this).addClass('active')
      $('#' + attr + '-content').addClass('active')
      $('#' + attr + '-content').find('input, select').attr('disabled', false);

      if (attr == 'case') {
        $('.product-variable-more-info').show()
      } else {
        $('.product-variable-more-info').hide()
      }
    });
  }

  // Switch quantity on select change
  if ($('.product-info-package-selectoption').length) {
    const productSelect = $('.product-info-package-selectoption').val()
    $('.product_inner_sum.case').find('input').attr('disabled', true)

    $('.product_inner_sum.case').each(function (i, item) {
      if ($(item).attr('data-attr') == productSelect) {
        $(item).addClass('active');
        $(item).find('input').attr('disabled', false)
      }
    });

    $('.variation-info.case').each(function (i, item) {
      if ($(item).attr('data-attr') == productSelect) {
        $(item).addClass('active');
      }
    });

    $('.product-info-package-selectoption').on('change', function () {
      const block = $(this).closest('#case-content')
      const productSelect = $(this).val()
      $(block).find('.product_inner_sum.case, .variation-info').removeClass('active')
      $(block).find('.product_inner_sum.case input').attr('disabled', true)
      $(block).find('input.qty').val(0)
      $(block).find('.product-sum-total-qty, .product-sum-total-price-num').html('0')


      $(block).find('div[data-attr="' + productSelect + '"]').each(function (i, item) {
        $(item).addClass('active')
        $(item).find('input').attr('disabled', false)
      });
    });
  }

  // Open / close Share button
  if ($('.social_share').length) {
    $('.product-info-socials-item.share').on('click', function () {
      $(this).toggleClass('active');
      $(this).find('.social_share').toggle();
    })
  }

  /**
   * Tabs
   */
  if ($('.tab-item').length) {
    $('.tab-item').on('click', function () {
      const id = $(this).attr('data-content');
      const wrap = $(this).closest('.tabs');

      $(wrap).find('.tab-item, .tab-content').removeClass('active');
      $(wrap).find('#tab_content_' + id).addClass('active')
      $(this).addClass('active')
    });
  }

  /**
   * Pagination
   */
  if ($('.paginated-number').length) {
    $('body').on('click', '.paginated-number', function () {
      const id = parseInt($(this).attr('data-page'));
      const wrap = $(this).closest('.paginated');
      const max = parseInt($(wrap).find('.paginated-pages').attr('data-pages'));

      $(wrap).find('.paginated-number, .paginated-content').removeClass('active');
      $(wrap).find('#paginated_content_' + id).addClass('active')
      $(wrap).find(`.paginated-count`).removeClass('current')

      $(wrap).find(`.paginated-count[data-page=${id}]`).addClass('current')

      if (id > 1) {
        $(wrap).find('.paginated-number.page-prev').attr('data-page', (id - 1)).removeClass('hidden')
      } else {
        $(wrap).find('.paginated-number.page-prev').attr('data-page', 0).addClass('hidden')
      }

      if (id === max) {
        $(wrap).find('.paginated-number.page-next').attr('data-page', max).addClass('hidden')
      } else {
        $(wrap).find('.paginated-number.page-next').attr('data-page', (id + 1)).removeClass('hidden')
      }

      goToByScroll('faq_categories')
    });
  }

  /**
   * FAQ Page Filter
   */
  if ($('.faq-category-term-name').length) {
    $('.faq-category-term-name input').on('click', function () {
      const checked = $(this).attr('data-waschecked')
      const term = $(this).val()
      const wrap = $(this).closest('.tab-content')
      let posts = $(wrap).find('.faq-category-post')

      $(wrap).find('.faq-category-term-name input').data('waschecked', false);

      if (checked == 'true') {
        $(this).prop('checked', false);
        $(this).attr('data-waschecked', false);
        $(posts).removeClass('hide-post')
      } else {
        $(posts).each(function (i, item) {
          const strTerms = $(item).attr('data-terms')
          if (strTerms.indexOf(term) !== -1) {
            $(item).removeClass('hide-post')
          } else {
            $(item).addClass('hide-post')
          }
        })

        $(this).attr('data-waschecked', true);
      }

    })
  }

  if ($('#faq_filter_form').length) {
    $('#faq_filter_form').on('submit', function (e) {
      e.preventDefault(); // Prevent the form from submitting the traditional way

      // Serialize form data to send all parameters
      var formData = $(this).serialize();

      // Add the 'action' parameter to specify the action to be performed on the server
      formData += '&action=handle_faq_form';

      // Make an AJAX request
      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url,
        data: formData,
        beforeSend: function () {
          // This function runs just before the request is sent
          $('#faq_preloader').show();
        },
        success: function (response) {
          $('#faq_new_content').html(response.template);
          $('#faq_categories').hide();
        },
        error: function (xhr, status, error) {
          // This function runs when there's an error in the request
          console.log("אירעה שגיאה: " + error);
        },
        complete: function () {
          // This function runs when the request is complete (success or error)
          $('#faq_preloader').hide();
        }
      });
    });

    // Clear the form and received data
    $('#faq-clear').on('click', function () {
      // Clear the form fields
      $('#faq_filter_form')[0].reset();

      // Clear the received data
      $('#faq_new_content').html('');

      // Show Categories
      $('#faq_categories').show();

      // Optionally, hide the preloader if it's visible
      $('#faq_preloader').hide();
    })
  }

  function goToByScroll(id) {
    $('html, body').animate({
      scrollTop: $("#" + id).offset().top - 50
    }, 'slow');
  }

  /**
   * Cart Coupon Code
   */
  if ($('#coupon_code_submit').length) {
    $('body').on('click', '#coupon_code_submit', function (e) {
      e.preventDefault();
      const couponCode = $('#coupon_code').val();
      let couponCodes = $('#coupon_codes').val();
      const shippingMethod = getShippingMethodValue();
      let action = 'apply_coupon'

      if (couponCodes) {
        couponCodes += `,${couponCode}`
      } else {
        couponCodes = couponCode
      }

      $('#coupon_codes').val(couponCodes)

      if ($('.woocommerce-checkout').length) {
        action = 'checkout_apply_coupon'
      }

      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url, // Replace with the actual URL to your AJAX handler
        data: {
          action,
          coupon_codes: couponCodes,
          shipping_method: shippingMethod,
        },
        beforeSend: function () {
          if ($('.woocommerce-checkout')) {
            // Show Preloader
            $('.lds-ring, .checkout-overlay').fadeIn()
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error('AJAX error: ' + textStatus, errorThrown);
          // Handle AJAX error, if needed
        },
        success: function (response) {
          window.location.href = document.URL;
          // if (!response.success) {
          //   window.location.href = document.URL;
          // } else {
          //   // Handle the response, e.g., show a success message or update the cart totals
          //   $('.shop_table button[name="update_cart"]').prop('disabled', false)

          //   if ($('.woocommerce-checkout').length) {
          //     $('#order_review').html(response.data.review_order)
          //     $('#checkout_form_items').html(response.data.product_items)

          //     // Hide Preloader
          //     $('.lds-ring, .checkout-overlay').fadeOut()
          //   } else {
          //     $('.shop_table button[name="update_cart"]').trigger('click')
          //   }
          // }
        },
      });
    });
  }

  /** Accordion */
  if ($('.accordion-header').length) {
    $('.accordion-header').on('click', function () {
      const wrap = $(this).closest('.accordion-item')
      $('.accordion-content').slideUp()
      $('.accordion-header .icon').html('+')

      if (!$(wrap).find('.accordion-content').is(':visible')) {
        $(wrap).find('.accordion-content').slideToggle()
        $(wrap).find('.accordion-header .icon').html('−')
      }
    })
  }
  if ($('.accordion-header-taste').length) {
    $('.accordion-header-taste').on('click', function () {
      const wrap = $(this).closest('.accordion-item-taste');

              // Сброс фона и иконки для всех элементов
              $('.accordion-content-taste').slideUp();
              $('.accordion-header-taste').css('background-color', ''); // Сброс фона
              $('.accordion-header-taste .icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none"><path d="M3.8983 9V5.06H0.258301V3.94H3.8983V0H5.0983V3.94H8.7383V5.06H5.0983V9H3.8983Z" fill="#0D6EFD"/><svg>');

              // Проверка видимости текущего элемента
              if (!$(wrap).find('.accordion-content-taste').is(':visible')) {
                  $(wrap).find('.accordion-content-taste').slideToggle();
                  $(wrap).find('.accordion-header-taste').css('background-color', '#C3E6FA');
                  $(wrap).find('.accordion-header-taste .icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="5" height="3" viewBox="0 0 5 3" fill="none"><path d="M0.243828 2.06V0.92H4.78383V2.06H0.243828Z" fill="#0D6EFD"/><svg>');
              }
          });
      }
  /**
   * Update hidden shipping method fields (title and price)
   */
  function updateShippingMethodFields(shippingMethodValue) {
    if (!shippingMethodValue) {
      return;
    }

    const $selectedMethod = $('.shipping_method[value="' + shippingMethodValue + '"]');
    if ($selectedMethod.length) {
      const cost = parseFloat($selectedMethod.attr('data-cost')) || 0;
      const label = $selectedMethod.closest('li').find('.shipping__choice_name').text().trim();

      // Update or create hidden fields
      let $titleField = $('#shipping_method_title');
      let $priceField = $('#shipping_method_price');

      if ($titleField.length === 0) {
        // Create hidden fields if they don't exist
        $titleField = $('<input>', {
          type: 'hidden',
          id: 'shipping_method_title',
          name: 'shipping_method_title'
        });
        $priceField = $('<input>', {
          type: 'hidden',
          id: 'shipping_method_price',
          name: 'shipping_method_price'
        });

        // Insert after shipping methods section
        $('.woocommerce-shipping-totals').append($titleField).append($priceField);
      }

      $titleField.val(label);
      $priceField.val(cost.toFixed(2));
    }
  }

  /**
   * Get shipping method value with fallback
   */
  function getShippingMethodValue() {
    const $checkedMethod = $('.shipping_method:checked');
    if ($checkedMethod.length) {
      return $checkedMethod.val();
    }

    // Fallback: try to get from first available method
    const $firstMethod = $('.shipping_method').first();
    if ($firstMethod.length) {
      return $firstMethod.val();
    }

    return null;
  }

  /** Shipping Tabs */
  if ( $('.shipping_method').length ) {
    // Initialize on page load
    let hasCheckedMethod = false;
    $('.shipping_method').each(function(i, item) {
      if ($(item).is(':checked')) {
        const tab = $(item).attr('data-tab')
        const value = $(this).val()

        $('#shipping_details_' + tab).show()
        shipping_mandatory(value)
        updateShippingMethodFields(value)
        hasCheckedMethod = true;
      }
    })

    // If no method is checked, check the first one and update fields
    if (!hasCheckedMethod) {
      const $firstMethod = $('.shipping_method').first();
      if ($firstMethod.length) {
        $firstMethod.prop('checked', true);
        const value = $firstMethod.val();
        const tab = $firstMethod.attr('data-tab');

        $('#shipping_details_' + tab).show();
        shipping_mandatory(value);
        updateShippingMethodFields(value);
      }
    } else {
      // Ensure fields are updated even if method is already checked
      const checkedValue = getShippingMethodValue();
      if (checkedValue) {
        updateShippingMethodFields(checkedValue);
      }
    }

    $('.shipping_method').on('change', function () {
      const tabNumber = $(this).attr('data-tab')
      const value = $(this).val()

      $('.shipping__details').hide()
      $('#shipping_details_' + tabNumber).show()
      shipping_mandatory(value);

      // Update hidden fields
      updateShippingMethodFields(value);

      if ($('.woocommerce-checkout').length) {
        const coupons = $('#coupon_codes').val()

        $.ajax({
          type: "POST",
          url: window.geffen.ajax_url,
          data: {
            action: "update_shipping_checkout_total",
            shipping_method: value,
            coupons
          },
          beforeSend: function () {
            // Show Preloader
            $('.lds-ring, .checkout-overlay').fadeIn()
          },
          error: function (xhr) {
            console.log('error:', xhr);
          },
          success: function (response) {
            if (response.success) {
              $('#order_review').html(response.data.review_order)
              $('#checkout_payment').removeClass('disabled')
              shipping_mandatory(value);

              // Update hidden fields after DOM update
              setTimeout(function() {
                updateShippingMethodFields(value);
              }, 100);

              // Hide Preloader
              $('.lds-ring, .checkout-overlay').fadeOut()
            }
          }
        })
      }
    })

    function shipping_mandatory(value) {
      let field = ''
      let is_empty = false
      $('.shipping-message').hide()

      switch (value) {
        case 'flat_rate:4':
          field = $('#shipping_street').val()
          if (!field) {
            $('#shipping_message').slideDown()
            $('#cart_to_checkout, .checkout-payment').addClass('disabled')
            is_empty = true
          }
          break;
        case 'flat_rate:5':
          field = $('#shipping_done_position').val()
          if (!field) {
            $('#done_message').slideDown()
            $('#cart_to_checkout, .checkout-payment').addClass('disabled')
            is_empty = true
          }
          break;
        default:
          $('#cart_to_checkout, .checkout-payment').removeClass('disabled')
      }

      return is_empty
    }
  }

  function saveDoneFields(area = '', city = '', street = '', number = '') {
    const data = {
      action: 'save_done_fields',
      area,
      city,
      street,
      number
    }

    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url, // Replace with the actual URL to your AJAX handler
      data,
      error: function (xhr) {
        console.log('Error', xhr)
      },
      success: function (response) {
        // Handle the response, e.g., show a success message or update the cart totals
        // console.log(response)
      }
    });
  }

  /** DONE Handler */
  if ($('.shipping__done_select').length) {
    $.get('https://api.cleanbox.co.il/api/Station/Indoor', function (done) {
      let areas = [];
      let uniqueAreas = [];
      let escapedItem = null;

      // Accessing the content of the fetched JavaScript file
      $(done).each(function (i, item) {
        areas.push(item.countryArea);
      });

      // Save unique areas
      uniqueAreas = [...new Set(areas)];

      // Manipulate the data and perform operations here
      $(uniqueAreas).each(function (i, item) {
        escapedItem = item.replace(/"/g, '&quot;');
        $('#shipping_done_area').append(`<option value="${escapedItem}">${item}</option>`);
      });

      /**
       * Area on Change
       * */
      $('#shipping_done_area').on('change', function () {
        const areaValue = $(this).val()
        let cities = [];
        let uniqueCities = [];

        saveDoneFields(areaValue)
        $('#done_message').show()
        $('#cart_to_checkout, .checkout-payment').addClass('disabled')

        if (areaValue) {
          $('#shipping_done_city').prop('disabled', false).val('')
          $('#shipping_done_position').prop('disabled', true).val('')

          $(done).each(function (i, item) {
            if (item.countryArea == areaValue) {
              cities.push(item.city);
            }
          });

          // Clear select field
          $('#shipping_done_city option:not(:first-child)').remove();

          // Save unique cities
          uniqueCities = [...new Set(cities)];

          $(uniqueCities).each(function (i, item) {
            escapedItem = item.replace(/"/g, '&quot;');
            $('#shipping_done_city').append(`<option value="${escapedItem}">${item}</option>`);
          });

          /**
           * City on Change
           * */
          $('#shipping_done_city').on('change', function () {
            const cityValue = $(this).val()
            let streets = []

            saveDoneFields(areaValue, cityValue)
            $('#done_message').show()
            $('#cart_to_checkout, .checkout-payment').addClass('disabled')

            $('#done_station_number').val('')

            if (cityValue) {
              $('#shipping_done_position').prop('disabled', false).val('')

              $(done).each(function (i, item) {
                if (item.countryArea == areaValue && item.city == cityValue) {
                  // Create an object with address and stationNumber properties
                  let streetInfo = {
                    address: item.address,
                    stationNumber: item.stationNumber ? item.stationNumber : 0
                  };

                  // Push the streetInfo object into the streets array
                  streets.push(streetInfo);
                }
              });

              // Clear select field
              $('#shipping_done_position option:not(:first-child)').remove();

              $(streets).each(function (i, item) {
                escapedItem = item.address.replace(/"/g, '&quot;');
                $('#shipping_done_position').append(`<option value="${escapedItem}">${item.address}</option>`);
              });

              /**
               * Street on Change
               * */
              $('#shipping_done_position').on('change', function () {
                const that = $(this)
                const streetValue = $(that).val()
                let numberValue = '0'

                $(streets).each(function (i, item) {
                  if (item.address == streetValue) {
                    numberValue = item.stationNumber ? item.stationNumber : '0'
                  }
                });

                $('#done_station_number').val(numberValue)

                saveDoneFields(areaValue, cityValue, streetValue, numberValue)

                $('.shipping-message').slideUp()
                $('#cart_to_checkout, .checkout-payment').removeClass('disabled')
              })

            } else {
              $('#shipping_done_position').prop('disabled', true).val('')
            }
          })

        } else {
          $('#shipping_done_city').prop('disabled', true).val('')
          $('#shipping_done_position').prop('disabled', true).val('')
        }
      })
    });
  }

  /** Save Order from Cart */
  $('body').on('click', '#cart_create_order', function (e) {
    e.preventDefault();
    let shippingCost = ''
    let shippingMethod = ''
    let data = {}

    $('.shipping_method').each(function (i, item) {
      if ($(item).prop('checked')) {
        shippingCost = $(item).attr('data-cost')
        shippingMethod = $(item).val()
      }

      if ($(item).val() == 'flat_rate:5') {
        $.extend(data, {
          done_area: $('#shipping_done_area').val(),
          done_city: $('#shipping_done_city').val(),
          done_street: $('#shipping_done_position').val(),
          done_station_num: $('#done_station_number').val(),
        })
      }
    })

    $.extend(data, {
      action: 'save_order',
      security: window.geffen.security,
      shipping_method: shippingMethod,
      shipping_cost: shippingCost,
    })

    // AJAX request
    $.ajax({
      url: window.geffen.ajax_url, // WordPress AJAX URL
      type: 'POST',
      data,
      beforeSend: function () {
        $('.lds-ring, .page-overlay').show()
      },
      success: function (response) {
        // Handle the response here
        // console.log(response);
        // You can add further actions on success if needed
      },
      error: function (error) {
        // Handle errors here
        console.error('Error saving order:', error);
      },
      complete: function () {
        $('.lds-ring, .page-overlay').hide()
      }
    });
  });

  /**
   * Save Billing information to user profile
   */
  if ($('#billing_form').length) {
    $('#billing_form').on('submit', function (e) {
      e.preventDefault()
      const formData = $(this).serialize();
      const shippingMethod = getShippingMethodValue();
      let coupons = $('#coupon_codes').val()

      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url, // WordPress AJAX URL
        data: {
          action: 'save_billing_user_profile', // Action name to handle in PHP
          formData: formData, // Serialized form data
          shipping_method: shippingMethod,
          coupons
        },
        beforeSend: function () {
          $('.checkout-ring').fadeIn()
        },
        success: function (response) {
          // Handle the success response
          $('.billing-name').html(response.name)
          $('.billing-city').html(response.city)
          $('.billing-address').html(response.address)

          if ($('.woocommerce-checkout').length) {
            // Handle the success response if needed
            $('#order_review').html(response.review_order)
            $('#shipping_message').slideUp()

            // Update shipping method fields after DOM update
            setTimeout(function() {
              const shippingMethod = getShippingMethodValue();
              if (shippingMethod) {
                updateShippingMethodFields(shippingMethod);
              }
            }, 100);
          }

          $('.popup-content-contactpage, .page-overlay').fadeOut();
          $('#cart_to_checkout, .checkout-payment').removeClass('disabled')
          $('.checkout-ring').fadeOut()
        },
        error: function (xhr, status, error) {
          // Handle errors
          console.error('Error:', error);
        }
      });
    })
  }

  /**
   * Open Shipping Address
   */
  if ($('#shipping_confirm').length) {
    $('#shipping_confirm').on('change', function () {
      $('.shipping__details_shipping').slideToggle()

      let isChecked = $(this).is(':checked');
      let diffAddress = $('#ship-to-different-address-checkbox');

      if (isChecked === true) {
        diffAddress.prop('checked', true);

        if (!$('#shipping_street').val()) {
          $('#shipping_message').slideDown()
          $('#cart_to_checkout, .checkout-payment').addClass('disabled')
        }
      } else {
        diffAddress.prop('checked', false);

        if ($('#billing_street').val()) {
          $('#shipping_message').slideUp()
          $('#cart_to_checkout, .checkout-payment').removeClass('disabled')
        }
      }

      if ($('.woocommerce-cart').length) {
        $.ajax({
          type: 'POST',
          url: window.geffen.ajax_url,
          data: {
            action: 'save_shipping_checkbox',
            isChecked: isChecked ? 'yes' : 'no'
          },
          success: function (response) {
            // Handle the success response if needed
            console.log('Checkbox state saved:', response);
          },
          error: function (xhr, status, error) {
            // Handle errors
            console.error('Error:', error);
          }
        });
      }
    })
  }

  /**
   * Show Subscription popup on Cart Page
   */
  if ($('.show-subscribe-popup').length) {
    $('.show-subscribe-popup').on('click', function (e) {
      e.preventDefault()
      const popup = $('#subscribe_popup .popup-content-contactpage')
      show_popup(popup)
    })
  }

  /**
   * Save Subscription Info
   */
  if ($('#popup_subscribe_form').length) {
    $('#popup_subscribe_form').on('submit', function (e) {
      e.preventDefault();
      const checkbox = $(this).find('#subscribe-offers')
      const url = $(this).attr('data-url')

      if ($(checkbox).is(":checked")) {
        // Create a FormData object from the form
        const formData = $(this).serializeArray()

        // Make an AJAX request to the WordPress backend
        $.ajax({
          type: "POST",
          url: window.geffen.ajax_url, // WordPress AJAX URL
          data: {
            action: "save_subscription", // Action name
            formData // Form data
          },
          success: function (response) {
            // You can perform additional actions based on the server response here
            if (response.success) {
              window.location.href = response.data.url
            }
          },
          error: function (xhr, textStatus, errorThrown) {
            console.error("Error:", errorThrown); // Log any errors
          }
        });
      } else {
        window.location.href = url
      }
    })
  }

  /**
   * Save Shipping information to user profile
   */
  if ($('#shipping_form').length) {
    $('#shipping_form').on('submit', function (e) {
      e.preventDefault()

      const formData = $(this).serialize();
      const shippingMethod = getShippingMethodValue() || '';
      const coupons = $('#coupon_codes').val() || '';

      const data = {
        action: 'save_shipping_user_profile', // Action name to handle in PHP
        formData: formData, // Serialized form data
        shipping_method: shippingMethod,
        coupons: coupons
      }

      save_shipping_data(data)
    })
  }

  // Save shipping data address
  function save_shipping_data(data) {
    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url, // WordPress AJAX URL
      data,
      beforeSend: function () {
        $('.checkout-ring').fadeIn()
      },
      success: function (response) {
        // Handle WordPress AJAX response format (success: true/false)
        let responseData = response;
        if (response.success !== undefined) {
          responseData = response.data || response;
        }

        // Check if response contains error message
        if (response.success === false) {
          alert(response.data || response.message || 'An error occurred while saving data');
          $('.checkout-ring').fadeOut();
          return;
        }

        // Handle the success response
        if (responseData.name) {
          $('.shipping-name').html(responseData.name)
        }
        if (responseData.city) {
          $('.shipping-city').html(responseData.city)
        }
        if (responseData.address) {
          $('.shipping-address').html(responseData.address)
        }

        // Update order review if on checkout page
        if ($('.woocommerce-checkout').length && responseData.review_order) {
          $('#order_review').html(responseData.review_order)
        }

        $('.popup-content-contactpage, .page-overlay').fadeOut();
        $('#cart_to_checkout, .checkout-payment').removeClass('disabled');
        $('#shipping_message').slideUp();
        $('.checkout-ring').fadeOut()
      },
      error: function (xhr, status, error) {
        // Handle errors
        console.error('AJAX Error:', {
          status: status,
          error: error,
          responseText: xhr.responseText,
          statusCode: xhr.status
        });

        let errorMessage = 'An error occurred while saving data';

        // Try to parse error response
        try {
          const errorResponse = JSON.parse(xhr.responseText);
          if (errorResponse.data && errorResponse.data.message) {
            errorMessage = errorResponse.data.message;
          } else if (errorResponse.message) {
            errorMessage = errorResponse.message;
          }
        } catch (e) {
          // Use default error message
        }

        alert(errorMessage);
        $('.checkout-ring').fadeOut();
      }
    });
  }

  // Hide Confirm Message on Single Product Page
  $('body').on('click', '#close_confirm_addcart_out', function (e) {
    e.preventDefault();
    $('#confirm_addcart_popup').fadeOut();
    $('.woocommerce-notices-wrapper').fadeOut();
    $('.wc-block-components-notice-banner__content').fadeOut();
  });

  // Show Product Popup on Freestyle Libre page
  if ($('#show_product_popup').length) {
    scroll('#show_product_popup', '.freestyle-libre2-reader .fixed-block');
  }

  function scroll(id, item) {
    $(window).on('scroll', function () {
      let hT = $(id).offset().top,
        wS = $(this).scrollTop() + 200;

      if (hT > 0) {
        if (wS >= hT) {
          $(item).addClass('active');
        } else {
          $(item).removeClass('active');
        }
      }
    });
  }

  // Count Products on single product
  function calculateProduct(that) {
    let parent = $(that).closest('.calculate-price');
    const items = $(parent).find('.calculate-item');
    const totalQty = $(parent).find('.calculate-total-qty');
    const totalNum = $(parent).find('.calculate-total-price');
    const discountWrap = $(parent).find('.product-total-discount');
    const discountNum = $(parent).find('.calculate-discount');
    let qty = 0
    let price = 0
    let regular = 0

    if ($(items).length) {
      $(items).each(function (i, item) {
        if ($(item).is(":visible")) {
          const value = $(item).find('.qty').val();

          if (value) {
            let priceData = $(item).data('price');
            let regularPriceData = $(item).data('regular');

            let num = parseInt(value);
            let numPrice = parseFloat(priceData);
            let regularNumPrice = parseFloat(regularPriceData);

            qty += num;
            price += num * numPrice;
            regular += num * regularNumPrice;

            if ($('.postid-867').length) {
              if ($(parent).hasClass('package-product')) {
                switch (qty) {
                  case 2:
                    price = 210;
                    break;
                  case 4:
                    price = 399;
                    break;
                }
              }
            }
          }
        }
      })
    }
    $(totalQty).html(qty);
    $(totalNum).html(price);
    if ((regular - price) > 0) {
      $(discountWrap).show();
      $(discountNum).html(regular - price);
    } else {
      $(discountWrap).hide();
    }
  }

  /**
   * Login By Phone Number
   */
  if ($('#login_by_phone').length) {
    $('#login_by_phone').on('submit', function (e) {
      e.preventDefault()

      const form = $(this)
      const phone = $(form).find('#user-tel').val()
      const multiAccount = $(form).find(".user_multi_account:checked").val() || undefined;

      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url,
        data: {
          'action': 'login_by_phone',
          phone,
          account: multiAccount
        },
        beforeSend: function () {
          $(form).find('button[type="submit"]').prop('disabled', true)
        },
        error: function (xmr) {
          console.log('error:', xmr);
        },
        success: function (response) {
          if (response.success) {
            $(form).hide()
            const userID = response.user;
            const userCRM = response.crmUser;
            const isNewUser = response.newUser;
            const club_member = response.club_member;
            $('#login_by_code').show().attr('data-id', userID)
            $('#login_by_code').show().attr('data-crm', userCRM)
            $('#login_by_code').show().attr('data-phone', phone)
            $('#login_by_code').show().attr('data-user', isNewUser)
            $('#login_by_code').show().attr('data-member', club_member)

            if (!isNewUser) {
              $('.contact-form-links-email').show()
            }

            $('.contact-form-resend-phone').html(phone).attr('data-phone', phone)
            $('#resend_sms').attr('data-phone', phone)
          } else {
            $('#login_form_messages').html(response.message).slideDown()

            setTimeout(function () {
              $('#login_form_messages').slideUp()
            }, 3000)
          }
        },
        complete: function () {
          $(form).find('button[type="submit"]').prop('disabled', false)
        },
      })
    })
  }

  /**
   * Send Code to Email
   */
  $('.contact-form-links-email').on('click', function (e) {
    e.preventDefault()
    const that = $(this)
    const userID = $('#login_by_code').attr('data-id')
    $('#login_by_email').attr('data-id', userID)
    $('#login_by_code').hide()
    $('#login_by_email').show()
  })

  $('#login_by_email').on('submit', function (e) {
    e.preventDefault()
    const email = $(this).find('#email_code').val()
    const userID = $(this).attr('data-id')

    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data: {
        'action': 'login_by_email',
        email,
        userID
      },
      beforeSend: function () {
        $('#login_by_email_submit').prop('disabled', true)
      },
      error: function (xmr) {
        console.log('error:', xmr);
      },
      success: function (response) {
        $('#login_form_messages').html(response.message).slideDown()

        setTimeout(function () {
          $('#login_form_messages').slideUp()
        }, 3000)

        if (response.success) {
          $('#login_by_code').show()
          $('#login_by_email').hide()
        }
      },
      complete: function () {
        $('#login_by_email_submit').prop('disabled', false)
      },
    })
  })

  /**
   * Resend SMS
   */
  let resendBlocked = false;

  if ($('#resend_sms').length) {
    $('#resend_sms').on('click', function (e) {
      if (resendBlocked) return false; // Не даём повторный клик

      e.preventDefault();

      const form = $(this).closest('form');
      const phone = $(this).attr('data-phone');
      const $link = $(this);

      resendBlocked = true;
      $link.css({
        'pointer-events': 'none',
        'opacity': 0.5
      });

      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url,
        data: {
          'action': 'login_by_phone',
          phone
        },
        beforeSend: function () {
          $(form).find('button[type="submit"]').prop('disabled', true);
        },
        error: function (xmr) {
          console.log('error:', xmr);
        },
        success: function (response) {
          if (response.success) {
            let userID = response.user ? response.user : '0';
            $('#login_by_code').show().attr('data-id', userID);
          }
        },
        complete: function () {
          $(form).find('button[type="submit"]').prop('disabled', false);

          let seconds = 60;
          let originalText = "שלח שוב";

          $link.text(`שלח שוב בעוד ${seconds} שניות`);

          let timer = setInterval(function () {
            seconds--;
            if (seconds > 0) {
              $link.text(`שלח שוב בעוד ${seconds} שניות`);
            } else {
              clearInterval(timer);
              $link.text(originalText);
              $link.css({
                'pointer-events': '',
                'opacity': ''
              }); // Возвращаем кликабельность
              resendBlocked = false;
            }
          }, 1000);
        },
      });
    });
  }

  /**
   * Go back to input phone number
   */
  if ($("#back_to_phone").length) {
    $('#back_to_phone').on('click', function (e) {
      e.preventDefault()
      $('#login_by_code').hide()
      $('#login_by_phone').show()
    })
  }

  /**
   * Activate Verification Code
   */
  if ($('#login_by_code').length) {
    $('#login_by_code').on('submit', function (e) {
      e.preventDefault()

      const form = $(this)
      const code = $(form).find('#phone_code').val()
      const user = $(form).attr('data-id')
      const userCRM = $(form).attr('data-crm')
      const phone = $(form).attr('data-phone')
      const newUser = $(form).attr('data-user')

      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url,
        data: {
          'action': 'login_by_code',
          code,
          user,
          userCRM,
          phone
        },
        beforeSend: function () {
          $(form).find('button[type="submit"]').prop('disabled', true)
        },
        error: function (xmr) {
          console.log('error:', xmr);
        },
        success: function (response) {
          if (response.success && newUser == 'true') {
            $('#login_form_messages').html(response.message).slideDown()
            const isMember = $('#login_by_code').attr('data-member')

            if (isMember === "true") {
              $('#popup_register_form').find('#form-club-member').hide()
            } else {
              $('#popup_register_form').find('#form-club-member').show()
            }

            setTimeout(function () {
              $('#login_form_messages').slideUp()
            }, 3000)

            setTimeout(function () {
              $('#popup_register_form')
                .find('#user-tel')
                .val(response.phone)
                .prop('readonly', true)
                .addClass('not-empty')

              $('#popup_login_form').hide()
              $('#popup_register_form').show()
              $('#popup_register_form').find('#user-id').val(response.user)
              $('#popup_register_form').find('#user-crm').val(response.userCRM)
              $('#popup_register_form').find('#user-crm').val(response.userCRM)
            }, 3000)
          } else if (response.success) {
            window.location.href = document.URL;
          } else if (!response.success && response.blocked) {
            $('#login_form_messages').html(response.message).slideDown()

            setTimeout(function () {
              $('#login_form_messages').slideUp()
              window.location.href = "/";
            }, 3000)
          } else {
            $('#login_form_messages').html(response.message).slideDown()

            setTimeout(function () {
              $('#login_form_messages').slideUp()
            }, 3000)
          }
        },
        complete: function () {
          $(form).find('button[type="submit"]').prop('disabled', false)
        },
      })
    })
  }

  /**
   * Advertise Popup
   */
  setTimeout(function () {
    // Check if the cookie is set
    if (document.cookie.indexOf('popupShown=1') === -1) {
      // Show the popup
      const popup = $('#adv_popup .popup-content-contactpage')
      $(popup).fadeIn()
      $('.adv-overlay').fadeIn()

      // Set a cookie to remember that the popup was shown
      $('#adv_popup .close-contactpage, .adv-overlay').on('click', function () {
        // Set the cookie to expire in 1 day (you can adjust the duration)
        var expirationDate = new Date();
        expirationDate.setDate(expirationDate.getDate() + 1);

        document.cookie = 'popupShown=1; expires=' + expirationDate.toUTCString();

        // Hide the popup
        $(popup).fadeOut()
        $('.adv-overlay').fadeOut()
      });
    }

    // Show the Registration popup if user don't have an email
    if (document.cookie.indexOf('popupRegister=1') === -1) {
      const popup = $('#continue_registration_popup .popup-content-contactpage')
      if ($(popup).length) {
        $(popup).fadeIn()
        $('.page-overlay').fadeIn()
        // Set the cookie to expire in the distant future (e.g., 10 years)
        var expirationDate = new Date();
        expirationDate.setFullYear(expirationDate.getFullYear() + 10);

        document.cookie = 'popupRegister=1; expires=' + expirationDate.toUTCString();
      }
    }

  }, 1000);

  /**
   * User Registration
   */
  if ($('#popup_register_form').length) {
    $('#popup_register_form').on('submit', function (e) {
      e.preventDefault()

      const form = $(this)
      const username = $(form).find('#username').val()
      const lastname = $(form).find('#lastname').val()
      const phone = $(form).find('#user-tel').val()
      const email = $(form).find('#user-mail').val()
      const newUser = $(form).find('#user-id').val()
      const userCRM = $(form).find('#user-crm').val()
      const offers = $(form).find('#offers').prop('checked');
      const privacy = $(form).find('#privacy').prop('checked');

      $.ajax({
        type: 'POST',
        url: window.geffen.ajax_url,
        data: {
          'action': 'geffen_update_user',
          'registration_nonce': window.geffen.registration_nonce,
          username,
          lastname,
          userCRM,
          email,
          phone,
          newUser,
          offers,
          privacy,
        },
        beforeSend: function () {
          $(form).find('button[type="submit"]').prop('disabled', true)
        },
        error: function (xmr) {
          console.log('error:', xmr);
        },
        success: function (response) {
          if (response.success) {
            window.location.href = document.URL;
          } else {
            $('#login_form_messages').html(response.data.message).slideDown()

            setTimeout(function () {
              $('#login_form_messages').slideUp()
            }, 3000)

            $(form).find('button[type="submit"]').prop('disabled', false)
          }
        },
      })
    })
  }
  /* */

  document.addEventListener('DOMContentLoaded', function () {
    var closeBtn = document.getElementById('close_confirm_addcart_out');
    var confirmPopup = document.getElementById('confirm_addcart_popup');

    if (closeBtn && confirmPopup) {
      closeBtn.addEventListener('click', function () {
        confirmPopup.style.display = 'none'; // или используйте 'hidden' для скрытия
      });
    }
  });

  /**
   * Show Image in Product Page on hover
   */
  if ($('.var-product-image').length) {
    $('.var-product-image')
      .on('mouseenter', function () {
        const img = $(this).attr('src')

        $('.hovered-image').find('img').attr('src', img)
        $('.hovered-image').fadeIn()
      })
      .on('mouseleave', function () {
        $('.hovered-image').fadeOut()
      })
  }

  /**
   * Open/Close Cities List
   */
  $('.billing-cities-name').on('click', function () {
    const parent = $(this).closest('.billing-cities')
    const list = $(parent).find('.billing-cities-list')

    $(list).toggleClass('active')
  })

  /**
   * Choose City
   */
  $('.billing-cities-item').on('click', function () {
    const block = $(this)
    if (!$(this).hasClass('prohibited')) {
      const cityValue = $(this).attr('data-city')
      const parent = $(this).closest('.label-top')
      const name = $(parent).find('.billing-cities-name')
      const city = $(parent).find('.city')
      const list = $(parent).find('.billing-cities-list')

      $(name).html(cityValue)
      $(city).val(cityValue)
      $(city).addClass('not-empty')
      $(list).removeClass('active')
    } else {
      $('.prohibited-message').slideUp()

      const message = $(block).find('.prohibited-message')

      if (!$(message).is(':visible')) {
        $(message).slideDown()
      }
    }
  })

  /**
   * Search on Cities List
   */
  if ($('.billing-cities-search').length) {
    $('.billing-cities-search').on('input', function () {
      const block = $(this).closest('.billing-cities-list');
      const cities = $(block).find('.billing-cities-item');
      const searchValue = $(this).val().toLowerCase(); // Convert the input value to lowercase for case-insensitive comparison

      $(cities).each(function (i, item) {
        const city = $(item).attr('data-city').toLowerCase(); // Convert the city name to lowercase

        // Check if the search value is not found in the city name
        if (city.indexOf(searchValue) === -1) {
          $(item).hide(); // Hide the city item if it doesn't match the search
        } else {
          $(item).show(); // Show the city item if it matches the search
        }
      });
    });
  }

  // Generate Cities List to Post Type "City"
  $('#generate_cities').on('click', function () {
    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data: {
        'action': 'generate_cities'
      },
      error: function (xmr) {
        console.log('error:', xmr);
      },
      success: function (response) {
        console.log(response)
      },
    })
  })

  /**
   * Site Rating
   */
  $('.rating-open').on('click', function (e) {
    e.preventDefault()

    if ($('#site_rating').hasClass('active')) {
      $('#site_rating').addClass('closed')
      $('.rating-open-arrow').removeClass('active')
      $('#site_rating').removeClass('active')
    } else {
      $('#site_rating').addClass('active')
      $('#site_rating').removeClass('closed')
      $('.rating-open-arrow').addClass('active')
    }
  })

  $('#site_rating_form').on('submit', function (e) {
    e.preventDefault()

    const that = $(this)

    let data = {
      action: 'geffen_site_rating'
    }

    // Serialize form data and concatenate it with the existing data object
    const formData = $(that).serialize();
    data.formData = formData;

    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data,
      success: function (response) {
        $(that).find('textarea, input').val('');
        $(that).find('input[type="radio"], input[type="checkbox"]').prop('checked', false);

        $('#site_rating').addClass('closed')
        $('.rating-open-arrow').removeClass('active')
        $('#site_rating').removeClass('active')
      },
    });
  })

  /************************ ONE PAGE CHECKOUT ****************************/
  /**
   * Remove product from checkout
   */
  $('body').on('click', '.remove-from-cart-btn', function (e) {
    e.preventDefault(); // Prevent default link behavior

    const productId = $(this).data('product-id');
    const itemKey = $(this).data('item-key'); // Get the item key from data attribute
    const nonce = $('#woocommerce-cart-nonce').val(); // Get the nonce from data attribute

    // AJAX request to remove the item
    $.ajax({
      type: 'post',
      url: window.geffen.ajax_url, // AJAX URL
      data: {
        action: 'remove_from_cart', // Action to trigger in WordPress
        item_key: itemKey, // Item key to remove
        nonce: nonce, // Nonce for security verification
      },
      beforeSend: function () {
        // Show Preloader
        $('.lds-ring, .checkout-overlay').fadeIn()
      },
      success: function (response) {
        // Check if the cart is empty after removing the item
        const isCartEmptyAfterRemoval = $('.geffen-checkout-product-item').length === 1;

        // If the cart is empty after removal, redirect to the cart page
        if (isCartEmptyAfterRemoval) {
          window.location.href = '/cart/';
        } else {
          // Remove product
          $('#product-' + productId).remove();

          // Hide Preloader
          $('.lds-ring, .checkout-overlay').fadeOut()
        }
      },
      error: function (xhr, status, error) {
        // Optionally, handle errors here
        console.error(xhr.responseText);
      }
    });
  });

  $('body').on('click', '.geffen-remove-coupon', function () {
    const btn = $(this)
    const couponCode = $(btn).data('coupon');
    const shippingMethod = getShippingMethodValue();
    let coupons = $('#coupon_codes').val()

    let couponsArray = coupons.split(',')
    var indexToRemove = couponsArray.indexOf(couponCode);
    if (indexToRemove !== -1) {
      couponsArray.splice(indexToRemove, 1);
    }
    $('#coupon_codes').val(couponsArray.join(','))
    const couponsString = $('#coupon_codes').val()

    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data: {
        action: 'remove_coupon',
        coupon_code: couponsString,
        shipping_method: shippingMethod,
      },
      beforeSend: function () {
        // Show Preloader
        $('.lds-ring, .checkout-overlay').fadeIn()
        $(btn).prop('disabled', true)
      },
      success: function (response) {
        // Refresh the cart totals or any other necessary action
        $('#order_review').html(response.data.review_order)
        $(btn).prop('disabled', false)

        // Update shipping method fields after DOM update
        setTimeout(function() {
          const shippingMethod = getShippingMethodValue();
          if (shippingMethod) {
            updateShippingMethodFields(shippingMethod);
          }
        }, 100);

        // Hide Preloader
        $('.lds-ring, .checkout-overlay').fadeOut()

      },
    });
  })

  // Go to payment
  $('#checkout_payment').on('click', function (e) {
    e.preventDefault()
    const btn = $(this)
    const form = $('#geffen_checkout_form')
    const subscribe = $('#subscribe-offers')

    // Get shipping method with fallback
    let value = getShippingMethodValue();

    // Validate shipping method exists
    if (!value) {
      alert('אנא בחרו שיטת משלוח');
      return;
    }

    // Ensure hidden fields are updated before form submission
    updateShippingMethodFields(value);

    const shippingFieldsIsEmpty = shipping_mandatory(value);

    if (shippingFieldsIsEmpty) {
      return;
    }

    let data = {
      action: 'geffen_create_order'
    }

    if (subscribe.length && subscribe.is(':checked')) {
      data.subscribed = 'on';
    }

    // Serialize form data and concatenate it with the existing data object
    // Include shipping method in serialization if not already included
    let formData = form.serialize();

    // Ensure shipping method is included in form data
    if (formData.indexOf('shipping_method') === -1) {
      formData += '&shipping_method[0]=' + encodeURIComponent(value);
    }

    // Ensure hidden fields are included
    const titleValue = $('#shipping_method_title').val();
    const priceValue = $('#shipping_method_price').val();

    if (titleValue && formData.indexOf('shipping_method_title') === -1) {
      formData += '&shipping_method_title=' + encodeURIComponent(titleValue);
    }

    if (priceValue && formData.indexOf('shipping_method_price') === -1) {
      formData += '&shipping_method_price=' + encodeURIComponent(priceValue);
    }

    data.formData = formData;

    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data,
      beforeSend: function () {
        // Show Preloader
        $('.checkout-ring').fadeIn()
        $(btn).prop('disabled', true)
      },
      success: function (response) {
        console.log(response)
        if (response.success) {
          if (response.data.payment) {
            window.location.href = response.data.paymentlink;
          } else {
            window.location.href = response.data.thankyoulink;
          }
        } else {
          // Show error message
          const errorMessage = response.data && response.data.message
            ? response.data.message
            : 'אירעה שגיאה בעת יצירת ההזמנה. אנא נסו שוב.';

          alert(errorMessage);

          // If error is related to shipping, show shipping message
          if (response.data && response.data.message && response.data.message.indexOf('משלוח') !== -1) {
            $('#shipping_message').slideDown()
          }

          $('.checkout-ring').fadeOut()
          $(btn).prop('disabled', false)
        }
      },
      error: function (xhr, status, error) {
        console.error('AJAX Error:', error);
        alert('אירעה שגיאה בעת יצירת ההזמנה. אנא נסו שוב.');
        $('.checkout-ring').fadeOut()
        $(btn).prop('disabled', false)
      },
    });
  })

  // Membership
  $('#join_club').on('click', function (e) {
    e.preventDefault()
    const btn = $(this)
    const subscribe = $('#subscribe-offers')

    let data = {
      action: 'geffen_join_club'
    }

    if (subscribe.length && subscribe.is(':checked')) {
      data.subscribed = 'on';
    }

    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data,
      beforeSend: function () {
        // Show Preloader
        $('.checkout-ring').fadeIn()
        $(btn).prop('disabled', true)
      },
      success: function (response) {
        if (response.success) {
          location.reload();
        }

        // // Hide Preloader
        $('.checkout-ring').fadeOut()
        $(btn).prop('disabled', false)
      },
    });
  })
  // Update product quantity
  function update_product_items(productKey, quantity, btn) {
    // Make an AJAX request
    $.ajax({
      type: 'POST',
      url: window.geffen.ajax_url,
      data: {
        action: 'update_chechout_product_items',
        item_key: productKey,
        quantity,
        shipping_method: getShippingMethodValue(),
        coupon_codes: $('#coupon_codes').val(),
        nonce: $('#woocommerce-cart-nonce').val(), // Nonce for security verification
      },
      beforeSend: function () {
        // Show Preloader
        $('.lds-ring, .checkout-overlay').fadeIn()
        $(btn).prop('disabled', true)
      },
      success: function (response) {
        $('#checkout_form_items').html(response.data.form_items)
        $('#order_review').html(response.data.review_order)
        $(btn).prop('disabled', false)

        // Update shipping method fields after DOM update
        setTimeout(function() {
          const shippingMethod = getShippingMethodValue();
          if (shippingMethod) {
            updateShippingMethodFields(shippingMethod);
          }
        }, 100);

        // Hide Preloader
        $('.lds-ring, .checkout-overlay').fadeOut()
      },
      error: function (xhr, status, error) {
        // This function runs when there's an error in the request
        console.log("אירעה שגיאה: " + xhr);
      },
    });
  }

  // Remove Message
  setTimeout(function () {
    $('.woocommerce-message').slideUp()
  }, 5000)
  /** END ONE PAGE CHECKOUT **/

  // Handle changes to the product variation selection
  $('#variation_id').on('change', function (e) {
    e.preventDefault();
    const value = $(this).val();

    // Reset quantity inputs and total displays
    $('.qty').val(0);
    $('.product-sum-total-qty, .product-sum-total-price-num').text(0);

    // Hide all variation quantity items and disable their inputs
    $('.variation-product-quantity-item').addClass('is-hidden');
    $('.variation-product-quantity-item').find('input').prop('disabled', true);

    // Show the quantity item for the selected variation and enable its inputs
    $(`.variation-product-quantity-item[data-product="${value}"]`).removeClass('is-hidden');
    $(`.variation-product-quantity-item[data-product="${value}"]`).find('input').prop('disabled', false);
  })

  // Handle changes to the case variation selection
  $('#case_variation_id').on('change', function (e) {
    e.preventDefault();
    const value = $(this).val();

    // Deactivate all case variations and activate the selected one
    $('.case-second-var').removeClass('active');
    const activeElement = $(`.case-second-var[data-product="${value}"]`).addClass('active');

    // Check the first input inside the active element
    activeElement.find('input').first().prop('checked', true).change();
  })

  // Handle clicks on case package selection
  $('.case-package-select').on('change', function (e) {
    e.preventDefault();
    const parent = $(this).closest('.product-info-tab-content');
    const value = $(this).val();

    // Hide all case quantity elements and show the one corresponding to the clicked package
    $(parent).find('.variation-product-quantity-item').addClass('is-hidden');
    $(parent).find(`.variation-product-quantity-item[data-product="${value}"]`).removeClass('is-hidden');

    $(parent).find('.qty').val(0);
    $(parent).find('.product-sum-total-qty, .product-sum-total-price-num').text(0);
  })
});

}(jQuery));
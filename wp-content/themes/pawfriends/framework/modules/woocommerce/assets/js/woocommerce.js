(function($) {
    'use strict';

    var woocommerce = {};
    mkdf.modules.woocommerce = woocommerce;

    woocommerce.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdfOnDocumentReady() {
        mkdfInitQuantityButtons();
        mkdfInitSelect2();
	    mkdfInitSingleProductLightbox();
		mkdfAddingToWishlist();
		mkdfQuickViewPosition().init();
    }
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function mkdfInitQuantityButtons() {
		$(document).on('click', '.mkdf-quantity-minus, .mkdf-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.mkdf-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('mkdf-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function mkdfInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.mkdf-woocommerce-page .mkdf-content .variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
		
		var defaultMonsterWidgets = $('.widget.widget_archive select, .widget.widget_categories select, .widget.widget_text select');
		if (defaultMonsterWidgets.length && typeof defaultMonsterWidgets.select2 === 'function') {
			defaultMonsterWidgets.select2();
		}
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function mkdfInitSingleProductLightbox() {
		var item = $('.mkdf-woo-single-page.mkdf-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof mkdf.modules.common.mkdfPrettyPhoto === "function") {
				mkdf.modules.common.mkdfPrettyPhoto();
			}
		}
	}

	/*
	 ** Init Add to Wishlist message pop-up
	 */
	function mkdfAddingToWishlist() {
		var wishlistButtons = $('.add_to_wishlist');

		if (wishlistButtons.length) {
			wishlistButtons.on('click', function(){
				var wishlistButton = $(this),
					wishlistItem,
					wishlistItemOffset,
					heightAdj,
					widthAdj;

				var wishlistMsg = $('#yith-wcwl-popup-message');

				//absolute centering over added item
				if (wishlistButton.closest('.mkdf-pli').length) {
					wishlistItem = wishlistButton.closest('.mkdf-pli');            // product list shortcode
				} else if (wishlistButton.closest('.mkdf-plc-item').length) {
					wishlistItem = wishlistButton.closest('.mkdf-plc-item');       // product carousel shortcode
				} else if (wishlistButton.closest('.product').length) {
					wishlistItem = wishlistButton.closest('.product');              // WooCommerce template
				}

				wishlistItemOffset = wishlistItem.find('img').offset();
				heightAdj = wishlistItem.find('img').height()/2;
				widthAdj = wishlistItem.find('img').width()/2;

				$(document).on('added_to_wishlist', function(){
					wishlistMsg.css({
						'top': wishlistItemOffset.top + heightAdj,
						'left': wishlistItemOffset.left + widthAdj,
					});

					setTimeout(function(){
						wishlistMsg.stop().addClass('mkdf-wishlist-vanish-out');
						wishlistMsg.one('webkitAnimationEnd oanimationend msAnimationEnd animationend' ,function(){
							wishlistMsg.removeClass('mkdf-wishlist-vanish-out');
						});
					}, 300);
				});
			});
		}
	}

	function mkdfQuickViewPosition() {

		return {
			init: function () {
				//trigger defined in yith-woocommerce-quick-view\assets\js\frontend.js, after quick view is returned
				$(document).on('qv_loader_stop',function(){

					$('.yith-wcqv-wrapper').css('top', mkdf.scroll+20); //positioning popup on screens smaller than ipad portrait
				});
			}
		}
	}

})(jQuery);
jQuery(document).ready(function() {

	var ask_disclaimer = 1; // Disclaimer popup to show

	// Click on Add To Cart Button on Shop Page
	jQuery("a."+wpd_localize.wpd_add_cart_class).on('click', function(e) {

		if( wpd_localize.wpd_discl_general_activate != 'yes' ) // Disclaimer Message is turned off
			return true;

		var prodId = jQuery(this).data("product_id");
		var check = jQuery("#check" + prodId).val();
		var cookie = 'product-' + prodId;

		if (ask_disclaimer == 0) { // Don't Show Disclaimer Message
			ask_disclaimer = 1;
			console.log('test');
			return true; /// Skip Dislaimer Message
		}

		var disclaimer_msg = wpd_localize.wpd_general_discl_msg;
		e.preventDefault();
		e.stopPropagation();

		var $thisbutton = jQuery(this);

		alertify.set({
			buttonReverse: true,
			labels: {
				ok: wpd_localize.wpd_discl_accept_btn,
				cancel: wpd_localize.wpd_discl_reject_btn,
			}
		});
		alertify.confirm(disclaimer_msg, function(e) {

			var ajaxurl = wpd_localize.wpd_admin_ajax_url;
			var path = jQuery(this).attr('href');
			var prodId = jQuery(this).data("product_id");
			var check = jQuery("#check" + prodId).val();

			if (e) {
				ask_disclaimer = 0;
				$thisbutton.trigger('click');
			} else {
				window.open(wpd_localize.wpd_general_reject_url,'_self');
			}
		});
	});

	// Disclaimer Single Product Page
	jQuery( ".cart" ).submit(function( e ) {
		if( wpd_localize.wpd_discl_general_activate != 'yes' ) // Disclaimer Message is turned off
			return true;

		e.preventDefault();
		e.stopPropagation();

		var ajaxurl = wpd_localize.wpd_admin_ajax_url;
		var url = wpd_localize.wpd_general_reject_url;

		alertify.set({
			buttonReverse: true,
			labels: {
				ok: wpd_localize.wpd_discl_accept_btn,
				cancel: wpd_localize.wpd_discl_reject_btn,
			}
		});

		alertify.confirm(wpd_localize.wpd_general_discl_msg, function(e) {
			if (e) {
				var prodId = wpd_localize.wpd_current_prod_id;

				var qty = jQuery('input[name=quantity]').val();

				jQuery.get( wpd_localize.wpd_site_url+ '/?post_type=product&add-to-cart='+prodId+'&quantity='+qty, function() {
					alertify.success('Added to cart');

					if (wpd_localize.wpd_cart_redirect_after_add == 'yes') {
						window.location = wpd_localize.wpd_site_url+'/?page_id='+wpd_localize.wpd_woo_cart_page_id;
					}
				});
			} else {
				// user clicked "cancel"
				if (url)
					window.location = url;
			}
		});
	});
});
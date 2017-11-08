var MainLink = (function () {

	'use strict';

	var module              = {};
	var el                  = {};
	var trackerStandardName = [
        'Search', 'AddToWishlist',
        'ViewContent', 'AddToCart',
        'InitiateCheckout','Purchase',
        'Lead', 'AddPaymentInfo',
        'CompleteRegistration'
	];
	var userAgent           = {
		android: navigator.userAgent.match(/Android/i),
		webOs: navigator.userAgent.match(/webOS/i),
		ipad: navigator.userAgent.match(/iPad/i),
		ipod: navigator.userAgent.match(/iPod/i),
		iphone: navigator.userAgent.match(/iPhone/i),
		blackberry: navigator.userAgent.match(/BlackBerry/i),
		windowsPhone: navigator.userAgent.match(/Windows Phone/i)
	};

	// Initialize Report
	module.init = function () {
		module.initSelector();
		module.initFacebookPixel();
		module.buttonCopyClipborad();
		module.initTooltipClipboard();
		module.checkPageType();
		module.trimmerMessage();
	};

	// Init Selector
	module.initSelector = function() {
		el.telegramInput        = $('#input-id');
		el.buttonClipboard      = '#button-clipboard';
		el.link                 = $('#link');
		el.clickButton			= $('#click-type-button');
		el.textarea             = $('textarea');
	};


	// trimmer whitespace textarea
	module.trimmerMessage = function () {
		el.textarea.each(function(){
            $(this).val($(this).val().trim());
	    });
	};

	// init fb pixel
	module.initFacebookPixel = function() {
        var pixelId     = el.link.attr('data-pixel');
        var pixelEvents = el.link.attr('data-pageevent');
		! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }
        (window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', pixelId.toString());
        fbq('track', pixelEvents.toString());
    };

	// init clipboard button copy
	module.buttonCopyClipborad =  function() {

		var clipboard = new Clipboard( el.buttonClipboard );

		// on success copy clipboard
		clipboard.on('success', function(e) {

			// show tooltip
			module.setTooltip('copied');

			// hide tooltip
			module.hideTooltip();

			// clear
		    e.clearSelection();
		});


		// on error copy clipboard
		clipboard.on('error', function(e) {

			// show error tooltip
			module.setTooltip('Failed!');

			// hide error tooltip
			module.hideTooltip();
		});
	};

	// tooltip clipboard
	module.initTooltipClipboard = function () {
		$(el.buttonClipboard).tooltip({
		  	trigger: 'click',
		  	placement: 'top'
		});
	};

	// set tooltip on copy clipboard success
	module.setTooltip = function (message) {
	  $(el.buttonClipboard).tooltip('hide')
						   .attr('data-original-title', message)
						   .tooltip('show');
	};

	// hide tooltip on copy clipboard success
	module.hideTooltip = function () {
	  setTimeout(function() {
	    $(el.buttonClipboard).tooltip('hide');
	  }, 1000);
	};

	// check redirect page true/false
	module.checkPageType = function () {
		var redirect = el.link.attr('data-redirect');

		switch (redirect) {
			case "true":
				// init redirect type
				module.redirectType();
				break;

			case "false":
				// init click type
				module.clickType();
				break;

			default:
				break;
		}
	};

	// rdirect page
	module.redirectType = function () {
		var platform = el.link.attr('data-platform');

		switch (platform) {
			case "sms":
				module.smsRedirect();
				break;

			case "wa":
				module.waRedirect();
				break;

			case "bbm":
				module.bbmRedirect();
				break;

			case "telegram":
				module.telegramRedirect();
				break;

			default:
				break;
		}
	};

	// sms redirect
	module.smsRedirect = function () {
		var idNumber = el.link.attr('data-number');
		var prefix = 'sms://'+idNumber;


      	// trigger to open app
		module.triggerOpenLink(prefix);
	};

	// wa redirect
	module.waRedirect = function () {
		var idNumber        = el.link.attr('data-number');
		var prefix;

	    // Android and iphone
		if ( userAgent.android  || userAgent.iphone || userAgent.ipad || userAgent.ipod ){

	        prefix = 'https://api.whatsapp.com/send?phone='+idNumber;

	    // pc dekstop
	    } else {

	        prefix = 'https://web.whatsapp.com/send?phone='+idNumber;
	    }


		// trigger to open app
		module.triggerOpenLink(prefix);
	};

	// bbm redirect
	module.bbmRedirect = function () {
		var idNumber = el.link.attr('data-number');
		var prefix = 'bbmi://'+idNumber;

      	// trigger to open app
		module.triggerOpenLink(prefix);
	};

	// telegram redirect
	module.telegramRedirect = function () {

		var idNumber = el.link.attr('data-number');

		var prefix = "https://telegram.me/" + idNumber;

		// trigger to open app
		module.triggerOpenLink(prefix);
	};

	// open app
	module.triggerOpenLink = function (prefix) {

		// var buttonId = "button-open-app";
		// var buttonId = "button-open-app";

		// var button   = `<a href="${prefix}" id="${buttonId}"></a>`;

		// $('body').append(button);

		window.setTimeout(function() {

			// var thisButton = $('body').find('#'+buttonId);
			// var thisButton = $('#open-app');

			// thisButton[0].click();

			// window.open('http://www.example.com?ReportID=1', '_blank');

        }, 3000);
	};

	// click button
	module.clickType = function () {
		el.clickButton.on('click', function() {

			// defined button event
			var buttonEvent = el.link.attr('data-buttonevent');

			// disabled button
			$(this).text('loading...');
			$(this).attr('disabled','disabled');

			// apply tracking events
			module.trackButtonEvents(buttonEvent);

			// redirect to link
			module.redirectType();

		});
	};

	// tracking pixel events on button
	module.trackButtonEvents = function (buttonEvent) {

		// set track variable
		var track;

		// convert tostrong button events
		var event = buttonEvent.toString();

		// check if button events is in tracker standara
		if (buttonEvent in trackerStandardName) {
			track = "track";
		} else {
			track = "trackCustom";
		}

		// fire track to facebook pixel
		fbq(track, event);
	};

	return module;
})();

jQuery(document).ready(function($) {
	MainLink.init();
});

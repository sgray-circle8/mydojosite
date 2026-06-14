jQuery.noConflict();

(function initializeProject($) {
	$(document).ready(() => {
		const searchField = $('#SearchForm_SearchForm_Search');
		const defaultValue = searchField.val();

		const menu = $('.header .primary ul');
		let mobile = false;
		let changed = false;

		const menuWidthCheck = () => {
			const headerW = $('header .inner').width();
			const elementsW = menu.width() + $('.brand').width();

			if ((headerW < elementsW) || ($(window).width() <= 768)) {
				$('body').addClass('tablet-nav');
			} else {
				$('body').removeClass('tablet-nav');
			}

			const mobileOld = mobile;
			if ($('#media-query-trigger').css('visibility') === 'hidden') {
				mobile = false;
			} else {
				mobile = true;
			}

			if (mobileOld !== mobile) {
				changed = true;
			} else {
				changed = false;
			}
		};

		$('#SearchForm_SearchForm_action_results').val('L');

		searchField.focus(function handleFocus() {
			$(this).addClass('active');
			if (searchField.val() === defaultValue) {
				searchField.val('');
			}
		});

		searchField.blur(() => {
			if (searchField.val() === '') {
				searchField.val(defaultValue);
			}
		});

		if (!$.browser.msie || ($.browser.msie && (parseInt($.browser.version, 10) > 8))) {
			const searchBarButton = $("span.search-dropdown-icon");
			const searchBar = $('div.search-bar');
			const menuButton = $("span.nav-open-button");

			$('body').append('<div id="media-query-trigger"></div>');

			menuWidthCheck();

			$(window).resize(() => {
				menuWidthCheck();

				if (!mobile) {
					menu.show();
					searchBar.show();
				} else if (changed) {
					menu.hide();
					searchBar.hide();
				}
			});

			searchBarButton.click(() => {
				menu.slideUp();
				searchBar.slideToggle(200);
			});

			menuButton.click(() => {
				searchBar.slideUp();
				menu.slideToggle(200);
			});
		}
	});

	// ---------------------------------------------------------
	jQuery.uaMatch = function matchUserAgent(ua) {
		const userAgent = ua.toLowerCase();

		const match = /(chrome)[ /]([\w.]+)/.exec(userAgent) ||
			/(webkit)[ /]([\w.]+)/.exec(userAgent) ||
			/(opera)(?:.*version|)[ /]([\w.]+)/.exec(userAgent) ||
			/(msie) ([\w.]+)/.exec(userAgent) ||
			userAgent.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(userAgent) ||
			[];

		return {
			browser: match[1] || "",
			version: match[2] || "0"
		};
	};

	const matched = jQuery.uaMatch(navigator.userAgent);
	const browser = {};

	if (matched.browser) {
		browser[matched.browser] = true;
		browser.version = matched.version;
	}

	if (browser.chrome) {
		browser.webkit = true;
	} else if (browser.webkit) {
		browser.safari = true;
	}

	jQuery.browser = browser;

	jQuery.sub = function createJQuerySub() {
		function JQuerySub(selector, context) {
			/* eslint-disable new-cap */
			return new JQuerySub.fn.init(selector, context);
			/* eslint-enable new-cap */
		}
		jQuery.extend(true, JQuerySub, this);
		JQuerySub.superclass = this;

		JQuerySub.fn = this();
		JQuerySub.prototype = JQuerySub.fn;

		JQuerySub.fn.constructor = JQuerySub;
		JQuerySub.sub = this.sub;

		const RootJQuerySub = JQuerySub(document);

		JQuerySub.fn.init = function init(selector, context) {
			let internalContext = context;
			if (internalContext && internalContext instanceof jQuery && !(internalContext instanceof JQuerySub)) {
				internalContext = JQuerySub(internalContext);
			}

			return jQuery.fn.init.call(this, selector, internalContext, RootJQuerySub);
		};
		JQuerySub.fn.init.prototype = JQuerySub.fn;
		return JQuerySub;
	};

}(jQuery));
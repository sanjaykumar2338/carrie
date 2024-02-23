(function($) {
	"use strict";
	/**
	Core script to handle the entire theme and core functions
	**/
	var LeMars = function(){
		/* Search Bar ============ */

		var screenWidth = $( window ).width();

		/* One Page Layout ============ */
		var onePageLayout = function() {
			var headerHeight =   parseInt($('.onepage').css('height'), 10);
			$(".scroll").unbind().on('click',function(event)
			{
				event.preventDefault();

				if (this.hash !== "") {
					var hash = this.hash;
					var seactionPosition = $(hash).offset().top;
					var headerHeight =   parseInt($('.onepage').css('height'), 10);


					$('body').scrollspy({target: ".navbar", offset: headerHeight+2});

					var scrollTopPosition = seactionPosition - (headerHeight);

					$('html, body').animate({
						scrollTop: scrollTopPosition
					}, 800, function(){

					});
				}
			});
			if(jQuery(".scroll-bar").length > 0){
				$(".scroll-bar").unbind().on('click',function(event)
				{
					event.preventDefault();

					if (this.hash !== "") {
						var hash = this.hash;
						var seactionPosition = $(hash).offset().top;
						var headerHeight =   parseInt($('.onepage').css('height'), 10);


						$('body').scrollspy({target: ".navbar", offset: headerHeight+2});

						var scrollTopPosition = seactionPosition - (headerHeight) + 500;

						$('html, body').animate({
							scrollTop: scrollTopPosition
						}, 800, function(){

						});
					}
				});
			}
			$('body').scrollspy({target: ".navbar", offset: headerHeight + 2});
		}

		/* Header Height ============ */
		var handleResizeElement = function(){
			$('.header').css('height','');
			var headerHeight = $('.header').height();
			$('.header').css('height', headerHeight);
		}

		/* Load File ============ */
		var dzTheme = function(){

			if(screenWidth <= 991 ){
				jQuery('.navbar-nav > li > a, .sub-menu > li > a').unbind().on('click', function(e){
					if(jQuery(this).parent().hasClass('open'))
					{
						jQuery(this).parent().removeClass('open');
					}
					else{
						jQuery(this).parent().parent().find('li').removeClass('open');
						jQuery(this).parent().addClass('open');
					}
				});
			}
		}

		/* Magnific Popup ============ */
		var MagnificPopup = function(){
			/* magnificPopup function */
			jQuery('.mfp-gallery').magnificPopup({
				delegate: '.mfp-link',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						return item.el.attr('title') + '<small></small>';
					}
				}
			});
			/* magnificPopup function end */

			/* magnificPopup for paly video function */
			jQuery('.video').magnificPopup({
				type: 'iframe',
				iframe: {
					markup: '<div class="mfp-iframe-scaler">'+
							 '<div class="mfp-close"></div>'+
							 '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
							 '<div class="mfp-title">Some caption</div>'+
							 '</div>'
				},
				callbacks: {
					markupParse: function(template, values, item) {
						values.title = item.el.attr('title');
					}
				}
			});
			/* magnificPopup for paly video function end*/
			$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,

				fixedContentPos: false
			});
		}


		/* Scroll To Top ============ */
		var scrollTop = function (){
			var scrollTop = jQuery("button.scroltop");
			/* page scroll top on click function */
			scrollTop.on('click',function() {
				jQuery("html, body").animate({
					scrollTop: 0
				}, 1000);
				return false;
			})

			jQuery(window).bind("scroll", function() {
				var scroll = jQuery(window).scrollTop();
				if (scroll > 900) {
					jQuery("button.scroltop").fadeIn(1000);
				} else {
					jQuery("button.scroltop").fadeOut(1000);
				}
			});
			/* page scroll top on click function end*/
		}

		/* handle Accordian ============ */
		var handleAccordian = function(){
			/* accodin open close icon change */
			jQuery('#accordion').on('hidden.bs.collapse', function(e){
				jQuery(e.target)
					.prev('.panel-heading')
					.find("i.indicator")
					.toggleClass('glyphicon-minus glyphicon-plus');
			});
			jQuery('#accordion').on('shown.bs.collapse', function(e){
				jQuery(e.target)
					.prev('.panel-heading')
					.find("i.indicator")
					.toggleClass('glyphicon-minus glyphicon-plus');
			});
			/* accodin open close icon change end */
		}

		/* handle Placeholder ============ */
		var handlePlaceholder = function(){
			/* input placeholder for ie9 & ie8 & ie7 */
			jQuery.support.placeholder = ('placeholder' in document.createElement('input'));
			/* input placeholder for ie9 & ie8 & ie7 end*/

			/*fix for IE7 and IE8  */
			if (!jQuery.support.placeholder) {
				jQuery("[placeholder]").on('focus',function () {
					if (jQuery(this).val() == jQuery(this).attr("placeholder")) jQuery(this).val("");
				}).on('blur',function () {
					if (jQuery(this).val() == "") jQuery(this).val(jQuery(this).attr("placeholder"));
				}).blur();

				jQuery("[placeholder]").parents("form").on('submit',function () {
					jQuery(this).find('[placeholder]').each(function() {
						if (jQuery(this).val() == jQuery(this).attr("placeholder")) {
							 jQuery(this).val("");
						}
					});
				});
			}
			/*fix for IE7 and IE8 end */
		}

		/* Equal Height ============ */
		var equalHeight = function(container) {

			if(jQuery(container).length == 0)
			{
				return false
			}

			var currentTallest = 0,
				currentRowStart = 0,
				rowDivs = new Array(),
				$el, topPosition = 0;

			$(container).each(function() {
				$el = $(this);
				$($el).height('auto')
				topPostion = $el.position().top;

				if (currentRowStart != topPostion) {
					for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
						rowDivs[currentDiv].height(currentTallest);
					}
					rowDivs.length = 0; // empty the array
					currentRowStart = topPostion;
					currentTallest = $el.height();
					rowDivs.push($el);
				} else {
					rowDivs.push($el);
					currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
				}
				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
			});

		}

		/* File Input ============ */
		var fileInput = function(){
			/* Input type file jQuery */
			jQuery(document).on('change', '.btn-file :file', function() {
				var input = jQuery(this);
				var	numFiles = input.get(0).files ? input.get(0).files.length : 1;
				var	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [numFiles, label]);
			});

			jQuery('.btn-file :file').on('fileselect', function(event, numFiles, label) {
				input = jQuery(this).parents('.input-group').find(':text');
				var log = numFiles > 10 ? numFiles + ' files selected' : label;

				if (input.length) {
					input.val(log);
				} else {
					if (log) alert(log);
				}
			});
			/* Input type file jQuery end*/
		}

		/* Header Fixed ============ */
		var headerFix = function(){
			/* Main navigation fixed on top  when scroll down function custom */
			jQuery(window).on('scroll', function () {
				if(jQuery('.sticky-header').length > 0){
					var menu = jQuery('.sticky-header');
					if ($(window).scrollTop() > menu.offset().top) {
						menu.addClass('is-fixed');
						$('.header-style-5 .container > .logo-header .logo').attr('src','images/logo.png');
					} else {
						menu.removeClass('is-fixed');
						$('.header-style-5 .container > .logo-header .logo').attr('src','images/logo-white-2.png')
					}
				}
			});
			/* Main navigation fixed on top  when scroll down function custom end*/
		}

		/* Set Div Height ============ */
		var setDivHeight = function(){
			var allHeights = [];
			jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .seth').each(function(e){
				allHeights.push(jQuery(this).height());
			})

			jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .seth').each(function(e){
				var maxHeight = Math.max.apply(Math,allHeights);
				jQuery(this).css('height',maxHeight);
			})

			allHeights = [];
			/* Removice */
			if(screenWidth < 991)
			{
				jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .seth').each(function(e){
					jQuery(this).css('height','');
				})
			}
		}
		
		/* Resizebanner ============ */
		var handleBannerResize = function(){
			$(".full-height").css("height", $(window).height());
		}

		/* Left Menu ============ */
		var handleMenuPosition = function(){
			$(".header-nav li").unbind().each(function (e) {
				if ($('ul', this).length) {
					var elm = $('ul:first', this);
					var off = elm.offset();
					var l = off.left;
					var w = elm.width();
					var docH = $("body").height();
					var docW = $("body").width();

					var isEntirelyVisible = (l + w <= docW);

					if (!isEntirelyVisible) {
						$(this).find('.sub-menu:first').addClass('left');
					} else {
						$(this).find('.sub-menu:first').removeClass('left');
					}
				}
			});
		}

		var reposition = function (){
			var modal = jQuery(this),
			dialog = modal.find('.modal-dialog');
			modal.css('display', 'block');

			/* Dividing by two centers the modal exactly, but dividing by three
			 or four works better for larger screens.  */
			dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));
		}

		/* Function ============ */
		return {
			init:function(){
				onePageLayout();
				dzTheme();
				handleResizeElement();
				handleAccordian();
				scrollTop();
				handlePlaceholder();
				fileInput();
				headerFix();
				setDivHeight();
				handleBannerResize();
				jQuery('.modal').on('show.bs.modal', reposition);
				$('[data-toggle="tooltip"]').tooltip()
				MagnificPopup ();
			},


			load:function(){
				equalHeight('.equal-wraper .equal-col');
				handleMenuPosition();
			},

			resize:function(){
				screenWidth = $(window).width();
				dzTheme();
				handleResizeElement();
				handleMenuPosition();
				setDivHeight();
			}
		}
	}();

	/* Document.ready Start */
	jQuery(document).ready(function() {

		LeMars.init();

		jQuery('.navicon').on('click',function(){
			$(this).toggleClass('open');
		});

		$('a[data-toggle="tab"]').on('click',function(){
			// todo remove snippet on bootstrap v4
			$('a[data-toggle="tab"]').on('click',function() {
			  $($(this).attr('href')).show().addClass('show active').siblings().hide();
			})
		 });

		 jQuery('.post-tabs').on('mouseenter mouseleave', function(){
			jQuery('.post-tabs').removeClass('active');
			jQuery('.life-style-post-bx').removeClass('show');
			jQuery(this).addClass('active');
			stTabId = $(this).attr('id');
			resTabId =  stTabId.replace("st-", "");
			jQuery('#'+resTabId).addClass('show');
		});

	});
	/* Document.ready END */

	/* Window Load START */
	jQuery(window).on("load", function (e) {
		LeMars.load();
		 setTimeout(function(){
			jQuery('#loading-area').remove();
		}, 0);
	});
	/*  Window Load END */
	/* Window Resize START */
	jQuery(window).on('resize',function () {
		LeMars.resize();
	});
	/*  Window Resize END */
})(jQuery);
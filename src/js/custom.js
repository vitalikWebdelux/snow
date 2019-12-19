var chThemeModule;

(function($) {
	chThemeModule = (function() {

		var elements = {
			$html : $('html'),
			$document : $( document ),
			$map : $('#td-map'),
			$customers_Slider : $('.customers-slider'),
		}


		

		// $('.hamburger').on('click', function(){
		// 	$('.td-mobile-nav').addClass('td-mobile-nav--open')
		// 	$('.td-close-side').addClass('td-close-side--open')
		// 	console.log('123123')
		// });


		/**
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 * Fixed arrows
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 */
		var fixedArrows = function(toTop, call) {

			if( toTop.length > 0 ) {

				var footerBarHeight = elements.$footer.length ? elements.$footer.outerHeight() : 0;
				
				toTop.on('click', function(e){
					e.preventDefault();

					var scrollTop = Math.abs($(window).scrollTop()) / 2,
						speed = scrollTop < 1000 ? 1000 : scrollTop;

					$('html, body').animate(
						{
							scrollTop: 0
						},
						speed
					);

				});

				var stroke = toTop.data('stroke');

				stroke = !stroke ? '' : `stroke=${stroke}`;

				toTop.append('<svg class="lt-progress-circle-up" width="100%" height="100%" ' + stroke + ' viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet" fill="none">\n        <path class="lt-progress-path" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition:  stroke-dashoffset 300ms linear 0s;stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 309;"></path>    </svg>');

				$(window).on('scroll', function() {
					var scroll = $(this).scrollTop(),
						wH = $(document).height() - $(window).height(),
						$topBtn = toTop;

					if (scroll > 300) {
						$topBtn.addClass('fixed-arrows__top--active');
					} else {
						$topBtn.removeClass('fixed-arrows__top--active');
					}

					if( scroll + $(window).height() > $(document).height() - footerBarHeight ) {
						$topBtn.css({ 'transform': 'translate(0, ' + -( footerBarHeight + 80 ) + 'px)' });
						if( call.length ){
							call.css({ 'transform': 'translate(0, ' + -( footerBarHeight + 80 ) + 'px)' });
						}
					} else {
						$topBtn.css({ 'transform': '' });
						if( call.length ){
							call.css({ 'transform': '' });
						}
					}

					$topBtn.find('.lt-progress-path').css('stroke-dashoffset',  300 - Math.round(300 * scroll / wH) + "%");
				})

				if (window.matchMedia('(max-width: 767px)').matches) {
					if( call.length ){
						call.removeAttr( 'data-toggle' );
					}
				};

			}

		}
		


		/**
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 * Validate inputs
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 */
		function validateInputs() {
			$('input[name="phone"], input[name="your-phone"], input[name="client_phone"]').on('change keyup keydown', function() {
				var myVar = $(this).val();
				var digit = ('' + myVar)[2];

				if (digit == '0') {
					$(this).val(' ');
					$(this).blur().focus();
				}
				$('input[type="submit"]').attr('disabled', 'disabled');

				var re = new RegExp("_$");

				if (!re.test(myVar)) {
					$(this).removeClass('error-phone');
					$('input[type="submit"]').removeAttr('disabled');
					$('button[type="submit"]').removeAttr('disabled').find('.shine-button__el').addClass('animate');
				} else {
					$(this).addClass('error-phone');
				}
			});
		}

		return {
			init: function() {
				this.leafletMap();			
				this.customersSlider();

				this.widjets();


				this.openMenu();

				// this.modalHelper();
				// this.initFixedArrows();
				// this.formHandler();
				// this.ajaxHandler();
			},

			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 2. Leaflet map
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */

			leafletMap: function() {
				console.log('leafletMap');
				var map_cont = $('#td-map');
				if( map_cont ) {
					var map = L.map('td-map').setView(new L.LatLng(48.938438,  24.702448), 55);
					L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
						attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
					}).addTo(map);
					var MapMarker = L.icon({
						iconUrl: 'https://chopovskyi.dental/wp-content/themes/dental/assets/img/gps.png',
						iconSize: [75, 106],
					});
					map.attributionControl.setPrefix(false);
					var marker = new L.marker([48.938438, 24.702448], {
						icon: MapMarker
					});
					map.addLayer(marker);
				}
			},
			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * Slider
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
	

			customersSlider: function() {
				var customers_Slider = $('.customers-slider')

				if(customers_Slider.length > 0) {
					customers_Slider.slick({
						slidesToShow: 4,
						slidesToScroll: 1,
						variableWidth: true,
						nextArrow: $('.customers_slider-next'),
						prevArrow: $('.customers_slider-prev'),
						dots: true,
						dotsClass: 'customers-dots'
					});
					
				}
			},
			openMenu: function(){
				$('.hamburger').on('click', function(){
					$('.td-mobile-nav').addClass('td-mobile-nav--open');
					$('.td-close-side').addClass('td-close-side--open');
					
				});
				$('.td-close-side').on('click', function(){
					$('.td-close-side--open').removeClass('td-close-side--open');
					$('.td-mobile-nav').removeClass('td-mobile-nav--open');
				});
			},
			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 6. Modal helper
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
			modalHelper: function() {
				$('.js-book-modal').on('click', function() {
					$('#chModalBooking').modal('hide');
					$('#chModalConsult').modal('show');
				})				
			},

			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 7. Init fixed arrows
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
			initFixedArrows: function() {
				fixedArrows(elements.$scroller, elements.$callWidgetTrigger);
			},

			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 10. Form validation
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
			formHandler: function() {

				validateInputs();

				$('input[name="your-phone"]').inputmask({
					"mask": "(099) 999-99-99"
				});

				$('.wpcf7').on('wpcf7mailsent', function (e) {
					$('.modal').modal('hide');
					$('#chModalFormSuccess').modal('show');
					setTimeout(function() {						
						$('#chModalFormSuccess').modal('hide');
					}, 5500);
				});

			},

			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 11. Ajax handler
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
			ajaxHandler() {
				$('.ch-calculator').on('submit', function(e) {
					e.preventDefault();

					var formData = $( this ).serializeArray();

					$.ajax({
						type: 'POST',
						url: $ch_js.ajaxurl,
						data: formData,
						success: function(data) {
							$('input[type=text]').each(function() {
								$(this).val('');
							});

							$('input[type="radio"]:checked').each(function(){
								$(this).prop('checked', false); 
							});

							elements.$calc.find('.calculator__wrap').slick('slickGoTo', 0, true);

							$('.modal').modal('hide');
							$('#chModalFormSuccess').modal('show');
							setTimeout(function() {						
								$('#chModalFormSuccess').modal('hide');
							}, 5500);
						},
						error: function(e) {
							console.log(e);
						}
					});
				})
			},


			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 12. Fixed widjets 
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
			widjets() {
				$(window).scroll(function () {
					let foooter_location_size = Math.floor($('.td-footer').offset().top - 500 * 2);
					let widjets_size = Math.floor($(this).scrollTop());

					console.log(foooter_location_size + " : " + widjets_size);
					if(widjets_size > 69) {
						$('#td-scroller').addClass('td-show');
						$('#td-widjet-phone').addClass('td-show');
					} else {
						$('#td-scroller').removeClass('td-show');
						$('#td-widjet-phone').removeClass('td-show');
						
					}
					if(foooter_location_size <= widjets_size){
						$('#td-scroller').addClass('td-show-top');
						$('#td-widjet-phone').addClass('td-show-top');
					} else {
						$('#td-scroller').removeClass('td-show-top');
						$('#td-widjet-phone').removeClass('td-show-top');
					}
				});

				$('#td-scroller').click(function () {
					$('#td-scroller').addClass('td-pusk-top');
					setTimeout(function(){
						$('#td-scroller').removeClass('td-pusk-top');
					}, 250)
					$('body, html').animate({
						scrollTop: 0
					}, 1000);
					return false;
				});
				
			}

		}
	}());
})(jQuery);

jQuery(document).ready(function () {
    chThemeModule.init();
});


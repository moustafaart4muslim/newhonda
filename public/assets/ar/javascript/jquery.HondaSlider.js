/*!
 * Honda Egypt Website Slider JQuery
 * (c) 2013 BahaaSamir <bahaasamir.me>
 */
(function($){
	
	$.fn.HondaSlider = function(customSettings) {
		
		var settings = $.extend({
			'caption' : false,
			'ease' : 'easeInOutExpo',
			'duration' : 600,
			'hidedelay' : 600
		}, customSettings);
		
		return this.each(function(){
			var $this = $(this),
				images = $('.slider_img');
			SliderResize();
	
			$('.slider_img:first-child').addClass('active')
			$(window).bind('resize', function() {
				SliderResize()
			});
		
			function CapResize(){
				var caption_block_height = parseInt($('.caption_block').outerHeight()),
					caption_block_margin = Math.round(caption_block_height/2);
	
				$('.caption_block').css({'margin-top':-caption_block_margin});
			};
			CapResize();


			function SliderResize() {
				width = parseInt($('body').innerWidth())
				// console.warn(width);
				if(width > 2100){
					width = 2100
				}
				var iw = width,
				GetImg = $this.find('.slider_img');
	
				GetImg.css({width:iw});

				if(settings.caption){
					var mg = Math.round(iw-960)/2;

					$('.ResCaption').css({width:parseInt(mg+853)});
					if($('.caption_set').position().top == 440){
						$('.caption').css({right:0});
					} else {
						$('.caption').css({right:-parseInt(mg+853)});
					}

				}
			}

			if(settings.caption){
				var GetCapPos = $('.caption').position().left;
			}
	
			var timer;
			$this.hover(function(){
				if(timer) {
					clearTimeout(timer);
					timer = null
				}
				if(images.length > 1) {
					$this.find('.next').stop().animate({right:0,opacity:1}, settings.duration, settings.ease)
					$this.find('.prev').stop().animate({left:0,opacity:1}, settings.duration, settings.ease)
				}
				if(settings.caption){
					$this.find('.caption_set').stop().animate({top:440}, settings.duration, settings.ease, function() {
						$(this).find('.caption').animate({left:0, opacity:1}, settings.duration, settings.ease)
					});
				}
			}, function(){
				timer = setTimeout(function() {
					if(images.length > 1) {
						$this.find('.next').stop().animate({right:-73,opacity:0}, settings.duration, settings.ease)
						$this.find('.prev').stop().animate({left:-73,opacity:0}, settings.duration, settings.ease)
					}
					if(settings.caption){
						$this.find('.caption_set').stop().animate({top:595}, settings.duration, settings.ease, function() {
							$(this).find('.caption').css({left:GetCapPos, opacity:0})
						});
					}
				}, settings.hidedelay)
			})

			$('.slider_arrows').click(function() {
				if(!$('.caption').is(":animated")){
					var button = $(this).attr('id');
					var current_image = $('.slider_img.active');
					var next;
					if (button == 'prev') {
						next = ($('.slider_img.active').prev().length > 0) ? $('.slider_img.active').prev() : $('.slider_img:last-child');		
					} else {
						next = ($('.slider_img.active').next().length > 0) ? $('.slider_img.active').next() : $('.slider_img:first-child');
					}
	
					if(settings.caption){
						var head = next.attr('id');
						var det = next.attr('data-title');
						var link = next.attr('data-link');
				
						$('.caption').stop().animate({left:GetCapPos, opacity:0}, 300, 'easeInOutExpo', function() {
							$('.caption_head').html(head);
							$('.caption_details').html(det);
							width = parseInt($('body').innerWidth())
							// console.warn(width);
							if(width > 2100){
								width = 2100
							}
			
							cw = width - 200	;					
							$('.caption_details').css('max-width', cw + 'px');							
							

							$('.caption_block a').attr({'href':link});
							CapResize()
						});
					}
			
					current_image.fadeOut( function() {
						$(this).css('z-index', 1).removeClass('active');
						next.fadeIn().css('z-index', 3).addClass('active')
						if(settings.caption){
							$('.caption').stop().animate({left:0, opacity:1}, 1000, 'easeInOutCubic');
						}
					});
				}
				return false;
			}); 

		});
	};

}(jQuery));
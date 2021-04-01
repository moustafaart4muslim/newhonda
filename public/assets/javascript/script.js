/*!
 * Honda Egypt Main JQuery Script
 * (c) 2013 BahaaSamir <bahaasamir.me>
 */
window.onload = function() {
	setTimeout (function () {
		scrollTo(0,0);
	}, 0);
}

var keys = [37, 38, 39, 40];
function preventDefault(e) {
	e = e || window.event;
	if (e.preventDefault) {
		e.preventDefault();
		e.returnValue = false;
	}
}

function keydown(e) {
	for (var i = keys.length; i--;) {
		if (e.keyCode === keys[i]) {
			preventDefault(e);
			return;
		}
	}
}

function wheel(e) {
	preventDefault(e);
}

function disable_scroll() {
	if (window.addEventListener) {
		window.addEventListener('DOMMouseScroll', wheel, false);
	}
	window.onmousewheel = document.onmousewheel = wheel;
	document.onkeydown = keydown;
}

function enable_scroll() {
	if (window.removeEventListener) {
		window.removeEventListener('DOMMouseScroll', wheel, false);
	}
	window.onmousewheel = document.onmousewheel = document.onkeydown = null;  
}

function type(target, dur) {
	var stext = $(target).html();
	jQuery({count:0}).animate({count: stext.length}, {
       	duration: dur,
		step: function() {
			$(target).html('').html(stext.substring(0, Math.round(this.count)));
		}
	})
}

function WaitFun(newfunc){
	$('body').waitForImages({
       waitForAll: true,
		each: function(loaded, count, success) {
			var p_width = Math.floor(215 / count),
				st_percentage = parseInt($(".logo_load_solid").width())/215,
				nd_percentage = Math.floor(st_percentage * 100);	

			HondaSubmenu();
			disable_scroll()
			$(".logo_load_solid").width($(".logo_load_solid").width() + p_width);
			$("#percentage").html(nd_percentage);
		},
		finished: function () {
			var	new_call_function = window[newfunc];

			new_call_function()
			enable_scroll()
			$('.logo_load_set').css({'background':'#fff'})
			$(".logo_load_solid").width(215);
			$("#percentage").html('100');
			$('#main_menu').HondaMenu();
			$('.logo_sl_mask').fadeOut(function(){
				$('.load').fadeOut(function(){
					$('.load, .remove').remove();
				});
			});
		}
	});
}

function HondafxMenu() {
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		if (scroll <= 94 && $('.w_ve').hasClass('inactive')) {
			$('.car_header_fx').css({'position':'relative'});
			$('.w_ve').css({'margin-top':0}).removeClass('inactive');
		}
		else if (scroll >= 94 && !$('.w_ve').hasClass('inactive')) {
			$('.car_header_fx').css({'position':'fixed'});
			$('.w_ve').css({'margin-top':60}).addClass('inactive');
		}
	})
}

function HondaHomePage() {
	WaitFun('HondaHomePageFunc')
	$('#main_slider').HondaSlider({'caption':true});
	$('.five_stars_block').hover(function(){
		if( $(this).find('.five_stars_block_overlay').length == 0) {
			var servName = $(this).attr('id');
			$(this).append('<div class="five_stars_block_overlay">read more<br />about honda<br />'+ servName +'</div>');
			$(this).find('.five_stars_block_overlay').stop(true, true).fadeIn()
			$(this).find('.five_stars_block_logo').stop(true, true).transition({ scale: 1.3 });
		}
	}, function(){
		$(this).find('.five_stars_block_logo').stop(true, true).transition({ scale: 1.0 });
		$(this).find('.five_stars_block_overlay').stop(true, true).fadeOut(function(){
			$(this).remove();
		});
	})
};

function HondaHomePageFunc(){
	$('#footer').HondaScrollAnimate('footerAnimate');
	$('#fsTitle').HondaScrollAnimate('fvstarsTitleAnimate');
	$('#warranty').HondaScrollAnimate('fvstarsAnimate');
	$('#home_responsive').HondaScrollAnimate('home_responsive');
	$('#MB').HondaScrollAnimate('mbAnimate');
}

function fvstarsTitleAnimate(){
	$('.five_stars_year').animate({top:0}, function(){
		$('.five_stars_title').animate({left:0,opacity:1}, function(){
			$('.five_stars_details').animate({left:0,opacity:1});
		});
	});
}

function mbAnimate(){
	$('.mb_title').animate({left:0,opacity:1}, function(){
		$('.mb_decs').animate({left:0,opacity:1}, function(){
			$('.mb_box').animate({opacity:1, top:0});
		});
	});
}

function fvstarsAnimate(){
	$('.five_stars_logo').animate({opacity:1}).transition({ rotate: '0deg' });
	if(window.lang == 'eg'){
		$('.five_stars_block').each(function(i) {
			var pos = $(this).attr('data-title');
			setTimeout(function() {
				$('.five_stars_block:eq('+i+')').animate({left:pos, opacity:1}, 1000, 'easeInOutCubic',function() {
				$(this).children('.five_stars_block_logo').animate({top:0}, 1000, 'easeInOutBack');
				});
			}, 100 * (i + 1))
		});
	
	}else{
		$('.five_stars_block').each(function(i) {
			var pos = $(this).attr('data-title');
			setTimeout(function() {
				$('.five_stars_block:eq('+i+')').animate({right:pos, opacity:1}, 1000, 'easeInOutCubic',function() {
				$(this).children('.five_stars_block_logo').animate({top:0}, 1000, 'easeInOutBack');
				});
			}, 100 * (i + 1))
		});
	
	}
}
function HondaBox(doAfterfunc){
	doAfter = window[doAfterfunc];
	$('.box_set').animate({left:0}, 600, 'easeInOutCubic', function(){
		$('.box_set, .box_title').animate({top:0}, 600, 'easeInOutCubic');
		doAfter();
	});
}
function HondaFooter(){
	$('#footer').HondaScrollAnimate('footerAnimate');
}


function HondaAboutus(){
	WaitFun('HondaAboutusFunc')
}
function HondaAboutusFunc(){
	footerAnimate()
	HondaBox('HondaAboutusDoAfterBox')
}
function HondaAboutusDoAfterBox(){
	$('.paragraph_set').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('.box_about').delay(600).animate({left:0}, 600, 'easeInOutCubic', function(){
		$(this).transition({ rotate: '0deg' });
	})
}


function HondaCEO(){
	WaitFun('HondaCEOFunc')
}
function HondaCEOFunc(){
	HondaFooter()
	HondaBox('HondaCEODoAfterBox')
}
function HondaCEODoAfterBox(){
	$('.box_ceo').delay(600).animate({left: 0}, 600, 'easeInOutCubic', function(){
		$('.box_ceo_mask').animate({bottom:0}, 300, 'easeInOutCubic')
	})
	$('.ceo_set').each(function(i) {
		setTimeout(function() {
			$('.ceo_set').find('.ceo_img').eq(i).stop().animate({left:0});
			$('.ceo_set').find('.ceo_msg_set').eq(i).stop().animate({opacity:1}, 1000);
		}, 350 * (i + 1))
	});
}


function HondaInspiration(){
	WaitFun('HondaInspirationFunc')
}
function HondaInspirationFunc(){
	HondaFooter()
	HondaBox('HondaInspirationDoAfterBox')
	$('#t_flight1').HondaScrollAnimate('t_flight1');
	$('#t_flight2').HondaScrollAnimate('t_flight2');
}
function HondaInspirationDoAfterBox(){
	$('.box_inspiration').delay(600).animate({left: 0, opacity:1}, 1000, 'easeInOutBack', function(){
		$('.box_inspiration_mask_2').animate({left:-65, top:81, opacity:0})
		$('.box_inspiration_mask_1').animate({left:-60, opacity:0}, function(){
			$('.mask_rem').remove()
		})
	});
	$('#ins1').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('.ins2').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('.ins2').find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});
		// $('.under_box').find('.ins2').each(function(i) {
		// 	setTimeout(function() {
		// 		$(this).find('.ins_dis').each(function(x) {
		// 			setTimeout(function() {
		// 				$(this).find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		// 			}, 150 * (x + 1))
		// 		});
		// 	}, 150 * (i + 1))
		// });



}
function ResponsiveColors(){
	// $('#t_flight1').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('#responsive_colors').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('#responsive_colors').find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});
}
function ResponsiveNav(){
	// $('#t_flight1').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('#responvsive_nav').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('#responvsive_nav').find('.ins_dis').eq(i).animate({opacity:1 }, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});
}

function t_flight1(){
	$('#t_flight1').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('#ins3').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('#ins3').find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});
}
function t_flight2(){
	$('#t_flight2').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('#ins4').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('#ins4').find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});
}


function HondaEnvironment(){
	WaitFun('HondaEnvironmentFunc')
	$('.green_c_set').HondaScrollAnimate('GreenFunc');
}
function HondaEnvironmentFunc(){
	HondaFooter()
	HondaBox('HondaEnvironmentDoAfterBox')
}
function HondaEnvironmentDoAfterBox(){
	$('.box_environment_mask_1').delay(1000).animate({left:20}, 600, 'easeInOutCubic')
	$('.box_environment_mask_3').delay(1000).animate({left:137}, 600, 'easeInOutCubic', function(){
		$('.mask_rem').remove()
	});
	$('.box_environment_mask_2').delay(600).animate({height:0}, 600, 'easeInOutCubic', function(){
			$('.box_environment_fl').fadeIn("fast").transition({ rotate: '0deg' });
	})

	$('.blue_skies_logo').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	$('.blue_skies_data').animate({top:0, opacity:1}, 1000, 'easeInOutBack', function(){
		$('.single_video_set').animate({left:0, opacity:1}, 600, 'easeInOutCubic')
	});
}
function GreenFunc(){
	$('.green_c_logo').animate({opacity:1}).transition({ rotate: '0deg' });
	$('.green_dis').each(function(i) {
		setTimeout(function() {
			$('.green_dis').eq(i).stop().animate({opacity:1, left:0})
		}, 150 * (i + 1))
		if(i == 2) {
			$('.green_c_star').each(function(i) {
				setTimeout(function() {
					$('.green_c_star').eq(i).delay(800).show(0).transition({ rotate: '0deg' })
				}, 100 * (i + 1))
			});
		}
	});
}

function HondaEvents(){
	WaitFun('HondaEventsFunc')
}
function HondaEventsFunc(){
	HondaFooter()
	HondaBox('HondaEventsDoAfterBox')
}
function HondaEventsDoAfterBox(){
	$('.box_inspiration').delay(600).animate({left: 0, opacity:1}, 1000, 'easeInOutBack', function(){
		$('.box_inspiration_mask_2').animate({left:-65, top:81, opacity:0})
		$('.box_inspiration_mask_1').animate({left:-60, opacity:0}, function(){
			$('.mask_rem').remove()
		})
	});
	$('#ev').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('#ev').find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});
}

function HondaAboutLogoSet() {
	var logo_w = $('.about_ve_logo').outerWidth()+50;
	$('#MVx').find('.about_ve_content').css({'width':960 - logo_w});

	var logo_h = $('.about_ve_content').outerHeight();

	$('.about_ve_logo').css({'height':logo_h});
	$('.about_ve_content').css({'top':logo_h});
	$('.ve_logo').css({'top':-logo_h});
}


function rotation(){
	if(!$(".car_wheel").hasClass('stop')) {
		$(".car_wheel").rotate({
			angle:0, 
			animateTo:-360,
			callback: rotation,
			easing: function (x,t,b,c,d){
				return c*(t/d)+b;
			}
		});
	}
}

function HondaSubmenu() {
	var menu_pos = $('.menu_set').position().left;
	var sub_logo = $('.sub_logo').width();
	var sub_menu_pos = menu_pos - sub_logo;

	$('#sub_menu_adj').css({"margin-left":sub_menu_pos});
	$('.sub_menu_box_element:first-child').addClass('first');
	$('.sub_menu_box_element:last-child').addClass('last');
	//$('.sub_logo').click(function(e) {
		//$('html,body').animate({scrollTop:0}, 600,'easeInOutCubic');
    //});
}

function HondaVideos() {
	$('.con_videos_set').HondaScrollAnimate('vthumb');
	$('.con_videos_thumb').click(function() {
		if (!$(this).hasClass('active')){
			var image = $(this).attr('data-title'),
				id = $(this).attr('data-id'),
				src = image ;
	
			if (src) {
				$('.con_videos_thumb').removeClass('active')
				$(this).addClass('active')
				var img = new Image();
				$('.con_video_thumb').children('img').animate({opacity:0},function(){
					$(this).remove()
				});
				$('.con_video_thumb').append(img);
				$('#video_embed').html('').attr({'data-id':id}).hide()
				img.src = src;
				img.onload = function() {
					$(this).animate({opacity:1});
				};
			}
		}
	});
}

function ConAboutAnimate() {
	$('.about_ve_content').animate({'top':0});
	$('.ve_logo').animate({'top':0});
}

function ConTitle1Animate() {
	$('#title1').find('.title_shape').animate({opacity:1, height:50}, function(){
		$('#title1').find('.title_arrow').animate({opacity:1, top:27})
		$('#title1').find('.con_title').animate({opacity:1, left:0})
	})
}
function ConTitle2Animate() {
	$('#title2').find('.title_shape').animate({opacity:1, height:50}, function(){
		$('#title2').find('.title_arrow').animate({opacity:1, top:27})
		$('#title2').find('.con_title').animate({opacity:1, left:0})
	})
}
function GalleryAnimate() {
	$('.content').animate({opacity:1, right:0})
}

function ConVideoTitleAnimate() {
	$('.video_ex_title_set').animate({'opacity':1},function(){
		$(this).find('.video_ex_title, .video_ex_sub').animate({'left':0, opacity:1});
		$(this).parent().find('.con_video_set').animate({'left':0, opacity:1});
	})
}

function HondaResponsiveGallery(){
	$('#ins2').find('.ins_dis').each(function(i) {
		setTimeout(function() {
			$('#ins2').find('.ins_dis').eq(i).animate({opacity:1, left:0}, 600, 'easeInOutCubic')
		}, 150 * (i + 1))
	});

}
function HondaCar() {
	//$(window).resize(function(){location.reload();});
	WaitFun('HondaCarFunc')
	HondaAboutLogoSet();
	HondaVideos();
	HondaCarColors();
	HondaFooter()
	HondaResponsiveGallery()
	$('#main_slider').HondaSlider();

	var win_width = $(window).width(),
		non_win_width = Math.round(win_width-1200)/2,
		ani = non_win_width + 1200,
		hdr = 60,
		current_scroll = $(window).scrollTop();

	$( ".car_adj" ).css({left: ani});
	$('.car_set').HondaScrollAnimate('carGo');

	function aTo(rel){
		enable_scroll()
		$('#lbOverlay').fadeOut();
		$('#lbCenter').css({'display':'none'});	
		$('.car_menu ul a#selected').removeAttr('id').removeClass('selected');
		$("a[rel='" + rel + "']").attr({'id':'selected'}).addClass('selected');
		window.location.hash = rel;
	}

	$('a.move_to').click(function() {
		var get_rel = $(this).attr('rel');
		var get_Pos = $("[data-title='" + get_rel + "']").offset().top;
		$('html,body').animate({scrollTop:get_Pos-hdr}, 600,'easeInOutCubic')
		return false;
	});

	$(window).scroll(function() {    
		var scroll = $(window).scrollTop(),
			Gallery = $("[data-title=Gallery]").offset().top;
			Colors = $("[data-title=Colors]").offset().top;
			Videos = $("[data-title=Videos]").offset().top;
	
		if (scroll <= 94 && $('.w_ve').hasClass('inactive')) {
			$('.car_header_fx').css({'position':'relative'});
			$('.w_ve').css({'margin-top':0}).removeClass('inactive');
		}
		else if (scroll >= 94 && !$('.w_ve').hasClass('inactive')) {
			$('.car_header_fx').css({'position':'fixed'});
			$('.w_ve').css({'margin-top':60}).addClass('inactive');
		}
		else if (scroll <= Gallery-hdr-1) {
			aTo('Model_Overview')
		}
		else if (scroll <= Colors-hdr-1) {
			aTo('Gallery')
		}
		else if (scroll <= Videos-hdr-1) {
			aTo('Colors')
		}
		else if (scroll > Videos-hdr-1) {
			aTo('Videos')
		}
	
	});
	
};
function HondaCarFunc(){
	veFunc()
	if(window.location.hash) {
		var hash = window.location.hash.substring(1),
			get_Pos = $("[data-title='" + hash + "']").offset().top;
		$('html,body').animate({scrollTop:get_Pos-60}, 600, 'easeInOutCubic');
	}
}
function veFunc(){
	$('.con_about').HondaScrollAnimate('ConAboutAnimate');
	$('#title1').HondaScrollAnimate('ConTitle1Animate');
	$('#title2').HondaScrollAnimate('ConTitle2Animate');
	$('.con_videos').HondaScrollAnimate('ConVideoTitleAnimate');
	$('.content').HondaScrollAnimate('GalleryAnimate');
	// $(".portfolioListing").quicksandpaginated({
	// 	callback:function() { 
	// 		$("a[rel^='lightbox-gallery']").slimbox()
	// 		$('.portfolioListing').HondaGallery()
	// 	}
	// });
}

function vthumb(){
	$('.con_videos_thumb:first-child').addClass('active');
	$('.con_videos_thumb').each(function(i) {
		var image = $(this).attr('data-title'),
			src = 'structure/gallery/videos/230x95/' + image +'.png';

		if (src && $(this).children('img').length == 0) {
			$('.con_video_thumb').children('img').animate({opacity:1});
			var img = new Image();
			$(this).append(img);            
			img.src = src;
			img.onload = function() {
				$(this).fadeIn();
			};
		}
	});
}

function carGo(){
	if ( !$('.car_adj').is(":animated") && !$(this).hasClass('view')) {
		$('.color_button').each(function(i) {
			setTimeout(function() {
				$('.color_button').eq(i).stop().animate({opacity:0.8},2000);
			}, 150 * (i + 1))
		});
		$( ".car_adj" ).animate({left: 0}, {
			duration: 1500,
			start: function() {
				rotation();
			},
			progress: function() {
				if($('.car_adj').position().left < 500){
					$(".car_wheel").addClass("stop");
					if(!$('.car').hasClass('stop')) {
						$(".br_lm").show()
						$('.car').addClass('stop').transition({ rotate: '-1deg'})
					}
				}
			},
			 complete: function() {
				$('.car').transition({ rotate: '0deg'})
				$(".br_lm").fadeOut()
			}
		});
	}
}

function HondaCarColors(){
	var win_width = $(window).width(),
		non_win_width = Math.round(win_width-1200)/2,
		ani = non_win_width + 1200,
		set_wd = $('.color_buttons_set').width(),
		set_mrg = Math.round(set_wd)/2;
			
	$('.color_button:first-child').addClass('view').css({opacity:1})
	$('.color_buttons_set').css({'margin-left':-set_mrg})
	
	$('.color_button').hover(function() {
		$('.color_button').stop().animate({opacity:0.8})
		$(this).stop().animate({opacity:1})
	})
	$('.color_buttons_set').mouseleave(function() {
		$('.color_button').stop().animate({opacity:0.8})
		$('.color_button.view').stop().animate({opacity:1})
	});


	$('.color_button').click(function(e) {
		if ( !$('.car_adj').is(":animated") && !$(this).hasClass('view')) {
			var car = $(this).attr("data-car");
			var src =  car ;
	
			$('.color_button').removeClass('view').stop().animate({opacity:1});
			$(this).addClass('view');
			$(".car_wheel").removeClass("stop");
			$(".car_wheel").removeClass("stopped");
	
			$( ".car_adj" ).animate({left: -ani}, {
				duration: 1500,
				start: function() {
					rotation()
				},
				complete: function() {
					$('.car').removeClass('stop')
					$('.car_adj').css({left:ani}, function(){
						$('.car_set').addClass('load');
					});
					$('.car').children('img').remove();            
					if (src) {
						var img = new Image();
						$('.car').append(img);            
						img.src = src;
						img.onload = function() {
							$('.car_set').removeClass('load');
							$('.car_adj').animate({left:0}, {
								duration: 1500,
								progress: function() {
									if($('.car_adj').position().left < 50){
										$(".car_wheel").addClass("stop");
										if(!$('.car').hasClass('stop')) {
											$('.car').addClass('stop').transition({ rotate: '-1deg'})
										}
									}
									
									if($('.car_adj').position().left < 300){
										$(".car_wheel").addClass("stopped");
									}
									
									// if($('.car_adj').position().left < 500){
									// 	$(".car_wheel").addClass("stop");
									// 	if(!$('.car').hasClass('stop')) {
									// 		$('.car').addClass('stop').transition({ rotate: '-1deg'})
									// 	}
									// }
									
									
								},
								 complete: function() {
									$('.car').transition({ rotate: '0deg'})
								}
							})
						};
					}
				}
			});
		}
	});

};


function HondaEcon(){
	HondafxMenu();
	HondaFooter();
	WaitFun('HondaEconFunc')
}
function HondaEconFunc(){
	HondaBox('HondaEconDoAfterBox')
	$('#Econ').HondaGallery({type:'inline'});
}
function HondaEconDoAfterBox(){
	$('.box_econ.pt3').delay(600).animate({top:97}, 700, 'easeInOutBack', function(){
		$('.box_econ.pt2').animate({top:60}, 400, 'easeInOutCubic', function(){
			$('.box_econ.pt1').animate({top:32}, 400, 'easeInOutCubic');
		});
	});
}


function HondaSpecifications(){
	HondafxMenu();
	HondaFooter();
	WaitFun('HondaSpecificationsFunc')
}
function HondaSpecificationsFunc(){
	HondaBox('HondaSpecificationsDoAfterBox')
}
function HondaSpecificationsDoAfterBox(){
	$('.box_specifications.pt1').delay(600).show(0).animate({top:0}, 1000, 'easeInOutBack', function(){
	$('.box_specifications.pt2').fadeIn().transition({ rotate: '-360deg'});
		$('.tr_set').each(function(i) {
			setTimeout(function() {
				$('.tr_set').eq(i).stop().animate({opacity:1},2000);
			}, 150 * (i + 1))
		});
	});
}


function HondaLoanCalculator(){
	HondafxMenu();
	HondaFooter();
	WaitFun('HondaLoanCalculatorFunc')
}
function HondaLoanCalculatorFunc(){
	HondaBox('HondaLoanCalculatorDoAfterBox')
	$('#LoanCalculator').LoanC();
	$('#select, #selectx').HondaSelect({'price':true});
}
function HondaLoanCalculatorDoAfterBox(){
	$('.box_loan_calculator.pt1').delay(600).animate({top:67}, 1000, 'easeInOutBack');
	$('.box_loan_calculator.pt2').delay(800).animate({top:28}, 1000, 'easeInOutBack')
	$('.box_loan_calculator.pt3').delay(800).animate({top:58}, 1000, 'easeInOutBack')
	FormShow();
}


function HondaMotors() {
	HondafxMenu();
	HondaAboutLogoSet();
	HondaVideos();
	HondaFooter();
	$('#main_slider').HondaSlider();
	$('#sub_menu_adj').HondaMenu();
	$('.con_about').HondaScrollAnimate('ConAboutAnimate');
	$('#title1').HondaScrollAnimate('ConTitle1Animate');
	$('#title2').HondaScrollAnimate('ConTitle2Animate');
	$('.content').HondaScrollAnimate('GalleryAnimate');
	$('.con_videos').HondaScrollAnimate('ConVideoTitleAnimate');
	$('.title_box_set').HondaScrollAnimate('SpecificationsAnimate');
	// $(".portfolioListing").quicksandpaginated({
	// 	callback:function() { 
	// 		$("a[rel^='lightbox-gallery']").slimbox()
	// 		$('.portfolioListing').HondaGallery()
	// 	}
	// });
	WaitFun('HondaMotorsFunc')
}
function HondaMotorsFunc(){
	SpecificationsAnimate();
}

function SpecificationsAnimate(){
	if(!$('.box_set').hasClass("stop")){
		$('.box_set').addClass("stop")
		HondaBox('HondaMotorsFunc')
		$('.box_specifications.pt1').delay(800).show(0).animate({top:0}, 1000, 'easeInOutBack', function(){
		$('.box_specifications.pt2').fadeIn().transition({ rotate: '-360deg'});
			$('.tr_set').each(function(i) {
				setTimeout(function() {
					$('.tr_set').eq(i).stop().animate({opacity:1},2000);
				}, 150 * (i + 1))
			});
		});
	}
}


function HondaFiveStarsLoad(){
	HondaFiveStars();
	HondaFooter();
	WaitFun('HondaFiveStarsFunc')
}
function HondaFiveStarsFunc(){
	HondaBox('HondaFiveStarsDoAfterBox')
}
function HondaFiveStarsDoAfterBox(){
	$('.box_five_stars').delay(600).animate({left:0}, 600, 'easeInOutCubic').transition({ rotate: '0deg'});
	$('.fs_block').each(function(i) {
		setTimeout(function() {
			$('.fs_block:eq('+i+')').animate({opacity:1});
			$('.fs_block:eq('+i+')').find('.fs_logo').animate({top:0}, 1000, 'easeInOutBack');
		}, 250 * (i + 1))
	});
}

function HondaTradeIn(){
	HondaFooter();
	$('#email_form').HondaForm();
	$('#select').HondaSelect();
	WaitFun('HondaTradeInFunc')
}
function HondaTradeInFunc(){
	HondaBox('HondaTradeInDoAfterBox')
}
function HondaTradeInDoAfterBox(){
	$('.title_box_border').css({'z-index':'999'})
	FormShow();
	$('.box_trade_in').delay(600).animate({top:0}, 1000, 'easeInOutBack');
}

function HondaMaintenance(){
	HondaFooter();
	$('#email_form').HondaForm();
	$('#select').HondaSelect({'submenu':true});
	$('#Model').HondaSelect();
	$('#center').HondaSelect();
	WaitFun('HondaMaintenanceFunc');
}
function HondaMaintenanceFunc(){
	HondaBox('HondaMaintenanceDoAfterBox')
}
function HondaMaintenanceDoAfterBox(){
	$('.box_maintenance.pt1').delay(600).animate({top:33}, 600, 'easeInOutCubic')
	$('.box_maintenance.pt2, .box_maintenance.pt3').delay(600).animate({left:48}, 1000, 'easeInOutBack')
	$('.box_maintenance_pt4_set').delay(600).animate({left:94}, 600, 'easeInOutCubic')
	$('.box_maintenance.pt4').transition({ rotate: '-360deg', delay: 800});
	$('.title_box_border').css({'z-index':'999'})
	FormShow();
}

function HondaRecall(){
	HondaFooter();
	$('#email_form').HondaForm();
	$('#model').HondaSelect({'submenu':true});
	$('#year').HondaSelect();
	WaitFun('HondaSendEmailFunc');
}

function HondaTestDrive(){
	HondaFooter();
	$('#email_form').HondaForm();
	$('#select').HondaSelect();
	WaitFun('HondaTestDriveFunc')
}
function HondaTestDriveFunc(){
	HondaBox('HondaTestDriveDoAfterBox')
}
function HondaTestDriveDoAfterBox(){
	$('.box_test_drive').delay(600).animate({left:0}, 1000, 'easeInOutBack');
	$('.title_box_border').css({'z-index':'999'})
	FormShow();
}

function HondaSendEmail(){
	HondaFooter();
	$('#email_form').HondaForm();
	$('#select').HondaSelect();
	WaitFun('HondaSendEmailFunc')
}
function HondaSendEmailFunc(){
	HondaBox('HondaSendEmailDoAfterBox')
}
function HondaSendEmailDoAfterBox(){
	$('.box_send_email').delay(600).animate({left:0}, 600, 'easeInOutCubic', function(){
		$(this).transition({ rotate: '0deg' });
	})
	FormShow();

}

function HondaSocial(){
	HondaFooter();
	WaitFun('HondaSocialFunc')
	$('.social_block').hover(function(e) {
        $(this).stop().animate({left:30}, 400, 'easeInOutCubic');
    },function(e) {
        $(this).stop().animate({left:0}, 600, 'easeOutBounce');
    });
}
function HondaSocialFunc(){
	HondaBox('HondaSocialDoAfterBox')
}
function HondaSocialDoAfterBox(){
	$('.box_social_network.pt2').delay(600).animate({top:0}, 600, 'easeInOutCubic',function(i) {
		$('.box_social_network.pt1').animate({left:41}, 1000, 'easeOutBounce');
		$('.box_social_network.pt3').animate({left:120}, 1000, 'easeOutBounce');
	});
	$('.form_title').animate({opacity:1, top:0},function(i) {
		$('.social_block').each(function(i) {
			setTimeout(function() {
				$('.social_block:eq('+i+')').animate({opacity:1, left:0});
			}, 150 * (i + 1))
		});
	});
}

function HondaLocations(){
	var panels = $('.locations_panel').length,
		pagi = $('.locations_pagi').length,
		new_ani_width = panels * $('.locations_panel').width(),
		location = $('.location').eq(0),
		new_pagi_width = pagi * 27,
		map_scr = location.attr("data-map"),
		loc_top = location.attr("data-top"),
		loc_left = location.attr("data-left"),
		loc_city = location.find(".location_city").html(),
		loc_addr = location.find(".location_address").html(),
		inf_top = parseInt(location.attr("data-top")) - 43,
		inf_left = parseInt(location.attr("data-left")) + 62,
		src = 'structure/maps/locations/' + map_scr +'.png';

		if (src) {
			var img = new Image();
			img.src = src;
		
			$('.location').removeClass('active').removeAttr('id');
			location.addClass('active').attr({'id':'active'});

			$('.location_map_info').css({'top':inf_top, 'left':inf_left})
			$(".location_map_city").html(loc_city);
			$(".location_map_address").html(loc_addr);
		
			$('.location_map').stop().animate({opacity:0}, function(){
				$('.location_map_loader').stop().fadeIn()
			});
		
			img.onload = function() {		
				$('.location_map').css({'background-Image':'url(' + src + ')'}).animate({opacity:1})
				$('.map_locate_icon').stop().animate({top:loc_top, left:loc_left}, function(){
					$('.location_map_loader').stop().fadeOut()
					$('.location_map_info').stop().animate({opacity:1, left:inf_left})
				})
			};
		}

	// $('.locations_animate').css({'width':new_ani_width});
	$('.locations_pagi_set').css({'width':new_pagi_width-10});
	$('.locations_pagi:first-child').addClass('active')
	$('.locations_panel').find('.location:nth-child(2n), .location:nth-child(4n)').css({'float':'rights'});

	$('.location').hover(function(){
		if(!$(this).hasClass('active')){
			$('.location#active').removeClass('active');
		}
	}, function(){
		// $('.location#active').addClass('active');
	})

	$('.map_locate_icon').click(function(){
		if(!$('.location_map_info').is(':visible')){
			$('.location_map_info').fadeIn()
		} else {
			$('.location_map_info').fadeIn()
		}
	})

	$('.location_map_info_toggle').click(function(){
		$('.location_map_info').fadeOut()
	})
	/*
	$('.locationff').click(function() {
		if(!$(this).hasClass('active') && !$('div').is(":animated")  && !$('.location_map_loader').is(":visible")){
			var map_scr = $(this).attr("data-map"),
				inf_cur_pos = $('.location_map_info').position().left,
				
				loc_top = $(this).attr("data-top"),
				loc_left = $(this).attr("data-left"),

				loc_city = $(this).find(".location_city").html(),
				loc_addr = $(this).find(".location_address").html(),

				inf_top = parseInt($(this).attr("data-top")) - 43,
				inf_left = parseInt($(this).attr("data-left")) + 62,
				
				src = 'structure/maps/locations/' + map_scr +'.png',
				scroll_pos = $('#footer').offset().top,
				win_h = $(window).height();
			
			if (src) {
				var img = new Image();
				img.src = src;
				
				$('.location').removeClass('active').removeAttr('id');
				$(this).addClass('active').attr({'id':'active'});

				$('.location_map_info').stop().animate({opacity:0, left:inf_cur_pos+30}, function(){
					$(this).css({'top':inf_top, 'left':inf_left+30})
					$(".location_map_city").html(loc_city);
					$(".location_map_address").html(loc_addr);
				});
				
				$('.location_map').stop().animate({opacity:0.3}, function(){
					$('.location_map_loader').stop().fadeIn()
				});
				
				img.onload = function() {
					$('html,body').animate({scrollTop:scroll_pos-win_h+100}, 600, 'easeInOutCubic', function(){
						$('.location_map_loader').stop().fadeOut()
						$('.location_map').css({'background-Image':'url(' + src + ')'}).animate({opacity:1})
						$('.map_locate_icon').stop().animate({top:loc_top, left:loc_left}, function(){
							$('.location_map_info').stop().animate({opacity:1, left:inf_left})
						})
					})
				};
			}

		}
	})
	*/
	$('.locations_pagi').click(function(e) {
		if(!$(this).hasClass('active') && !$('div').is(":animated")){
			var pagi_index = $(this).index(),
				panel_index_pos = $('.locations_panel').eq(pagi_index).position().left;

			$('html,body').animate({scrollTop:300}, 600, 'easeInOutCubic');
			$('.location').animate({top:-30, opacity:0},function() {
				$(this).css({opacity:1, top:0})
				$('.locations_animate').css({left:-panel_index_pos})
				$('.location_icon').css({opacity:0, top:-30});
				$('.location_data').css({opacity:0, left:30});
			});
			
			$('.locations_panel').eq(pagi_index).find('.location_data').each(function(i) {
				setTimeout(function() {
					$('.locations_panel').eq(pagi_index).find('.location_icon').eq(i).animate({opacity:1, top:0});
					$('.locations_panel').eq(pagi_index).find('.location_data').eq(i).animate({opacity:1, left:0});
				}, 200 * (i + 1))
			});
			

			$('.locations_pagi').removeClass('active');
			$(this).addClass('active');
		}
	});

	var iw = $('body').innerWidth();
	if(iw < 1920) {
		$('.location_map').css({left:(iw - 1920)/2})
	}

	$(window).resize(function(){
		var iw = $('body').innerWidth();
		if(iw < 1920) {
			$('.location_map').css({left:(iw - 1920)/2})
		}
	});

	HondaFooter();
	WaitFun('HondaLocationsFunc')
}
function HondaLocationsFunc(){
	HondaBox('HondaLocationsDoAfterBox')
}
function HondaLocationsDoAfterBox(){
	$('.box_icon').delay(600).animate({top:0, left:0}, 800, 'easeInOutBack');
	$('.locations_panel').eq(0).find('.location_data').each(function(i) {
		setTimeout(function() {
			$('.locations_panel').eq(0).find('.location_icon').eq(i).delay(150 * (i + 1)).animate({opacity:1, top:0});
			$('.locations_panel').eq(0).find('.location_data').eq(i).animate({opacity:1, left:0});
		}, 150 * (i + 1))
	});
}


function FormShow(){
	var get_length = $('.form_block').length-1;
	$('.form_title').animate({opacity:1, top:0},function(i) {
		$('.form_block').each(function(i) {

			setTimeout(function() {
				$('.form_block:eq('+i+')').animate({opacity:1, left:0});
				if(i==get_length) {
					$('.submit_set').delay(400).animate({opacity:1, left:0});
				}
			}, 150 * (i + 1))
		});
	});
}

function HondaFiveStars(){
	$('.fs_block').hover(function() {
		$('.fs_block').removeClass('current');
		$(this).addClass('current');
	});

	$('.fs_block').mouseleave(function() {
		$('.fs_block').removeClass('current');
	});
}


function footerAnimate(){
	// alert(1);
	var FB = $('#Likes');
		FBlikes = FB.attr('data-id'),
		FBlikesEnd = FB.attr('data-title');
	
	$('.footerh5').each(function(i) {
		setTimeout(function() {
			$('.footerh5:eq('+i+')').animate({opacity:1}, 1000);
		}, 70 * (i + 1))
	});

	$('.footer_grid a').each(function(i) {
		setTimeout(function() {
			$('.footer_grid a:eq('+i+')').animate({opacity:1}, 1000);
		}, 70 * (i + 1))
	});

	$('.footer_stalk_block a').each(function(i) {
		setTimeout(function() {
			$('.footer_stalk_block a:eq('+i+')').animate({left:0, opacity:1}, 800, 'easeInOutCubic');
		}, 100 * (i + 1))
	});

	$('.footer_stalk').show().animate({top:0,opacity:1}, 1000);
	$('.hot_line_icon').transition({ rotate: '0deg' }, 600);
	$('.hot_line').fadeIn()
	if( FB.has('.likes')) {
		$('.likes').countTo({
			to: FBlikes,
			onComplete: function(value) {
				FB.html(FBlikesEnd).removeAttr('data-title data-id')
			}
		});
		FB.removeClass('likes');
	}
	$('.like_icon').click(function(e) {
        $('.like_data').fadeOut('fast', function(){
			$('.like_btn').animate({opacity:1});
		});
    });
}


$(document).ready(function () {
	$(window).bind('beforeunload', function(){
		if( $('.unload').length == 0 ) {
			disable_scroll();
			$('body').append('<div class="unload"></div>')
			$('body *').unbind();
			$('.unload').fadeIn();
		}
	});
	
	$('.language_set a').hover(function(){
		$('.language_set a#active').removeClass('active');
	}, function(){
		$('.language_set a#active').addClass('active');
	})

	$('.video_thumb, .con_video_thumb').click(function(){
		var id = $(this).find('#video_embed').attr('data-id');
		if( !$(this).find('#video_embed').is(":visible") ) {
			$(this).find('img').remove();
			vimeo_iframe = '<iframe src="//player.vimeo.com/video/' + id +
			 '?title=0&amp;byline=0&amp;portrait=0&amp;color=ed1b2f&amp;autoplay=1" width="100%"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
			$(this).find('#video_embed').html(vimeo_iframe).fadeIn();
		}
	})

	$('.car_menu a').hover(function(){
		$('.car_menu a#selected').removeClass('selected');
	}, function(){
		$('.car_menu a#selected').addClass('selected');
	})

});
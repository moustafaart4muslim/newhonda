function home_responsive(){
	$('.five_stars_logo_responsive').animate({opacity:1}).transition({ rotate: '0deg' });
	$('.five_stars_block_responsive').each(function(i) {
		setTimeout(function() {
			$('.five_stars_block_responsive:eq('+i+')').animate({  opacity:1}, 1000, 'easeInOutCubic',function() {
				// $(this).children('.five_stars_block_logo_responsive').animate({top:0}, 1000, 'easeInOutBack');
			});
		}, 100 * (i + 1))
	});
}

$(document).ready(function(e) {
	$(".location").click(function(){
		the_map = $(this).find("iframe").first().clone();
		$("#bottom_map").html(the_map);
		$(".locations_panel .location").removeClass('active');
		$(this).addClass('active');
		
		if($("header.fx_hdr:hidden").length == 0){
			to = $("#bottom_map").offset().top - 80
		}else{
			to = $("#bottom_map").offset().top 
		}
		$('html, body').animate({
			scrollTop: to 
		}, 1000);
	
	})
});

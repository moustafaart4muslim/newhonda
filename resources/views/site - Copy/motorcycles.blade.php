@extends('layout')

@section('body_class') hed_ed w_motors @endsection
@section('jquery') 
	<link href="{{ asset( 'assets/styles/Gallery.css')}}" rel="stylesheet" type="text/css" media="screen" />

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection

@section('title') Honda  Motorcycles @endsection

@section('content')

<div class="car_header_fx container">
	<div class="car_header_set" id="motors_header">
		<div class="sub_logo motors"><img src="structure/ui/motorcycles_logo.png" width="177" height="20" alt="Honda Motorcycls" />
		</div>

		<div class="menu_set" id="sub_menu_adj">
			<div class="menu" id="menu">
				<ul>
					@foreach($cats as $cat)
						<li><a class="for_ani  {{ $sub_mod == $cat->en_name ? 'seected' : '' }}" rel="{{ $cat->en_name }}"
							 href="javascript:void(0)">{{  $cat->$db_name }}</a></li>
					@endforeach
				</ul>
			</div> <!-- Sub Menu End -->

			<div class="sub_menu">
					@foreach($cats as $cat)
						<div class="mQuery sub_menu_box" id="{{  $cat->en_name }}">
							@foreach($cat->motors as $one)
								<a href="{{  urls( 'motors', $one->en_name, $one->id ) }}" 
									class="sub_menu_box_element">
									<div class="sub_name">{{ $one->$db_name }}</div>
									<img src="{{ url('storage/' . $one->thumb ) }}" alt="{{ $one->$db_name }}" />
								</a>
							@endforeach
						</div>
					@endforeach
			</div> <!-- Sub of Sub Menu End -->

		</div>

	</div>
</div>







<div class="wrapper w_ve w_motors container" id="Motors" style="margin-top: 60px;">
	<section id="main_slider" class="main_slider" data-title="Model_Overview">
		<div class="sQuery slider_img_set">
			@foreach ( $slides  as $slide)
				<div class="slider_img active" 
				style="background: url({{$slide->getUrl('motorslider')}}) center center no-repeat rgb(0, 0, 0); width: 1552px;" 
				id="{{ $slide->getCustomProperty('en_caption') }} ">
				</div>

			@endforeach

		</div> <!-- Slider Images End -->

		<a href="javascript:void(0)" class="slider_arrows next" id="next"></a>
		<a href="javascript:void(0)" class="slider_arrows prev" id="prev"></a>
	</section> <!-- Slider Section End -->



	<div class="motors_sep_border"></div>

	<section class="ve_container con_about" id="MV">
			<div class="about_ve_set motors">
				<div class="about_ve_logo ve_logo motors_logo" style="height: 185px; top: 0px;"></div>
				<div class="about_ve_content" style="top: 0px;">
					
					<?php
						$title = 'motors_' . $db_title;
						$details = 'motors_' . $db_info;
						?>
					<div class="about_ve_title">{{$page->{$title} }}</div>
					<div class="about_ve">
						{{$page->{$details} }}

					</div>
				</div>
			</div>
		</section>
		<div class="motors_sep_border"></div>


	
	<section class="ve_container con_gallery_set" data-title="Gallery">
			<div class="con_gallery">
				<div class="con_title_set title_gray" id="title1">
					<div class="title_shape dark_shape"></div>
					<div class="title_arrow dark_arrow"></div>
					<div class="con_title">{{__('Gallery')}}</div>
				</div>
				<div class="main" role="main">
					<div class="content">
						<div id="portfolio" class="portfolioListing fn-portfolioListing" data-rel-list="app-master-list">
							<div class="portfolioCarrousel fn-portfolioCarrousel" data-ajust-height="false"></div>
							<div class="portfolioCarrousel_nav_wrapper">
								<div class="portfolioCarrousel_nav"></div>
							</div>

							<div id="app-master-list" class="hiddzen">
								@foreach($gallery  as $item)
									<a href="{{ $item->getFullUrl() }}" rel="lightbox-gallery" class="gallery_img_set" 
										data-categories="{{ $item->getCustomProperty('type') }}"
										 style="background-image: url({{$item->getFullUrl()  }})"
										 >
										<div class="gallery_zoom_icon"></div>
										<div class="gallery_caption_set">
											 <div class="gallery_caption_arrow"></div>
											 <div class="gallery_caption">
												{{ $item->getCustomProperty($db_caption)}}	 
											 </div>
										</div>
									</a>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	
		<div class="clr_brd car_brd brd_btm"></div>


			



			



	<section class="ve_container con_videos" data-title="Videos">
		<div class="video_ex_title_set" style="opacity: 1;">
			<div class="video_ex_title" style="left: 0px; opacity: 1;">
				
				@if(resolve('lang') == 'eg')
					EXPLORE HONDA <br>VIDEOS
				@else
					فيديو
				@endif
			</div>
			<div class="video_ex_sub" style="left: 0px; opacity: 1;">
			
				@if(resolve('lang') == 'eg')
					Check out latest videos of HONDA MOTORCYCLES AND EVENTS
				@else
					شاهد أحدث فيديوهات الدراجات النارية من هوندا

				@endif
			
			
			</div>
		</div>
		<div class="con_video_set" style="left: 0px; opacity: 1;">
			<div class="con_video_thumb">
				<img src="{{ $videos[0]->getFullUrl() }}" style="opacity: 1;">
				<div id="video_embed" data-id="{{ $videos[0]->getCustomProperty('vimeo_id') }}"></div>
			</div>
			<div class="con_videos_set">
				<?php 
					$i = 0;
				?>
				@foreach($videos as $video)
					<?php
						$i++;
					?>
					@if($i == 1)
						<div class="con_videos_thumb active" data-title="{{ $video->getFullUrl() }}" data-id="{{ $video->getCustomProperty('vimeo_id') }}">
							<img src="{{ $video->getUrl('motorvideos') }}".
							class="video_thumb_cars" 
							style="display: inline;">
						</div>
					@else
						<div class="con_videos_thumb" data-title="{{ $video->getFullUrl() }}" data-id="{{ $video->getCustomProperty('vimeo_id') }}">
							<img src="{{ $video->getUrl('motorvideos') }}" class="video_thumb_cars" style="display: inline;">

						</div>
					@endif
				@endforeach
			</div>
		</div>
	</section>


</div>
	
@endsection


@section('scripts')

	<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery.quicksand.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/quicksandpaginated.jquery.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/lightbox/js/lightbox.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jQueryRotateCompressed.js')}}"></script>

    <script type="text/javascript">
		$(document).ready(function(e) {

			// HondaAboutLogoSet();
			// HondaSubmenu();
			// HondaVideos();
			// HondaMotors()
			// $('#main_slider').HondaSlider();
			// $('#main_menu, #sub_menu_adj').HondaMenu();
			// $('#footer').HondaScrollAnimate('footerAnimate');
			// $('.con_about').HondaScrollAnimate('ConAboutAnimate');
			// $('#title1').HondaScrollAnimate('ConTitle1Animate');
			// $('#title2').HondaScrollAnimate('ConTitle2Animate');
			// $('.content').HondaScrollAnimate('GalleryAnimate');
			// $('.con_videos').HondaScrollAnimate('ConVideoTitleAnimate');
			// $(".portfolioListing").quicksandpaginated({
			// 	callback:function() { 
			// 		$("a[rel^='lightbox-gallery']").slimbox()
			// 		$('.portfolioListing').HondaGallery()
			// 	}
			// });



			HondaAboutLogoSet();
			HondaSubmenu();
			HondaVideos();
			HondaMotors()
			$('#app-master-list').HondaGallery({type:'inline'});
			$('#main_slider').HondaSlider();
			$('#main_menu, #sub_menu_adj').HondaMenu();
			$('#footer').HondaScrollAnimate('footerAnimate');


			$('.con_about').HondaScrollAnimate('ConAboutAnimate');
			$('#title1').HondaScrollAnimate('ConTitle1Animate');
			$('#title2').HondaScrollAnimate('ConTitle2Animate');
			$('.content').HondaScrollAnimate('GalleryAnimate');


			$('.con_videos').HondaScrollAnimate('ConVideoTitleAnimate');






			to = $("#main_slider").offset().top ;
			$('html, body').animate({
				scrollTop: to ,
				// complete:  function() { 
					
				// 	$('html, body').animate({
				// 		scrollTop: 1 
				// 	}, 1000);

				// } 

			}, 1000);


		});
	</script>
@endsection

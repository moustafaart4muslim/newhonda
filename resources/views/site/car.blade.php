@extends('layout')

@section('body_class') hed_ed @endsection
@section('jquery') 
	<link href="{{ asset( 'assets/styles/Gallery.css')}}" rel="stylesheet" type="text/css" media="screen" />

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title')  Honda {{$car->$db_name}} @endsection

@section('content')

<div class="car_header_fx container" style="position: fixed;">
		<div class="car_header_set">
			<div class="sub_logo"><img src="{{ url('storage/' . $car->logo ) }}" alt="{{ $car->$db_name }}"></div>
			<div class="car_menu" id="sub_menu_adj" style="margin-left: 209.326px;">
				<ul>
					<li><a rel="Model_Overview" id="overview_link" href="javascript:void(0)" class="move_to selected" id="selected">{{__('Model Overview')}}</a></li>
					<li><a class="move_to" rel="Gallery" href="javascript:void(0)">{{__('Gallery')}}</a></li>
					<li><a class="move_to" rel="Colors" href="javascript:void(0)">{{__('Colors')}}</a></li>
					<li><a class="move_to" rel="Videos" href="javascript:void(0)">{{__('Videos')}}</a></li>
					<!-- <li><a href="Cars/Civic/Econ">Econ</a></li> -->
					<li><a href="{{ url('car/'.$car->en_name.'/Specifications/' . $car->id) }}">Specifications</a></li>
				</ul>
			</div>
			<div class="car_menu"  id="responsivecar_menu"   style="margin-left: 209.326px;">
				<ul>
					<li><a href="{{ url('car/'.$car->en_name.'/Specifications/' . $car->id) }}"  >Specifications</a></li>
				</ul>
			</div>


		</div>
</div>

<div class="wrapper w_ve inactive container" id="Car" style="margin-top: 60px;">
	<section id="main_slider" class="main_slider" data-title="Model_Overview">
		<div class="sQuery slider_img_set">
			@foreach ( $slides  as $slide)
				<div class="slider_img active" 
				style="background: url({{$slide->getFullUrl()}}) center center no-repeat rgb(0, 0, 0); width: 1552px;" 
				id="{{ $car->$db_name }} ">
				</div>

			@endforeach

		</div> <!-- Slider Images End -->

		<a href="javascript:void(0)" class="slider_arrows next" id="next"></a>
		<a href="javascript:void(0)" class="slider_arrows prev" id="prev"></a>
	</section> <!-- Slider Section End -->

	<section class="ve_container con_about container" id="VV">
		<div class="about_ve_set row" style="margin-left: 0px;">
			<div class="about_ve_logo ve_logo car_logo col-12 col-sm-4 col-md-2" style="height: 128px; top: 0px;height: 180px;background-size: contain;"></div>
			<div class="about_ve_content col-12 col-sm-7 col-md-9" style="top: 0px;">
				<div class="about_ve_title">{{ $car->$db_title}}</div>
				<div class="about_ve">{{ $car->$db_desc}}</div>
			</div>
		</div>
		<div class="row d-none">
			<div class="col-12 col-sm-4 col-md-2">
				<div class="about_ve_logo ve_logo car_logo" style="height: 128px; top: 0px;"></div>
					
				</div>
			<div class="col-12 col-sm-7 col-md-9">
				

				<div class="about_ve_content" style="top: 0px;">
					<div class="about_ve_title">{{ $car->$db_name}}</div>
					<div class="about_ve">{{ $car->$db_desc}}</div>
				</div>


			</div>

		</div>

	</section>

	<div class="clr_brd car_brd brd_top"></div>

	<section class="ve_container con_gallery_set" data-title="Gallery">
			<div class="con_gallery">
				<div class="con_title_set title_gray" id="title1">
					<div class="title_shape dark_shape"></div>
					<div class="title_arrow dark_arrow"></div>
					<div class="con_title">{{  $car->$db_name}} <br />{{__('Gallery')}}</div>
				</div>
				<div class="main" role="main">
					<div class="content">
						<div id="portfolio" class="portfolioListing fn-portfolioListing" data-rel-list="app-master-list">
							<nav>
							<ul class="portfolio-filters">
								<li><a class="actv gallery_filters" id="filter_all">Gallery</a></li>
								<li><a data-category="Interior" class="gallery_filters" id="filter_interior">Interior</a></li>
								<li><a data-category="Exterior" class="gallery_filters" id="filter_exterior">Exterior</a></li>
								</ul>
							</nav>

							<div class="portfolioCarrousel fn-portfolioCarrousel" data-ajust-height="false"></div>
							<div class="portfolioCarrousel_nav_wrapper">
								<div class="portfolioCarrousel_nav"></div>
							</div>

							<div id="app-master-list" class="hiddzen">
								<section class="honda_gallery ins2">

									<div class="gallery_set">
										@foreach($car->getMedia('gallery') as $item)
											<a href="{{ $item->getFullUrl() }}" rel="lightbox-gallery"
												class="gallery_img_set {{ $item->getCustomProperty('type') }} filters ins_dis" 
												data-categories="{{ $item->getCustomProperty('type') }}"
												style="background-image: url({{$item->getUrl('thumb')  }})"
												
												data-lightbox="gallery"
												>
												<div class="gallery_zoom_icon"></div>
												<div class="gallery_caption_set">
													<div class="gallery_caption_arrow"></div>
													<div class="gallery_caption">
														Honda {{ $car->$db_name}}	 
													</div>
												</div>
											</a>



											
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<div class="clr_brd car_brd brd_btm"></div>
	
	<section class="ve_container con_colors" data-title="Colors" id="CarColors">
			<div class="con_title_set title_red" id="title2">
				<div class="title_shape red_shape"></div>
				<div class="title_arrow red_arrow"></div>
				<div class="con_title">{{ $car->$db_name }} <br /> {{__('Colors')}}</div>
			</div>
			<div class="car_set">
				<div class="car_adj">
					<div class="car">
						<!-- <div class="car_wheel" style="left: px; bottom: px; background-image:url('{{ $first_color->getUrl('front_wheel') }}');"></div>
						<div class="car_wheel" style="right: px; bottom: px; background-image:url('{{ $first_color->getUrl('back_wheel') }}');"></div> -->
						@if($car->disable_wheel == "No")
							<div class="car_wheel" style="left: {{$front_dimentions[1]}}px; top: {{$front_dimentions[0]}}px; background-image:url('{{ $car->getMedia('front_wheel')[0]->getUrl('front_wheel') }}');width: {{$wheel_height}};height: {{$wheel_height}}"></div>
							<div class="car_wheel" style="left: {{$back_dimentions[1]}}px; top: {{$back_dimentions[0]}}px; background-image:url('{{ $car->getMedia('back_wheel')[0]->getUrl('back_wheel') }}');width: {{$wheel_height}};height: {{$wheel_height}}"></div>

						@endif

						<img src="{{ $first_color->getFullUrl() }}"/>
					</div>
				</div>
			</div>
			
			<div class="color_buttons_set">
				@foreach($car->getMedia('colors') as $color)
					<div class="color_button" style="background:{{ $color->getCustomProperty('color') }}; {{ $color->getCustomProperty('show_border') == "Yes"? 'border: 1px solid #ccc;':''  }};"  
						data-car="{{ $color->getFullUrl() }}">
					</div>
				@endforeach
				<div class="color_ins">{{__('click on the color to view on the model')}}</div>
			</div>



			</section>
			<div id="responsive_colors">
			
				<section class="honda_gallery"  >

					<div class="gallery_set">



						@foreach($car->getMedia('colors') as $media)
							<a href="{{ $media->getFullUrl() }}"  data-lightbox="{{ \Str::slug($car->en_name ) }}_colors"
								rel="lightbox-{{ \Str::slug($car->en_name ) }}_colors"
								class="gallery_img_set ins_dis"
								data-categories="{{ \Str::slug($car->en_name ) }}_colors" 
								style="background-image: url('{{ $media->getUrl("medium-size") }}'); opacity: 0;">
								<div class="gallery_zoom_icon" style="display: none;"></div>
								<div class="gallery_caption_set" style="bottom: -105px; opacity: 0;">
									<div class="gallery_caption_arrow"></div>
									<div class="gallery_caption" style="margin-top: -18px; backgrou-color:{{ $media->getCustomProperty('color' ) }}"> 
										{{__('Honda')}} {{$car->$db_name}}
									</div>
								</div>
							</a>
						
						
						@endforeach
					</div>

					</section>



				</div>

	<div class="clr_brd"></div>

	<section class="ve_container con_videos" data-title="Videos">
		<div class="video_ex_title_set" style="opacity: 1;">
			<div class="video_ex_title" style="left: 0px; opacity: 1;">
		
					@if(resolve('lang') == 'eg')
						EXPLORE HONDA {{ $car->$db_name }}<br>VIDEOS
					@else
						فيديو
					@endif


			
			</div>
			<div class="video_ex_sub" style="left: 0px; opacity: 1;">
		
				@if(resolve('lang') == 'eg')
					check out latest videos of honda {{ $car->$db_name }}, features and news
				@else
					شاهد أحدث فيديوهات هوندا سيفيك ، المميزات ، واخر الأخبار


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
							<img src="{{ $video->getUrl('video_thumb') }}".
							class="video_thumb_cars" 
							style="display: inline;">
						</div>
					@else
						<div class="con_videos_thumb" data-title="{{ $video->getFullUrl() }}" data-id="{{ $video->getCustomProperty('vimeo_id') }}">
							<img src="{{ $video->getUrl('video_thumb') }}" class="video_thumb_cars" style="display: inline;">

						</div>
					@endif
				@endforeach
			</div>
		</div>
	</section>

</div>
	
@endsection


@section('scripts')
<!-- 
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery.quicksand.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/quicksandpaginated.jquery.js')}}"></script> -->
	<script type="text/javascript" src="{{ asset( 'assets/lightbox/js/lightbox.js')}}"></script>
	<script type="text/javascript" src="{{ asset( 'assets/javascript/jQueryRotateCompressed.js')}}"></script>

    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaCar();
			$('.honda_gallery').HondaGallery({type:'inline'});
			// HondaInspiration();
			to = $("#sub_menu_adj").first().offset().top ;
			$('html, body').animate({
				scrollTop: to 
			}, 1000);


			if(window.location.hash) {
			// Fragment exists
			} else {
				$("#overview_link").click();
				setTimeout(() => {
					$("#overview_link").click();
					
				}, 1000);
			}


			$("#responsive_colors").HondaScrollAnimate('ResponsiveColors');

			$("#filter_interior").click(function(){
				$("[data-categories=Interior]").fadeOut("fast",function(){
					$("[data-categories=Interior]").slideDown("slow");
				});
				// $("[data-categories=Exterior]").animate({
				// 	position: 'absolute',
				// 	left: '-10000',
				// },1000);

				$("[data-categories=Exterior]").fadeOut("slow");
				// $(".filters.interior").slideDown();
				// $(".filters.exterior").slideUp();
				$(".gallery_filters").removeClass('actv');
				$(this).addClass('actv');
			})
			$("#filter_exterior").click(function(){
				$("[data-categories=Interior]").fadeOut("slow");
				$("[data-categories=Exterior]").fadeOut("fast",function(){
					$("[data-categories=Exterior]").slideDown("slow");
				});
				$(".gallery_filters").removeClass('actv');
				$(this).addClass('actv');
			})
			$("#filter_all").click(function(){
				$("[data-categories=Exterior]").slideDown("slow");
				$("[data-categories=Interior]").slideDown("slow");
				$(".gallery_filters").removeClass('actv');
				$(this).addClass('actv');
			})
		});
	</script>
@endsection

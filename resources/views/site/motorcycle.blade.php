@extends('layout')

@section('body_class') hed_ed @endsection
@section('jquery')
<link href="{{ asset( 'assets/styles/Gallery.css')}}" rel="stylesheet" type="text/css" media="screen" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset( 'assets/javascript/jquery-migrate.js')}}"></script>

@endsection
@section('title')  {{ __('Honda') }} {{$motor->$db_name}}  {{ __('Motorcycle') }} @endsection

@section('content')

<div class="car_header_fx container">
	<div class="car_header_set" id="motors_header">


	


		<div class="sub_logo motors">
			@if(resolve('lang') == 'en')
				<img src="structure/ui/motorcycles_logo.png" width="177" height="20" alt="Honda Motorcycls" />

			@else

				<img src="structure/ui/motorcycles_logo_ar.png" width="177" height="20" alt="هوندا ، الدراجات البخارية" />
			@endif
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

			<div class="slider_img active" style="background: url({{ url('storage/' . $motor->image ) }}) center center no-repeat rgb(0, 0, 0); width: 1552px;" id="{{ $motor->en_name }}">
			</div>



		</div> <!-- Slider Images End -->

		<a href="javascript:void(0)" class="slider_arrows next" id="next"></a>
		<a href="javascript:void(0)" class="slider_arrows prev" id="prev"></a>
	</section> <!-- Slider Section End -->



	<div class="motors_sep_border"></div>

	<section class="ve_container con_about" id="MV">
		<div class="about_ve_set motors">
			<div class="about_ve_content" style="top: 0px;">
				<div class="about_ve_title">{{$motor->$db_name}}</div>
				<div class="about_ve">
					{{$motor->$db_desc}}
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
				<div class="con_title">{{$motor->$db_name}}<br>{{__('Gallery')}}</div>
			</div>
			<div class="main" role="main">
				<div class="content">
					<div id="portfolio" class="portfolioListing fn-portfolioListing" data-rel-list="app-master-list">
						<div class="portfolioCarrousel fn-portfolioCarrousel" data-ajust-height="false"></div>
						<div class="portfolioCarrousel_nav_wrapper">
							<div class="portfolioCarrousel_nav"></div>
						</div>

						<div id="app-master-list" class="hiddzen">
							@foreach($gallery as $item)
							<a href="{{ $item->getFullUrl() }}" rel="lightbox-gallery" class="gallery_img_set" data-categories="{{ $item->getCustomProperty('type') }}" style="background-image: url({{$item->getFullUrl()  }})">
								<div class="gallery_zoom_icon"></div>
								<div class="gallery_caption_set">
									<div class="gallery_caption_arrow"></div>
									<div class="gallery_caption">
										Honda {{ $motor->$db_name}}
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











</div>



<div class="wrapper w_ve inactive container" id="Specifications">

	<section class="specific_set">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red">
				<div class="box_specifications pt1"></div>				
				<div class="box_specifications pt2"></div>				
			</div>
			<div class="box_title">{{__('Specifications')}}</div>
		</section>


		<section class="under_box">

			<div class="specific_title_set">
				<div class="specific_main_title">{{$motor->$db_name}} {{__('Specifications')}}</div>
				<div class="specific_sub_title">{{$motor->$db_info}}</div>
			</div>


			<div class="specific_header">
				<div class="specific_border"></div>
				<span>{{__('Specifications')}}</span>
			</div>



			<div class="specific_table_set">

				@foreach( $specs as $cat=>$arr )

				<div class="th_column">{{$cats_trans[$cat]}}</div>
				@foreach($arr as $title=>$values)
				<div class="tr_set row">
					<div class="td_main col-4">{{ $sp_trans[$title] }}</div>
					@foreach($values as $model_id=>$val)

					<div class="td col-{{$cols}}">
						@if($val == 'true' or $val == 'True' or $val == 'TRUE' or $val === true )
							<img src="structure/icons/sp_exist.png">
						@else
							{{ $val }}

						@endif

					</div>

					@endforeach
				</div>
				@endforeach
				@endforeach
			</div>












		</section>
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

		HondaMotors();
		$('#app-master-list').HondaGallery({type:'inline'});

		// HondaSubmenu();
		to = $("#sub_menu_adj").offset().top ;
		$('html, body').animate({
			scrollTop: to 
		}, 1000);


	});
</script>
@endsection
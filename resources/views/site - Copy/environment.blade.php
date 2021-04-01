@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection

@section('title') Honda Environment @endsection

@section('content')

			<?php
                   $info = $db_prefix . "_environment";
                   
			?>
			

	<div class="wrapper normal container" id="Environment">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_gray" style="left: 0px; top: 0px;">
				<div class="box_icon box_environment">
					<div class="box_environment_fl" style="display: block; transform: rotate(0deg);"></div>
					
					
					
				</div>				
			</div>
			<div class="box_title" style="top: 0px;">{{__('Environment')}}</div>
		</section>
		<div class="responsive_title_box">{{__('Environment')}}</div>

		<section class="under_box">
			<div class="blue_skies_set">
				<div class="blue_skies_logo" style="left: 0px; opacity: 1;"></div>
				<div class="blue_skies_data" style="top: 0px; opacity: 1;">
					<div class="paragraph pb20">
						{!! $page->$info !!}

					</div>
				</div>
			</div>
		</section>
		<section class="honda_gallery">
			<div class="single_video_set" style="left: 0px; opacity: 1;">
				<div class="video_data_set">
					<div class="video_data">

					@if(resolve('lang') == 'en')
						<div class="video_title">Blue Skies for our Children</div>
						<div class="video_sub_title">The joy and freedom of mobility and a sustainable society where people can enjoy life</div>
					@else
						<div class="video_title">السماوات الزرقاء لأطفالنا</div>
						<div class="video_sub_title">سعادة وحرية القابلية للحركة والمجتمع المستدام، حيث يمكن للأشخاص الاستمتاع بالحياة</div>

					@endif


					</div>
				</div>
				<div class="video_set">
					<div class="video_thumb">
						
						<div id="video_embed" data-id="4" style="display: block;">
<iframe src="//player.vimeo.com/video/{{ $page->environment_videmo_id}}?title=0&byline=0&portrait=0&color=ed1b2f&autoplay=0" width="719" height="404" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>

</div>
					</div>
				</div>			</div>
		</section>







		@if(resolve('lang') == 'en')
			<section class="green_c_set">
				<div class="green_c_logo" style="opacity: 1; transform: rotate(0deg);"></div>
				<div class="green_c_title green_dis" style="opacity: 1; left: 0px;">Honda Green Company</div>
				<div class="green_c_sub_title_set">
					<div class="green_c_sub_title green_dis" style="opacity: 1; left: 0px;">N.3 World Wide</div>
					<div class="green_c_star" style="display: block; transform: rotate(0deg);"></div>
					<div class="green_c_star" style="display: block; transform: rotate(0deg); transition: transform 400ms ease 0s;"></div>
					<div class="green_c_star" style="display: block; transform: rotate(0deg); transition: transform 400ms ease 0s;"></div>
				</div>
				<div class="green_c_sub_data green_dis" style="opacity: 1; left: 0px;">Currently Honda ranked 3rd as the most green company<br>in the entire world, as per Interbrand.</div>
			</section>
		@else
			<section class="green_c_set">
				<div class="green_c_logo" style="opacity: 1; transform: rotate(0deg);"></div>
				<div class="green_c_title green_dis" style="opacity: 1; left: 0px;">هوندا الشركة الخضراء</div>
				<div class="green_c_sub_title_set">
					<div class="green_c_sub_title green_dis" style="opacity: 1; left: 0px;">N.3 العالمية</div>
					<div class="green_c_star" style="display: block; transform: rotate(0deg);"></div>
					<div class="green_c_star" style="display: block; transform: rotate(0deg); transition: transform 400ms ease 0s;"></div>
					<div class="green_c_star" style="display: block; transform: rotate(0deg); transition: transform 400ms ease 0s;"></div>
				</div>
				<div class="green_c_sub_data green_dis" style="opacity: 1; left: 0px;">حالياً تحتل هوندا المركز الثالث كأكثر الشركات الخضراء في العالم بأسره،<br>
وفقاً لشركة Interbrand.</div>
			</section>

		@endif








		@if( $page->additional_environment)
			{{ $page->additional_environment}}
		@endif

	</div>






@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaEnvironment();
		});
	</script>
@endsection

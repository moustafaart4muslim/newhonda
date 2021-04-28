@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title') {{ __('CEO Message') }} @endsection


@section('content')


<div class="wrapper  container" id="about">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red box_center" style="left: 0px; top: 0px;"><div class="box_icon box_ceo" style="left: 0px; transform: rotate(0deg);"></div></div>
			<div class="box_title" style="top: 0px;">{{__('CEO message')}}</div>
		</section>
		<div class="responsive_title_box">{{__('CEO message')}}</div>
		<?php
		/*
		<section class="under_box">
            // <?php
                //    $info = $db_prefix . "_ceo";
                   
			// ?>
			{!! $page->$info !!}
			</div>
		</section>
		*/
		$db_position = $db_prefix . "_position";

 
		?>


		<section class="under_box">
			@foreach( $ceo as $one)
				<div class="ceo_set row">
					<div class="ceo_img col-md-2 col-sm-12" >
						<img src="{{ url('storage/' . $one->image) }}"  alt="{{ $one->$db_name }}"></div>

					<div class="ceo_msg_set col-md-9 col-sm-12">
						<div class="msg">{!! nl2br($one->$db_desc) !!}</div>
						<div class="pos">{{ $one->$db_name }} {!! nl2br($one->$db_position) !!}</div>
					</div>
				</div>
			@endforeach
		</section>













	</div>
@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaCEO();
		});
	</script>
@endsection

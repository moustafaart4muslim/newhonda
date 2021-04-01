@extends('layout')
@section('body_class') hed_ed @endsection
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title') Honda {{$car->$db_name}} specifications  @endsection


@section('content')
<div class="car_header_fx container" style="position: fixed;">
		<div class="car_header_set">
			<div class="sub_logo"><img src="{{ url('storage/' . $car->logo ) }}" alt="{{ $car->$db_name }}"></div>
			<div class="car_menu" id="sub_menu_adj" style="margin-left: 209.326px;">
				<ul>
					<li><a rel="Model_Overview" href="{{ urls('cars',$car->en_name,$car->id) }}" class="move_to " id="selected">Model Overview</a></li>
					<li><a class="move_to" rel="Gallery" href="{{ urls('cars',$car->en_name,$car->id) }}#Gallery">Gallery</a></li>
					<li><a class="move_to" rel="Colors" href="{{ urls('cars',$car->en_name,$car->id) }}#Colors">Colors</a></li>
					<li><a class="move_to" rel="Videos" href="{{ urls('cars',$car->en_name,$car->id) }}#Videos">Videos</a></li>
					<!-- <li><a href="Cars/Civic/Econ">Econ</a></li> -->
					<li><a class="selected">Specifications</a></li>
				</ul>
			</div>


			
		</div>
</div>



<div class="wrapper w_ve inactive container" id="Specifications">

		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red">
				<div class="box_specifications pt1"></div>				
				<div class="box_specifications pt2"></div>				
			</div>
			<div class="box_title">{{ __('Specifications')}}</div>
		</section>
		<div class="responsive_title_box">{{ __('Specifications')}}</div>

		<section class="under_box">
			<div class="specific_title_set">
				<div class="specific_main_title">{{ __('Honda')}} {{ $car->$db_name }}</div>
				<div class="specific_sub_title">{{ $car->$db_title }}</div>
			</div>




			<div class="specific_header">
				<div class="specific_border"></div>
				<span>{{ __('Specifications')}}</span>
			</div>



			<div class="specific_table_set">
 			<!-- st -> left , nd -> right -->
				<div class="grade_set row">
					<div class="grade_head  col-4">{{ $car->$db_name }} Grade</div>
					@foreach($car->models as $model)
						<div class="td col-{{$cols}}">{{ $model->name }}</div>
					@endforeach

				</div>

				@foreach( $specs as $cat=>$arr )

					<div class="th_column">{{$cat}}</div>
					@foreach($arr as $title=>$values)
						<div class="tr_set row" style="opacity: 0;">
							<div class="td_main col-4">{{ $title }}</div>
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
</div>
@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaSpecifications();
			to = $("#Specifications").offset().top ;
			$('html, body').animate({
				scrollTop: to ,
				complete:  function() { 
					$('html, body').animate({
					scrollTop: 0 
				}, 1);
					

				} 
			}, 1);


		});
	</script>
@endsection

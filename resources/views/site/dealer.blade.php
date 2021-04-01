@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title')  {{ __('Honda') }} {{ ucfirst( $sub) }}   @endsection


@section('content')



<div class="wrapper container normal" id="SendEmail">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red box_center" style="left: 0px; top: 0px;">
				<div class="box_icon @if($mod == "dealers") box_dealer @else box_locations @endif" style="top: 0px; left: 0px;"></div>
			</div>
			<div class="box_title" style="top: 0px;">
			
					@if($mod == "dealers")
						
						{{ __( 'Find a ' . $sub . ' dealer')}}.		


					@else
						{{__('Honda Locations')}}
					@endif

			
			</div>
		</section>
		<div class="responsive_title_box">
					@if($mod == "dealers")
						{{ __( 'Find a ' . $sub . ' dealer')}}.		
					@else
						{{__('Honda Locations')}}
					@endif

	

		</div>

		<section class="under_box">
			<div class="locations_wrapper">
				<div class="locations_title">
				
				
					@if($mod == "dealers")
						@if(resolve('lang') == 'en')
							Find an authorized Honda {{ $sub }} dealer near to your place.
						@else
							ابحث عن اقرب موزع معتمد لهوندا - {{ __($sub)}}
						@endif
					
					@else
						@if(resolve('lang') == 'en')
							Find a Honda Showroom near to your place.
						@else
							ابحث عن اقرب معرض هوندا.
						@endif
					
					@endif
				
				</div>
				<div class="locations_set">
					<div class="locations_animates" >

						<div class="locations_panel">


							@foreach($dealers as $dealer)
								<div class="location col-12  col-sm-6 col-md-4 active" id="dealer_{{ $dealer->id }}"  id="active">
									<div class="location_icon" style="opacity: 1; top: 0px;"></div>
									<div class="location_city location_data" style="opacity: 1; left: 0px;">{{ $dealer->$db_name }}</div>
									<div class="location_address location_data" style="opacity: 1; left: 0px;">{{ $dealer->$db_info }}</div>
									<div class='map'>{!! $dealer->map !!}</div>
								</div>
							@endforeach
						</div>            
					</div> <!-- ./locations_animate -->
				</div> <!-- ./locations_set -->

				
			</div>

		</section>
		
		<section class="locations_map_wrapper container">
			<div class="locations_shadows"></div>
			<div class="location_map_loader" style="display: none;"></div>
			<div id="bottom_map">{!! $dealers[0]->map !!}</div>


		</section>
		
	</div>

    

@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaLocations();

		});
	</script>
@endsection

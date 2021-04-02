@extends('layout')
@section('jquery')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

@endsection

@section('title')  {{ __('Honda Egypt Maintenance') }} @endsection

@section('content')


<div class="wrapper container" id="about">
		<section class="title_box_set">
			<div class="title_box_border full"></div>
			<div class="box_set box_white box_maintenance"></div>
			<div class="box_set box_white">
				<div class="box_maintenance pt1"></div>				
				<div class="box_maintenance pt2"></div>				
				<div class="box_maintenance pt3"></div>
				<div class="box_maintenance_pt4_set">
					<div class="box_maintenance pt4"></div>
				</div>				
			</div>
			<div class="box_title">{{ __('Maintenance Booking') }}</div>
		</section>
		<div class="responsive_title_box">{{ __('Maintenance') }}</div>


	<section class="under_box">
		<div class="form_wrap" id="long" style="min-height: 450px;">
		@if(Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif


			<!-- <div class="form_title" style="opacity: 1; top: 0px;">In case you have any problem in your car, enter the chassis number now. </div> -->
			@if ($errors->any())
				<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							- {{ $error }} <br>	
						@endforeach
					
				</div>
			@endif
			<div class="form_title">
			@if(resolve('lang') == 'en')
			
			Now you can easily book your maintenance by just filling the below form:
		
				@else
				الآن يمكنك حجز صيانة سيارتك الدورية عن طريق موقعنا الالكتروني. فقط قم بتسجيل بياناتك و سيقوم احد مهندسي هوندا بتأكيد الحجز


			@endif
			
			</div>
			<div class="form_set" style="overflow: visible;">


			<form action="{{ url('maintenance') }}" id="email_form" method="post">
				@csrf
						<div class="form_block">
							<div class="form_label">{{ __('Name') }}</div>
							<div class="form_input"><input type="text" name="name" class="re" placeholder="{{ __('Name') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Phone') }}</div>
							<div class="form_input"><input type="text" name="phone" placeholder="{{ __('Phone') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('E-mail') }}</div>
							<div class="form_input"><input type="text" name="email" class="re" placeholder="{{ __('E-mail') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block blk_small">
							<div class="form_label">{{ __('Maint. Date') }}</div>
							<div class="form_input">
								<input type="text" name="dd" class="in_small re" placeholder="{{ __('day') }}" maxlength="2" value="<?php echo date("d"); ?>" autocomplete="off" />
								<input type="text" name="mm" class="in_small re" placeholder="{{ __('month') }}" maxlength="2" value="<?php echo date("m"); ?>" autocomplete="off" />
								<input type="text" name="yy" class="in_small re" placeholder="{{ __('year') }}" value="<?php echo date("Y"); ?>" maxlength="4" autocomplete="off" />
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Service Center') }}</div>
							<div class="form_input select re" id="center" data-title="center">
								<div class="select_arrow"></div>
								<div class="select_current">....</div>
								<div class="select_drop_set">
									<div class="select_drop_wrap">
										<ul class="select_options">
											<li>....</li>
											<li>{{ __('New Cairo') }}</li>
											<li>{{ __('Abu-Rawash') }}</li>
											<li>{{ __('Obour Branch') }}</li>
											<li>{{ __('Alexandria') }}</li>
											<li>{{ __('Mansoura') }}</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Car') }}</div>
							<div class="form_input select re" id="select" data-title="car">
								<div class="select_arrow"></div>
								<div class="select_current">....</div>
								<div class="select_drop_set">
									<div class="select_drop_wrap">
										<ul class="select_options">
											<li>....</li>
											@foreach($cars as $car)
												<li> {{$car->en_name}}</li>
											@endforeach
											<li>Motorcycle</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						
						<div class="form_block">
							<div class="form_label">{{ __('Plate Number') }}</div>
							<div class="form_input"><input type="text" name="plate" class="re" placeholder="{{ __('Car Plate Number') }}" autocomplete="off" /></div>
						</div>


						<div class="form_block">
							<div class="form_label">{{ __('Mileage') }}</div>
							<div class="form_input"><input type="text" name="mileage" class="re" placeholder="{{ __('Mileage') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Comments') }}</div>
							<div class="form_input textarea">
								<div class="txtare_brdr"></div>
								<textarea name="comments" placeholder="{{ __('Comments') }}.." ></textarea>
							</div>
						</div>
						<div class="submit_set">
							<div class="submit_btn" id="submit">
								<div class="submit_btn_label">{{ __('Submit') }}</div>
								<div class="submit_btn_icon"></div>
							</div>
						</div>
						<input type="hidden" name="center" />
						<input type="hidden" name="car" />
					</form>


			</div>

		</div>

	</section>
</div>


@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		HondaMaintenance();
	});
</script>
@endsection
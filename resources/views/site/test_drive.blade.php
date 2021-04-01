@extends('layout')
@section('jquery')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

@endsection

@section('title')  {{ __('Honda Egypt Test drive') }} @endsection

@section('content')
<div class="wrapper container" id="about">
	<section class="title_box_set">
		<div class="title_box_border full" style="z-index: 999;"></div>
		<div class="box_set box_white box_center" style="left: 0px; top: 0px;"><div class="box_icon box_test_drive" style="left: 0px;"></div></div>
		<div class="box_title" style="top: 0px;">{{ __('Request test drive') }}</div>
	</section>
	<div class="responsive_title_box">{{ __('Request test drive') }}</div>
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
			
			Are you interested to enjoy a free test drive to any of our models ?<br>
				Fill in the below form and one of our sales team will contact with you and invite you to a free test drive.			
				@else
				هل تريد أن تستمتع باختبار قيادة احد موديلات هوندا ؟<br>
فقط قم بتسجيل بياناتك و سيقوم احد ممثلي خدمة البيع بدعوتكم لاختبار قيادة مجاني.				


			@endif
				


			</div>

			<div class="form_set" style="overflow: visible;">


			<form action="{{ url('test-drive') }}" id="email_form" method="post">
				@csrf
						<!-- <div class="form_block">
							<div class="form_label">Chassis Number</div>
							<div class="form_input">
								<input type="text" name="num" class="re" placeholder="Chassis Number" <?php if(isset($_GET['ChassisNumber'])) { echo 'value="'.$_GET['ChassisNumber'].'"' ; } ?>/>
							</div>
						</div> -->


						<div class="form_block">
							<div class="form_label">{{ __('Name') }}</div>
							<div class="form_input">
								<input type="text" name="name" class="re" placeholder="{{ __('Name') }}" />
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Email') }}</div>
							<div class="form_input">
								<input type="text" name="email" class="re" placeholder="{{ __('Email') }}" />
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Phone') }}</div>
							<div class="form_input">
								<input type="text" name="phone" class="re" placeholder="{{ __('Phone') }}" />
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
												<li>{{ $car->en_name }}</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Notes') }}</div>
							<div class="form_input textarea">
								<div class="txtare_brdr"></div>
								<textarea name="notes" class="re" placeholder="{{ __('Notes') }}" ></textarea>
							</div>
						</div>
						
						<div class="submit_set" style="opacity: 1; left: 0px;">
							<div class="submit_btn" id="submit">
								<div class="submit_btn_label">{{ __('Submit') }}</div>
								<div class="submit_btn_icon"></div>
							</div>
						</div>						<!-- <p class="form_title" style="padding-top: 190px; z-index: -99;">Honda cares about recalling the cars for the safety!</p> -->

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
		HondaTestDrive();
	});
</script>
@endsection
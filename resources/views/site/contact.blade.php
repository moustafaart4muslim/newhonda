@extends('layout')
@section('jquery')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

@endsection
@section('title')  {{ __('Contact us') }} @endsection

@section('content')

<div class="wrapper container" id="about">
<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red box_center"><div class="box_icon box_send_email"></div></div>
			<div class="box_title">{{ __('Send an Email') }}</div>
		</section>
		<div class="responsive_title_box">{{ __('Send an Email') }}</div>

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
			
			In case if you have any question, comment, complaint or even if  you would like to share your opinion, don’t hesitate to let us know.
		
				@else
				في حالة إذا كان لديك أي سؤال، تعليق، شكوى أو حتى إذا كنت ترغب في مشاركة رأيك، لا تتردد في إبلاغنا.

			@endif
			
			
			
			
			</div>

			<div class="form_set" style="overflow: visible;">


			<form action="{{ url('contact') }}" id="email_form" method="post">
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
							<div class="form_label">{{ __('Message') }}</div>
							<div class="form_input textarea">
								<div class="txtare_brdr"></div>
								<textarea name="message" class="re" placeholder="{{ __('Message') }}" ></textarea>
							</div>
						</div>
						
						<div class="submit_set" style="opacity: 1; left: 0px;">
							<div class="submit_btn" id="submit">
								<div class="submit_btn_label">{{ __('Submit') }}</div>
								<div class="submit_btn_icon"></div>
							</div>
						</div>						<!-- <p class="form_title" style="padding-top: 190px; z-index: -99;">Honda cares about recalling the cars for the safety!</p> -->

						<input type="hidden" name="model" />
						<input type="hidden" name="year" />
					</form>


			</div>

		</div>

	</section>
</div>


@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		HondaRecall();
	});
</script>
@endsection
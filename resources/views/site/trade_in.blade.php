@extends('layout')
@section('jquery')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

@endsection

@section('title')  {{ __('Honda Egypt Trade in') }} @endsection

@section('content')

<div class="wrapper container" id="about">
		<section class="title_box_set">
			<div class="title_box_border full"></div>
			<div class="box_set box_white box_center"><div class="box_icon box_trade_in"></div></div>
			<div class="box_title">{{__('Trade in Your Car')}}</div>
		</section>
		<div class="responsive_title_box">{{ __('Trade in Your Car') }}</div>


		
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
				هل تمتلك سيارة هوندا قديمة و تريد بيعها أو استبدالها بأحد موديلات هوندا الجديدة؟<br>
	فقط قم بتسجيل بياناتك و سيقوم احد مندوبي قسم الاستبدال بالاتصال بك.


			@endif

			
			
			</div>

			<div class="form_set" style="overflow: visible;">


			<form action="{{ url('trade-in') }}" id="email_form" method="post">
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
							<div class="form_input"><input type="text" name="{{ __('email') }}" class="re" placeholder="{{ __('E-mail') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Your Car') }}</div>
							<div class="form_input"><input type="text" name="car" class="re" placeholder="{{ __('Your Car') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Car Model') }}</div>
							<div class="form_input"><input type="text" name="car_model" class="re" placeholder="{{ __('Car Model') }}" autocomplete="off" /></div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Interested') }}</div>
							<div class="form_input select re" id="select" data-title="interested">
								<div class="select_arrow"></div>
								<div class="select_current">....</div>
								<div class="select_drop_set">
									<div class="select_drop_wrap">
										<ul class="select_options">
											<li>....</li>
											@foreach($cars as $car)
												<li> {{$car->en_name}}</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">{{ __('Comments') }}</div>
							<div class="form_input textarea">
								<div class="txtare_brdr"></div>
								<textarea name="comments" placeholder="{{ __('Comments') }}" ></textarea>
							</div>
						</div>
						<div class="submit_set">
							<div class="submit_btn" id="submit">
								<div class="submit_btn_label">{{ __('Submit') }}</div>
								<div class="submit_btn_icon"></div>
							</div>
						</div>
						<input type="hidden" name="interested" />
					</form>


			</div>

		</div>

	</section>
</div>


@endsection


@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		HondaTradeIn();
	});
</script>
@endsection
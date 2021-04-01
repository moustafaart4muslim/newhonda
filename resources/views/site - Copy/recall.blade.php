@extends('layout')
@section('jquery')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
@endsection

@section('title') Honda Egypt Recall @endsection

@section('content')

<div class="wrapper container" id="about">
	<section class="title_box_set">
		<div class="title_box_border"></div>
		<div class="box_set box_red box_center" style="left: 0px; top: 0px;">
			<div class="box_icon box_send_email" style="background-image: url(&quot;structure/icons/recall.png&quot;); left: 0px; transform: rotate(0deg);"></div>
		</div>
		<div class="box_title" style="top: 0px;">Recall</div>
	</section>
	<div class="responsive_title_box">Recall</div>

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
			<div class="notice form_title">For more assistance please call our call center on <strong>19811</strong></div>

			<div class="form_set" style="overflow: visible;">


			<form action="{{ url('recall') }}" id="email_form" method="post">
				@csrf
						<!-- <div class="form_block">
							<div class="form_label">Chassis Number</div>
							<div class="form_input">
								<input type="text" name="num" class="re" placeholder="Chassis Number" <?php if(isset($_GET['ChassisNumber'])) { echo 'value="'.$_GET['ChassisNumber'].'"' ; } ?>/>
							</div>
						</div> -->

						<div class="form_block">
							<div class="form_label">Car Model</div>
							<div class="form_input select re" id="model" data-title="model">
								<div class="select_arrow"></div>
								<div class="select_current">....</div>
								<div class="select_drop_set">
									<div class="select_drop_wrap">
										<ul class="select_options">
											<li>....</li>
											<li>Accord</li>
											<li>Civic</li>
											<li>City</li>
											<li>Jazz</li>
											<li>Fit</li>
											<li>Odyssey</li>
											<li>CR-V</li>
											<li>Pilot</li>
											<li>MR-V</li>
											<li>HR-V</li>
											<li>Stream</li>
											<li>CR-Z</li>
											<li>S200</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">Year</div>
							<div class="form_input select re" id="year" data-title="year">
								<div class="select_arrow"></div>
								<div class="select_current">....</div>
								<div class="select_drop_set">
									<div class="select_drop_wrap">
										<ul class="select_options">
											<li>....</li>
											<li>2017</li>
											<li>2016</li>
											<li>2015</li>
											<li>2014</li>
											<li>2013</li>
											<li>2012</li>
											<li>2011</li>
											<li>2010</li>
											<li>2009</li>
											<li>2008</li>
											<li>2007</li>
											<li>2006</li>
											<li>2005</li>
											<li>2004</li>
											<li>2003</li>
											<li>2002</li>
											<li>2001</li>
											<li>2000</li>
											<li>1999</li>
											<li>1998</li>
											<li>1997</li>
											<li>1996</li>
											<li>1995</li>
											<li>1994</li>
											<li>1993</li>
											<li>1992</li>
											<li>1991</li>
											<li>1990</li>
											<li>1989</li>
											<li>1988</li>
											<li>1987</li>
											<li>1986</li>
											<li>1985</li>
											<li>1984</li>
											<li>1983</li>
											<li>1982</li>
											<li>1981</li>
											<li>1980</li>
											<li>1979</li>
											<li>1978</li>
											<li>1977</li>
											<li>1976</li>
											<li>1975</li>
											<li>1974</li>
											<li>1973</li>
											<li>1972</li>
											<li>1971</li>
											<li>1970</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">Name</div>
							<div class="form_input">
								<input type="text" name="name" class="re" placeholder="Your name" />
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">Email</div>
							<div class="form_input">
								<input type="text" name="email" class="re" placeholder="Your Email" />
							</div>
						</div>

						<div class="form_block">
							<div class="form_label">Phone</div>
							<div class="form_input">
								<input type="text" name="phone" class="re" placeholder="Your phone number" />
							</div>
						</div>
						
						<div class="submit_set">
							<div class="submit_btn" id="submit">
								<div class="submit_btn_label">Send</div>
							</div>
						</div>
						<!-- <p class="form_title" style="padding-top: 190px; z-index: -99;">Honda cares about recalling the cars for the safety!</p> -->

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
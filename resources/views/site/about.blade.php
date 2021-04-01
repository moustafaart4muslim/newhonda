@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection

@section('title') {{ __('About us') }} @endsection

@section('content')


<div class="wrapper normal container" id="About">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red box_center" style="left: 0px; top: 0px;"><div class="box_icon box_about" style="left: 0px; transform: rotate(0deg);"></div></div>
			<div class="box_title" style="top: 0px;">{{ __('About') }}  </div>
		</section>
		<div class="responsive_title_box">{{ __('About') }}  </div>


		<section class="under_box">
			<div class="paragraph_set" style="left: 0px; opacity: 1;">
            <?php
                   $name = "about_" . $db_name;
                   $info = "about_" . $db_info;
                ?>
				<div class="ph3 c_red"> {{ $page->$name }} </div>
				<div class="paragraph pb20">{{ $page->$info}} </div>
			</div>
		</section>
	</div>
@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaAboutus();
		});
	</script>
@endsection

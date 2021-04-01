@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title') Honda Egypt events @endsection


@section('content')

<div class="wrapper normal container" id="Inspiration">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red box_bottom">
				<div class="box_icon box_inspiration">
					<div class="box_inspiration_mask_1 mask_rem"></div>
					<div class="box_inspiration_mask_2 mask_rem"></div>
				</div>				
			</div>
			<div class="box_title">{{__('Events')}}</div>
		</section>
		<div class="responsive_title_box">{{_('Events')}}</div>

		@foreach($model as $event)
			<section class="t_flight" id="t_flight{{ $event->id }}">
				<div class="ph3 c_red">{{ $event->$db_name }}</div> 
				<div class="paragraph pb20">
				{{ $event->$db_info }}
				</div>
			</section>
			<section class="honda_gallery ins2" id="ins{{ $event->id }}">

				<div class="gallery_set">


				
					@foreach($event->getMedia('events') as $media)
						<a href="{{ $media->getFullUrl() }}"  data-lightbox="{{ \Str::slug( $event->en_name ) }}"
							rel="lightbox-{{ \Str::slug( $event->en_name ) }}"
							class="gallery_img_set ins_dis"
							data-categories="{{ \Str::slug( $event->en_name ) }}" 
							style="background-image: url('{{ $media->getUrl("events") }}'); opacity: 1; left: 0px;">
							<div class="gallery_zoom_icon" style="display: none;"></div>
							<div class="gallery_caption_set" style="bottom: -105px; opacity: 0;">
								<div class="gallery_caption_arrow"></div>
								<div class="gallery_caption" style="margin-top: -18px;">{{ $media->getCustomProperty($db_caption ) }}</div>
							</div>
						</a>
					
					
					@endforeach
		
				</div>





			</section>
		@endforeach

	</div> <!-- Wrapper End -->





@endsection





@section('scripts')
<!-- <script type="text/javascript" src="{{ asset( 'assets/javascript/slimbox2.js')}}"></script> -->
<script type="text/javascript" src="{{ asset( 'assets/lightbox/js/lightbox.js')}}"></script>

    <script type="text/javascript">
		$(document).ready(function(e) {
			$('#main_menu').HondaMenu();
			$('#footer').HondaScrollAnimate('footerAnimate');
			$('#Inspiration').HondaGallery({type:'inline'});
			HondaInspiration();
		});
	</script>
	<style>
		footer{
			margin-top: 10px;
		}
	</style>
@endsection

@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title') Honda Egypt Inspiration @endsection


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
			<div class="box_title">Inspiration</div>
		</section>
		<div class="responsive_title_box">Inspiration</div>

		<section class="under_box" id="ins1">
			<div class="paragraph p40">"Do Not Imitate." The mandate of Soichiro Honda echoes in the minds and hearts of everyone at Honda. At Honda, we are constantly striving to seek out new initiatives and stay at the forefront of innovation.<br />As an organization dedicated to the advancement of mobility, we have always targeted leading-edge technologies. From our racing spirit to our dedication to our environmental leadership, it is Honda's mission to develop forward-thinking technologies that anticipate and satisfy the needs of a future society.</div>
			<!-- <div class="ph3 c_red">The Racing Spirit:</div> 
			<div class="paragraph pb20">For almost 50 years, Honda has turned to racing as the perfect training ground for both engineers and designers. According to Soichiro Honda, the pressures of racing challenges people, forces them to find innovative solutions and demands quick, accurate responses to new problems they've never faced before.<br />Racing is ingrained in the corporate culture of Honda. Mr. Honda always stressed that racing teaches teamwork. No single individual can bring success; racing is a group effort.</div>
			<div class="paragraph pb20">Throughout its existence, on both two wheels and four, Honda has raced—and won—at the highest levels. From the Isle of Man TT motorcycle race to the Indy 500, Honda can be found in victory lanes around the world.</div> -->
		</section>
		<?php
			$i =1 ;
		?>
		@foreach($model as $insp)
		<?php
			$i++;
		?>
			<section class="t_flight" id="t_flight{{ $insp->id }}">
				<div class="ph3 c_red">{{ $insp->$db_name }}</div> 
				<div class="paragraph pb20">
				{{ $insp->$db_info }}
				</div>
			</section>
			<section class="honda_gallery ins2" id="ins{{ $i }}">

				<div class="gallery_set">


				
					@foreach($insp->getMedia('inspirations') as $media)
						<a href="{{ $media->getFullUrl() }}"  data-lightbox="{{ \Str::slug($insp->en_name ) }}"
							rel="lightbox-{{ \Str::slug($insp->en_name ) }}"
							class="gallery_img_set ins_dis"
							data-categories="{{ \Str::slug($insp->en_name ) }}" 
							style="background-image: url('{{ $media->getUrl("inspirations") }}'); opacity: 1; left: 0px;">
							<div class="gallery_zoom_icon" style="display: none;"></div>
							<div class="gallery_caption_set" style="bottom: -105px; opacity: 0;">
								<div class="gallery_caption_arrow"></div>
								<div class="gallery_caption" style="margin-top: -18px;">{{ $media->getCustomProperty($db_caption ) }}</div>
							</div>
						</a>
					
					
					@endforeach
				</div>






				@if($insp->video)

					<div class="single_video_set ins_dis">
						<div class="video_data_set">
							<div class="video_data ins_dis">
								<div class="video_title ins_dis">
								
									{{$insp->video_title}}
								</div>
								<div class="video_sub_title ins_dis">{{$insp->video_brief}}</div>
							</div>
						</div>
						<div class="video_set container-fluid">
							<div class="video_thumb">
								<!-- <img src="{{ $insp->getMedia('inspirations')[0]->getFullUrl() }}" class="img-fluid video_img"> -->
								<!-- <div id="video_embed" data-title="inspiration" ></div> -->
								<div id="video_embed" data-id="4" style="display: block;">
									<iframe src="//player.vimeo.com/video/{{ $insp->video}}?title=0&byline=0&portrait=0&color=ed1b2f&autoplay=0" width="719" height="404" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
								</div>	
							</div>
						</div>
					</div>
				@endif
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

@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection

@section('title') {{__('Home')}} @endsection

@section('content')


<main class="wrapper normal" id="home">
		<div class="container">


			<section id="main_slider" class="main_slider">

				<a href="{{ url('recall') }}" class="recall_button">
					<i></i>
					<span>{{ __('Recall') }}</span>
				</a>
	
				<div class="sQuery slider_img_set">

                
                        @foreach($slider_images as $slide)
                            <?php 
								//<div class="slider_img" style="background: url({{ $image['media']->getFullUrl()}}) center center no-repeat rgb(238, 238, 238); width: 1546px;" id="{{ $image['media']->getCustomProperty($db_caption) }}" data-title="{{ $image['media']->getCustomProperty($db_info) }}" data-link="{{ $image['media']->getCustomProperty('link') }}"></div>                
							?>

							<div class="slider_img" style="background: url({{ url('storage/' . $slide->image ) }}) center center no-repeat rgb(238, 238, 238); width: 1546px;"
							 id="{{ $slide->$db_title }}" data-title="{{ $slide->$db_desc }}"
							 data-link="{{ $slide->link }}"></div>                



							 
                        @endforeach
                </div>
				<div class="sQuery caption_set">
					<div class="read_more_block">
						<div class="read_more_title">
							<span>{{ __('Read More') }}</span>
						  <div class="read_more_arrow"></div>
						</div>
					</div>
					<div class="ResCaption inner_caption">
						<div class="ResCaption caption">
							<div class="caption_block">
								<a href="{{$slider_images[0]->link  }}">
									<div class="caption_head"> {{$slider_images[0]->$db_title  }} </div>
									<div class="caption_details"> {{$slider_images[0]->$db_desc  }} </div>
								</a>
							</div>
						</div>
					</div> 
				</div>
	
				<a href="#" class="slider_arrows next" id="next"></a>
				<a href="#" class="slider_arrows prev" id="prev"></a>
			</section>
			</div>


		<section class="five_stars_set">
			<div id="fsTitle" class="five_stars_title_set">
			<div class="five_stars_year"></div>
			<div class="five_stars_title">{{ __('Honda') }} {{ __('five stars') }} <br >{{ __('services') }}</div>
			</div>
			<div id="fsDetails" class="five_stars_details">{{ $fivestars_text }}</div>
        
			<div class="five_stars_services_set">
				<div class="five_stars_logo">
					<div class="five_stars_arrow"></div>
				</div>

				<div class="five_stars_block warranty start" id="warranty" data-serv="{{ __('Warranty') }}" data-title="193" onclick="window.open('fivestars/','_self')">
				  <div class="five_stars_block_logo"></div>
				</div>

				<div class="five_stars_block trade_in" id="trade-in" data-serv="{{ __('Trade In') }}" data-title="347" onclick="window.open('fivestars/','_self')">
					<div class="five_stars_block_logo"></div>
				</div>

				<div class="five_stars_block maintenancee" id="maintenancee" data-serv="{{ __('Maintenance') }}" data-title="501" onclick="window.open('fivestars/','_self')">
					<div class="five_stars_block_logo"></div>
				</div>

				<div class="five_stars_block test_drive" id="test_drive" data-serv="{{ __('Test Drive') }}" data-title="655" onclick="window.open('fivestars/','_self')">
					<div class="five_stars_block_logo"></div>
				</div>

				<div class="five_stars_block insurance" id="insurance" data-serv="{{ __('Insurance') }}" data-title="809" onclick="window.open('fivestars','_self')">
					<div class="five_stars_block_logo"></div>
				</div>

			</div>
		</section> 

		<div class="container" id="home_responsive">
        
			<div class="five_stars_services_set_responsive row">
				<div class="col-12 col-sm-12 five_star_pointer ">
					<div class="five_stars_logo_responsive " >
					</div>
				</div>
				<div class="five_stars_block_responsive  col-12 col-sm-6 warranty start"  data-title="193" onclick="window.open('FiveStars/','_self')">
				  <div class="five_stars_block_logo_responsive">
					  <div class="five_stars_text m-auto">
						<h2>Honda {{ __('warranty') }}</h2>
						<a href='{{ url("warranty") }}'>{{__('Read More')}}</a>
  
					  </div>
				  </div>
				</div>

				<div class="five_stars_block_responsive col-12 col-sm-6 trade_in"   data-title="347" onclick="window.open('FiveStars/','_self')">
					<div class="five_stars_block_logo_responsive">
						<div class="five_stars_text m-auto">
							<h2>{{ __('Trade In') }}</h2>
							<a href='{{ url("trade-in") }}'>{{ __('Read More') }}</a>
	  
						  </div>
	
					</div>
				</div>

				<div class="five_stars_block_responsive col-12 col-sm-6 maintenancee"  data-title="501" onclick="window.open('FiveStars/','_self')">
					<div class="five_stars_block_logo_responsive">

						<div class="five_stars_text m-auto">
							<h2>{{ __('Maintenance') }}</h2>
							<a href='{{ url("maintenance") }}'>{{ __('Read More') }}</a>
	  
						  </div>
	  					</div>
				</div>

				<div class="five_stars_block_responsive col-12 col-sm-6 test_drive"  data-title="655" onclick="window.open('FiveStars/','_self')">
					<div class="five_stars_block_logo_responsive">

						<div class="five_stars_text m-auto">
							<h2>{{ __('Test Drive') }}</h2>
							<a href='{{ url("test-drive") }}'>{{ __('Read More') }}</a>
	  
						  </div>
	

					</div>
				</div>

				<div class="five_stars_block_responsive col-12 insurance"  data-title="809" onclick="window.open('FiveStars/','_self')">
					<div class="five_stars_block_logo_responsive">

						<div class="five_stars_text m-auto">
							<h2>{{ __('Insurance') }}</h2>
							<a href='{{ url("fivestars") }}'>{{ __('Read More') }}</a>	  
                        </div>
	

					</div>
				</div>

			</div>
		</div>


	</main>
	

@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaHomePage();
		});
	</script>
@endsection


	
	<footer class="footer_set static" id="footer">
	<div class="footer_main container">
		<div class="footer_container row">
			<section class="footer_grid col-lg-2 col-sm-4 col-6 pl-0 pr-0   ">
				<h5 class="footerh5">{{ __('Home') }}</h5>
				<ul>
					<li><a href="{{ url('about') }}">{{ __('About') }}</a></li>
					<li><a href="{{ url('cars') }}">{{ __('Cars') }}</a></li>
					<li><a href="{{ url('motorcycles') }}">{{ __('Motorcycles') }}</a></li>
            	    <li><a href="{{ url('find-cars-dealer') }}">{{ __('Find a dealer') }}</a></li>
					<li><a href="{{ url('maintenance') }}">{{ __('Maintenance Booking') }}</a></li>
					<li><a href="{{ url('recall') }}">{{ __('Recall') }}</a></li>
				</ul>
			</section><section class="footer_grid col-lg-2 col-sm-4 col-6 pl-0 pr-0  ">
				<h5 class="footerh5">{{__('Honda')}} {{__('Cars')}}</h5>
				<ul>
                    @foreach($cars as $car)
    					<li><a href="{{ urls('cars', $car->en_name, $car->id ) }} "> {{$car->$db_name }} </a></li>

                    @endforeach
				</ul>
			</section><section class="footer_grid  col-lg-2 col-sm-4 col-6  pl-0 pr-0 ">
				<h5 class="footerh5">{{ __('Motorcycles') }}</h5>
				<ul>
                    @foreach($motors as $motor)
    					<li><a href="{{ urls('motors', $motor->en_name, $motor->id ) }} "> {{$motor->$db_name }} </a></li>
                        
                    @endforeach
				</ul>
			</section><section class="footer_grid  col-lg-1  col-sm-4 col-6  pl-0 pr-0  ">
				<h5 class="footerh5">{{ __('Five Stars') }}</h5>
				<ul>
					<li><a href="{{ url('fivestars') }}">{{ __('Warranty') }}</a></li>
					<li><a href="{{ url('trade-in') }}">{{ __('Trade In') }}</a></li>
					<li><a href="{{ url('maintenance') }}">{{ __('Maintenance') }}</a></li>
					<li><a href="{{ url('test-drive') }}">{{ __('Test Drive') }}</a></li>
					<li><a href="{{ url('fivestars') }}">{{ __('Insurance') }}</a></li>
					<li><a href="{{ url('recall') }}">{{ __('Recall') }}</a></li>


				</ul>
			</section><section class="footer_grid   col-lg-2 col-sm-4 col-12  pl-0 pr-0  last" style="margin-left: -10px; margin-right: 10px;">
				<h5 class="footerh5">{{ __('Contact Us') }}</h5>
				<ul>
					<li><a href="{{ url('locations') }}/">{{ __('Honda Locations') }}</a></li>
					<!-- <li><a href="{{ url('fivestars') }}">Social Network</a></li> -->
					<li><a href="{{ url('contact/send') }}">{{ __('Send us an E-mail') }}</a></li>
				</ul>
			</section><section class="footer_stalk col-lg-3 col-sm-4  col-12 pl-0 pr-0">
				<div class="footer_stalk_block first">
					<h5 class="footerh5">{{ __('call center') }}</h5>
					<div class="hot_line_icon"></div>
					<div class="hot_line">
						<span class='cursor-pointer' 
							onclick="window.open('tel:{{ setting('phone_number')  }}')">{{ setting('phone_number')  }}</span>

                        
                    </div>
					<div class="hot_line_title">{{ __('Call now for more informations') }}</div>
				</div>

				<div class="footer_stalk_block social_footer">
					<h5 class="footerh5 st">{{ __('Follow us') }}</h5>
					<a href="{{ setting('facebook') }}" target="_blank" class="facebook">facebook</a>
					<a href="{{ setting('twitter') }}" target="_blank" class="twitter" style="left: 0px; opacity: 1;">twitter</a>
					<a href="{{ setting('youtube') }}" target="_blank" class="youtube" style="left: 0px; opacity: 1;">youtube</a>
					<a href="{{ setting('vimeo') }}" target="_blank" class="vimeo" style="left: 0px; opacity: 1;">vimeo</a>
					<a href="{{ setting('instagram') }}" target="_blank" class="instagram" style="left: 0px; opacity: 1;">instagram</a>

				</div>


				<div class="footer_stalk_block last">
					<div class="like_us">
						<div class="like_icon"></div>
						<div class="like_data">{{ __('Like us') }}</div>
						<div class="like_btn"><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FHondaEgypt&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=615740925144427" scrolling="no" frameborder="0" style="background-color: #f3f3f3; border: none; overflow: hidden; width: 120px; height: 21px; margin-top: 4px;" allowtransparency="true"></iframe></div>
					</div>
				</div>
					</br>
					<div class="developed_by">{{ __('Developed by ') }}<a href="https://www.invadems.com" target="_blank">INVADE media solutions</a></div>

			</section>
		</div>
	</div>
</footer>

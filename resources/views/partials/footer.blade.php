
	
	<footer class="footer_set static" id="footer">
	<div class="footer_main container">
		<div class="footer_container row">
			<section class="footer_grid col-lg-2 col-sm-4 col-6 pl-0 pr-0   ">
				<h5 class="footerh5">Home</h5>
				<ul>
					<li><a href="{{ url('about') }}">About</a></li>
					<li><a href="{{ url('cars') }}">Cars</a></li>
					<li><a href="{{ url('motorcycles') }}">Motorcycles</a></li>
            	    <li><a href="{{ url('find-cars-dealer') }}">Find a dealer</a></li>
					<li><a href="{{ url('maintenance') }}">Maintenance Booking</a></li>
					<li><a href="{{ url('recall') }}">Recall</a></li>
				</ul>
			</section><section class="footer_grid col-lg-2 col-sm-4 col-6 pl-0 pr-0  ">
				<h5 class="footerh5">Honda Cars</h5>
				<ul>
                    @foreach($cars as $car)
    					<li><a href="{{ urls('cars', $car->en_name, $car->id ) }} "> {{$car->$db_name }} </a></li>

                    @endforeach
				</ul>
			</section><section class="footer_grid  col-lg-2 col-sm-4 col-6  pl-0 pr-0 ">
				<h5 class="footerh5">Motorcycles</h5>
				<ul>
                    @foreach($motors as $motor)
    					<li><a href="{{ urls('motors', $motor->en_name, $motor->id ) }} "> {{$motor->$db_name }} </a></li>
                        
                    @endforeach
				</ul>
			</section><section class="footer_grid  col-lg-1  col-sm-4 col-6  pl-0 pr-0  ">
				<h5 class="footerh5">Five Stars</h5>
				<ul>
					<li><a href="{{ url('fivestars') }}">Warranty</a></li>
					<li><a href="{{ url('trade-in') }}">Trade-In</a></li>
					<li><a href="{{ url('maintenance') }}">Maintenance</a></li>
					<li><a href="{{ url('test-drive') }}">Test Drive</a></li>
					<li><a href="{{ url('fivestars') }}">Insurance</a></li>
				</ul>
			</section><section class="footer_grid   col-lg-2 col-sm-4 col-12  pl-0 pr-0  last">
				<h5 class="footerh5">Contact Us</h5>
				<ul>
					<li><a href="{{ url('locations') }}/">Honda Locations</a></li>
					<!-- <li><a href="{{ url('fivestars') }}">Social Network</a></li> -->
					<li><a href="{{ url('contact/send') }}">Send us an E-mail</a></li>
				</ul>
			</section><section class="footer_stalk col-lg-3 col-sm-4  col-12 pl-0 pr-0">
				<div class="footer_stalk_block first">
					<h5 class="footerh5">call center</h5>
					<div class="hot_line_icon"></div>
					<div class="hot_line">
						<span class='cursor-pointer' 
							onclick="window.open('tel:{{ setting('phone_number')  }}')">{{ setting('phone_number')  }}</span>

                        
                    </div>
					<div class="hot_line_title">Call now for more informations</div>
				</div>

				<div class="footer_stalk_block social_footer">
					<h5 class="footerh5 st">Follow us</h5>
					<a href="{{ setting('facebook') }}" target="_blank" class="facebook">facebook</a>
					<a href="{{ setting('twitter') }}" target="_blank" class="twitter" style="left: 0px; opacity: 1;">twitter</a>
					<a href="{{ setting('youtube') }}" target="_blank" class="youtube" style="left: 0px; opacity: 1;">youtube</a>
					<a href="{{ setting('vimeo') }}" target="_blank" class="vimeo" style="left: 0px; opacity: 1;">vimeo</a>
					<a href="{{ setting('instagram') }}" target="_blank" class="instagram" style="left: 0px; opacity: 1;">instagram</a>

				</div>


				<div class="footer_stalk_block last">
					<div class="like_us">
						<div class="like_icon"></div>
						<div class="like_data">Like us<br >Total likes <span id="Likes" class="likes" data-title="" data-id=""></span></div>
						<div class="like_btn"><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FHondaEgypt&amp;width=450&amp;height=21&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=615740925144427" scrolling="no" frameborder="0" style="background-color: #f3f3f3; border: none; overflow: hidden; width: 120px; height: 21px; margin-top: 4px;" allowtransparency="true"></iframe></div>
					</div>
				</div>
					</br>
					<div class="developed_by">Developed by <a href="https://www.invadems.com" target="_blank">INVADE media solutions</a></div>

			</section>
		</div>
	</div>
</footer>

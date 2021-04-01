@extends('layout')
@section('jquery') 

	<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	crossorigin="anonymous"></script>

@endsection
@section('title') CEO Message @endsection


@section('content')


<div class="wrapper normal container" id="about">
		<section class="title_box_set">
			<div class="title_box_border"></div>
			<div class="box_set box_red box_center" style="left: 0px; top: 0px;"><div class="box_icon box_ceo" style="left: 0px; transform: rotate(0deg);"></div></div>
			<div class="box_title" style="top: 0px;">CEO message</div>
		</section>
		<div class="responsive_title_box">CEO message</div>

		<section class="under_box">
            <?php
                   $info = $db_prefix . "_ceo";
                   
			?>
			{!! $page->$info !!}
			</div>
		</section>



<!-- 
		<section class="under_box">
			<div class="ceo_set">
				<div class="ceo_img" style="left: 0px;"><img src="structure/people/takanobu_ito.png" width="150" height="150" alt="Takanobu Ito"></div>
				<div class="ceo_msg_set" style="opacity: 1;">
					<div class="msg">Sharing joys with people around the world Ever since the foundation of our company, Honda associates have been demonstrating a challenging spirit, wanting to bring joy to people, contribute to society with our technologies and create new products that people have never seen anywhere in the world. With such a challenging spirit, we have been consistently pursuing the development of technologies that are useful to people in their daily lives and products that please our customers. In recent years, our business environment has been marked by significant changes, including the transformation of the global economy and market structure as well as acceleration of environmental initiatives on a global basis. Facing such changes squarely, Honda has been strengthening and optimizing its global business operations in order to deliver good products with speed, affordability and low CO2 emissions to our customers in every region around the world. We will continue enhancing our unique corporate culture and pursue our uninterrupted challenge to share joys with people around the world through technologies, products and corporate activities unique to Honda.</div>
					<div class="pos">Takanobu Ito, President, CEO and Representative Director<br>June 2013</div>
				</div>
			</div>

			<div class="ceo_set last">
				<div class="ceo_img" style="left: 0px;"><img src="structure/people/sherif_mahmoud.png" width="150" height="150" alt="Sherif Mahmoud"></div>
				<div class="ceo_msg_set" style="opacity: 1;">
					<div class="msg">We, at Al-Futtaim, are dedicated to supplying Honda products of the highest quality, yet at a reasonable price for global Customer satisfaction.  We live by our company mission statement of: "Together we strive to be an outstanding Company achieving Customers for Life”. <br>This is built around six key values: to be welcoming, trustworthy, respectful, innovative, inspiring and ambitious.  These core value are the basis upon which we have built and continue to build, such a successful business.</div>
					<div class="pos">Sherif Mahmoud<br>General Manager</div>
				</div>
			</div>
		</section> -->













	</div>
@endsection


@section('scripts')
    <script type="text/javascript">
		$(document).ready(function(e) {
			HondaCEO();
		});
	</script>
@endsection

<div class="load" id="load">
		<div class="logo_load_set">
			<div class="percentage"><span id="percentage">0</span><span class="percentage_mark">%</span></div>
			<div class="logo_pe_mask"></div>
			<div class="logo_sl_mask"></div>
			<div class="logo_load_mask"></div>
			<div class="logo_load_solid"></div>
		</div>
	</div>

	<div class="remove pat"></div>
	<div class="remove ref"></div>

	<div class="container">

		<nav class="responvsive_nav navbar navbar-expand-lg navbar-light bg-light" id="responvsive_nav">
			<a class="navbar-brand ins_dis" href="{{ url('/') }}">
				<a href="{{ url('/') }}"><img src="structure/ui/logo_default.png" width="130" height="94" alt="Honda logo" ></a>
			</a>
			<button class="navbar-toggler ins_dis" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
		
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('about') }}">About Honda</a>
                        <a class="dropdown-item" href="{{ url('ceo') }}">CEO Message</a>
                        <a class="dropdown-item" href="{{ url('events') }}">Events</a>
                        <a class="dropdown-item" href="{{ url('inspiration') }}">Inspiration</a>
                        <a class="dropdown-item" href="{{ url('environment') }}">Environment</a>
                    </div>
				</li>


				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cars
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($cars as $car)
                            <a class="dropdown-item" href="{{ urls('cars', $car->en_name, $car->id) }}">{{ $car->$db_name}}</a>
                        @endforeach
                    </div>
				</li>
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Motorcycles
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($motors as $motor)
                            <a class="dropdown-item" href="{{ urls('motors', $motor->en_name, $motor->id) }}">{{ $motor->$db_name}}</a>
                        @endforeach
                    </div>
				</li>
<!-- 
				<li class="nav-item active">
    				<a class="nav-link" href="{{ url('motorcycles')}}"> </a>
				</li> -->

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Five stars
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('fivestars') }}">Warranty</a>
                        <a class="dropdown-item" href="{{ url('trade-in') }}">Trade-In</a>
                        <a class="dropdown-item" href="{{ url('maintenance') }}">Maintenance</a>
                        <a class="dropdown-item" href="{{ url('test-drive') }}">Test Drive</a>
                        <a class="dropdown-item" href="{{ url('fivestars') }}">Insurance</a>
                    </div>
				</li>

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Find a dealer
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('find-cars-dealer') }}">Cars</a>
                        <a class="dropdown-item" href="{{ url('find-motocycles-dealer') }}">Motorcycles</a>
                    </div>
				</li>

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Honda owners
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('maintenance') }}">Maintainence</a>
                        <a class="dropdown-item" href="{{ url('recall') }}">Recall</a>
                    </div>
				</li>

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contact us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('locations') }}">Locations</a>
                        <a class="dropdown-item" href="{{ url('contact/send') }}">Send email</a>
                    </div>
				</li>


				<li class="nav-item {{ config('app.ar')? '':'d-none' }}" >
					<a class="nav-link" href="{{ \App\Http\Controllers\BaseController::changeLangUrl() }}"  aria-hidden="false"> {{ $other_language }}</a>
				</li>
			</ul>
			</div>
		</nav>
	
		<header class="fx_hdr ">
			<div class="container">
	
			<nav class="hdr_sett">
				<div class="float-right mr-10 mt-2 change_lang_btn {{ config('app.ar')? '':'d-none' }}">
					<a href="{{ \App\Http\Controllers\BaseController::changeLangUrl() }}"
					 class='text-danger'> {{ $other_language }}</a>
				</div>  

				<div class="logo_set ml-10">
					<a href="{{ url('/') }}"><img src="structure/ui/logo_default.png" width="130" height="94" alt="Honda logo" ></a>
				</div>
			<div class="menu_set" id="main_menu">
				<div class="menu" id="menu">
					<ul>
						<li><a rel="sub_about" {{ $mod == "about"? "class=selected" : "" }} href="{{ url('about') }}">About</a></li>
						<li><a rel="sub_cars"  {{ $mod == "cars"? "class=selected" : "" }} href="#">Cars</a></li>
						<li><a rel="sub_motor"  {{ $mod == "motor"? "class=selected" : "" }} href="{{ url('motorcycles') }}">Motorcycles</a></li>
						<li><a rel="sub_fs"  {{ $mod == "fivestars"? "class=selected" : "" }} href="{{ url('fivestars') }}">Five stars</a></li>
						<li><a rel="sub_fd"  {{ $mod == "dealers"? "class=selected" : "" }} href="#">Find a dealer</a></li>
						<li><a rel="sub_mb"  {{ $mod == "owners"? "class=selected" : "" }} href="{{ url('maintenance') }}">Honda Owners</a></li>
						<li><a rel="sub_contact"  {{ $mod == "contact"? "class=selected" : "" }} href="#">Contact us</a></li>
					</ul>
				</div> 
				<div class="sub_menu">
					<div class="mQuery sub_menu_item" id="sub_about">
						<a href="{{ url('about') }}" class="first">About Honda</a>
						<a href="{{ url('ceo') }}">CEO Message</a>
						<a href="{{ url('events') }}">Events</a>
						<a href="{{ url('inspiration') }}">Inspiration</a>
						<a href="{{ url('environment') }}" class="last">Environment</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_fs">
						<a href="{{ url('fivestars') }}" class="first">Warranty</a>
						<a href="{{ url('trade-in') }}">Trade In</a>
						<a href="{{ url('maintenance') }}">Maintenance</a>
						<a href="{{ url('test-drive') }}">Test Drive</a>
						<a href="{{ url('fivestars') }}" class="last">Insurance</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_fd">
						<a href="{{ url('find-cars-dealer') }}" class="first">Cars</a>
						<a href="{{ url('find-motocycles-dealer') }}" class="last">Motorcycles</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_mb">
						<a href="{{ url('maintenance') }}" class="first">Maintenance Booking</a>
						<a href="{{ url('recall') }}" class="last">Recall</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_contact">
						<a href="{{ url('locations') }}" class="first">Honda Locations</a>
						<!-- <a href="Social/">Social Network</a> -->
						<a href="{{ url('contact/send') }}" class="last">Send an E-mail</a>
					</div>
                    <div class="mQuery sub_menu_box" id="sub_cars" style="width: 442px; display: none; left: 57px;">
                        @foreach($cars as $car)
                            <a href="{{ urls('cars', $car->en_name, $car->id ) }}" 
                                class="sub_menu_box_element first" 
                                style="margin-top: 6px; opacity: 0;">
                                    <div class="sub_name" style="opacity: 1;">
                                    Honda {{ $car->$db_name }}
                                    </div><img
                                        src="{{ url( 'storage/' . $car->thumb) }}" alt="{{ $car->$db_name }}"
                                        class="img-fluid"
                                        style="margin-left: 0px; max-height: 75px;"></a>

                        @endforeach
                    </div>
				</div>
			</div>

			<!-- Responsive menu -->



			</nav>
			</div>
		</header> 





	</div>
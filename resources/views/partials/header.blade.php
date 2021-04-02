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
                        {{ __('About') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('about') }}">{{ __('About Honda') }}</a>
                        <a class="dropdown-item" href="{{ url('ceo') }}">{{ __('CEO Message') }}</a>
                        <a class="dropdown-item" href="{{ url('events') }}">{{ __('Events') }}</a>
                        <a class="dropdown-item" href="{{ url('inspiration') }}">{{ __('Inspiration') }}</a>
                        <a class="dropdown-item" href="{{ url('environment') }}">{{ __('Environment') }}</a>
                    </div>
				</li>


				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Cars') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($cars as $car)
                            <a class="dropdown-item" href="{{ urls('cars', $car->en_name, $car->id) }}">{{ __('Honda') }} {{ $car->$db_name}}</a>
                        @endforeach
                    </div>
				</li>
				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ __('Motorcycles') }}
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
						{{ __('Five stars') }} 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('fivestars') }}"> {{ __('Warranty') }}</a>
                        <a class="dropdown-item" href="{{ url('trade-in') }}">{{ __('Trade In') }}</a>
                        <a class="dropdown-item" href="{{ url('maintenance') }}">{{ __('Maintenance') }}</a>
                        <a class="dropdown-item" href="{{ url('test-drive') }}">{{ __('Test Drive') }}</a>
                        <a class="dropdown-item" href="{{ url('fivestars') }}">{{ __('Insurance') }}</a>
                    </div>
				</li>

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ __('Find a dealer') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('find-cars-dealer') }}">{{ __('Cars') }}</a>
                        <a class="dropdown-item" href="{{ url('find-motocycles-dealer') }}">{{ __('Motorcycles') }}</a>
                    </div>
				</li>

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ __('Honda Owners') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('maintenance') }}">{{ __('Maintenance') }}</a>
                        <a class="dropdown-item" href="{{ url('recall') }}">{{ __('Recall') }}</a>
                    </div>
				</li>

				<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{ __('Contact us') }} 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('locations') }}">{{ __('Locations') }}</a>
                        <a class="dropdown-item" href="{{ url('contact/send') }}">{{ __('Send email') }}</a>
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
						<li><a rel="sub_about" {{ $mod == "about"? "class=selected" : "" }} href="{{ url('about') }}">{{ __('About') }}</a></li>
						<li><a rel="sub_cars"  {{ $mod == "cars"? "class=selected" : "" }} href="#">{{ __('Cars') }}</a></li>
						<li><a rel="sub_motor"  {{ $mod == "motor"? "class=selected" : "" }} href="{{ url('motorcycles') }}">{{ __('Motorcycles') }}</a></li>
						<li><a rel="sub_fs"  {{ $mod == "fivestars"? "class=selected" : "" }} href="{{ url('fivestars') }}">{{ __('Five stars') }}</a></li>
						<li><a rel="sub_fd"  {{ $mod == "dealers"? "class=selected" : "" }} href="#">{{ __('Find a dealer') }}</a></li>
						<li><a rel="sub_mb"  {{ $mod == "owners"? "class=selected" : "" }} href="{{ url('maintenance') }}">{{ __('Honda Owners') }}</a></li>
						<li><a rel="sub_contact"  {{ $mod == "contact"? "class=selected" : "" }} href="#">{{ __('Contact us') }}</a></li>
					</ul>
				</div> 
				<div class="sub_menu">
					<div class="mQuery sub_menu_item" id="sub_about">
						<a href="{{ url('about') }}" class="first">{{ __('About Honda') }}</a>
						<a href="{{ url('ceo') }}">{{ __('CEO Message') }}</a>
						<a href="{{ url('events') }}">{{ __('Events') }}</a>
						<a href="{{ url('inspiration') }}">{{ __('Inspiration') }}</a>
						<a href="{{ url('environment') }}" class="last">{{ __('Environment') }}</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_fs">
						<a href="{{ url('fivestars') }}" class="first">{{ __('Warranty') }}</a>
						<a href="{{ url('trade-in') }}">{{ __('Trade In') }}</a>
						<a href="{{ url('maintenance') }}">{{ __('Maintenance') }}</a>
						<a href="{{ url('test-drive') }}">{{ __('Test Drive') }}</a>
						<a href="{{ url('fivestars') }}" class="last">{{ __('Insurance') }}</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_fd">
						<a href="{{ url('find-cars-dealer') }}" class="first">{{ __('Cars') }}</a>
						<a href="{{ url('find-motocycles-dealer') }}" class="last">{{ __('Motorcycles') }}</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_mb">
						<a href="{{ url('maintenance') }}" class="first">{{ __('Maintenance Booking') }}</a>
						<a href="{{ url('recall') }}" class="last">{{ __('Recall') }}</a>
					</div>
					<div class="mQuery sub_menu_item" id="sub_contact">
						<a href="{{ url('locations') }}" class="first">{{ __('Honda Locations') }}</a>
						<!-- <a href="Social/">Social Network</a> -->
						<a href="{{ url('contact/send') }}" class="last">{{ __('Send an E-mail') }}</a>
					</div>
                    <div class="mQuery sub_menu_box" id="sub_cars" style="width: 442px; display: none; left: 57px;">
                        @foreach($cars as $car)
                            <a href="{{ urls('cars', $car->en_name, $car->id ) }}" 
                                class="sub_menu_box_element first" 
                                style="margin-top: 6px; opacity: 0;">
                                    <div class="sub_name" style="opacity: 1;">
                                    {{ __('Honda') }} {{ $car->$db_name }}
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
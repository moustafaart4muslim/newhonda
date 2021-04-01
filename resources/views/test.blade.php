<?php

//Get

use App\Models\Car;
use Spatie\Image\Image;

$car = Car::find(4);
$url = $car->getMedia('front_wheel')->first()->getUrl('front_wheel');
// dd($url);
$media = $car->getMedia('front_wheel')->first();	
// dd($media->manipulations['wheel']['manualCrop']);
dd($media);
// $file = storage_path( 'app/public/wheels/' . $media->id . '/'  . $media->file_name);
// $cropped = storage_path( 'app/public/wheels/' . $media->id . '/'  . 'cropped.png');
$dimentions_str =  $media->manipulations['wheel']['manualCrop'];
$dimentions = explode(",", $dimentions_str);
// dd(Image::load($file )->getHeight());
// Image::load($file )
//     ->manualCrop($dimentions[0],$dimentions[1],$dimentions[2],$dimentions[3],)
//     // ->apply()
//     ->save($cropped)
//     ;

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<base href="/" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="copyright" content="Copyright &copy; 2013 Egypt Honda Motor Co., Inc." />
	<meta name="robots" content="NOODP" />
	<meta name="author" content="Bahaa Samir" />



	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<link href="_/styles/reset.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="_/styles/layout.css?v=2" rel="stylesheet" type="text/css" media="screen" />
	<link href="_/styles/Gallery.css" rel="stylesheet" type="text/css" media="screen" />
	<link href="_/styles/responsive.css" rel="stylesheet" type="text/css" media="screen" />
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script type="text/javascript" src="_/javascript/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="_/javascript/jquery.transit.min.js"></script>
	<script type="text/javascript" src="_/javascript/jquery.HondaSlider.js"></script>

	<script type="text/javascript" src="_/javascript/slimbox2.js"></script>
	<script type="text/javascript" src="_/javascript/jquery-migrate.js"></script>
	<script type="text/javascript" src="_/javascript/jquery.quicksand.js"></script>
	<script type="text/javascript" src="_/javascript/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="_/javascript/jQueryRotateCompressed.js"></script>
	<script type="text/javascript" src="_/javascript/quicksandpaginated.jquery.js"></script>

	<script type="text/javascript" src="_/javascript/jquery.uncachedimg.js"></script>
	<script type="text/javascript" src="_/javascript/functions.js"></script>
	<script type="text/javascript" src="_/javascript/script.js?v=1"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			HondaCar()
		});
	</script>
    <style>
        .car_wheel{
            border-radius: 50%;
        }
    </style>
</head>

<body id="main" class="hed_ed">
				
	<?php 
    /*
    do { ?>
	<div class="remove" style="background:url('structure/cars/colors/src/<?php echo $row_colors_load['car']?>.png')"></div>
	<?php } while ($row_colors_load = mysql_fetch_assoc($colors_load)); 
    
    */
    ?>



	<div class="wrapper w_ve" id="Car">
		


		<section class="ve_container con_colors" data-title="Colors" id="CarColors">
			<div class="con_title_set title_red" id="title2">
				<div class="title_shape red_shape"></div>
				<div class="title_arrow red_arrow"></div>
				<div class="con_title">ff<br />Colors</div>
			</div>
			<div class="car_set">
				<div class="car_adj">
					<div class="car">
						<div class="car_wheel" style="left:141px; bottom:166px; background-image:url('http://honda.local/storage/wheels/80/cropped.png');"></div>
						
						<img src="http://honda.local/storage/wheels/80/white.png"/>
					</div>
				</div>
			</div>

			<div class="color_buttons_set">
				<?php
                /*
                do { ?>
				<div class="color_button" style="background:<?php echo $row_colors['color']?>; <?php if($row_colors['border'] == 'yes') echo 'border: 1px solid #ccc;'; ?>" data-car="<?php echo $row_colors['car']?>"></div>
				<?php } while ($row_colors = mysql_fetch_assoc($colors));
                */
                ?>
				<div class="color_ins">click on the color to view on the model</div>
			</div>
		</section>

		<div class="clr_brd"></div>


	</div> <!-- Wrapper End -->



</body>
</html>
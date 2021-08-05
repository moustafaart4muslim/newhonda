<?php
use Spatie\MediaLibrary\HasMedia;
use DmitryBubyakin\NovaMedialibraryField\TransientModel;
use Illuminate\Http\UploadedFile;

/**
 * Helper  functions
 * Globally available
 */
function sub_menu_href($id){
    // 1 about
    // 2 ceo
    // 3 events
    // 4 inspiration
    // 5 environment
    if($id == 1){
        $segment = 'about';
    }
    if($id == 2){
        $segment = 'ceo';
    }
    if($id == 3){
        $segment = 'events';
    }
    if($id == 4){
        $segment = 'inspiration';
    }
    if($id == 5){
        $segment = 'environment';
    }
    return url($segment);

}

function menu_class($id,$mod){
    if($id == 6){
        $mod_check  = 'about';
    }

    if($id == 1){
        $mod_check  = 'cars';
    }

    if($id == 2){
        $mod_check  = 'motor';
    }

    if($id == 3){
        $mod_check  = 'fivestars';
    }

    if($id == 4){
        $mod_check  = 'dealers';
    }

    if($id == 5){
        $mod_check  = 'contact';
    }

    if($mod == $mod_check){
        return "class=selected";
    }else{
        return '';
    } 
}
function menu_href($id){

    if($id == 6){
        $segment  = 'about';
    }

    if($id == 1){
        $segment  = '#';
    }

    if($id == 2){
        $segment  = 'motorcycles';
    }

    if($id == 3){
        $segment  = 'services';
    }

    if($id == 4){
        $segment  = '#';
    }

    if($id == 5){
        $segment  = '#';
    }

    if($segment == '#'){
        return '#';
    }else{
        return url($segment);
    }

}
function brtonl($text){
    return str_replace('<br>', "\n", str_replace('<br />', "\n", $text ) );
}


function setRandomMediaName(HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
    if ($model instanceof TransientModel) {
        $collectionName = $fieldUuid;
    }
    
    //File name
    $extension = $file->extension();
    $random_file_name = $model->en_name . '-images-' . \Str::random(10) . '.' . $extension;


    return $model
    ->addMedia($file)
    ->usingFileName($random_file_name)
    ->toMediaCollection($collectionName, $diskName);

}


/**
 * 
 * Generate Modules URLS
 * To be aable to easily modify them  as required
 * 
 */
function urls(  $mod , $name, $id){
    if($mod == 'motors'){
        $mod = 'motorcycles';
    }

    return $mod . '/' . Str::slug($name) . '/'  .$id;


    if($mod == 'cars'){
        return $mod . '/' . Str::slug($name) . '/'  .$id;
    }

}


function setting($key){
    // echo (OptimistDigital\NovaSettings\Models\Settings::getValueForKey($key));
        // dd(1);

    return OptimistDigital\NovaSettings\Models\Settings::getValueForKey($key);
    
}

function send_email( $data, $attachment = null ) {
	Mail::send( 'emails.template', [ 'data' => $data ], function ( $message ) use ( $data, $attachment ) {
		$message->to( $data['to'] )
        ->replyTo($data['from'], $data['from_name'])
		//->bcc('darroosh2@gmail.com')
		->subject( $data['subject'] );

		if ( ! is_null( $attachment ) ) {
			foreach ( $attachment as $attach ) {
				$message->attach( $attach );
			}
		}
	});


}

<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Dealer;
use App\Models\Event;
use App\Models\Inspiration;
use App\Models\Location;
use App\Models\MotorCategory;
use App\Models\Motorcycle;
use App\Models\MotorDealer;
use App\Models\Page;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SiteController extends BaseController
{
    //
    public function index(){
        $is_home = true;
        $mod = "home";

        //Getting home slider
        $cars = $this->cars;
        $motors = $this->motors;
        $slider_images = [];
        foreach($cars as $car){
            // dd($car);
            $collection  = $car->getMedia('slider',['show_in_home' => 'Yes' ]);
            //  dd($collection[]);.
             foreach($collection as $media){
                    
                
                $slider_images[] =  [
                    'media' => $media,
                    'car' => $car,                    
                ];
                // [ 
                //    'url' => $media->getFullUrl(),
                //    'title_ar' => $car->ar_name,
                //    'title_en' => $car->en_name,
                //    'title_ar' => $car->ar_name,
                //    'title_en' => $car->en_name,

                // ];
            }
        }        
        // dd($slider_images);
      foreach($motors as $motor){
            // dd($car);
            $collection  = $motor->getMedia('motorgallery',['show_in_home' => 'Yes' ])->sortBy('order_column');
            //  dd($collection[]);.
             foreach($collection as $media){
         
                $slider_images[] =  [
                    'media' => $media,
                    'car' => $motor,         
                ];
            }
        }        
    //   dd($slider_images);
        // End Getting home slider


        $five_db_name =  resolve('lang') . '_five' ;
        $fivestars_text = Page::select($five_db_name)->find(1);


        return \View::make('welcome')
        ->with('is_home',$is_home)
        ->with('mod',$mod)
        ->with('slider_images',$slider_images)
        ->with('fivestars_text',$fivestars_text[$five_db_name])
        // ->with('first_slide',$first_slide)
        ;
        // {{dd($db_caption)}}
        // {{dd($first_slide['media']->getCustomProperty($db_caption))}}

    }
    //
    public function about(){
        $mod = "about";
        $page = Page::find(1);
        return \View::make('site.about')
        ->with('page',$page)
        ->with('mod',$mod)
        ;
    }

    public function environment(){
        $mod = "environment";
        $page = Page::select('en_environment','ar_environment','environment_videmo_id','additional_environment')->find(1);
        return \View::make('site.environment')
        ->with('mod',$mod)
        ->with('page',$page)
        ;
    }
    public function ceo(){
        $mod = "ceo";
        $page = Page::select('en_ceo','ar_ceo')->find(1);
        return \View::make('site.ceo')
        ->with('page',$page)
        ->with('mod',$mod)
        ;
    }
    public function inspiration(){
        $mod = "inspiration";
        $insp = Inspiration::get();
        return \View::make('site.inspiration')
        ->with('model',$insp)
        ->with('mod',$mod)
        ;
    }
    
    public function events(){
        $mod = "events";
        $events = Event::take(15)->orderByDesc('id')->get();
        return \View::make('site.events')
        ->with('model',$events)
        ->with('mod',$mod)
        ;
    }
    
    public function fivestars(){
        $mod = "fiverstars";
        return \View::make('site.fivestars')
        ->with('mod',$mod)
        ;
    }
    
    
    public function carsDealer(){
        $mod = "dealers";
        $dealers = Dealer::orderBy('sort_order')->get();
        return \View::make('site.dealer')
        ->with('mod',$mod)
        ->with('dealers',$dealers)
        ->with('sub','cars')
        ;


    }
    public function motorDealer(){
        $mod = "dealers";
        $dealers = MotorDealer::orderBy('sort_order')->get();
        return \View::make('site.dealer')
        ->with('mod',$mod)
        ->with('dealers',$dealers)
        ->with('sub','motorcycles')
        ;


    }

    public function locations(){
        $mod = "contact";
        $dealers = Location::orderBy('sort_order')->get();
        return \View::make('site.dealer')
        ->with('mod',$mod)
        ->with('dealers',$dealers)
        ->with('sub','locations')
        ;


    }
    
    public function motorcycles(){
        $mod = "motorcycles";
        $motors = Motorcycle::get();
        $page = Page::find(1);
        $slides = $page->getMedia('motorslider');
        $gallery = $page->getMedia('motorgallery');
        $videos = $page->getMedia('motorvideos');
        $cats = MotorCategory::get();
        $sub_mod = '';
 
        // dd($videos);
        return \View::make('site.motorcycles')
        ->with('mod',$mod)
        ->with('motors',$motors)
        ->with('page',$page)
        ->with('slides',$slides)
        ->with('gallery',$gallery)
        ->with('videos',$videos)
        ->with('cats',$cats)
        ->with('sub_mod',$sub_mod)
        ;
        
        
    }
    public function motorcycle($slug, $id){
        // dd($id);
        $mod = "motorcycles";
        $motor = Motorcycle::findOrFail($id);
        $motors = Motorcycle::get();
        $cats = MotorCategory::get();
        $gallery  = $motor->getMedia('motorgallery', function (Media $media) {
            // dd($media->custom_properties);

            if (isset($media->custom_properties['show_in_home'])){
                return $media->custom_properties['show_in_home'] != "Yes";

            }
            return true;

        });
        // dd($videos);
        $sub_mod = $motor->category->en_name;
        // dd($sub_mod);
        $cols = 8; 
        $this->createSpecsTitles2($motor->specifications , 1);
        
    
        // dd($this->specs);
        return \View::make('site.motorcycle')
        ->with('mod',$mod)
        ->with('sub_mod',$sub_mod)
        ->with('cats',$cats)
        ->with('motors',$motors)
        ->with('motor',$motor)
        ->with('gallery',$gallery)
        ->with('specs',$this->specs)
        ->with('cols',$cols)
        ;  
    }

   public function car($slug, $id){
        // dd($id);
        $mod = "cars";
        $car = Car::findOrFail($id);
        $colors = $car->getMedia('colors');
        $slides  = $car->getMedia('slider');
        $videos  = $car->getMedia('videos');
        // dd($videos);

        $dimentions_str  = $car->getMedia('back_wheel')[0]->manipulations['back_wheel']['manualCrop'];;
        // dd( $dimentions_str );
        $back = explode(",", $dimentions_str);
        
        // $device_width = 574;
        $car_width = 574;
        // if(s){//device width < 
        //     $car_width = $device_width;

        // }
        $original_image_width = \Spatie\Image\Image::load($car->getMedia('front_wheel')[0]->getFullUrl())->getWidth();
        $proportion = $original_image_width / $car_width;


        $original_image_height = \Spatie\Image\Image::load($car->getMedia('front_wheel')[0]->getFullUrl())->getHeight();
        $new_image_height = $original_image_height / $proportion ;
        $height_proportion = $original_image_height / $new_image_height;
        $saved_wheel_height = $back[1];
        // $wheel_height = ($new_image_height / 574 ) * 36;
        $wheel_height =  $saved_wheel_height / $height_proportion;
        // (int)
        $back_dimentions = [
            // $back[2] / ($back[0] / 63),
            (int)floor($back[3] / $height_proportion),
            (int)floor($back[2] / $proportion),
        ];

        // dd( $back );
        $dimentions_str  = $car->getMedia('front_wheel')[0]->manipulations['front_wheel']['manualCrop'];
        $front = explode(",", $dimentions_str);
        // dd( $dimentions );
        $front_dimentions = [
            // $back[2] / ($back[0] / 63),
            (int)floor($front[3] / $height_proportion),
            (int)floor($front[2] / $proportion),
        ];



        return \View::make('site.car')
        ->with('mod',$mod)
        ->with('car',$car)
        ->with('first_color',$colors[0])
        ->with('slides',$slides)
        ->with('videos',$videos)
        ->with('back_dimentions',$back_dimentions)
        ->with('front_dimentions',$front_dimentions)
        ->with('wheel_height',$wheel_height)
        
        ;
        
        
    }

    public function carSpecs($slug, $id){
        // dd($id);
        $mod = "cars";
        $car = Car::with('models')->findOrFail($id);
        // dd($videos);
        $models = $car->models;
        if($models->count() == 1){
            $cols = 8; 
        }elseif($models->count() == 2){
            $cols = 4; 
        }elseif($models->count() == 3){
            $cols = 2; 
        }else{
            $cols = 1; 

        }

          // dd($models);
        foreach($models as $model){
            $this->createSpecsTitles2($model->specifications , $model->id);
            // dd( $model->specifications);
            
        }
        $this->fixSpecsFillEmptyValues($models );
        // dd($this->specs);
        // $car = Car::with('models')->findOrFail($id);


        return \View::make('site.car_specs')
        ->with('mod',$mod)
        ->with('car',$car)
        ->with('specs',$this->specs)
        ->with('cols',$cols)
        
        ;
        
        
    }
    
    protected function fixSpecsFillEmptyValues($models ){
        $models_ids = $models->pluck('id')->toArray();
        // dd($models_ids);
        if(count($models_ids) < 2 ){
            return;
        }
        $specs = $this->specs;
        foreach( $specs as $cat=>$arr ){

            foreach($arr as $title=>$values){
                // dd($title);
                // dd($values);                
                foreach($models_ids as $model_id){
                    if(!isset( $values[$model_id])){
                        //Push it
                        $values[$model_id] = '';
                    }                                            
                }
                //sort them
                ksort ($values , SORT_NUMERIC );
                $this->specs[$cat][$title] = $values;
                // dd($values);
            }


        }
    }
    protected function createSpecsTitles($arr,$model_id){
        foreach($arr as $k=>$v){
            $start = strrpos($k,"[");
            $end = strrpos($k,"]");
            $cat_with_brackets =   substr ( $k, $start, $end);
            $cat = substr(substr($cat_with_brackets,1),0, -1);

            $title = trim ( substr($k, 0 , $start-1  ) ) ;
            // dd($title);
            $this->specs[$model_id][$cat][$title] = $v; 
        }

    }

    protected function createSpecsTitles2($arr,$model_id){
        foreach($arr as $k=>$v){
            $start = strrpos($k,"[");
            $end = strrpos($k,"]");
            $cat_with_brackets =   substr ( $k, $start, $end);
            $cat = substr(substr($cat_with_brackets,1),0, -1);
            // dd($k);
            $title = trim (substr($k, 0 , $start  )) ;
            // dd($title);
            $this->specs[$cat][$title][$model_id] = $v; 
        }

    }
    
}

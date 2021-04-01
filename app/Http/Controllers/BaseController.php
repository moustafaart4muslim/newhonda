<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Invade\Cars\Cars;

class BaseController extends Controller
{
    //
    public function __construct()
    {
        $this->detectLang();
        $this->getCars(); //Global because it's listed in nav and footer of all  pages
        $this->getMotors(); //Global because it's listed in nav and footer of all  pages

    }
    
    

    protected function getCars(){
        $this->cars = Car::get();
        \View::share('cars', $this->cars);

    }
    protected function getMotors(){
        $this->motors = Motorcycle::get();
        \View::share('motors', $this->motors);

    }
    protected function detectLang(){

        if(current(explode('.', request()->getHost()))  == 'ar' ){
            $lang = 'ar';
            $db_prefix  = 'ar';
            $other_language = 'English';
            setlocale(LC_TIME, 'ar_AE.utf8');
        }else{
            $lang ='en';
            $db_prefix  = 'en';
            $other_language = 'عربي';
        }
        Carbon::setLocale($lang);

        $db_title = $db_prefix .'_title'  ;
        $db_name = $db_prefix . '_name'  ;
        $db_info =  $db_prefix . '_details';
        $db_caption =  $db_prefix . '_caption';
        
        $db_description =  $db_prefix . '_description' ;
        $db_desc =  $db_prefix . '_desc' ;

        \App::setLocale($lang);

        \App::bind('lang', function ($app) use ($lang) {
            return $lang;
        });
        \View::share('db_prefix', $db_prefix);
        \View::share('db_name', $db_name);
        \View::share('db_title', $db_title);
        \View::share('db_info', $db_info);
        \View::share('db_caption', $db_caption);
        \View::share('db_description', $db_description);
        \View::share('db_desc', $db_desc);
        \View::share('other_language', $other_language);
        


    }


    public static function changeLangUrl(){
//        resolve('lang');
//        echo (url()->current());
        if(current(explode('.', request()->getHost()))  == 'ar' ) {
            //it's arabic, remove ar to create the same page url without ar
            //it's English, add ar subdomain to create the same page
            $url_arr = explode('//', url()->current());
//            dd($url_arr);
            $url_arr[1] = substr( $url_arr[1], 3);
            $new_url = $url_arr[0] . '//'  . 'new.' ;
            foreach($url_arr as $k=>$v){
                if($k == 0){
                    continue;
                }
                $new_url .=$v;
            }


        }else{
            //it's English, add ar subdomain to create the same page  url for ar
            $url_arr = explode('//', url()->current());
//            dd($url_arr);
            $the_new = $url_arr[0] . '//' . 'ar.' ;
            foreach($url_arr as $k=>$v){
                if($k == 0){
                    continue;
                }
                $the_new .=$v;
            }
            $new_url = str_replace("new.","",$the_new);
        }


//        echo (resolve('lang'));
//        echo (resolve('lang'));
//        die();
//        dd($new_url);
        return $new_url;
    }
}

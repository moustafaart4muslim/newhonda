<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\Models\Media;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;
    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];
    
    public function registerMediaCollections(): void
    {
    
        
        $this->addMediaCollection('motorgallery')->useDisk('motorgallery')
        // ->withResponsiveImages()
        ;

        $this->addMediaCollection('motorslider')->useDisk('motorslider')
        ->withResponsiveImages()
        ;
        $this->addMediaCollection('motorvideos')->useDisk('motorvideos')
        ->withResponsiveImages()
        ;
    }

      
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('motorvideos')
        ->width(230)
        ->height(95)
        ->performOnCollections('motorvideos')
        ;
        $this->addMediaConversion('motorslider')
        ->fit(Manipulations::FIT_MAX, 2100, 0)
        ->background('FFFFFF')
        ->performOnCollections('motorslider')

        ;



        
        $this->addMediaConversion('resized')
        ->fit(Manipulations::FIT_MAX, 2100, 0)
        ->background('FFFFFF')
        ->performOnCollections('motorgallery')
        ;


        $this->addMediaConversion('thumb')
        ->crop('crop-center',237,210)
        ->performOnCollections('motorgallery')
        ->nonQueued()
        ;

        

        // ->height(600)
        // ->performOnCollections('motorslider')
        // ;

        

    }
    

}

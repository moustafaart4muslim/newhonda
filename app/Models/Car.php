<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\Models\Media;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,SoftDeletes;
  
    public function registerMediaConversions(Media $media = null): void
    {
        // $this->addMediaConversion('thumb')
        //     ->width(237)
        //     ->height(210)
        //     ->performOnCollections('gallery', 'main')
        //     ->nonQueued()
        //     ;
        $this->addMediaConversion('thumb')
        ->crop('crop-center',237,210)
        ->performOnCollections('gallery', 'main')
        ->nonQueued()
        ;

        $this->addMediaConversion('medium-size')
            ->width(200)
            ->height(200);

        $this->addMediaConversion('front_wheel')
        ->performOnCollections('front_wheel')
        ;
        $this->addMediaConversion('back_wheel')
        ->performOnCollections( 'back_wheel')
        ;
  
        $this->addMediaConversion('video_thumb')
            ->width(230)
            ->height(95)
            ->performOnCollections('videos')
            ;
     
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile()->withResponsiveImages();
        $this->addMediaCollection('gallery')->useDisk('gallery')
            ->withResponsiveImages()
            // ->acceptsMimeTypes(['image/*'])
            ;

            $this->addMediaCollection('colors')->useDisk('colors')
            ->withResponsiveImages()
            ;

            $this->addMediaCollection('front_wheel')->useDisk('wheels')
            ->withResponsiveImages()
            ->singleFile()
            ;

            $this->addMediaCollection('back_wheel')->useDisk('wheels')
            ->withResponsiveImages()
            ->singleFile()
            ;

            $this->addMediaCollection('back_wheel')->useDisk('wheels')
            ->withResponsiveImages()
            ->singleFile()
            ;

            $this->addMediaCollection('slider')->useDisk('slider')
            ->withResponsiveImages()
            ;
            $this->addMediaCollection('videos')->useDisk('videos')
            ->withResponsiveImages()
            ;
            
        
    }
    public function models()
    {
        return $this->hasMany(Models::class);
    }
   
}

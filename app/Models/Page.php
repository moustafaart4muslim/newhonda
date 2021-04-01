<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        
        ->height(600)
        ->performOnCollections('motorslider')
        ;

        

    }
    

}

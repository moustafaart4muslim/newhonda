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
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Manipulations;

class Motorcycle extends Model implements HasMedia,Sortable
{
    use HasFactory,InteractsWithMedia,SoftDeletes,SortableTrait;
    protected $casts = [
        'specifications' => 'array',
    ];

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];    

    public function registerMediaConversions(Media $media = null): void
    {

        $this->addMediaConversion('thumb')
        ->crop('crop-center',237,210)
        ->performOnCollections('motorgallery', 'motormain')
        ->nonQueued()
        ;

        $this->addMediaConversion('medium-size')
            ->width(200)
            ->height(200);

        // $this->addMediaConversion('slider')
        //     ->fit(Manipulations::FIT_MAX, 2100, 0)
        //     ->background('007698');
    
        $this->addMediaConversion('video_thumb')
            ->width(230)
            ->height(95)
            ->performOnCollections('motorvideos')
            ;
     
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('motormain')->singleFile()->withResponsiveImages();
        $this->addMediaCollection('motorgallery')->useDisk('motorgallery')
            ->withResponsiveImages()
            // ->acceptsMimeTypes(['image/*'])
        ;

        $this->addMediaCollection('motorslider')->useDisk('motorslider')
        ->withResponsiveImages()
        ;
        $this->addMediaCollection('motorvideos')->useDisk('motorvideos')
        ->withResponsiveImages()
        ;
            
        
    }
    
    public function category()
    {
        return $this->belongsTo(MotorCategory::class, "category_id" );
    }

}

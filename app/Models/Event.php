<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements Sortable,HasMedia
{
    
    use HasFactory,SoftDeletes,SortableTrait,InteractsWithMedia;
    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];  
    
    public function registerMediaCollections(): void
    {
    
        $this->addMediaCollection('events')->useDisk('events')
        ->withResponsiveImages()
        ;
    }

      
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('events')
            ->width(237)
            ->height(210)
            ->performOnCollections('events')
            ;

    }
}

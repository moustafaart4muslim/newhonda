<?php
/**
 * Homepage slider categories
 * 
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class HomeSlider extends Model  implements Sortable
{
    use HasFactory,SoftDeletes,SortableTrait;
    public $table = 'home_slider';    

   public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];    

}

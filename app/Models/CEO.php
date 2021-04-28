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

class CEO extends Model  implements Sortable
{
    use HasFactory,SoftDeletes,SortableTrait;
    public $table = 'ceo';    

   public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];    

}

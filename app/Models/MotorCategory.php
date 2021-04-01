<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


class MotorCategory extends Model  implements Sortable
{
    use HasFactory,SoftDeletes,SortableTrait;
    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function motors()
    {
        return $this->hasMany(Motorcycle::class,'category_id');
    }
   


}

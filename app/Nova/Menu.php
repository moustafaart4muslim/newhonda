<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Davidpiesse\NovaToggle\Toggle;



class Menu extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Menu::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'en_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
    ];

    public static $group = 'Menu';
    public static $priority = 5;
    public static function groupOrder() {
        return 1;
    }
    public static function label() {
        return 'Menu items';
    }
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')
            ->hideFromDetail()
            ->hideFromIndex(),
            Text::make('English name', 'en_name')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Arabic name', 'ar_name')
            ->sortable()
            ->rules('required', 'max:255')
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),

            Toggle::make('Shown?' , 'shown')
            ->trueValue('Yes')
            ->falseValue('No')
        
       ];
    }
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }
    
    public  function authorizedToDelete(Request $request)
    {
        return false;
    }

    public  function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}

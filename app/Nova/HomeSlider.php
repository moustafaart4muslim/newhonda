<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;



class HomeSlider extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\HomeSlider::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'en_title';
    public static function label() {
        return 'Home page slider';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'en_title',
        'ar_title',
        'en_desc',
        'ar_desc',
    ];

    // public static $group = 'Motorcycles';
    public static $priority = 1;
    public static function groupOrder() {
        return 5;
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
            Textarea::make('English address', 'en_details')
            ->sortable()
            ->rules('required'),

            Textarea::make('Arabic address', 'ar_details')
            ->sortable()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),

            // MapMarker::make("Location")
            // ->hideFromIndex()
            // ->rules('required' )
            // ->defaultZoom(11)
            // ->defaultLatitude(30.0291045)
            // ->defaultLongitude(31.4027152)
            // // ->searchProvider('null')
            // ,

            Textarea::make('Map Embed (Copy embed code from google maps)', 'map')
            ->sortable()
            ->rules('required' )
            ,


       ];
    }
    // public static function authorizedToCreate(Request $request)
    // {
    //     return false;
    // }

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

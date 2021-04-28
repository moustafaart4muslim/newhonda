<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use GeneaLabs\NovaMapMarkerField\MapMarker;
use Laravel\Nova\Fields\Image;
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


            Image::make('Image')
            ->path('homeslider')

            ->creationRules('required')
            ,

            Text::make('English Caption',  'en_title')
            ->hideFromIndex()
            ,

            Text::make('Arabic Caption',  'ar_title')
            ->hideFromIndex()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ,

            Textarea::make('English Details', 'en_desc')
            ->hideFromIndex()
            ->rules('required')
            ,
         
            Textarea::make('Arabic Details', 'ar_desc')
            ->hideFromIndex()
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ->rules('required')
            ,
            
            Text::make('Link',  'link')
            ->hideFromIndex()
            ->rules('required' )
            ->help('Hint: When clicking on this caption, it  will link to the url specified here.')
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

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



class CEO extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\CEO::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'en_name';
    public static function label() {
        return 'CEO message';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'en_name',
        'ar_name',
        'en_desc',
        'ar_desc',
        'position',
    ];

    // public static $group = 'Motorcycles';
    public static $priority = 2;
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
            ->path('ceo')
            ->creationRules('required')
            ,

            Text::make('English Name',  'en_name')
            ->hideFromIndex()
            ,

            Text::make('Arabic Name',  'ar_name')
            ->hideFromIndex()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ,

            Textarea::make('English message', 'en_desc')
            ->hideFromIndex()
            ->rules('required')
            ,
         
            Textarea::make('Arabic message', 'ar_desc')
            ->hideFromIndex()
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ->rules('required')
            ,
            
            Textarea::make('English Position',  'en_position')
            ->hideFromIndex()
            ->rules('required' )
            ,

            Textarea::make('Arabic Position',  'ar_position')
            ->hideFromIndex()
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

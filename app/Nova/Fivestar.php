<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Fivestar extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Fivestar::class;

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
        'id',
        'en_name',
        'ar_name',
        'en_details',
        'ar_details',
    ];
    public static $displayInNavigation = false;


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
            Text::make('English title', 'en_name')
            ->sortable()
            ->rules('required', 'max:255'),

            Text::make('Arabic title', 'ar_name')
            ->sortable()
            ->rules('required', 'max:255')
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),
            Textarea::make('English details', 'en_details')
            ->sortable()
            ->rules('required'),

            Textarea::make('Arabic details', 'ar_details')
            ->sortable()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),

            Image::make('Image')
            // ->maxWidth(200)
            // ->path('structure/cars/logos')
            ->hideFromIndex()
            ->creationRules('required')           
            ,

            Boolean::make('Has a button','have_btn')
            ->trueValue('Yes')
            ->falseValue('No')
            ->hideFromIndex()
            ,
            \Epartment\NovaDependencyContainer\NovaDependencyContainer::make([
                Text::make('Button links to', 'link')
                ,
    
            ])->dependsOn('have_btn', true)

        ];
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

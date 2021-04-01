<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Specification extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Specification::class;

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
   ];
   public static $perPageOptions = [1000,100, 50, 25];
   /**
     * Navigation label
     */
    public static function label() {
        return 'Specifications titles';
    }
    public static $group = 'Specfications settings';
    public static $priority = 3;
    public static function groupOrder() {

        return 3;
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
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ->rules('required', 'max:255'),
            
            BelongsTo::make('Category')
            ->rules('required')
            ->sortable()
            ->inline()
            ->onlyOnDetail()
            ,
          
            BelongsTo::make('Category')
            ->rules('required')
            ->sortable()
            ->hideFromDetail()
            ,
          
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

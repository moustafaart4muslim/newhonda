<?php

namespace App\Nova;

use App\Models\Specification;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Models extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Models::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];
    /**
     * Navigation label
     */
    public static function label() {
        return 'Models';
    }
    public static $group = 'Cars';
    public static $priority = 2;
    // public static $displayInNavigation = false;
    public static function groupOrder() {

        return 1;
    }


    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {

        //Select all specs to add them as  suggestions  for  key value pairs
        $specs = Specification::with('category')->get();
        // Info($specs);
        foreach($specs as $k=>$v){
            $suggestion[] = [
                "title" => $v->en_name . " [" . $v->category->en_name . "]",
                "id" => $v->en_name . "_" . $v->category->en_name ,
                "description" => ""       
            ];
        }
        // Info($suggestion);
        return [
            ID::make(__('ID'), 'id')
            ->hideFromIndex(),
            Text::make('Name', 'name')
            ->sortable()
            ->rules('required', 'max:255'),

            BelongsTo::make('Car')
            ->rules('required', 'max:255')
            ->sortable()
            ,
            /*
            KeyValue::make('Specifications')
            ->keyLabel('Item') // Customize the key heading
            ->valueLabel('value') // Customize the value heading
            ->actionText('Add Item')
            ->rules('json')
            ->help ('Hint: Please follow this criteria for the item  title: (Specification category, speicification title).<br>
                For example: <br> Engine, type<br> Engine, Fuel supply system.<br>
                Hint2: Use the same naming for models of the same car, to allow to table appearance in the website to be comparative.
            ')
            ,
            */
            

            
            \IziDev\KeyValueSuggestion\KeyValueSuggestion::make('Specifications')
                ->suggestion($suggestion)
                ->length(1)
                ->help('If you want the white circle, just wite (true) in the value field, it will be converted to the white circle in rendering the website.')
                ->max(20)
                ->display("title", "title", "description") //string $title,string $showInput, string $description = null

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

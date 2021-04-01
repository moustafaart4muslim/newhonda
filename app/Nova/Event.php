<?php

namespace App\Nova;

use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Http\UploadedFile;

class Event extends Resource
{
    use HasSortableRows;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Event::class;

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
            Medialibrary::make('Gallery', 'events'  , 'events' )
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit image caption by clicking on the edit icon on it.'
            )            
            ->fields(function () {
                return [

                    // Boolean::make('Active'),
                    Text::make('English Caption','custom_properties->en_caption'),
                    Text::make('Arabic Caption','custom_properties->ar_caption')
                    ->withMeta(['extraAttributes' => [
                        'class'=> 'rtl'
                        ]
                    ]),
                            
                ];
            })
            // ->attachExisting()
            ->accept('image/*')
            ->autouploading()
            ->sortable()
            ->attachUsing(function (HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
                setRandomMediaName( $model, $file,$collectionName,$diskName,$fieldUuid);
            })
            ->creationRules('required') 
            ->hideFromIndex()
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

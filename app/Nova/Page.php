<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Http\UploadedFile;
use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Laravel\Nova\Fields\Boolean;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Page::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'static_pages2';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
    ];
    /**
     * Navigation label
     */
    public static function label() {
        return 'Static pages';
    }
    // public static $group = 'Specfications settings';
    // public static $priority = 4;
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

            new Panel('About us', $this->about()),
            new Panel('Five stars', $this->fivestars()),
            new Panel('CEO message', $this->ceo()),
            new Panel('Environment', $this->environment()),
            new Panel('Motorcycles page', $this->motors()),

            
            Text::make('Static pages', 'static_pages')
            ->onlyOnIndex()
            ,





       ];
    }
    protected function fivestars(){
        return [
            Textarea::make('English content', 'en_five')
            ->hideFromIndex()
            ->rules('required'),

            Textarea::make('Arabic content', 'ar_five')
            ->hideFromIndex()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),






        ];
    }

    protected function motors(){
        return [
            Text::make('English content', 'motors_en_title')
            ->hideFromIndex()
            ->rules('required'),

            Text::make('Arabic content', 'motors_ar_title')
            ->hideFromIndex()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),

            Textarea::make('English content', 'motors_en_details')
            ->hideFromIndex()
            ->rules('required'),

            Textarea::make('Arabic content', 'motors_ar_details')
            ->hideFromIndex()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),



            /**
             * Start Slider fields
             */


            Medialibrary::make('Slider', 'motorslider'  , 'motorslider' )
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit image details by clicking on the edit icon on each slide.'
            )
            /*
            ->fields(function () {
                return [


                    Boolean::make('Also show this slide in homepage slider?','custom_properties->show_in_home')
                    ->rules('required' )
                    ->trueValue('Yes')
                    ->falseValue('No')
                    ,
                    \Epartment\NovaDependencyContainer\NovaDependencyContainer::make([
                        Text::make('English Caption',  'custom_properties->en_caption')
                        ->rules('required' )
                        ,
            
                        Text::make('Arabic Caption',  'custom_properties->ar_caption')
                        ->rules('required' )
                        ->withMeta(['extraAttributes' => [
                            'class'=> 'rtl'
                            ]
                        ])
                        ,

                        Textarea::make('English Details', 'custom_properties->en_details')
                        ->rules('required')
                        ,
                     
                        Textarea::make('Arabic Details', 'custom_properties->ar_details')
                        ->withMeta(['extraAttributes' => [
                            'class'=> 'rtl'
                            ]
                        ])
                        ->rules('required')
                        ,
                        
                        Text::make('Link',  'custom_properties->link')
                        ->rules('required' )
                        ->help('Hint: When clicking on this caption, it  will link to the url specified here.')
                        ,
            
                
                    
                    ])->dependsOn('custom_properties->show_in_home', true)
                          
                ];
            })
            */
            ->accept('image/*')
            ->autouploading()
            ->sortable()
            ->attachUsing(function (HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
                setRandomMediaName( $model, $file,$collectionName,$diskName,$fieldUuid);
            })

            
            ->creationRules('required') 
            ->hideFromIndex()
            ,
            /**
             * End  slider field
            */



           
            Medialibrary::make('Gallery', 'motorgallery'  , 'motorgallery' )
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit image details by clicking on the edit icon on it.'
            )            
            ->accept('image/*')
            ->autouploading()
            ->sortable()
            ->attachUsing(function (HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
                setRandomMediaName( $model, $file,$collectionName,$diskName,$fieldUuid);
            })
            ->fields(function () {
                return [
                    Text::make('English caption',  'custom_properties->en_caption')
                        ->rules('required' ), 
                    Text::make('Arabic caption',  'custom_properties->ar_caption')
                        ->rules('required' ), 
                ];
            })
            ->creationRules('required') 
            ->hideFromIndex()
            ,






            /**
              * Start Videos
            */


            Medialibrary::make('Videos', 'motorvideos'  , 'motorvideos' )
            ->help(
                'Hint: Please upload an image that will be shown as a placeholder to represent the video until the user clicks "play video".<br>
                 Hint2: Click edit on each image to write its video id from vimeo ( i.e. You have to upload the video to vimeo and get its ID to be written here )' 
            )
            ->fields(function () {
                return [
                    Text::make('Vimeo ID',  'custom_properties->vimeo_id')
                        ->rules('required' ), 
                ];
            })
            // ->attachExisting()
            ->accept('image/*')
            // ->attachOnDetails()
            ->autouploading()
            ->sortable()
            ->attachUsing(function (HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
                setRandomMediaName( $model, $file,$collectionName,$diskName,$fieldUuid);
            })
            ->creationRules('required') 
            ->hideFromIndex()
            // ,

            // GeneratedConversions::make('Conversions')
            


            ,



            /**
             *  EndVideos
            */







         
        ];
    }
    protected function about(){
        return [
            Text::make('English title', 'about_en_name')
            ->hideFromIndex()
            ->hideFromDetail()
            ->rules('required', 'max:255'),


            Text::make('Arabic title', 'about_ar_name')
            ->hideFromIndex()
            ->rules('required', 'max:255')
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),
            Textarea::make('English content', 'about_en_details')
            ->hideFromIndex()
            ->rules('required'),

            Textarea::make('Arabic content', 'about_ar_details')
            ->hideFromIndex()
            ->rules('required' )
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ]),






        ];
    }

    protected function ceo(){
        return [
            // Text::make('English name', 'en_name')
            // ->hideFromIndex()
            // ->rules('required', 'max:255'),
            NovaTinyMCE::make("English content" ,'en_ceo')
            ->stacked()
            ->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image media fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | media | bullist numlist outdent indent | link | pagebreak',
                'use_lfm' => true,
                'menubar'=>false,
                'height' => "500",
                'image_advtab' => true,

            ])
            ,

            NovaTinyMCE::make("Arabic content",'ar_ceo')
            ->stacked()
            ->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image media fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | media | bullist numlist outdent indent | link | pagebreak',
                'use_lfm' => true,
                'menubar'=>false,
                'height' => "500",
                'image_advtab' => true,
                'directionality' => "rtl"

            ])
            ,

        ];
    }
    public static $trafficCop = false;

    protected function environment(){
        return [
            // Text::make('English name', 'en_name')
            // ->hideFromIndex()
            // ->rules('required', 'max:255'),
            NovaTinyMCE::make("English content fot blue skies" ,'en_environment')
            ->stacked()
            ->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image media fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | media | bullist numlist outdent indent | link | pagebreak',
                'use_lfm' => true,
                'menubar'=>false,
                'height' => "500",
                'image_advtab' => true,

            ])
            ,

            NovaTinyMCE::make("Arabic content for blue skies",'ar_environment')
            ->stacked()
            ->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image media fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | media | bullist numlist outdent indent | link | pagebreak',
                'use_lfm' => true,
                'menubar'=>false,
                'height' => "500",
                'image_advtab' => true,
                'directionality' => "rtl"

            ])
            ,
            Text::make('Video (Viemo ID)', 'environment_videmo_id')
            ->hideFromIndex()
            ->rules('required'),


            NovaTinyMCE::make("Additional text (Below Honda green company)",'additional_environment')
            ->stacked()
            ->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image media fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | media | bullist numlist outdent indent | link | pagebreak',
                'use_lfm' => true,
                'menubar'=>false,
                'height' => "500",
                'image_advtab' => true,

            ])
        ];
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return '/resources/pages/1/edit';
    }
    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }

    

    public static function searchable()
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

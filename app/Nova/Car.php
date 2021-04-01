<?php

namespace App\Nova;

use DmitryBubyakin\NovaMedialibraryField\Fields\GeneratedConversions;
use DmitryBubyakin\NovaMedialibraryField\Fields\Medialibrary;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Markdown;
use Spatie\MediaLibrary\HasMedia;
use Yna\NovaSwatches\Swatches;
use DmitryBubyakin\NovaMedialibraryField\TransientModel;
use Illuminate\Http\UploadedFile;
use Laravel\Nova\Panel;



class Car extends Resource
{
    use \Epartment\NovaDependencyContainer\HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Car::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'en_name';

    /**
     * Custom properties
     * 
     */
    // public static $group = 'Admin';

    public static $preventFormAbandonment = true;
    public static $trafficCop = false;
    public static $priority = 1;

    /**
     * End Custom properties
     * 
     */
 
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
   
    /**
     * Navigation label
     */
    public static function label() {
        return 'Types';
    }
    public static $group = 'Cars';
   
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
        return [
            ID::make(__('ID'), 'id')->hideFromIndex(),

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

            Text::make('English Overview Title', 'en_title')
            ->sortable()
            ->hideFromIndex()
            ->rules('required', 'max:255'),

            Text::make('Arabic Overview Title', 'ar_title')
            ->sortable()
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ->hideFromIndex()
            ->rules('required', 'max:255'),
            

            Textarea::make('English Overview Details', 'en_desc', function () {
                return brtonl($this->en_desc);
                // return $this->en_dec;
            })
            ->hideFromIndex()
            ->rules('required'),

            Textarea::make('Arabic Overview Details', 'ar_desc', function () {
                return brtonl($this->ar_desc);
                // return $this->en_dec;
            })
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ->hideFromIndex()
            ->rules('required'),

            Image::make('Thumb')
            ->path('structure/cars/thumbs')
            ->maxWidth(200)
            ->hideFromIndex()
            ->creationRules('required')
            ,

            Image::make('Logo')
            ->maxWidth(200)
            ->path('structure/cars/logos')
            ->hideFromIndex()
            ->creationRules('required')
           
            ,
        
            // Text::make('ss', 'en_v_title')
            // ->sortable()
            // ->rules('required', 'max:255'),

            

            // Text::make('vvv', 'en_v_desc')
            // ->sortable()
            // ->rules('required', 'max:255'),

            new Panel('Media', $this->imageFields()),


              
        ];
    }
    
    protected function imageFields(){
        return [

           
            Medialibrary::make('Gallery', 'gallery'  , 'gallery' )
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit image details by clicking on the edit icon on it.'
            )            
            ->fields(function () {
                return [

                    // Boolean::make('Active'),
                    Text::make('English Caption','custom_properties->english_caption'),
                    Text::make('Arabic Caption','custom_properties->arabic_caption')
                    ->withMeta(['extraAttributes' => [
                        'class'=> 'rtl'
                        ]
                    ]),
                    Select::make('type','custom_properties->type')->options([
                        'Exterior' => 'Exterior',
                        'Interior' => 'Interior',
                    ])->default('Exterior'),



                            
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
            /*
            Not used, bacause it's using a media plugin that lacks  some features
            Images::make('Gallery', 'gallery') // second parameter is the media collection name
            ->conversionOnPreview('medium-size') // conversion used to display the "original" image
            ->conversionOnDetailView('thumb') // conversion used on the model's view
            ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
            ->conversionOnForm('thumb') // conversion used to display the image on the model's form
            ->fullSize() // full size column
            ->hideFromIndex()
            ->setFileName(function($originalFilename, $extension, $model){
                return $model->en_name . '-images-' . \Str::random(10) . '.' . $extension;
            })
            
            ->customPropertiesFields([
                // Boolean::make('Active'),
                Text::make('English Caption'),
                Text::make('Arabic Caption')
                ->withMeta(['extraAttributes' => [
                    'class'=> 'rtl'
                    ]
                ]),
                Select::make('type')->options([
                    'Exterior' => 'Exterior',
                    'Interior' => 'Interior',
                ]),
            ])
                
            // ->creationRules('required') // validation rules for the collection of images
            // validation rules for the collection of images
            // ->singleImageRules('image')
            // ->singleImageRules('image')
            // ->showStatistics()
            // setAllowedFileTypes
            ,
            */
            Medialibrary::make('Colors', 'colors'  , 'colors' )
            // ->title('name')
            // ->resolveMediaUsing(function (HasMedia $model, string $collectionName) {
            //     return 'ss';
            //     return $model->getMedia($collectionName);
            // })
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit color details by clicking on the edit icon on each color.<br>
                Hint: All colors images must be the same size and the same color and must be a car looking from right to left for the motion of the wheel to work properly.
                '
            )
            ->fields(function () {
                return [
                    // Text::make('Color name',  'custom_properties->color_name')
                    //     ->rules('required' ),
            
                    // Text::make('Choose color', 'custom_properties->color_code')
                    //     ->rules('required' ),
                    Swatches::make('Color','custom_properties->color')
                    ->rules('required' )
                    ->withProps([
                        // 'popover-to' => 'left',
                        'show-labels'=> true,
                        // 'inline'=>true
                        'row-length'=>  6
                        // More options at https://saintplay.github.io/vue-swatches/api/props.html
                    ])->help('You can choose color, or write color name (for example: red, blue, orange, darkred, darkorange..) or write color code(for example: #000000)'),


                    Boolean::make('Show a border around the color?','custom_properties->show_border')
                    ->rules('required' )
                    ->trueValue('Yes')
                    ->falseValue('No')
                    ->help('Hint:<img src="' . asset('images/border-help2.png') . '">'),
                            
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
            ,
            Boolean::make('Disable wheel motion for this car','disable_wheel')
            ->trueValue('Yes')
            ->falseValue('No')
            ->hideFromIndex()
            ,
            \Epartment\NovaDependencyContainer\NovaDependencyContainer::make([

                Medialibrary::make('Front Wheel', 'front_wheel'  , 'wheels' )
                ->accept('image/*')
                // ->attachOnDetails()
                ->autouploading()
                ->hideFromIndex()
                ->single()
                ->croppable('front_wheel', [
                    'rotatable' => false,
                    'zoomable' => false,
                    'cropBoxResizable' => false,
                    'aspectRatio' => 1,
                    // 'autoCrop' =>false,
                    'autoCropArea' => 0.1,
               ])
                ->help('Upload one of the car images used for colors, then select the front wheel using the crop button.<br> This is used to create the wheel motion effect in the colors area in the website.')                
                ->attachUsing(function (HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
                    setRandomMediaName( $model, $file,$collectionName,$diskName,$fieldUuid);
                })                
                ,
            ])->dependsOnNot('disable_wheel', true)
            ,
            \Epartment\NovaDependencyContainer\NovaDependencyContainer::make([
                Medialibrary::make('Back Wheel', 'back_wheel'  , 'wheels' )
                ->accept('image/*')
                // ->attachOnDetails()
                ->autouploading()
                ->hideFromIndex()
                ->single()
                ->hideCopyUrlAction()
                ->croppable('back_wheel', [
                    'rotatable' => false,
                    'zoomable' => false,
                    'cropBoxResizable' => false,
                    'aspectRatio' => 1,
                    // 'autoCrop' =>false,
                    'autoCropArea' => 0.1,
                ])
                ->help('Upload one of the car images used for colors, then select the back wheel using the crop button.<br> This is used to create the wheel motion effect in the colors area in the website.')
                ->attachUsing(function (HasMedia $model, UploadedFile $file, string $collectionName, string $diskName, string $fieldUuid) {
                    setRandomMediaName( $model, $file,$collectionName,$diskName,$fieldUuid);
                })
                ,
            ])->dependsOnNot('disable_wheel', true),



            /**
             * Start Slider fields
             */


            Medialibrary::make('Slider', 'slider'  , 'slider' )
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit image details by clicking on the edit icon on each slide.'
            )
            
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



            /**
              * Start Videos
            */


            Medialibrary::make('Videos', 'videos'  , 'videos' )
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

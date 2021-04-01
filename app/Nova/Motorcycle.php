<?php

namespace App\Nova;

use App\Models\Specification;
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
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Panel;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;



class Motorcycle extends Resource
{
    use HasSortableRows;
    use \Epartment\NovaDependencyContainer\HasDependencies;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Motorcycle::class;

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
    public static $priority = 2;

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
        return 'Motorcycles';
    }
    public static $group = 'Motorcycles';
   
    public static function groupOrder() {
        return 2;
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
            
            BelongsTo::make('Category','category','App\Nova\MotorCategory')
            ->rules('required')
            ->sortable()
            ->inline()
            ->onlyOnDetail()
           ,

           BelongsTo::make('Category','category','App\Nova\MotorCategory')
           ->rules('required')
           ->sortable()
           ->hideFromDetail()
          ,






            Textarea::make('English Details', 'en_desc', function () {
                return brtonl($this->en_desc);
                // return $this->en_dec;
            })
            ->hideFromIndex()
            ->rules('required'),

            Textarea::make('Arabic Details', 'ar_desc', function () {
                return brtonl($this->ar_desc);
                // return $this->en_dec;
            })
            ->withMeta(['extraAttributes' => [
                'class'=> 'rtl'
                ]
            ])
            ->hideFromIndex()
            ->rules('required'),

            // Text::make('Video (Vimeo ID)', 'video_id')
            // ->sortable()
            // ->nullable()
            // ->hideFromIndex()
            // ->help('Can be left blank if no video.')
            // ,


            Image::make('Image')
            ->path('motorcycles')
            ->hideFromIndex()
            ->creationRules('required')
           
            ,
            Image::make('thumb')
            ->path('motorcycles')
            // ->hideFromIndex()
            ->creationRules('required')
            ->help('will be shown in the upper navigation menu.')
            ,
        

            new Panel('Media', $this->imageFields()),
            new Panel('Specs', $this->specsFields()),


              
        ];
    }
    protected function specsFields(){
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
        return [
            \IziDev\KeyValueSuggestion\KeyValueSuggestion::make('Specifications')
                ->suggestion($suggestion)
                ->length(1)
                ->max(20)
                ->display("title", "title", "description") //string $title,string $showInput, string $description = null


        ];
    }
    protected function imageFields(){
        return [

           
            Medialibrary::make('Gallery', 'motorgallery'  , 'motorgallery' )
            ->help(
                'Hint: You can drag and drop images to reorder them.<br> You can edit image details by clicking on the edit icon on it.'
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

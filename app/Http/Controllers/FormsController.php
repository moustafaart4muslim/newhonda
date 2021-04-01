<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Dealer;
use App\Models\Event;
use App\Models\Inspiration;
use App\Models\Location;
use App\Models\MotorCategory;
use App\Models\Motorcycle;
use App\Models\MotorDealer;
use App\Models\Page;
use Illuminate\Http\Request;

class FormsController extends BaseController
{
    public $to;
    public function __construct()
    {
        $to =  setting('email_receivers');
        $this->to = explode("," , $to);

        parent::__construct();
    }

    public function recall(){
        $mod = "owners";
        return \View::make('site.recall')
        ->with('mod',$mod)
        ;
    }

    public function contact(){
        // dd(1);
        $mod = "contact";
        return \View::make('site.contact')
        ->with('mod',$mod)
        ;
    }
    public function maintenance(){
        // dd(1);
        $mod = "fivestars";
        return \View::make('site.maintenance')
        ->with('mod',$mod)
        ;
    }

    public function tradeIn(){
        // dd(1);
        $mod = "fivestars";
        return \View::make('site.trade_in')
        ->with('mod',$mod)
        ;
    }

    public function testDrive(){
        // dd(1);
        $mod = "fivestars";
        return \View::make('site.test_drive')
        ->with('mod',$mod)
        ;
    }

     
 
    public function postTradeIn(Request $request){
        //   dd(request()->all());
          $validatedData = $request->validate([
            // 'num' => ['required','alpha_num'],
            'car' => ['required' ],
            'comments' => ['required' ],
            'email' => ['required', 'email'],
            'name' => ['required','regex:/^[\pL\s\-]+$/u'],
            'phone' => ['required', 'numeric'],
            'car_model' => ['required' ],
            'interested' => ['required' ],
  
        ]);

      

        // dd(request()->get('name'));
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $car = request()->get('car');
        $message = nl2br(request()->get('notes'));
        $car_model = request()->get('car_model');
        $interested = request()->get('interested');

    
        date_default_timezone_set('Africa/Cairo');
        $Date = date("F j, Y");
        $Time = date("g:i a");
        $DateTime = "On ".$Date." at ".$Time;
       

        // $to = 'maysahonda@gmail.com, maysa.saeed@hondaegypt.com.eg, Hassan.El-Askandarany@hondaegypt.com.eg';
        $to = $this->to;
        $from = "booking@hondaegypt.com.eg";
        $subject = "Honda - Trade-in Message";
        $message = <<<EOF
        <div style="width:500px;margin:20px auto;text-align:left;color:#fff;font-family:Arial, sans-serif;font-size:12px">
            <div style="width:500px;float:left;margin-bottom:10px;color:#777;">You have got a new trade-in message | $DateTime</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">User Name</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$name</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Phone</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$phone</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Email</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px"><a style="color:#777" href="#">$email</a></div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Car</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$car</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Car Model</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$car_model</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Interested</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$interested</div>
        
        
            <div style="width:500px;float:left;overflow:hidden;background-color:#ed1b2f">
                <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Comments</div>
                <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$message</div>
            </div>
        </div>
        EOF;
        
                
            $headers  = "From: $from\r\n";
            $headers .= "Content-type: text/html\r\n";
            // $headers .= 'Cc: Hassan.El-Askandarany@hondaegypt.com.eg\r\n';
            // <div style="font-family:Arial, sans-serif;line-height:18px">Thank's, your request has been sent. We will contact you as soon as possible<br />redirecting..</div>            
        // $this->sendEmail();
        
        $data = [
            'messages' => $message,
        ];
        \Mail::send( 'emails.template', [ 'data' => $data ], function ( $message ) use ( $data ,$to, $subject ) {
            $message->to( $to )
            ->replyTo('no-reply@hondaegypt.com.eg')
            //->bcc('darroosh2@gmail.com')
            ->subject( $subject );
    
        });
    
        // mail($to, $subject, $message, $headers);
 

        $request->session()->flash('message', 'Thanks, your request has been sent. We will contact you as soon as possible');

        $mod = "fivestars";
        return \View::make('site.trade_in')
        ->with('mod',$mod)
        ;
    }
 
 
    public function postMaintenance(Request $request){
        //   dd(request()->all());
          $validatedData = $request->validate([
            // 'num' => ['required','alpha_num'],
            'car' => ['required' ],
            'center' => ['required' ],
            'plate' => ['required' ],
            'comments' => ['required' ],
            'email' => ['required', 'email'],
            'name' => ['required','regex:/^[\pL\s\-]+$/u'],
            'phone' => ['required', 'numeric'],
            'mileage' => ['required'],
            'dd' => ['required', 'numeric'],
            'mm' => ['required', 'numeric'],
            'yy' => ['required', 'numeric'],
        
        ]);



        // dd(request()->get('name'));
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $car = request()->get('car');
        $message = nl2br(request()->get('notes'));


        $center = request()->get('center') ;
        $plate = request()->get('plate');
        $mileage = request()->get('mileage');
        $dd = request()->get('dd');
        $mm = request()->get('mm');
        $yy = request()->get('yy');
        $m_date = $dd.'/'.$mm.'/'.$yy;
    
        date_default_timezone_set('Africa/Cairo');
        $Date = date("F j, Y");
        $Time = date("g:i a");
        $DateTime = "On ".$Date." at ".$Time;
       

        // $to = 'maysahonda@gmail.com, maysa.saeed@hondaegypt.com.eg, Hassan.El-Askandarany@hondaegypt.com.eg';
        $to = $this->to;
        $from = "booking@hondaegypt.com.eg";
        $subject = "Honda - New Maintenance Booking Request";
        $message = <<<EOF
        <div style="width:500px;margin:20px auto;text-align:left;color:#fff;font-family:Arial, sans-serif;font-size:12px">
            <div style="width:500px;float:left;margin-bottom:10px;color:#777;">You have got a new maintenance booking request | $DateTime</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">User Name</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$name</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Phone</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$phone</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Email</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px"><a style="color:#777" href="#">$email</a></div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Maint. Date</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$m_date</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Service Center</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$center</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Car</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$car </div>
            
                <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Plate Number</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$plate</div>
        
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Mileage</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$mileage</div>
        
        
            <div style="width:500px;float:left;overflow:hidden;background-color:#ed1b2f">
                <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Comments</div>
                <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$message</div>
            </div>
        </div>
        EOF;
        
            $headers  = "From: $from\r\n";
            $headers .= "Content-type: text/html\r\n";
            // $headers .= 'Cc: Hassan.El-Askandarany@hondaegypt.com.eg\r\n';
            // <div style="font-family:Arial, sans-serif;line-height:18px">Thank's, your request has been sent. We will contact you as soon as possible<br />redirecting..</div>            
        // $this->sendEmail();
        
        $data = [
            'messages' => $message,
        ];
        \Mail::send( 'emails.template', [ 'data' => $data ], function ( $message ) use ( $data ,$to, $subject ) {
            $message->to( $to )
            ->replyTo('no-reply@hondaegypt.com.eg')
            //->bcc('darroosh2@gmail.com')
            ->subject( $subject );
    
        });
    
        // mail($to, $subject, $message, $headers);
 

        $request->session()->flash('message', 'Thanks, your request has been sent. We will contact you as soon as possible');

        $mod = "fivestars";
        return \View::make('site.maintenance')
        ->with('mod',$mod)
        ;
    }

    public function postTestDrive(Request $request){
        //   dd(request()->all());
          $validatedData = $request->validate([
            // 'num' => ['required','alpha_num'],
            'car' => ['required' ],
            'notes' => ['required' ],
            'email' => ['required', 'email'],
            'name' => ['required','regex:/^[\pL\s\-]+$/u'],
            'phone' => ['required', 'numeric'],
        ]);
        // dd(request()->get('name'));
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $car = request()->get('car');
        $message = nl2br(request()->get('notes'));

        date_default_timezone_set('Africa/Cairo');
        $Date = date("F j, Y");
        $Time = date("g:i a");
        $DateTime = "On ".$Date." at ".$Time;
       

        // $to = 'maysahonda@gmail.com, maysa.saeed@hondaegypt.com.eg, Hassan.El-Askandarany@hondaegypt.com.eg';
        $to = $this->to;
        $from = "booking@hondaegypt.com.eg";
        $subject = "Honda - New Test Drive Request";
        $message = <<<EOF
        <div style="width:500px;margin:20px auto;text-align:left;color:#fff;font-family:Arial, sans-serif;font-size:12px">
            <div style="width:500px;float:left;margin-bottom:10px;color:#777;">You have got a new test drive request | $DateTime</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Name</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$name</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Phone</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$phone</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Email</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px"><a style="color:#777" href="#">$email</a></div>
            
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Car</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$car</div>
               
            <div style="width:500px;float:left;overflow:hidden;background-color:#ed1b2f">
                <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Notes</div>
                <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$message</div>
            </div>
        </div>
        EOF;
                
            $headers  = "From: $from\r\n";
            $headers .= "Content-type: text/html\r\n";
            // $headers .= 'Cc: Hassan.El-Askandarany@hondaegypt.com.eg\r\n';
            // <div style="font-family:Arial, sans-serif;line-height:18px">Thank's, your request has been sent. We will contact you as soon as possible<br />redirecting..</div>            
        // $this->sendEmail();
        
        $data = [
            'messages' => $message,
        ];
        \Mail::send( 'emails.template', [ 'data' => $data ], function ( $message ) use ( $data ,$to, $subject ) {
            $message->to( $to )
            ->replyTo('no-reply@hondaegypt.com.eg')
            //->bcc('darroosh2@gmail.com')
            ->subject( $subject );
    
        });
    
        // mail($to, $subject, $message, $headers);
 

        $request->session()->flash('message', 'Thanks, your request has been sent. We will contact you as soon as possible');

        $mod = "fivestars";
        return \View::make('site.test_drive')
        ->with('mod',$mod)
        ;
    }
  
    public function postContact(Request $request){
        $validatedData = $request->validate([
            // 'num' => ['required','alpha_num'],
            'message' => ['required' ],
            'email' => ['required', 'email'],
            'name' => ['required','regex:/^[\pL\s\-]+$/u'],
            'phone' => ['required', 'numeric'],
        ]);
        // dd(request()->get('name'));
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $message = nl2br(request()->get('message'));

        date_default_timezone_set('Africa/Cairo');
        $Date = date("F j, Y");
        $Time = date("g:i a");
        $DateTime = "On ".$Date." at ".$Time;
       

        // $to = 'maysahonda@gmail.com, maysa.saeed@hondaegypt.com.eg, Hassan.El-Askandarany@hondaegypt.com.eg';
        $to = $this->to;
        $from = "booking@hondaegypt.com.eg";
        $subject = "Honda - New Contact Message";
        $message = <<<EOF
        <div style="width:500px;margin:20px auto;text-align:left;color:#fff;font-family:Arial, sans-serif;font-size:12px">
            <div style="width:500px;float:left;margin-bottom:10px;color:#777;">You have got a new contact message | $DateTime</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Name</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$name</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Phone</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$phone</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Email</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px"><a style="color:#777" href="#">$email</a></div>
        
            <div style="width:500px;float:left;overflow:hidden;background-color:#ed1b2f">
                <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Message</div>
                <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$message</div>
            </div>
        </div>
        EOF;
                
            $headers  = "From: $from\r\n";
            $headers .= "Content-type: text/html\r\n";
            // $headers .= 'Cc: Hassan.El-Askandarany@hondaegypt.com.eg\r\n';
            // <div style="font-family:Arial, sans-serif;line-height:18px">Thank's, your request has been sent. We will contact you as soon as possible<br />redirecting..</div>            
        // $this->sendEmail();
        
        $data = [
            'messages' => $message,
        ];
        \Mail::send( 'emails.template', [ 'data' => $data ], function ( $message ) use ( $data ,$to, $subject ) {
            $message->to( $to )
            ->replyTo('no-reply@hondaegypt.com.eg')
            //->bcc('darroosh2@gmail.com')
            ->subject( $subject );
    
        });
    
        // mail($to, $subject, $message, $headers);
 

        $request->session()->flash('message', 'Thanks, your request has been sent. We will contact you as soon as possible');

        $mod = "contact";
        return \View::make('site.contact')
        ->with('mod',$mod)
        ;
    }

    public function postRecall(Request $request){
        $validatedData = $request->validate([
            // 'num' => ['required','alpha_num'],
            'model' => ['required','alpha_dash'],
            'year' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'name' => ['required','regex:/^[\pL\s\-]+$/u'],
            'phone' => ['required', 'numeric'],
        ]);
        // dd(request()->get('name'));
        $name = request()->get('name');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $model = request()->get('model');
        $year = request()->get('year');
    
        date_default_timezone_set('Africa/Cairo');
        $Date = date("F j, Y");
        $Time = date("g:i a");
        $DateTime = "On ".$Date." at ".$Time;
       

        // $to = 'maysahonda@gmail.com, maysa.saeed@hondaegypt.com.eg, Hassan.El-Askandarany@hondaegypt.com.eg';
        $to = $this->to;
        $from = "booking@hondaegypt.com.eg";
        $subject = "Honda - Recall Request";
        $message = <<<EOF
        <div style="width:500px;margin:20px auto;text-align:left;color:#fff;font-family:Arial, sans-serif;font-size:12px">
            <div style="width:500px;float:left;margin-bottom:10px;color:#777;">You have got a recall request | $DateTime</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Name</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$name</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Phone</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$phone</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Email</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px"><a style="color:#777" href="#">$email</a></div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Car Model</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$model</div>
        
            <div style="width:140px;padding:10px;float:left;background-color:#ed1b2f;margin-bottom:1px">Year</div>
            <div style="width:320px;padding:10px;float:left;background-color:#F3F3F3;color:#777;margin-bottom:1px">$year</div>
        
        </div>
        EOF;
        
            $headers  = "From: $from\r\n";
            $headers .= "Content-type: text/html\r\n";
            // $headers .= 'Cc: Hassan.El-Askandarany@hondaegypt.com.eg\r\n';
            // <div style="font-family:Arial, sans-serif;line-height:18px">Thank's, your request has been sent. We will contact you as soon as possible<br />redirecting..</div>            
        // $this->sendEmail();
        
        $data = [
            'messages' => $message,
        ];
        \Mail::send( 'emails.template', [ 'data' => $data ], function ( $message ) use ( $data ,$to, $subject ) {
            $message->to( $to )
            ->replyTo('no-reply@hondaegypt.com.eg')
            //->bcc('darroosh2@gmail.com')
            ->subject( $subject );
    
        });
    
        // mail($to, $subject, $message, $headers);
 

        $request->session()->flash('message', 'Thanks, your request has been sent. We will contact you as soon as possible');

        $mod = "owners";
        return \View::make('site.recall')
        ->with('mod',$mod)
        ;
    }

}
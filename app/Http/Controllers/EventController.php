<?php

namespace App\Http\Controllers;
use DB;
use App\Notify;
use App\Event;
use App\log;
use Illuminate\Http\Request;
use helper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use DateTime;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $event = Event::latest()->paginate(5);

        return view('event.index',compact('event'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    public function generate_log($id,$action,$user_data_log)
    {
        DB::table('log')->insert(
        ['event_id' =>  $id, 'action' =>  $action,'user_data_log' =>  $user_data_log ]
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
  

        Event::create($request->all());
        $event_val=$request->all();
        $event_id=DB::getPdo()->lastInsertId();;
        $this->generate_log($event_id,"Store Event",json_encode($event_val));
        return redirect()->route('event.index')
                        ->with('success','Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
         return view('event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
         return view('event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

         $request->validate([
             'name' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
  
        $event->update($request->all());
        $event_id=$request->segment(2);
        $event_val=$request->all();
        $this->generate_log($event_id,"Update Event",json_encode($event_val));
        return redirect()->route('event.index')
                        ->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $data['name']=$event->name;
        $data['detail']=$event->detail;
        $data['date']=$event->date;
        $data['start']=$event->start;
        $data['end']=$event->end;

        $event_id=$event->id;
         $this->generate_log($event_id,"Delete Event",json_encode($data));

          $event->delete();
        
        return redirect()->route('event.index')
                        ->with('success','event deleted successfully');
    }

      public function notify(Request $request)
    {

         $notify = DB::table('notify')->select('id','name')->get();
         $event_id = $request->id;
        return view('event.notify',compact('event_id'))->with('notify', $notify);
     
    }

    public function store_notify_mode(Request $request){
        $event_id = $request->event_id;
        $notify_id = $request->mode;
        $user_data = DB::table('users')->select('id','name','company_name','phone_number','email')->get();
        $event_data = DB::table('event')->select('name','detail','date','start','end')->where('id','=',$event_id)->get();
        $event_name = $event_data[0]->name;
        $event_detail = $event_data[0]->detail;
        $event_date = $event_data[0]->date;
        $event_start = $event_data[0]->start;
        $event_end = $event_data[0]->end;

            foreach ($user_data as $key => $value) {
            $user_id = $value->id;
            $user_name = $value->name;
            $user_company_name = $value->company_name;
            $user_phone_number = $value->phone_number;
            $user_email = $value->email;

            $body = 'Event name='.$event_name.', Event detail='.$event_detail.', Event date='.$event_date.', Event start='.$event_start.', Event end='.$event_end;

            if ($notify_id==2) {
          
            $type = "Message Notification";
            $result_data = $this->Message_Notification($user_phone_number,$body);
            }
            if ($notify_id==3) {
            $subject="Event Management system";
            $type = "Email Notification";
            $result_data = $this->phpMailer_function($user_email,$subject,$body);
            }
            if ($notify_id==4) {
             $type = "Firebase Notification";
            $result_data = $this->Firebase_Notification($user_phone_number,$body);
            }
            if ($notify_id==5) {
            $type = "WhatsApp Notification";
            $result_data = $this->WhatsApp_Notification($user_phone_number,$body);
            }

            
          
         }
    
      
        $this->generate_log($event_id,$type,$user_data->toJson());
        return redirect()->route('event.index')->with('success','Message has been sent!');

    }


 public function Message_Notification($user_phone_number,$body){

 }

  public function Firebase_Notification($user_phone_number,$body){
    
 }

  public function WhatsApp_Notification($user_phone_number,$body){
    
 }
    

public function phpMailer_function ($email,$subject,$body) {
    // is method a POST ?

                                                        // load Composer's autoloader

            $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

            try {
                // Server settings
                $mail->SMTPDebug = 0;                                   // Enable verbose debug output
                $mail->isSMTP();                                        // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                                             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                 // Enable SMTP authentication
                $mail->Username = 'appapada2020@gmail.com';             // SMTP username
                $mail->Password = 'pinku8420';              // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('appapada2020@gmail.com', 'Mailer');
                $mail->addAddress($email, 'Event Management system');  // Add a recipient, Name is optional
            

                //Content
                $mail->isHTML(true);                                                                    // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $body;                     // message

                $mail->send();
             
            } catch (Exception $e) {
                return back()->with('error','Message could not be sent.');
            }
        
       
  }

      public function delete(Request $request)
    {
          $event_id = $request->id;
         $event_data =  DB::table('event')->select('name')->where('id','=',$event_id)->get();
       $event_name = $event_data[0]->name;

        return view('event.delete',compact('event_name','event_id'));
     
    }

        public function log_delete(Request $request)
    {
         $event_id = $request->event_id;
        DB::table('log')->where('event_id', '=', $event_id)->delete();
         return redirect()->route('event.index')
                        ->with('success','event deleted successfully');
    }


}

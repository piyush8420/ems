<?php

namespace App\Console\Commands;
use DB;
use App\Notify;
use App\Event;
use App\log;
use DateTime;
use Illuminate\Console\Command;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class EventCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For Sent Mail to the user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $notify_id = 3;
        $user_data = DB::table('users')->select('id','name','company_name','phone_number','email')->get();
        $ldate = date("Y-m-d");    
         $event_data = DB::table('event')->select('id','name','detail','date','start','end')->where('date','=',$ldate)->get();
        $event_id = $event_data[0]->id;
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

            if ($notify_id==3) {
            $subject="Event Management system";
            $type = "Email Notification";
            $result_data = $this->phpMailer_function($user_email,$subject,$body);
            }

             }
    
      
        $this->generate_log($event_id,$type,$user_data->toJson());
        echo "Message has been sent!";
        return redirect()->route('event.index')->with('success','Message has been sent!');


    }




        public function generate_log($id,$action,$user_data_log)
    {
        DB::table('log')->insert(
        ['event_id' =>  $id, 'action' =>  $action,'user_data_log' =>  $user_data_log ]
        );
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

}

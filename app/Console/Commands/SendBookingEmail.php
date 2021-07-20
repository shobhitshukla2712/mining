<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Helper;
use Log;
use Mail;

use App\EmailLog;
use App\User;

class SendBookingEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email template to movers';

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
        // Get the first entry from queue
        $emailToSend = EmailLog::where(['status' => '0'])->first();

        // If there is some record, process it
        if( $emailToSend )
        {
            $userDetails = User::where(['email' => $emailToSend->email_id])->first();

            $emailData = array(
                'senderEmail' => \Config::get('constants.FROM_EMAIL'),
                'senderName' => \Config::get('constants.SENDER_NAME'),
                'recEmail' => $userDetails->email,
                'recName' => $userDetails->name,
                'subject' => 'Booking Confirmation'
            );

            try
            {
                if( $emailToSend->email_type == 1 )     // User
                {
                    Mail::send('emails.userBooking', ['emailData' => $emailData], function ($m) use ($emailData) {
                        $m->from($emailData['senderEmail'], $emailData['senderName']); 
                        $m->to($emailData['recEmail'], $emailData['recName'])->subject($emailData['subject']);
                    });
                }
                else                                    // Dealer
                {
                    Mail::send('emails.dealerBooking', ['emailData' => $emailData], function ($m) use ($emailData) {
                        $m->from($emailData['senderEmail'], $emailData['senderName']); 
                        $m->to($emailData['recEmail'], $emailData['recName'])->subject($emailData['subject']);
                    });
                }

                // Update the status to '1' (email sent successfully)
                EmailLog::where(['id' => $emailToSend->id])->update(['status' => '1']);
            }
            catch(\Exception $e)
            {
                // Update the status to '2' (Some error in sending email)
                \Log::info($e->getMessage());
                EmailLog::where(['id' => $emailToSend->id])->update(['status' => '2']);
            }
        }
    }
}
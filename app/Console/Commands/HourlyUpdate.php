<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Candidate;

class HourlyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hour:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an two minute email to all the candidate';

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
     * @return int
     */
    public function handle()
    {
        $candidates = Candidate::where('email', '!=' , null)->get();

        foreach ($candidates as $candidate)
        {
            $to_name = $candidate->first_name. " ". $candidate->last_name;
            $to_email = $candidate->email;
            $data = array('name' => $candidate->first_name. " ". $candidate->last_name, "body" => "This is Mail for Test schedule for sending email everyMinute");
              
            Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Laravel Scheduling Mail - Interview System');
            $message->from('socialdevp786@gmail.com','Test Scheduling Mail');
            });

        }    

        /*$to_name = "Mitesh Kadivar";
        $to_email = "miteshk@websoptimization.com";
        $data = array('name' => "Mitesh Kadivar", "body" => "This is Mail for Test schedule for sending email everyMinute");
          
        Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Scheduling Mail - Interview System');
        $message->from('socialdevp786@gmail.com','Test Scheduling Mail');
        });*/
      
        $this->info('Minutly mail has been send successfully');
    }
}

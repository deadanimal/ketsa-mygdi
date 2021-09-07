<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $to_name = "ftestttt";
        $to_email = "farhan15959@gmail.com";
        Mail::send('mails.exmpl7', [], function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('ftestcronnnnnnnnnnn');
            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
        });  
        
        \Log::info("ftestttttttttt executed!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
      
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}

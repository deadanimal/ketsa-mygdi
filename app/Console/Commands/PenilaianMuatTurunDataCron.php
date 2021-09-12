<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Role;
use App\MohonData;
use App\ModelHasRoles;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Storage;
use DB;

class PenilaianMuatTurunDataCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penilaianMuatTurunData:cron';

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
        $mohonsToDoPenilaian = [];
        $mohons = MohonData::whereNotNull('berjayaMuatTurunTarikh')->where('berjayaMuatTurunStatus','1')->whereNotNull('emailPenilaianStart')->get();
        if(count($mohons) > 0){
            foreach($mohons as $m){
                $interval = date_create('now')->diff(date_create($m->berjayaMuatTurunTarikh));
//                if($interval->m < 7){ //send email once every 2 months for 6 months //ori specs
                if($interval->i < 45){ //send email once every 2 months for 6 months
                    $interval2 = date_create('now')->diff(date_create($m->emailPenilaianStart));
                    //if($interval2->m >= 2){ //check last time emailed was 2 months ago //ori specs
                    if($interval2->i >= 1){ //check last time emailed was 2 months ago
                        $mohonsToDoPenilaian[$m->id] = $m->name;
                        $vals = [];
                        $vals["emailPenilaianStart"] = date('Y-m-d H:i:s',time());
                        MohonData::where(["id" => $m->id])->update($vals);
                        
                        //send email to pemohon data to do penilaian
                        $to_name = Auth::user()->name;
                        $to_email = Auth::user()->email;
                        $data = array('m'=>$m);
                        Mail::send("mails.exmpl17", $data, function($message) use ($to_name, $to_email) {
                            $message->to($to_email, $to_name)->subject("MyGeo Explorer - Penilaian bagi data yang dimuat turun");
                            $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                        });
                    }
                }
            }
        }
        
        \Log::info("PenilaianMuatTurunDataCron executed!");
    }
}

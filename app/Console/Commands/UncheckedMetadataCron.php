<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MetadataGeo;
use App\User;
use App\Role;
use App\ModelHasRoles;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Storage;
use DB;

class UncheckedMetadataCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uncheckedMetadata:cron';

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
//        $lastTwoWeeks = date('Y-m-d H:i:s', strtotime("-2 weeks")); //ori specs
        $lastTwoWeeks = date('Y-m-d H:i:s', strtotime("-1 hours"));
       
        //find metadata tak diusik lebih dari 2 minggu
        $result1 = MetadataGeo::on('pgsql2')->whereRaw('createdate = changedate')->whereDate('createdate','<',$lastTwoWeeks)->whereNull('cronned_metadata_tak_diusik')->get();
        if(count($result1) > 0){
            foreach($result1 as $r){
                $r->cronned_metadata_tak_diusik = date('Y-m-d H:i:s',time());
                $r->update();
            }
        }
        
        //find metadata that has been mailed(cronned) more than 2 minggu but still x diusik
        $result2 = MetadataGeo::on('pgsql2')->whereRaw('createdate = changedate')->whereDate('cronned_metadata_tak_diusik','<',$lastTwoWeeks)->get();
        if(count($result2) > 0){
            foreach($result2 as $r){
                $r->cronned_metadata_tak_diusik = date('Y-m-d H:i:s',time());
                $r->update();
            }
        }
        
        if(count($result1) > 0 || count($result2) > 0){
            //send email notification to them pengesahs
            $pengesahs = User::whereHas("roles", function ($q) {
                            $q->where("name", "Pengesah Metadata");
                        })->get();
            if(count($pengesahs) > 0){
                foreach($pengesahs as $p){
                    $to_name = $p->name;
                    $to_email = $p->email;
                    $data = array('name'=>$p->name);
                    Mail::send('mails.exmpl16', $data, function($message) use ($to_name, $to_email) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Metadata Tidak Diusik');
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });            
                }
            }
            \Log::info("UncheckedMetadataCron executed!");
        }
    }
}

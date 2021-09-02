<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MetadataGeo;
use App\User;
use App\Role;
use App\ModelHasRoles;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

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
        $lastTwoWeeks = date('Y-m-d', strtotime("-2 weeks"));
        
        $query = MetadataGeo::on('pgsql2')->where('disahkan','0')->whereNull('cronned_metadata_tak_diusik');
        $result = $query->whereDate('createdate','<',$lastTwoWeeks)->get();
        if($result > 0){
            foreach($result as $r){
                $r->cronned_metadata_tak_diusik = date('Y-m-d H:i:s',strtotime());
                $r->update();
            }
            
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
        }
    }
}

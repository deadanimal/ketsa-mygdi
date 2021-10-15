<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MetadataGeo;
use App\User;
use App\Role;
use App\ModelHasRoles;
use App\AgensiOrganisasi;
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
        $lastTwoWeeks = date('Y-m-d H:i:s', strtotime("-2 minutes"));
       
        //find metadata tak diusik lebih dari 2 minggu
        $result1 = MetadataGeo::on('pgsql2')->whereRaw('createdate = changedate')->where('createdate','<',$lastTwoWeeks)->whereNull('cronned_metadata_tak_diusik')->get();
        
        $metadataTitles = [];
        $metadatasByAgensi = [];
        
        if(count($result1) > 0){
            foreach($result1 as $r){
                $ftestxml2 = <<<XML
                        $r->data
                        XML;
                $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
                $xml2 = simplexml_load_string($ftestxml2);
                
                $title = "";
                if(isset($xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
//                   $metadataTitles[] = $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                   $title = $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                }elseif(isset($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
//                   $metadataTitles[] = $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                   $title = $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                }
                
                //===================
                $agensixml = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                $agensi = AgensiOrganisasi::where('name',$agensixml)->get();
                if(!empty($agensi) && count($agensi) > 0){
                    $metadatasByAgensi[$agency->id][] = $title;
                }else{
                    $metadatasByAgensi['no_agensi_organisasi'][] = $title;
                }
                //===================
                
                $r->cronned_metadata_tak_diusik = date('Y-m-d H:i:s',time());
                $r->update();
            }
        }
        
        //find metadata that has been mailed(cronned) more than 2 minggu but still x diusik
        $result2 = MetadataGeo::on('pgsql2')->whereRaw('createdate = changedate')->where('cronned_metadata_tak_diusik','<',$lastTwoWeeks)->get();
        if(count($result2) > 0){
            foreach($result2 as $r){
                $ftestxml2 = <<<XML
                        $r->data
                        XML;
                $ftestxml2 = str_replace("gco:", "", $ftestxml2);
                $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
                $ftestxml2 = str_replace("srv:", "", $ftestxml2);
                $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);
                $xml2 = simplexml_load_string($ftestxml2);
                
                $title = "";
                if(isset($xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString != ""){
//                   $metadataTitles[] = $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                   $title[] = $xml2->identificationInfo->SV_ServiceIdentification->citation->CI_Citation->title->CharacterString;
                }elseif(isset($xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString) && $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString != ""){
//                   $metadataTitles[] = $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                   $title[] = $xml2->identificationInfo->MD_DataIdentification->citation->CI_Citation->title->CharacterString;
                }
                
                //===================
                $agensixml = (isset($xml2->contact->CI_ResponsibleParty->organisationName->CharacterString) ? $xml2->contact->CI_ResponsibleParty->organisationName->CharacterString : "");
                $agensi = AgensiOrganisasi::where('name',$agensixml)->get();
                if(!empty($agensi) && count($agensi) > 0){
                    $metadatasByAgensi[$agency->id][] = $title;
                }else{
                    $metadatasByAgensi['no_agensi_organisasi'][] = $title;
                }
                //===================
                
                $r->cronned_metadata_tak_diusik = date('Y-m-d H:i:s',time());
                $r->update();
            }
        }
        
//        $metadataTitles = array_unique($metadataTitles);
        
        foreach($metadatasByAgensi as $mba){
            //SMBG SINI - dah collect metadatas by agensi id, continue next line
            
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
                    $data = array('metadataTitles'=>$metadataTitles);
                    Mail::send('mails.exmpl16', $data, function($message) use ($to_name, $to_email) {
                        $message->to($to_email, $to_name)->subject('MyGeo Explorer - Peringatan Pengesahan Metadata');
                        $message->from('mail@mygeo-explorer.gov.my','mail@mygeo-explorer.gov.my');
                    });            
                }
            }
            \Log::info("UncheckedMetadataCron executed!");
        }
    }
}

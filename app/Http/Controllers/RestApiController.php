<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RestApiController extends Controller {

    function __construct() {}

    public function generateGeorss($metadataIds,$metadataSearched,$url){
        $list = "";
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            $metDate = '';
            if (isset($msxml->dateStamp->Date) && $msxml->dateStamp->Date != '') {
                $metDate = $msxml->dateStamp->Date;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $catSelected = "";
            $arr = (array)$msxml->hierarchyLevel->MD_ScopeCode;
            foreach($arr as $ar){
                if(is_array($ar)){
                    $catSelected = $ar['codeListValue'];
                }
            }
            if($catSelected != "" && strtolower($catSelected) == "service"){
                $catSelected = "services";
            }
            
            $west = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }
            $east = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }
            $south = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }
            $north = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }
            
            $list .= '
                <item>
                        <link>'.$msLink.'</link>
                        <guid isPermaLink="true">'.$msLink.'</guid>
                        <title><![CDATA['.$ms->title.']]></title>
                        <pubDate>'.$metDate.'</pubDate>
                        <source url="'.$urlFixed.'">Geoportal GeoRSS.</source>
                        <description>
                                <![CDATA['.$abstract.']]>
                        </description>
                        <category>'.$catSelected.'</category>
                        <media:thumbnail url="http://mygdix.mygeoportal.gov.my/mygdiexplorer/catalog/images/ContentType_offlineData.png"/>
                        <georss:polygon>'.$north.' '.$south.' '.$east.' '.$west.'</georss:polygon>
                </item>
            ';
        }
        
        $var = <<<XML
                <?xml version="1.0" encoding="UTF-8"?>
                    <rss version="2.0"
                            xmlns:georss="http://www.georss.org/georss"
                            xmlns:media="http://search.yahoo.com/mrss/"
                            xmlns:opensearch="http://a9.com/-/spec/opensearch/1.1/"
                            xmlns:atom="http://www.w3.org/2005/Atom"
                            xmlns:geoportal="http://www.esri.com/geoportal">
                            <channel>
                                    <title>Geoportal GeoRSS.</title>
                                    <description>Most recently updated metadata documents.</description>
                                    <link>http://mygdix.mygeoportal.gov.my/mygdiexplorer</link>
                                    <docs>http://www.rssboard.org/rss-specification</docs>
                                    <category>GeoRss</category>
                                    <generator>Geoportal</generator>
                                    <managingEditor>mygdiadmin@kats.gov.my</managingEditor>
                                    <webMaster>mygdiadmin@kats.gov.my</webMaster>
                                    <atom:link rel="search" type="application/opensearchdescription+xml" href="http://mygdix.mygeoportal.gov.my/mygdiexplorer/openSearchDescription" title="Geoportal Search"/>
                                    <opensearch:totalResults>6425</opensearch:totalResults>
                                    <opensearch:startIndex>1</opensearch:startIndex>
                                    <opensearch:itemsPerPage>12</opensearch:itemsPerPage>
                                    <atom:link href="$urlFixed" rel="self" type="application/rss+xml" />;
                                    $list
                            </channel>
                    </rss>
                XML;
    
        return $var;    
    }
    public function generateAtom($metadataIds,$metadataSearched,$totalResults,$url,$uiPageUrl){
        $list = "";
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        $uiPageUrlFixed = str_replace('&','&#38;',$uiPageUrl);
        $uiPageUrlFixed = str_replace('=','&#61;',$uiPageUrlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            $metDate = '';
            if (isset($msxml->dateStamp->Date) && $msxml->dateStamp->Date != '') {
                $metDate = $msxml->dateStamp->Date;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $catSelected = "";
            $arr = (array)$msxml->hierarchyLevel->MD_ScopeCode;
            foreach($arr as $ar){
                if(is_array($ar)){
                    $catSelected = $ar['codeListValue'];
                }
            }
            if($catSelected != "" && strtolower($catSelected) == "service"){
                $catSelected = "services";
            }
            
            $west = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }
            $east = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }
            $south = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }
            $north = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }
            
            $list .= '
                <entry>
                        <title><![CDATA['.$ms->title.']]></title>
                        <link href="http://mygdix.mygeoportal.gov.my/mygdiexplorer/catalog/search/resource/details.page?uuid=%7B39FFBC37-2E41-4F09-93B9-EF68639D5348%7D"/>
                        <link href="'.url('lihat_xml_nologin').'?metadata_id='.$ms->id.'"/>
                        <id>urn:uuid:'.$ms->uuid.'</id>
                        <updated>'.date('d-m-Y H:i:s',strtotime($ms->changedate)).'</updated>
                        <summary><![CDATA['.$abstract.']]></summary>
                        <georss:box>'.$north.' '.$south.' '.$east.' '.$west.'</georss:box>
                </entry>
            ';
        }
        
        $currentDate = date('d-m-Y H:i:s',time());
        $var = <<<XML
                <?xml version="1.0" encoding="UTF-8"?>
                <feed xmlns="http://www.w3.org/2005/Atom" xmlns:georss="http://www.georss.org/georss" xmlns:opensearch="http://a9.com/-/spec/opensearch/1.1/">
                <!--
                Description:  Most recently updated metadata documents.
                Copyright:  
                -->
                <id>$uiPageUrlFixed</id>
                <title>Geoportal GeoRSS.</title>
                <link rel="self" href="$uiPageUrlFixed"/>
                <author><name>Geoportal</name></author>
                <updated>$currentDate</updated>
                <opensearch:totalResults>$totalResults</opensearch:totalResults>
                <opensearch:startIndex>1</opensearch:startIndex>
                <opensearch:itemsPerPage>12</opensearch:itemsPerPage>
                $list
                </feed>
                XML;
    
        return $var;    
    }
    public function generateHtml($metadataIds,$metadataSearched,$url,$uiPageUrl){
        $list = "";
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        $uiPageUrlFixed = str_replace('&','&#38;',$uiPageUrl);
        $uiPageUrlFixed = str_replace('=','&#61;',$uiPageUrlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $list .= '
                <p>'.$ms->title.'</p>
                <p>'.$abstract.'</p>
                <p>
                    <a href="'.url('lihat_metadata_nologin').'/'.$ms->id.'">Metadata Details</a>
                    <a href="'.url('lihat_xml_nologin').'?metadata_id='.$ms->id.'">Metadata (XML)</a>
                </p>
            ';
        }
        
        $currentDate = date('d-m-Y H:i:s',time());
        $var = "<html>
                    <head>
                    </head>
                    <body>
                        $list
                    </body>
                </html>";
    
        return $var;  
    }
    public function generateFragment($metadataIds,$metadataSearched,$url,$uiPageUrl){
        $list = "";
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        $uiPageUrlFixed = str_replace('&','&#38;',$uiPageUrl);
        $uiPageUrlFixed = str_replace('=','&#61;',$uiPageUrlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $list .= '
                <p>'.$ms->title.'</p>
                <p>'.$abstract.'</p>
                <p>
                    <a href="'.url('lihat_metadata_nologin').'/'.$ms->id.'">Metadata Details</a>
                    <a href="'.url('lihat_xml_nologin').'?metadata_id='.$ms->id.'">Metadata (XML)</a>
                </p>
            ';
        }
        
        $currentDate = date('d-m-Y H:i:s',time());
        $var = "<html>
                    <head>
                    </head>
                    <body>
                        $list
                    </body>
                </html>";
    
        return $var;  
    }
    public function generateKml($metadataIds,$metadataSearched,$url,$uiPageUrl){
        $list = "";
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        $uiPageUrlFixed = str_replace('&','&#38;',$uiPageUrl);
        $uiPageUrlFixed = str_replace('=','&#61;',$uiPageUrlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $west = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }
            $east = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }
            $south = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }
            $north = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }
            
            $list .= '
                <Placemark>
                    <name><![CDATA['.$ms->title.']]></name>
                    <description>
                        <![CDATA['.$abstract.']]>
                    </description>
                    <styleUrl>#main</styleUrl>
                    <Polygon>
                        <extrude>0</extrude>
                        <altitudeMode>clampToGround</altitudeMode>
                        <outerBoundaryIs>
                            <LinearRing>
                                <coordinates>
                                    '.$north.' '.$south.' '.$east.' '.$west.'
                                </coordinates>
                            </LinearRing>
                        </outerBoundaryIs>
                    </Polygon>
                </Placemark>
            ';
        }
        
        $var = <<<XML
                <?xml version="1.0" encoding="UTF-8"?>
                <kml xmlns="http://www.opengis.net/kml/2.2">
                    <Document>
                        <name>Geoportal GeoRSS.</name>
                        <open>1</open>
                        <description>Most recently updated metadata documents.</description>
                        <Style id="main">
                            <LineStyle>
                                <width>1.5</width>
                            </LineStyle>
                            <PolyStyle>
                                <color>7d0000ff</color>
                            </PolyStyle>
                        </Style>
                        $list
                    </Document>
                </kml>

                XML;
    
        return $var;  
    }
    public function generateJson($metadataIds,$metadataSearched,$totalResults,$url,$uiPageUrl){
        $list = [];
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        $uiPageUrlFixed = str_replace('&','&#38;',$uiPageUrl);
        $uiPageUrlFixed = str_replace('=','&#61;',$uiPageUrlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            $metDate = '';
            if (isset($msxml->dateStamp->Date) && $msxml->dateStamp->Date != '') {
                $metDate = $msxml->dateStamp->Date;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $west = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }
            $east = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }
            $south = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }
            $north = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }
            
            $list[] = [
                "title"=>$ms->title,
                "id"=>$ms->uuid,
                "updated"=>date('d-m-Y H:i:s',strtotime($ms->changedate)),
                "summary"=>$abstract,
                "bbox"=>[$north,$south,$east,$west],
                "geometry"=>[
                    "type"=>"Polygon",
                    "coordinates"=>[
                        [
                            [$north,$south,$east,$west]
                        ]
                    ]
                ],
                "links"=>[
                    [
                        "href"=>url('lihat_metadata_nologin/'.$ms->id),
                        "type"=>"details",
                    ],
                    [
                        "href"=>url('lihat_xml_nologin').'?metadata_id='.$ms->id,
                        "type"=>"metadata",
                    ]
                ]
            ];
        }
        
        $var = [];
        $var["title"] = "Geoportal GeoRSS.";
        $var["description"] = "Most recently updated metadata documents.";
        $var["copyright"] = "";
        $var["provider"] = $uiPageUrlFixed;
        $var["updated"] = date('d-m-Y H:i:s',time());
        $var["source"] = $urlFixed;
        $var["more"] = $urlFixed;
        $var["totalResults"] = $totalResults;
        $var["startIndex"] = 1;
        $var["itemsPerPage"] = 12;
        $var["records"] = $list;
        
        return $var;
    }
    public function generateCsv($metadataIds,$metadataSearched,$url){
        $list = "";
        $urlFixed = str_replace('&','&#38;',$url);
        $urlFixed = str_replace('=','&#61;',$urlFixed);
        
        foreach($metadataSearched as $ms){
            $msLink = url('lihat_metadata_nologin/'.$ms->id);
            
            $ftestxml2 = <<<XML
                $ms->data
                XML;
            $ftestxml2 = str_replace("gco:", "", $ftestxml2);
            $ftestxml2 = str_replace("gmd:", "", $ftestxml2);
            $ftestxml2 = str_replace("srv:", "", $ftestxml2);
            $ftestxml2 = str_replace("&#13;", "", $ftestxml2);
            $ftestxml2 = str_replace("\r", "", $ftestxml2);
            $ftestxml2 = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $ftestxml2);

            $msxml = simplexml_load_string($ftestxml2);
            if (false === $msxml) {
    //            continue;
            }
            $metDate = '';
            if (isset($msxml->dateStamp->Date) && $msxml->dateStamp->Date != '') {
                $metDate = $msxml->dateStamp->Date;
            }
            
            $abstract = "";
            if(isset($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString) && $msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->SV_ServiceIdentification->abstract->CharacterString);
            }elseif(isset($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString) && $msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString != ""){
                $abstract = trim($msxml->identificationInfo->MD_DataIdentification->abstract->CharacterString);
            }
            
            $catSelected = "";
            $arr = (array)$msxml->hierarchyLevel->MD_ScopeCode;
            foreach($arr as $ar){
                if(is_array($ar)){
                    $catSelected = $ar['codeListValue'];
                }
            }
            if($catSelected != "" && strtolower($catSelected) == "service"){
                $catSelected = "services";
            }
            
            $west = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal)){
                $west = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->westBoundLongitude->Decimal;
            }
            $east = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal)){
                $east = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->eastBoundLongitude->Decimal;
            }
            $south = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal)){
                $south = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->southBoundLatitude->Decimal;
            }
            $north = "";
            if(isset($msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->MD_DataIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }elseif(isset($msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal)){
                $north = $msxml->identificationInfo->SV_ServiceIdentification->extent->EX_Extent->geographicElement->EX_GeographicBoundingBox->northBoundLatitude->Decimal;
            }
            
            $list .= '
                <item>
                        <link>'.$msLink.'</link>
                        <guid isPermaLink="true">'.$msLink.'</guid>
                        <title><![CDATA['.$ms->title.']]></title>
                        <pubDate>'.$metDate.'</pubDate>
                        <source url="'.$urlFixed.'">Geoportal GeoRSS.</source>
                        <description>
                                <![CDATA['.$abstract.']]>
                        </description>
                        <category>'.$catSelected.'</category>
                        <media:thumbnail url="http://mygdix.mygeoportal.gov.my/mygdiexplorer/catalog/images/ContentType_offlineData.png"/>
                        <georss:polygon>'.$north.' '.$south.' '.$east.' '.$west.'</georss:polygon>
                </item>
            ';
        }
        
        $var = <<<XML
                <?xml version="1.0" encoding="UTF-8"?>
                    <rss version="2.0"
                            xmlns:georss="http://www.georss.org/georss"
                            xmlns:media="http://search.yahoo.com/mrss/"
                            xmlns:opensearch="http://a9.com/-/spec/opensearch/1.1/"
                            xmlns:atom="http://www.w3.org/2005/Atom"
                            xmlns:geoportal="http://www.esri.com/geoportal">
                            <channel>
                                    <title>Geoportal GeoRSS.</title>
                                    <description>Most recently updated metadata documents.</description>
                                    <link>http://mygdix.mygeoportal.gov.my/mygdiexplorer</link>
                                    <docs>http://www.rssboard.org/rss-specification</docs>
                                    <category>GeoRss</category>
                                    <generator>Geoportal</generator>
                                    <managingEditor>mygdiadmin@kats.gov.my</managingEditor>
                                    <webMaster>mygdiadmin@kats.gov.my</webMaster>
                                    <atom:link rel="search" type="application/opensearchdescription+xml" href="http://mygdix.mygeoportal.gov.my/mygdiexplorer/openSearchDescription" title="Geoportal Search"/>
                                    <opensearch:totalResults>6425</opensearch:totalResults>
                                    <opensearch:startIndex>1</opensearch:startIndex>
                                    <opensearch:itemsPerPage>12</opensearch:itemsPerPage>
                                    <atom:link href="$urlFixed" rel="self" type="application/rss+xml" />;
                                    $list
                            </channel>
                    </rss>
                XML;
    
        return $var;  
    }
}
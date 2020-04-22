<?php
/*
 *
 * 
 * 
 */
ini_set("display_errors", "on");
date_default_timezone_set('America/Bogota');
require_once('mysql.php');
//$result = $oSoapClient->__getFunctions();
$aParametros= array(
    "Condiciones"=> array(
        "Condicion"=> array(
            "Tipo" => "FechaInicial",
            "Expresion" => "2019-07-01 00:00:00"
        )
    )
);


$client = new SoapClient('http://test.analitica.com.co/AZDigital_Pruebas/WebServices/ServiciosAZDigital.wsdl');

$wsdl="http://test.analitica.com.co/AZDigital_Pruebas/WebServices/ServiciosAZDigital.wsdl";
$endpoint ="http://test.analitica.com.co/AZDigital_Pruebas/WebServices/SOAP/index.php";
$clienteSoap = new SoapClient($wsdl,array(
    'location'=>$endpoint,
    'trace'=>true,
    'exceptions'=>false));
    
$response = $clienteSoap->BuscarArchivo($aParametros);
$xmlResponse = $clienteSoap->__getLastResponse();
file_put_contents("xmlResponse.xml", $xmlResponse);


$mimetypes = array(
    'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'pdf' => 'application/pdf',
    'html' => 'text/html',
    'azhtml' => 'text/html',
    'xml' => 'application/rss+xml',
    'xslt' => 'application/xslt+xml',
    'xls' => 'application/vnd.ms-excel',
    'txt' => 'text/plain',
    'ico' => 'image/x-icon',
    'png' => 'image/png',
    'p12' => 'application/x-pkcs12',
    'url' => 'text/undefined',
);



$xml = new DOMDocument(); 
$xml->load('xmlResponse.xml'); 
$xsl = new DOMDocument; $xsl->load('test.xsl'); 
$proc = new XSLTProcessor(); $proc->importStyleSheet($xsl); 
$string =  $proc->transformToXML($xml);


$queries= explode("*/*",$string);


$mysql = new mysql();

echo '<pre>';
foreach ($queries as $key => $query) {
    if($query !=" "){

        $vars = explode("||",$query);
        $idx = strripos($vars[1],".");
        if($idx>0){
            $extension = substr($vars[1],$idx+1);            
            $mime = $mimetypes[$extension];
            
        }else{
            $extension = "NoExtension";
            $mime = "N/A";
        }
        $query1 = "INSERT INTO files (id,name) VALUES($vars[0],'".str_replace( "'", "\'",$vars[1])."')";
        $query2 = "INSERT INTO file_details (file_id,extension,file_type) VALUES($vars[0],'$extension','$mime')";
        $result = $mysql->query($query1);
        $result = $mysql->query($query2);
    }
}
$mysql->__destruct();
exit;
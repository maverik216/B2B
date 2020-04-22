<?php
/*
 *
 * 
 * 
 */
ini_set("display_errors", "on");


$xml = new DOMDocument(); 
$xml->load('reporter1.xml'); 
$xsl = new DOMDocument; $xsl->load('report1.xsl'); 
$proc = new XSLTProcessor(); $proc->importStyleSheet($xsl); 
echo $string =  $proc->transformToXML($xml);

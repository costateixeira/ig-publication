<?php
function Redirect($url)
{
  header('Location: ' . $url, true, 302);
  exit();
}

$accept = $_SERVER['HTTP_ACCEPT'];
if (strpos($accept, 'application/json+fhir') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.json2');
elseif (strpos($accept, 'application/fhir+json') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.json1');
elseif (strpos($accept, 'json') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.json');
elseif (strpos($accept, 'application/xml+fhir') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.xml2');
elseif (strpos($accept, 'application/fhir+xml') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.xml1');
elseif (strpos($accept, 'html') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.html');
else 
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/StructureDefinition-myObservation.xml');
?>
    
You should not be seeing this page. If you do, PHP has failed badly.

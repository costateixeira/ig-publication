<?php
function Redirect($url)
{
  header('Location: ' . $url, true, 302);
  exit();
}

$accept = $_SERVER['HTTP_ACCEPT'];
if (strpos($accept, 'application/json+fhir') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.json2');
elseif (strpos($accept, 'application/fhir+json') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.json1');
elseif (strpos($accept, 'json') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.json');
elseif (strpos($accept, 'application/xml+fhir') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.xml2');
elseif (strpos($accept, 'application/fhir+xml') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.xml1');
elseif (strpos($accept, 'html') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.html');
else 
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/ValueSet-valueset-no-codesystem.xml');
?>
    
You should not be seeing this page. If you do, PHP has failed badly.

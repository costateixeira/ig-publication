<?php
function Redirect($url)
{
  header('Location: ' . $url, true, 302);
  exit();
}

$accept = $_SERVER['HTTP_ACCEPT'];
if (strpos($accept, 'application/json+fhir') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.json2');
elseif (strpos($accept, 'application/fhir+json') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.json1');
elseif (strpos($accept, 'json') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.json');
elseif (strpos($accept, 'application/xml+fhir') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.xml2');
elseif (strpos($accept, 'application/fhir+xml') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.xml1');
elseif (strpos($accept, 'html') !== false)
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.html');
else 
  Redirect('http://hl7belgium.org/fhir/core/2020Jun/Binary-example.xml');
?>
    
You should not be seeing this page. If you do, PHP has failed badly.

<?php
$soap = new SoapClient('http://webservices.amazon.com/AWSECommerceService/AWSECommerceService.wsdl');

echo '<pre>';

$types = $soap->__getTypes();
foreach ($types as $type) {
    $type = preg_replace('/^struct\s/', 'class ', $type);
    echo "$type\n\n";
}

$functions = $soap->__getFunctions();
foreach ($functions as $function) {
    echo "function $function\n\n";
}

echo '</pre>';

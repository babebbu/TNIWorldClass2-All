<?php

echo 'hello';

$request = new HTTP_Request2('https://tniworldclass.com/test.php');
$request->setMethod(HTTP_Request2::METHOD_GET);

var_dump($request->getBody());

?>
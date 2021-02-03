<?php

require_once 'autoloader.php';

$currency=new \Hillel\MyApplication\Currency('UAH');
//$currency1=new \Hillel\MyApplication\Currency('USD');
$money=new \Hillel\MyApplication\Money(10,$currency);

var_dump($money->add(new \Hillel\MyApplication\Money(810,$currency)));
//$money1=new \Hillel\MyApplication\Money(10,$currency);

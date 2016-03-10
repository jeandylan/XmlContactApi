<?php
require_once "wsdl.class.php";
require_once "lib/nusoap.php";
include 'xmlFunction.php';
include_once 'xmlParams.php';
include "insertContactService.php";
include "deleteContactById.php";
include "editContactById.php";
include "searchFunctions.php";
include "viewAllContact.php";
/*

$product=array('Name' => 'somthing'.$i,
    'Code' => '23456yui'.$i,
    'Price' => 222*($i+1),
    'Ammount' => 5+$i
);


*/




$server = new soap_server();
$server->configureWSDL("contact", "localhost/server.php");

$server->wsdl->addComplexType(
    'Contact',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('name'=>'id','type'=>'xsd:string'),
        'image' => array('name'=>'image','type'=>'xsd:string'),
        'firstName' => array('name'=>'firstName','type'=>'xsd:string'),
        'lastName' => array('name'=>'lastName','type'=>'xsd:string'),
        'gender' => array('name'=>'gender','type'=>'xsd:string'),
        'nickName' => array('name'=>'nickName','type'=>'xsd:string'),
        'dateOfBirth' => array('name'=>'dateOfBirth','type'=>'xsd:string'),
        'city' => array('name'=>'city','type'=>'xsd:string'),
        'country' => array('name'=>'country','type'=>'xsd:string'),
        'street' => array('name'=>'street','type'=>'xsd:string'),
        'postalCode' => array('name'=>'postalCode','type'=>'xsd:string'),
        'officeEmail' => array('name'=>'officeEmail','type'=>'xsd:string'),
        'privateEmail' => array('name'=>'privateEmail','type'=>'xsd:string'),
        'privateMobile' => array('name'=>'privateMobile','type'=>'xsd:string'),
        'office' => array('name'=>'office','type'=>'xsd:string')
    )


);
$server->wsdl->addComplexType(
    'ContactArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Contact[]')
    )


);
$server->register(
    'viewAllContact',

    array('pstAnyThing'=>'xsd:string'),
    array('return'=>"tns:ContactArray"),
    "tns",

    false,
// style: rpc or document
    'rpc',
// use: encoded or literal
    'literal');
$server->register(
    'searchId',
    array('pstId'=>'xsd:string'),
    array('return'=>"tns:ContactArray"),
    "tns",

    false,
// style: rpc or document
    'rpc',
// use: encoded or literal
    'literal');

$server->register(
    'searchLastName',
    array('pstLastName'=>'xsd:string'),
    array('return'=>"tns:ContactArray"),
    "tns",

false,
// style: rpc or document
'rpc',
// use: encoded or literal
'literal');

$server->register(
    'searchFirstName',
    array('pstFirstName'=>'xsd:string'),
    array('return'=>"tns:ContactArray"),
    "tns",
    false,
// style: rpc or document
    'rpc',
// use: encoded or literal
    'literal');
$server->register(
    'searchPrivateMobile',
    array('pstPrivateNumber'=>'xsd:string'),
    array('return'=>"tns:ContactArray"),
    "tns",
    false,
// style: rpc or document
    'rpc',
// use: encoded or literal
    'literal');
$server->register(
    'searchStreet',
    array('pstFirstName'=>'xsd:string'),
    array('return'=>"tns:ContactArray"),
    "tns",
    false,
// style: rpc or document
    'rpc',
// use: encoded or literal
    'literal');

$server->register(
    'insertContact',
    array('pstFirstName'=>'xsd:string','pstLastName'=>'xsd:string','pstNickName'=>'xsd:string','pstGender'=>'xsd:string','pstDateOfBirth'=>'xsd:date','pstCity'=>'xsd:string','pstStreet'=>'xsd:string','pstCountry'=>'xsd:string','pstPostalCode'=>'xsd:string','pstOfficeEmail'=>'xsd:string','pstPrivateEmail'=>'xsd:string','pstPrivateMobile'=>'xsd:string','pstOffice'=>'xsd:string'),
    array('return'=>"xsd:string"),
    "tns");
$server->register(
    'editContactById',
    array('pstId'=>'xsd:string','pstFirstName'=>'xsd:string','pstLastName'=>'xsd:string','pstNickName'=>'xsd:string','pstGender'=>'xsd:string','pstDateOfBirth'=>'xsd:date','pstCity'=>'xsd:string','pstStreet'=>'xsd:string','pstCountry'=>'xsd:string','pstPostalCode'=>'xsd:string','pstOfficeEmail'=>'xsd:string','pstPrivateEmail'=>'xsd:string','pstPrivateMobile'=>'xsd:string','pstOffice'=>'xsd:string'),
    array('return'=>"xsd:string"),
    "tns");
$server->register(
    'deleteContactById',
    array('pstId'=>'xsd:string'),
    array('return'=>"xsd:string"),
    "tns");

@$server->service($HTTP_RAW_POST_DATA);
?>
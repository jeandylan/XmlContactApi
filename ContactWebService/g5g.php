<?php
function editContact($source,$data,$firstnameToEdit,$lastnameToEdit,$addressToEdit,$mobileToEdit,$homeToEdit,$officeToEdit,$emailToEdit,$companyToEdit,$birthdayToEdit,$groupsToEdit,$imageToEdit) {
    //$data=$_POST["invisible"];
//$firstnameToEdit=$_POST["title"];
//$lastnameToEdit=$_POST["title1"];
//$addressToEdit=$_POST["title2"];
//$mobileToEdit=$_POST["title3"];
//$homeToEdit=$_POST["title4"];
//$officeToEdit=$_POST["title5"];
//$emailToEdit=$_POST["title6"];
    //$companyToEdit=$_POST["title7"];
//$birthdayToEdit=$_POST["title8"];
//$groupsToEdit=$_POST["title9"];
//$imageToEdit=$_POST["title10"];



    $xml = new DomDocument();
    $xml->load($source);
    $xpath = new DOMXPath($xml);

    $rootTag = $xml->getElementsByTagName("contactList")->item(0);

    $node = $xpath->query("//contact[firstname='$data']")->item(0); //EDITING FIRSTNAME
    $fname = $node->getElementsByTagName('firstname')->item(0);
    $delete1 = $node->removeChild($fname);

//$node1 = $xpath->query("//contact[firstname='John']")->item(0); //EDITING LASTNAME
    $lname = $node->getElementsByTagName('lastname')->item(0);
    $delete2 = $node->removeChild($lname);

//$node3 = $xpath->query("//contact[firstname='John']")->item(0); //EDITING ADDRESS
    $address = $node->getElementsByTagName('address')->item(0);
    $delete3 = $node->removeChild($address);

    $phone=$node->getElementsByTagName('phone')->item(0);
    $deleteTest = $node->removeChild($phone);

    /*$node2 = $xpath->query("//contact[firstname='$data']//phone")->item(0); //EDITING MOBILE NUMBER
    $mob = $node2->getElementsByTagName('mobile')->item(0);
    $delete4 = $node2->removeChild($mob);

    //$node2 = $xpath->query("//contact[firstname='John']//phone")->item(0); //EDITING HOME NUMBER
    $home = $node2->getElementsByTagName('home')->item(0);
    $delete5 = $node2->removeChild($home);

    //$node2 = $xpath->query("//contact[firstname='John']//phone")->item(0); //EDITING OFFICE NUMBER
    $office = $node2->getElementsByTagName('office')->item(0);
    $delete6 = $node2->removeChild($office);*/

    $email = $node->getElementsByTagName('email')->item(0);
    $delete7 = $node->removeChild($email);

    $company = $node->getElementsByTagName('company')->item(0);
    $delete8 = $node->removeChild($company);

    $birthday = $node->getElementsByTagName('birthday')->item(0);
    $delete9 = $node->removeChild($birthday);

    $groups = $node->getElementsByTagName('groups')->item(0);
    $delete10 = $node->removeChild($groups);

    $image = $node->getElementsByTagName('image')->item(0);
    $delete11 = $node->removeChild($image);










    $firstnameTag = $xml->createElement("firstname","$firstnameToEdit");
    $node->appendChild($firstnameTag);

    $lastnameTag = $xml->createElement("lastname","$lastnameToEdit");
    $node->appendChild($lastnameTag);

    $addressTag = $xml->createElement("address","$addressToEdit");
    $node->appendChild($addressTag);



    $phoneTag = $xml->createElement("phone");

    $mobileTag = $xml->createElement("mobile","$mobileToEdit");
    $phoneTag->appendChild($mobileTag);

    $homeTag = $xml->createElement("home","$homeToEdit");
    $phoneTag->appendChild($homeTag);

    $officeTag = $xml->createElement("office","$officeToEdit");
    $phoneTag->appendChild($officeTag);

    $node->appendChild($phoneTag);





    $emailTag = $xml->createElement("email","$emailToEdit");
    $node->appendChild($emailTag);

    $companyTag = $xml->createElement("company","$companyToEdit");
    $node->appendChild($companyTag);

    $birthdayTag = $xml->createElement("birthday","$birthdayToEdit");
    $node->appendChild($birthdayTag);

    $groupsTag = $xml->createElement("groups","$groupsToEdit");
    $node->appendChild($groupsTag);

    $imageTag = $xml->createElement("image","$imageToEdit");
    $node->appendChild($imageTag);

    $xml->save($source);

}
require_once("lib/nusoap.php");
$namespace = "http://sanity-free.org/services";
// create a new soap server
$server = new soap_server();
// configure our WSDL
$server->configureWSDL("SimpleService");
// set our namespace
$server->wsdl->schemaTargetNamespace = $namespace;
// register our WebMethod
$server->register(
// method name:
    'editContact',
    // parameter list:
    array('xmlname'=>'xsd:string','fname'=>'xsd:string','firstname'=>'xsd:string','lastname'=>'xsd:string','address'=>'xsd:string','num1'=>'xsd:integer',
        'num2'=>'xsd:integer','num3'=>'xsd:integer','email'=>'xsd:string','cmpy'=>'xsd:string','dob'=>'xsd:string',
        'groups'=>'xsd:string','img'=>'xsd:string'),


    // return value(s):
    array('return'=>'xsd:string'),
    // namespace:
    $namespace,
    // soapaction: (use default)
    false,
    // style: rpc or document
    'rpc',
    // use: encoded or literal
    'encoded',
    // description: documentation for the method
    'A simple Hello World web method');

// Get our posted data if the service is being consumed
// otherwise leave this data blank.
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA'])
    ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);
exit();
?>
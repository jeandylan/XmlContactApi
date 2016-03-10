<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 10/24/2015
 * Time: 6:06 PM
 */
function ViewAllContact($pstAnyThing)
{


try {


    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->load("contactList.xml");

    $xpath = new DomXPath($xml);


    $nodeSearch = $xml->getElementsByTagName("contact");
    $nodeLenght = $nodeSearch->length;
    $dataIsInThisNode;


    /*solution for 2 + nodeData having same data being search for
     * store them in an array while searching.
     * to a for loop on the array element  to get parent nodeData
     * to a for loop on the array to dislay information.
     *
     *
     */


    $finalArray = array();
    global $id;
    global $image;
    global $firstName;
    global $lastName;
    global $gender;
    global $nickName;
    global $dateOfBirth;


    for ($nodeIndex = 0; $nodeIndex < $nodeSearch->length; $nodeIndex++) {
        //iterate throw each nodeData with corresponding matching search done before
        $dataIsInThisNode = $nodeSearch->item($nodeIndex);
        $xpathCurrentContact = $dataIsInThisNode->getNodePath();

        $nodelist = $xpath->query($xpathCurrentContact . "/id[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $id = array("id" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/image[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $image = array("image" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/firstName[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $firstName = array("firstName" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/lastName[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $lastName = array("lastName" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/gender[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $gender = array("gender" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/nickName[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $nickName = array("nickName" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/dateOfBirth[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $dateOfBirth = array("dateOfBirth" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/postalDetails[1]/city[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $city = array("city" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/postalDetails[1]/country[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $country = array("country" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/postalDetails[1]/street[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $street = array("street" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/postalDetails[1]/postalCode[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $postalCode = array("postalCode" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/emails[1]/officeEmail[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $officeEmail = array("officeEmail" => $nodeData);


        $nodelist = $xpath->query($xpathCurrentContact . "/emails[1]/privateEmail[1]");
        $nodeData = $nodelist->item(0)->nodeValue;;
        $privateEmail = array("privateEmail" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/telephoneNumbers[1]/privateMobile[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $privateMobile = array("privateMobile" => $nodeData);

        $nodelist = $xpath->query($xpathCurrentContact . "/telephoneNumbers[1]/office[1]");
        $nodeData = $nodelist->item(0)->nodeValue;
        $office = array("office" => $nodeData);
        $DataOfCurrentContactArray = $image + $id + $firstName + $lastName + $nickName + $gender + $dateOfBirth + $city + $country + $street + $postalCode + $officeEmail + $privateEmail + $privateMobile + $office;
        array_push($finalArray, $DataOfCurrentContactArray);
    }
    return $finalArray;
}
catch (Exception $e) {
        return 'Caught exception: ' . $e->getMessage();
    }
}
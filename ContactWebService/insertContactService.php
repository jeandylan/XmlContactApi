<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 10/19/2015
 * Time: 9:05 PM
 */
function insertContact($pstFirstName,$pstLastName,$pstNickName,$pstGender,$pstDateOfBirth,$pstCity,$pstStreet,$pstCountry,$pstPostalCode,$pstOfficeEmail,$pstPrivateEmail,$pstPrivateMobile,$pstOffice){
 if(file_exists ( "contactList.xml" ) and is_writable("contactList.xml")) //check if file exist and have wtite permission
 {
     try {
         $xml = new DOMDocument();
         $xml->load("contactList.xml");
         $root = $xml->documentElement;
         $firstNode = $root;
         $contactNode = $xml->createElement("contact");
//inside contact <contact> <image>dedferfr
         $pstId = (string)time() . (string)rand(1, 99);
         $id = $xml->createElement("id", $pstId);
         $image = $xml->createElement("image", "image/anonymous.png");
         $firstName = $xml->createElement("firstName", $pstFirstName);
         $lastName = $xml->createElement("lastName", $pstLastName);
         $gender = $xml->createElement("gender", $pstGender);
         $nickName = $xml->createElement("nickName", $pstNickName);
         $dateOfBirth = $xml->createElement("dateOfBirth", $pstDateOfBirth);
//appending element
         $root->appendChild($contactNode);
         $contactNode->appendChild($id);
         $contactNode->appendChild($image);
         $contactNode->appendChild($firstName);
         $contactNode->appendChild($lastName);
         $contactNode->appendChild($gender);
         $contactNode->appendChild($nickName);
         $contactNode->appendChild($dateOfBirth);
//create postal
         $postalNode = $xml->createElement("postalDetails");
//append postal to contact node
         $contactNode->appendChild($postalNode);
//add postal child
         $city = $xml->createElement("city", $pstCity);
         $street = $xml->createElement("street", $pstStreet);
         $postalCode = $xml->createElement("postalCode", $pstPostalCode);
         $country = $xml->createElement("country", $pstCountry);
         $postalNode->appendChild($city);
         $postalNode->appendChild($street);
         $postalNode->appendChild($postalCode);
         $postalNode->appendChild($country);
//create Email
         $emailsNode = $xml->createElement("emails");
//append emails to contact node
         $contactNode->appendChild($emailsNode);
//add emails child
         $officeEmail = $xml->createElement("officeEmail", $pstOfficeEmail);
         $privateEmail = $xml->createElement("privateEmail", $pstPrivateEmail);
         $emailsNode->appendChild($officeEmail);
         $emailsNode->appendChild($privateEmail);
//create telephoneNumbers
         $telephoneNumbersNode = $xml->createElement("telephoneNumbers");
//append emails to contact node
         $contactNode->appendChild($telephoneNumbersNode);
//add emails child
         $privateMobile = $xml->createElement("privateMobile", $pstPrivateMobile);
         $office = $xml->createElement("office", $pstOffice);
         $telephoneNumbersNode->appendChild($privateMobile);
         $telephoneNumbersNode->appendChild($office);
         if (!$xml->schemaValidate('contactListSchema.xsd')) {
             $value = libxml_display_errors();
             return $value;
         } else {
             $xml->save("contactList.xml");
             return "saved";

         }
     }
     catch (Exception $e) {
         return 'Caught exception: ' . $e->getMessage();
     }
     }
    else{
        return "file does not exist on server /does not have write permission";
    }
}
?>
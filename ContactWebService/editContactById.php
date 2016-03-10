<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 10/20/2015
 * Time: 12:04 AM
 */
function editContactById($pstId,$pstFirstName,$pstLastName,$pstNickName,$pstGender,$pstDateOfBirth,$pstCity,$pstStreet,$pstCountry,$pstPostalCode,$pstOfficeEmail,$pstPrivateEmail,$pstPrivateMobile,$pstOffice)
{
    if (file_exists("contactList.xml") and is_writable("contactList.xml")) //check if file exist and have wtite permission
    {
try{

        $xml = new DomDocument;
        $xml->preserveWhiteSpace = false;
        $xml->load("contactList.xml");
        $nodeSearch = $xml->getElementsByTagName('id');
        $nodeLenght = $nodeSearch->length;
        for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {
            if ($nodeSearch->item($nodeIndex)->nodeValue == $pstId) {
                $dataIsInThisNode = $nodeSearch->item($nodeIndex);
                $found = "true";

            }
        }
        $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
        while ($dataIsInThisNode->nodeName != "contact") {
            $dataIsInThisNode = $dataIsInThisNode->parentNode;

            $whileLoopControler++;
            if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
            {
                break;
            }
        }
        $xpath = $dataIsInThisNode->getNodePath();
        if ($found == "true") {

            $xpathOfNode = new DomXPath($xml);
            $nodes = $xpathOfNode->query($xpath);
            $numberOfElementInParentNode = $nodes->item(0)->childNodes->length;
            $childInCurrentNode;
            $dataIsInThisNode = $nodes->item(0);
            $modifydata .= $xpath;

            for ($pos = 0; $pos < $numberOfElementInParentNode; $pos++) {

                $childInCurrentNode = $dataIsInThisNode->childNodes->item($pos)->childNodes->length;

                if ($childInCurrentNode > 1) {

                    //print removeSpaceBetweenCapitalization($dataIsInThisNode->childNodes->item($pos)->nodeName);//->childNodes->item($);

                    for ($posSubNode = 0; $posSubNode < $childInCurrentNode; $posSubNode++) {

                        $nodeName = $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeName;

                        switch ($nodeName) {
                            case "city":

                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstCity;
                                break;
                            case "country":
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstCountry;
                                break;
                            case "street":
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstStreet;
                                break;
                            case "postalCode":
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstPostalCode;
                                break;
                            case "officeEmail":
                                $modifydata .= "1";
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstOfficeEmail;
                                break;
                            case "privateEmail":
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstPrivateEmail;
                                break;
                            case "privateMobile":
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstPrivateMobile;
                                break;
                            case "office":
                                $dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue = $pstOffice;
                                break;
                            default:
                                break;

                        }

                    }
                } else {

                    $nodeName = $dataIsInThisNode->childNodes->item($pos)->nodeName;
                    $nodeText = $dataIsInThisNode->childNodes->item($pos)->nodeValue;
                    switch ($nodeName) {
                        case "firstName":

                            $dataIsInThisNode->childNodes->item($pos)->nodeValue = $pstFirstName;
                            break;
                        case "gender":
                            $dataIsInThisNode->childNodes->item($pos)->nodeValue = $pstGender;
                            break;

                        case "lastName":
                            $dataIsInThisNode->childNodes->item($pos)->nodeValue = $pstLastName;
                            break;
                        case "nickName":

                            $dataIsInThisNode->childNodes->item($pos)->nodeValue = $pstNickName;
                            break;
                        case "dateOfBirth":
                            $dataIsInThisNode->childNodes->item($pos)->nodeValue = $pstDateOfBirth;
                            break;
                        default:
                            break;
                    }
                }
            }


            if (!$xml->schemaValidate('contactListSchema.xsd')) {
                $value = libxml_display_errors();
                return "nothing Updated because: \n" . $value;
            } else {
                $xml->save("contactList.xml");
                return "save and Modify";

            }


        }

        if ($found != "true") {
            return "contact not found";
        }
}
catch (Exception $e) {
    return 'Caught exception: ' . $e->getMessage();
}
    }
    else{ //file does not exist
        return "file does not exist /does not have wite permission";
    }
}
?>
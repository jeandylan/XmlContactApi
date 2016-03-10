<?php




function searchId($pstId)
{


    try {


        $xml = new DOMDocument();
        $xml->preserveWhiteSpace = false;
        $xml->load("contactList.xml");

        $xpath = new DomXPath($xml);


        $nodeSearch = $xml->getElementsByTagName("id");
        $nodeLenght = $nodeSearch->length;
        $dataIsInThisNode;


        /*solution for 2 + nodeData having same data being search for
         * store them in an array while searching.
         * to a for loop on the array element  to get parent nodeData
         * to a for loop on the array to dislay information.
         *
         *
         */
        $foundSearch = array(); //store item with matching data within search criteria

        for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

            if ($nodeSearch->item($nodeIndex)->nodeValue == $pstId) {

                $dataIsInThisNode = $nodeSearch->item($nodeIndex);
                array_push($foundSearch, $dataIsInThisNode); //push the matching data to array
            }

        }

        foreach ($foundSearch as &$dataIsInThisNode) {

            $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
            while ($dataIsInThisNode->nodeName != "contact") {

                $dataIsInThisNode = $dataIsInThisNode->parentNode;
                $whileLoopControler++;
                if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
                {
                    break;
                }

            }
        }

        $finalArray = array();
        global $id;
        global $image;
        global $firstName;
        global $lastName;
        global $gender;
        global $nickName;
        global $dateOfBirth;


        foreach ($foundSearch as &$dataIsInThisNode) {
            //iterate throw each nodeData with corresponding matching search done before
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
    } catch (Exception $e) {
        return 'Caught exception: ' . $e->getMessage();
    }
}



function searchLastName($pstLastName)
{


try {


    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->load("contactList.xml");

    $xpath = new DomXPath($xml);


    $nodeSearch = $xml->getElementsByTagName("lastName");
    $nodeLenght = $nodeSearch->length;
    $dataIsInThisNode;


    /*solution for 2 + nodeData having same data being search for
     * store them in an array while searching.
     * to a for loop on the array element  to get parent nodeData
     * to a for loop on the array to dislay information.
     *
     *
     */
    $foundSearch = array(); //store item with matching data within search criteria

    for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

        if ($nodeSearch->item($nodeIndex)->nodeValue == $pstLastName) {

            $dataIsInThisNode = $nodeSearch->item($nodeIndex);
            array_push($foundSearch, $dataIsInThisNode); //push the matching data to array
        }

    }

    foreach ($foundSearch as &$dataIsInThisNode) {

        $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
        while ($dataIsInThisNode->nodeName != "contact") {

            $dataIsInThisNode = $dataIsInThisNode->parentNode;
            $whileLoopControler++;
            if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
            {
                break;
            }

        }
    }

    $finalArray = array();
    global $id;
    global $image;
    global $firstName;
    global $lastName;
    global $gender;
    global $nickName;
    global $dateOfBirth;


    foreach ($foundSearch as &$dataIsInThisNode) {
        //iterate throw each nodeData with corresponding matching search done before
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
function searchFirstName($pstFirstName)
{



try {


    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->load("contactList.xml");

    $xpath = new DomXPath($xml);


    $nodeSearch = $xml->getElementsByTagName("firstName");
    $nodeLenght = $nodeSearch->length;
    $dataIsInThisNode;


    /*solution for 2 + nodeData having same data being search for
     * store them in an array while searching.
     * to a for loop on the array element  to get parent nodeData
     * to a for loop on the array to dislay information.
     *
     *
     */
    $foundSearch = array(); //store item with matching data within search criteria

    for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

        if ($nodeSearch->item($nodeIndex)->nodeValue == $pstFirstName) {

            $dataIsInThisNode = $nodeSearch->item($nodeIndex);
            array_push($foundSearch, $dataIsInThisNode); //push the matching data to array
        }

    }

    foreach ($foundSearch as &$dataIsInThisNode) {

        $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
        while ($dataIsInThisNode->nodeName != "contact") {

            $dataIsInThisNode = $dataIsInThisNode->parentNode;
            $whileLoopControler++;
            if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
            {
                break;
            }

        }
    }

    $finalArray = array();
    global $id;
    global $image;
    global $firstName;
    global $lastName;
    global $gender;
    global $nickName;
    global $dateOfBirth;


    foreach ($foundSearch as &$dataIsInThisNode) {
        //iterate throw each nodeData with corresponding matching search done before
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
}catch (Exception $e) {
    return 'Caught exception: ' . $e->getMessage();
}
    return $finalArray;
}



function searchStreet($pstStreet)
{

try {


    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->load("contactList.xml");

    $xpath = new DomXPath($xml);


    $nodeSearch = $xml->getElementsByTagName("street");
    $nodeLenght = $nodeSearch->length;
    $dataIsInThisNode;


    /*solution for 2 + node having same data being search for
     * store them in an array while searching.
     * to a for loop on the array element  to get parent node
     * to a for loop on the array to dislay information.
     *
     *
     */
    $foundSearch = array(); //store item with matching data within search criteria

    for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

        if ($nodeSearch->item($nodeIndex)->nodeValue == $pstStreet) {

            $dataIsInThisNode = $nodeSearch->item($nodeIndex);
            array_push($foundSearch, $dataIsInThisNode); //push the matching data to array
        }

    }

    foreach ($foundSearch as &$dataIsInThisNode) {

        $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
        while ($dataIsInThisNode->nodeName != "contact") {

            $dataIsInThisNode = $dataIsInThisNode->parentNode;
            $whileLoopControler++;
            if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
            {
                break;
            }

        }
    }

    $finalArray = array();
    global $id;
    global $image;
    global $firstName;
    global $lastName;
    global $gender;
    global $nickName;
    global $dateOfBirth;


    foreach ($foundSearch as &$dataIsInThisNode) {
        //iterate throw each node with corresponding matching search done before
        $xpathCurrentContact = $dataIsInThisNode->getNodePath(); //xpath of the current contact (will be used so as to obtain subchild data)

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
}
catch (Exception $e) {
    return 'Caught exception: ' . $e->getMessage();
}
    return $finalArray;
}
function searchPrivateMobile($pstPrivateMobile)
{


try {


    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->load("contactList.xml");

    $xpath = new DomXPath($xml);


    $nodeSearch = $xml->getElementsByTagName("privateMobile");
    $nodeLenght = $nodeSearch->length;
    $dataIsInThisNode;


    /*solution for 2 + node having same data being search for
     * store them in an array while searching.
     * to a for loop on the array element  to get parent node
     * to a for loop on the array to dislay information.
     *
     *
     */
    $foundSearch = array(); //store item with matching data within search criteria

    for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

        if ($nodeSearch->item($nodeIndex)->nodeValue == $pstPrivateMobile) {

            $dataIsInThisNode = $nodeSearch->item($nodeIndex);
            array_push($foundSearch, $dataIsInThisNode); //push the matching data to array
        }

    }

    foreach ($foundSearch as &$dataIsInThisNode) {

        $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
        while ($dataIsInThisNode->nodeName != "contact") {

            $dataIsInThisNode = $dataIsInThisNode->parentNode;
            $whileLoopControler++;
            if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
            {
                break;
            }

        }
    }

    $finalArray = array();
    global $id;
    global $image;
    global $firstName;
    global $lastName;
    global $gender;
    global $nickName;
    global $dateOfBirth;


    foreach ($foundSearch as &$dataIsInThisNode) {
        //iterate throw each node with corresponding matching search done before
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
}
catch (Exception $e) {
        return 'Caught exception: ' . $e->getMessage();
    }
    return $finalArray;
}


?>
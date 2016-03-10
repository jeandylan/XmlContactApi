<?php







function searchLastName($lastName){

    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->load("contactList.xml");
$nodeSearch = $xml->getElementsByTagName("lastName");
$nodeLenght  = $nodeSearch->length;
$dataIsInThisNode;


/*solution for 2 + node having same data being search for
* store them in an array while searching.
* to a for loop on the array element  to get parent node
* to a for loop on the array to dislay information.
*
*
*/
$foundSearch=array(); //store item with matching data within search criteria
for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

if ($nodeSearch->item($nodeIndex)->nodeValue==$lastName){

$dataIsInThisNode=$nodeSearch->item($nodeIndex);
array_push($foundSearch,$dataIsInThisNode); //push the matching data to array
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

    print_r($dataIsInThisNode);
}



/*




    foreach($foundSearch as &$dataIsInThisNode) { //iterate throw each node with corresponding matching search done before

        $numberOfElementInParentNode = $dataIsInThisNode->childNodes->length;
        for ($pos = 0; $pos < $numberOfElementInParentNode; $pos++) {

        $nodeName = $dataIsInThisNode->childNodes->item($pos)->nodeName;
        $valueInNode = $dataIsInThisNode->childNodes->item($pos)->nodeValue;


        if ($nodeName == "id") {
        $id = $valueInNode;
        }
        if ($nodeName =="image") {
        appendToHtml('<div class="row>"><img src="'.$valueInNode.'" alt="..." class="img-rounded"></div>');
        continue;
        }

        $childInCurrentNode = $dataIsInThisNode->childNodes->item($pos)->childNodes->length;
        if ($childInCurrentNode>1){
        appendToHtml('<div class="row"><span class="h4 text-danger "><strong>' .removeSpaceBetweenCapitalization($nodeName. '</strong></span></div>'));

        for($posSubNode=0 ;$posSubNode<$childInCurrentNode;$posSubNode++){

        appendToHtml('<div class="row"><span class="h4 text-primary">'.removeSpaceBetweenCapitalization($dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeName)."</span> : ".$dataIsInThisNode->childNodes->item($pos)->childNodes->item($posSubNode)->nodeValue."</div>");


        }
        }
        else{



        }
        }


        }

*/

searchLastName("Doe");

?>
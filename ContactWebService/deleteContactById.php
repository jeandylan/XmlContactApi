<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 10/19/2015
 * Time: 10:30 PM
 */
function deleteContactById($pstId)
{
    if (file_exists("contactList.xml") and is_writable("contactList.xml")) //check if file exist and have wtite permission
    {
        try {
            libxml_use_internal_errors(true); //use for debugging
            $xml = new DomDocument;
            $xml->preserveWhiteSpace = false;
            $xml->load("contactList.xml");
            $nodeSearch = $xml->getElementsByTagName("id");
            $nodeLenght = $nodeSearch->length;


            for ($nodeIndex = 0; $nodeIndex < $nodeLenght; $nodeIndex++) {

                if ($nodeSearch->item($nodeIndex)->nodeValue == $pstId) {
                    $found = "true";
                    $nodeToBeRemove = $nodeSearch->item($nodeIndex);

                }

            }


            if ($found == "true") {
                $whileLoopControler = 0;//a loop controller to prevent below loop from overflowing
                while ($nodeToBeRemove->nodeName != "contact") {

                    $nodeToBeRemove = $nodeToBeRemove->parentNode;
                    $whileLoopControler++;
                    if ($whileLoopControler > 20)//loop can run a max of 20 times else break help to prevent bad input
                    {
                        break;
                    }

                }

//start of removale
                $nodeToBeRemove->getNodePath();
                deleteNode($nodeToBeRemove); //function below
                $xml->save("contactList.xml");
                return "delete sucessful";
            }
            if ($found != "true") {
                return "id does not exit ";
            }
        }
        catch (Exception $e) {
            return 'Caught exception: ' . $e->getMessage();
        }

    }
    else{
        return "file does not exist /no write permission";
    }
}
function deleteNode($node)
{
    deleteChildren($node);
    $parent = $node->parentNode;
    $oldnode = $parent->removeChild($node);
}

function deleteChildren($node)
{
    while (isset($node->firstChild)) {
        deleteChildren($node->firstChild);
        $node->removeChild($node->firstChild);
    }
}
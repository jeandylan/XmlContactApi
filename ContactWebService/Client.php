<?php
require_once "lib/nusoap.php";

$client = new nusoap_client("http://localhost/ContactWebService/server.php?wsdl", true);
$error  = $client->getError("joe");

if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
/*   calling insert contact
$result = $client->call("insertContact", array('pstFirstName'=>'Matudi','pstLastName'=>'Blaize','pstNickName'=>'charo','pstGender'=>'M','pstDateOfBirth'=>'2012-02-02','pstCity'=>'Paris','pstStreet'=>'Rue Margeot','pstCountry'=>'France','pstPostalCode'=>'tt5445654btgr','pstOfficeEmail'=>'matudi@gmail.com','pstPrivateEmail'=>'blaize@you.fr','pstPrivateMobile'=>'51234567','pstOffice'=>'1234567'));

calling delete
$result = $client->call("deleteContactById", array('pstId'=>'3rfrf'));
*/
$result = $client->call("viewAllContact", array('$pstAnyThing'=>'anyt'));
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);

    echo "</pre>";
} else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    } else {
        echo "<h2>Main</h2>";
        echo $result;
    }
}

// show soap request and response
echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
?>

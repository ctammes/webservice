<?php

/**
 * Testscript om de requestForLogin webservice tbv. Umenz te testen
 */

require_once('do_post_request.php');

$url = "https://utestherhaal.umenz.com/webservice/requestforlogin";
$kid = 989800015;
$username = "umenz";
$password = "G638g6Tujv9R0d6";

$values = array('Username'=>$username, 'Password'=>$password, "kid"=>$kid);

$resp = do_post_request($url, $values, "", false, "", "");
if ($resp === false) {
    echo "Fout opgetreden\n";
} else {
    echo "response: $resp\n";
}

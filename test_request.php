<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chris
 * Date: 20-6-13
 * Time: 20:07
 * To change this template use File | Settings | File Templates.
 */

require_once('do_post_request.php');

$url = "https://utestherhaal.umenz.com/webservice/requestforlogin";
$kid = 989800015;
$username = "umenz";
$password = "G638g6Tujv9R0d6";

//$values = array('Username'=>$username, 'Password'=>$password, "kid"=>$kid);
$values = array('Username'=>$username, 'Password'=>$password);
//$values = array("kid"=>$kid);

//$resp = do_post_request($url, $values, "", false, $username, $password);
$resp = do_post_request($url, $values, "", false, "", "");
if ($resp === false) {
    echo "Fout opgetreden\n";
} else {
    echo "response: $resp\n";
}

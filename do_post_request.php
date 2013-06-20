<?php

/**
 *
 * Function Name: do_post_request
 * Purpose: Call web service or web page through basic method and return the result
 *
 * Params:
*        @url - string - This is full, qualified, web service or web page URL, it must contain with http:// or https://
 *       @qs  - associative array - post values
 *       @remote_fn_name - string, optional, default empty string - Remote functio name, no need for access web pages
 *       @auth_flag - boolean, optional, default false - It makes a request with authentication or not, if it chagne to true, next 2 params(username and pasword) should not be empty
 *       @username - string, optional, default empty string - username for authentication
 *       @password - string, optional, default empty string - password for authentication
 *
 */

function do_post_request( $url, $qs, $remote_fn_name = "", $auth_flag = false, $username = "",  $password = "") {
    $auth_param = "";

    // check authentication enable or not
    if($auth_flag) {
        if($username == "")
            return false;

        if($password == "")
            return false;

        $auth_param = "Authorization: Basic ". base64_encode($username.':'.$password) ."\r\n";
    }

    // construct web service URL
    $ws_req_url = $url;
    $ws_req_url .= ($remote_fn_name? '/'.$remote_fn_name : '');// check weather function name available or not

    // construct params array to query string format, firstname=Raja&lastname=Sekar
    $query_param = http_build_query( $qs );
    $params = array('http' => array(
        'method'  => 'POST',
        'header'  => $auth_param . "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($query_param) . "\r\n",
        'content' => $query_param
        )
    );

//    echo "params:";
//    print_r($params);

    $context = stream_context_create( $params );
    $response = file_get_contents( $ws_req_url, false, $context );

    return $response;

}
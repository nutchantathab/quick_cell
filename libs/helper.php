<?php
/**
 * Set Value in Param
 */
function getIfSet(&$value, $default = null)
{
    return isset($value) ? url_decode($value) : $default;
}

/**
 * Encode Before Sending to Customer
 */
function url_encode($string){
    return urlencode(utf8_encode($string));
}

/**
 * Decode Before receive from Customer
 */
function url_decode($string){
    return utf8_decode(urldecode($string));
}

/**
 * Check HTTP Status Code
 */
function getHttpResponseCode()
{
    return http_response_code();
}

/**
 * Get Http Status Code Name
 */
function getHttpResponseCodeName($code)
{
    switch ($code) {
        case 100: $text = 'Continue'; break;
        case 101: $text = 'Switching Protocols'; break;
        case 200: $text = 'OK'; break;
        case 201: $text = 'Created'; break;
        case 202: $text = 'Accepted'; break;
        case 203: $text = 'Non-Authoritative Information'; break;
        case 204: $text = 'No Content'; break;
        case 205: $text = 'Reset Content'; break;
        case 206: $text = 'Partial Content'; break;
        case 300: $text = 'Multiple Choices'; break;
        case 301: $text = 'Moved Permanently'; break;
        case 302: $text = 'Moved Temporarily'; break;
        case 303: $text = 'See Other'; break;
        case 304: $text = 'Not Modified'; break;
        case 305: $text = 'Use Proxy'; break;
        case 400: $text = 'Bad Request'; break;
        case 401: $text = 'Unauthorized'; break;
        case 402: $text = 'Payment Required'; break;
        case 403: $text = 'Forbidden'; break;
        case 404: $text = 'Not Found'; break;
        case 405: $text = 'Method Not Allowed'; break;
        case 406: $text = 'Not Acceptable'; break;
        case 407: $text = 'Proxy Authentication Required'; break;
        case 408: $text = 'Request Time-out'; break;
        case 409: $text = 'Conflict'; break;
        case 410: $text = 'Gone'; break;
        case 411: $text = 'Length Required'; break;
        case 412: $text = 'Precondition Failed'; break;
        case 413: $text = 'Request Entity Too Large'; break;
        case 414: $text = 'Request-URI Too Large'; break;
        case 415: $text = 'Unsupported Media Type'; break;
        case 500: $text = 'Internal Server Error'; break;
        case 501: $text = 'Not Implemented'; break;
        case 502: $text = 'Bad Gateway'; break;
        case 503: $text = 'Service Unavailable'; break;
        case 504: $text = 'Gateway Time-out'; break;
        case 505: $text = 'HTTP Version not supported'; break;
        default:
            exit('Unknown http status code "' . htmlentities($code) . '"');
        break;
    }

    return $text;
}

/**
 * Return Response to Customer
 */
function return_response($http_status_code) {

    http_response_code($http_status_code);

    return [ 
        'message' => 'Success',
    ];
}

/**
 * Create Log File getMO
 */
function create_logs_getMO($request) {
    
    //Something to write to txt log
    $log = 
    "----------------------------------------Start Request----------------------------------------".PHP_EOL.
    date('Y-m-d H:i:s').PHP_EOL.
    "Success :".PHP_EOL.
           "Server: ".json_encode($_SERVER).PHP_EOL.
           "Request: ".json_encode($_REQUEST).PHP_EOL.
    "----------------------------------------End Request----------------------------------------".PHP_EOL;

    //Save string to log, use FILE_APPEND to append.
    file_put_contents('./logs/getMO/log_'.date("Ymd").'.log', $log, FILE_APPEND);
}

/**
 * Create Log File getDN
 */
function create_logs_getDN() {
    
    //Something to write to txt log
    $log = 
    "----------------------------------------Start Request----------------------------------------".PHP_EOL.
    date('Y-m-d H:i:s').PHP_EOL.
    "Success :".PHP_EOL.
           "Server: ".json_encode($_SERVER).PHP_EOL.
           "Request: ".json_encode($_REQUEST).PHP_EOL.
           "DN Status Name: ". json_encode(get_dn_status($_REQUEST["Status"])).PHP_EOL.
    "----------------------------------------End Request----------------------------------------".PHP_EOL;

    //Save string to log, use FILE_APPEND to append.
    file_put_contents('./logs/getDN/log_'.date("Ymd").'.log', $log, FILE_APPEND);
}

/**
 * Create Log File sendMT
 */
function create_logs_sendMT($response, $url, $array) {
    
    //Something to write to txt log
    $log = 
    "----------------------------------------Start Request----------------------------------------".PHP_EOL.
    date('Y-m-d H:i:s').PHP_EOL.
    "Success :".PHP_EOL.
        "Request-Url: ".$url.PHP_EOL.
        "Request-Params: ".json_encode($array).PHP_EOL.
        "Response-Header: ".json_encode($response->getHeaders()).PHP_EOL.
        "Response-Status: ".$response->getStatusCode().PHP_EOL.
        "Response-Contents: ".json_encode($response->getBody()->getContents()).PHP_EOL.
    "----------------------------------------End Request----------------------------------------".PHP_EOL;

    //Save string to log, use FILE_APPEND to append.
    file_put_contents('./logs/sendMT/log_'.date("Ymd").'.log', $log, FILE_APPEND);
}

/**
 * Create Error Log File sendMT
 */
function create_error_logs_sendMT($exception) {

    $response = $exception->getResponse();

    //Something to write to txt log
    $log = 
    "----------------------------------------Start Request----------------------------------------".PHP_EOL.
    date('Y-m-d H:i:s').PHP_EOL.
    "Error :".PHP_EOL.
        "Response-Headers: ".json_encode($response->getHeaders()).PHP_EOL.
        "Response-Status: ".json_encode($response->getStatusCode()).PHP_EOL.
        "Response-ReasonPhrase: ".json_encode($response->getReasonPhrase()).PHP_EOL.
        "Response-Body: ".json_encode((string) $response->getBody()).PHP_EOL.
        "Response-Message: ".$exception->getMessage().PHP_EOL.
    "----------------------------------------End Request----------------------------------------".PHP_EOL;

    //Save string to log, use FILE_APPEND to append.
    file_put_contents('./logs/sendMT/log_'.date("Ymd").'.log', $log, FILE_APPEND);
}

/**
 * Get DN Status Name
 */
function get_dn_status($code) {

    switch ($code) {
        case 200: $text = 'Telco Pushing Success'; break;
        case 201: $text = 'Telco Pushing Failed'; break;
        case 300: $text = 'Subscription Keyword Failed'; break;
        case 400: $text = 'Insufficient Parameter'; break;
        case 401: $text = 'Parameter Invalid Format'; break;
        case 402: $text = 'Keyword Not Provisioned'; break;
        case 403: $text = 'Invalid Credential'; break;
        case 404: $text = 'Multiple Push'; break;
        case 405: $text = 'Illegal Push for subscription, the duration between previous push is too near.'; break;
        case 406: $text = 'Invalid Subscriber or System Unsubscribed User (We need to cater for some manual system Opt out by our operator; Meaning we will discontinue the subscription service when user requested via customer care hotline.)'; break;
        case 407: $text = 'Maximum of allowed push reached'; break;
        default:
            exit('Unknown http status code "' . htmlentities($code) . '"');
        break;
    }

    return $text;
}
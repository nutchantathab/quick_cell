<?php require "./config.php";

use GuzzleHttp\Client;

$url = $config['url_mt'];

$data = [
    'MOID'            => url_encode('d757d46f-b470-45f5-b346-358c778f1f51'),
    'KeywordAccessID' => url_encode(1),
    'UserName'        => url_encode('Mega'),
    'Password'        => url_encode('megaMobile@2011'),
    'MsgBody'         => url_encode('Thank+you+for+registering.'),
    'DNID'            => url_encode('ABC1234')
];

try {
    $client = new Client(); 
    $response = $client->request('POST', $url ,[
        'query' => $data
    ]);
    
    /**
     * Create Logs File
     */
    create_logs_sendMT($response, $url, $data);
}  catch (\Exception $e) {    
    /**
     * Create Logs File
     */
    create_error_logs_sendMT($e);
}

/**
 * Return Response
 */
print_r(json_encode(return_response($config['status_code_success'])));
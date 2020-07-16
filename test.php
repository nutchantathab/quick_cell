<?php
require './vendor/autoload.php';
require "./libs/helper.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

// $url = 'http://www.abc.com/?q=1&name=ณัฐ&lastname=จันทาทับ&phone=089-123-3120';
// $url_encode = url_encode($url);
//echo "url_encode = $url_encode <BR>";
// $url_decode = url_decode($url_encode);
// echo "url_decode = $url_decode <BR>";


// Request
// Create a client with a base URI
$client = new GuzzleHttp\Client();
// Send a request to https://foo.com/api/test
$response = $client->request('GET', 'http://httpbin.org/get');

// $client->request('GET', 'http://httpbin.org?foo=bar');
/*
$client->request('GET', 'http://httpbin.org', [
    'query' => ['foo' => 'bar']
]);
*/
// $client->request('GET', 'http://httpbin.org', ['query' => 'foo=bar']);


// Response
// print_r($response);
//echo $code = $response->getStatusCode();
//echo $reason = $response->getReasonPhrase();
if ($response->hasHeader('Content-Length')) {
    // echo "It exists";
}
// Get a header from the response.
// print_r($response->getHeaders('Content-Length'));

// Get all of the response headers.
foreach ($response->getHeaders() as $name => $values) {
    // echo $name . ': ' . implode(', ', $values) . "\r\n";
}

$body = $response->getBody();
// Implicitly cast the body to a string and echo it
// echo $body;

// Read the remaining contents of the body as a string
$remainingBytes = $body->getContents();

// print_r($remainingBytes);
/*
$data = json_decode($remainingBytes, true);
print_r($data);
*/

try {

} catch (GuzzleHttp\Exception\ClientException $e) {

} catch (GuzzleHttp\Exception\ServerException $e) {

} catch (\Exception $e) {
}
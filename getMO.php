<?php require "./config.php";

/**
* url_decode all parameter with UTF-8
* Define variable.
*/
$telco            = getIfSet($_REQUEST['Telco']);
$msisdn           = getIfSet($_REQUEST['MSISDN']);
$shortCode        = getIfSet($_REQUEST['ShortCode']);
$moid             = getIfSet($_REQUEST['MOID']);
$message          = getIfSet($_REQUEST['Message']);

//echo "telco ==> ".$telco."<BR>";
//echo "msisdn ==> ".$msisdn."<BR>";
//echo "shortCode ==> ".$shortCode."<BR>";
//echo "moid ==> ".$moid."<BR>";
//echo "message ==> ".$message."<BR>";

/**
 * Create Logs File
 */
create_logs_getMO($_REQUEST);

/**
 * Return Response
 */
print_r(json_encode(return_response($config['status_code_success'])));
<?php require "./config.php";

/**
* url_decode all parameter with UTF-8
* Define variable.
*/
$moid = getIfSet($_REQUEST['MOID']);
$dnid = getIfSet($_REQUEST['DNID']);

//echo "moid ==> ".$moid."<BR>";
//echo "dnid ==> ".$dnid."<BR>";

/**
 * Create Logs File
 */
create_logs_getDN($_REQUEST);

/**
 * Return Response
 */
print_r(json_encode(return_response($config['status_code_success'])));
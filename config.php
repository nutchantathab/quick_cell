<?php 
require './vendor/autoload.php';
require "./libs/helper.php";

/**
 * Setup datetime zone
 */
date_default_timezone_set('Asia/Bangkok');

/**
 * Define Parameter
 */
$config['status_code_success'] = 200;
$config['url_mt'] = 'http://qc.qcelltech.com:8080/ContentProvider/';

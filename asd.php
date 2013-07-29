<?php
session_start();

define('ROOT_PATH',    dirname(__FILE__));
define('PLUGINS_PATH', ROOT_PATH . '/plugins');

require "load.php";

//var_dump($_SESSION);

$app = require_once "actions/initialize.php";
//$app->parseConfigFile('asda');
$app->init();

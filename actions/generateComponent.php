<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();

define('TMP_DIR', dirname(dirname(__FILE__)) . '/tmp' );
define('DEFAULT_COMPONENT', dirname(TMP_DIR) . '/default');

define('FULL_PATH', TMP_DIR . '/' . session_id());
define('ADM_PATH', FULL_PATH . '/admin');


ECHO '<pre>';

print_r($_SESSION);


// Replace string in file by repective value
$config = array(
	'%name%'           => $_SESSION['component']['name'],
	'%joomla_version%' => $_SESSION['component']['joomla_version'],
	'%author%'         => $_SESSION['component']['author'],
	'%author_email%'   => $_SESSION['component']['author_mail'],
	'%author_site%'    => $_SESSION['component']['site'],
	'%copyright%'      => $_SESSION['component']['copyright'],
	'%version%'        => $_SESSION['component']['version'],
	'%license%'        => 'Open-Source',
	'%description%'    => $_SESSION['component']['description'],
	'%date_creation%'  => date('m-d-Y', time()),
	'%menu_admin%'     => $_SESSION['component']['menu_admin'],
	
	'%mySite%'         => 'http://www.jefersson.com.br', 
	
	'%class_name%'      => filter_var(str_replace(' ', '_', trim($_SESSION['component']['name'])), FILTER_SANITIZE_STRING, FILTER_FLAG_ENCODE_HIGH)
	/*,
	$_SESSION['component'][''],
	$_SESSION['component']['']*/
	);
	
	print_r($config);
	
$keys   = array_keys($config);
$values = array_values($config);

// Controller
$initial = file_get_contents(DEFAULT_COMPONENT . '/site/controller.php');
$initial = str_replace($keys, $values, $initial);
echo highlight_string($initial);

// Controller
$initial = file_get_contents(DEFAULT_COMPONENT . '/site/controller.php');
$initial = str_replace($keys, $values, $initial);
//echo highlight_string($initial);

// Hello file
$initial = file_get_contents(DEFAULT_COMPONENT . '/site/hello.php');
$initial = str_replace($keys, $values, $initial);
//echo highlight_string($initial);


// XML Creator
$xml = file_get_contents(DEFAULT_COMPONENT . '/install.xml');
$xml = str_replace($keys, $values, $xml);
//echo $xml;

//mkdir(FULL_PATH);
//mkdir(ADM_PATH);


die;
?>

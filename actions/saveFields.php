<?php
session_start();

if($_REQUEST['data'])
{
	$_SESSION['fields'][] = $_REQUEST['data'];
}

print_r($_REQUEST); 
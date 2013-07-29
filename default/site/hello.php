<?php
/**
 * This is the main file of component on site
 * 
 * @author      Jefersson Nathan <malukenho@phpse.net>
 * @package     %name%
 * @subpackage  Components
 * @link 	    %mySite%
 * @license     %license%
 */
defined('_JEXEC') or die('Restricted access');

require_once (JPATH_COMPONENT.DS.'controller.php');

if($controller = JRequest::getVar('controller')) {
	require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
}


$classname	= '%class_name%' . $controller;
$controller = new $classname();

$controller->execute( JRequest::getVar('task'));
$controller->redirect();
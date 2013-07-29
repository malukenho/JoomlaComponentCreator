<?php
final class initialize
{
	private $config_number;
	
	public function parseConfigFile($filename)
	{
		$config = require 'configuration.php';
		$config->parseConfigFile($filename);
	}

	public function init()
	{
		$this->config_number = isset($_GET['config']) ? $_GET['config'] : 'none';
		
		Load::view('header');
		
		switch($this->config_number)
		{
			case '1':
				Load::view('config1');
				break;

			case '2':
				Load::view('formcreator');
				break;

			default:
				Load::view('initial');
				break;
		}
	}


}

return new initialize();
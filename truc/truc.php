<?php

/**
 * small / tiny
 * fast
 * modular
 * clean
 */

class Truc
{
	protected static $uri, $query;
	protected static $config;

	public static function run()
	{
		self::setup();

		if(!empty(self::$uri))
		{
			$page = explode('/', self::$uri);
			//if($page === '' && file_exists())
		}
	}

	protected static function setup()
	{
		# Setup requested URI and query string
		reset($_GET);
		if(isset($_SERVER['REDIRECT_QUERY_STRING']))
		{
			# It seems we're using Apache's mod_rewrite
			next($_GET);
			self::$uri = key($_GET);
			self::$query = array_slice($_GET, 2, null, true);
		}
		else
		{
			# We're using plain old query string
			self::$uri = key($_GET);
			self::$query = array_slice($_GET, 1, null, true);
		}

		# Configuration
		$default_config = array();
		$default_config['pages_dir'] = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pages';
		$default_config['template']  = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'default.html.php';
	}

	public static function config($property = null, $value = null)
	{
	}
}

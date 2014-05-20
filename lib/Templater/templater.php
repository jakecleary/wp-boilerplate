<?php

// Load our configuration stuff
require_once 'config.php';

/**
 * Template builder for Wordpress
 * @author Craig Childs
 */
class Templater {
	
	/** 
	 * Run the templater through the header
	 * @param Provide optional variables for customisation (Optional)
	 */
	public static function header($vars = array()) {
		$header = file_get_contents(THEME_PATH . 'header.php');
		
		// Here are some defualt header variables
		if(!isset($vars['name']))
			$vars['name'] = get_bloginfo('name');
		if(!isset($vars['title']))
			$vars['title'] = get_bloginfo('title');
		if(!isset($vars['classes']))
			$vars['classes'] = get_body_classes();
		if(!isset($vars['template_directory']))
			$vars['template_directory'] = get_bloginfo('template_directory');

		echo self::parse($header, $vars);
	}

	/** 
	 * Run the templater through the footer
	 * @param pass variable values (Optional)
	 */
	public static function footer($vars = array()){
		$footer = file_get_contents(THEME_PATH . 'footer.php');
		echo self::parse($footer, $vars);
	}

	/**
	 * Run the templater through a content page
	 * @param variables to be passed through the template
	 * @param an optional file to load
	 */
	public static function content($file, $path = false, $vars = array()) {
		if($file != '') {
			
			if(!$path) {
				$path  = INC;
			}

			$content = file_get_contents($path . $file . '.php');
			echo self::parse($content, $vars);
		}
	}

	/**
	 * Include all of the template structures
	 * @param all of the variables to pass to the parts
	 */
	public static function render($vars = array()) {
		if(isset($vars['header'])) {
			$header = $vars['header'];
			Templater::header($vars['header']);
		}
		
		if(isset($vars['content'])) {
			$content = $vars['content'];
			$page = (isset($content['page']) ? $content['page'] : 'index');
			$path = (isset($content['path']) ? $content['path'] : INC);
			$v = (isset($content['vars']) ? $content['vars'] : array());
			Templater::content($page, $path, $v);
		}

		if(isset($vars['footer'])) {
			$footer = $vars['footer'];
			Templater::footer($vars['footer']);
		}
	}

	/**
	 * Parse a file with the {{ }} tag
	 */
	private static function parse($file, $vars) {

		// Go through each variable and replace the values
		foreach($vars as $key => $value) {
			$pattern = '{{{' . $key . '}}}';
			$file = preg_replace($pattern, $value, $file);
		}


		if(!!$file) {
			echo $file;
		} else {
			echo 'failed';
		}
	}
}

//bloginfo('name'); wp_title(); body_classes(); bloginfo('template_directory');
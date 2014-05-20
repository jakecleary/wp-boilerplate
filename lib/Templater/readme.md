#Templater

This is a basic templating engine for wordpress. It enables you to easily include and customise your wordpress themes. It understands how wordpress works and provides you with the basic building blocks for your theme development.

##How to use

####Including the boilerplate header
```php
Templater::header($vars = array());
```
_This method takes an optional variables array, see more about placeholder and parsing._

####Including the boilerplate footer
```php
Templater::footer($vars = array());
```
_This method takes an optional variables array, see more about placeholder and parsing._

####Including the boilerplate content
```php
Templater::content($page, $path = "lib/Templater/templates", $vars = array());
```
This method takes a `string` value, this is the name of the `.php` file located inside the `lib/Templater/templates` folder.
The second parameter is optional and is the path to the given page file.
_This method also takes an optional variables array, see more about placeholder and parsing._

####Doing all of them with one method call
```php
$header = array('blah' => 'welcome to the site');

$content = array(
  'page' => 'page',
  'path' => '/path/to/page/file' // This is optional
  'vars' => array('variable' => 'craig')
);

$footer = array();
$globals = array();

Templater::render(array(
	'header' => $header,
	'content' => $content,
	'footer' => $footer,
	'globals' => $globals
));
```

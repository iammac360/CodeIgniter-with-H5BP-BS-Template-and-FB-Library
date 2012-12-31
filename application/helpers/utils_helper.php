<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @return the value at $index in $array or $default if $index is not set.
 */
function idx(array $array, $key, $default = null) 
{
  return array_key_exists($key, $array) ? $array[$key] : $default;
}

function he($str) 
{
  return htmlentities($str, ENT_QUOTES, "UTF-8");
}

function getUrl($path = '/') 
{
	if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)
	  || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
	) {
	  $protocol = 'https://';
	}
	else {
	  $protocol = 'http://';
	}

	return $protocol . $_SERVER['HTTP_HOST'] . $path;
}
<?php namespace Flynsarmy\ThemeSelecter\Classes;

use Config;
use File;
use Cookie;

class Theme
{
	protected static $cookie_name = 'cmsActiveTheme';

	/**
	 * @todo Update once https://github.com/octobercms/october/pull/351 is in
	 *
	 * @param string $theme
	 *
	 * @return Cookie
	 */
	public static function set($theme)
	{
		if ( self::exists($theme) )
			return Cookie::forever(self::$cookie_name, $theme);
		else
			return self::forget();
	}

	/**
	 * Forget the custom-set theme
	 *
	 * @return Cookie
	 */
	public static function forget()
	{
		return Cookie::forget(self::$cookie_name);
	}

	/**
	 * @todo Remove once https://github.com/octobercms/october/pull/351 is in
	 *
	 * Determines if a given theme exists
	 *
	 * @param  string $dir Theme directory
	 *
	 * @return bool
	 */
	public static function exists($dir)
	{
		$path = base_path().Config::get('cms.themesDir').'/'.$dir;

		return File::isDirectory($path);
	}
}
<?php namespace Flynsarmy\ThemeSelecter;

use System\Classes\PluginBase;
use Cookie;
use Event;
use Config;

/**
 * ThemeSelector Plugin Information File
 */
class Plugin extends PluginBase
{

	/**
	 * Returns information about this plugin.
	 *
	 * @return array
	 */
	public function pluginDetails()
	{
		return [
			'name'        => 'Theme Selecter',
			'description' => 'Adds a component which provides a URL to set the active theme',
			'author'      => 'Flynsarmy',
			'icon'        => 'icon-leaf'
		];
	}

	public function registerComponents()
	{
		return [
			'\Flynsarmy\ThemeSelecter\Components\Selecter' => 'themeselecter',
			'\Flynsarmy\ThemeSelecter\Components\Restorer' => 'themerestorer',
		];
	}

	public function boot()
	{
		Event::listen('cms.activeTheme', function() {
			return Cookie::get('cmsActiveTheme', Config::get('cms.activeTheme'));
		});
	}
}

<?php namespace Flynsarmy\ThemeSelecter\Components;

use Cms\Classes\ComponentBase;
use Flynsarmy\ThemeSelecter\Classes\Theme;
use Redirect;

class Restorer extends ComponentBase
{
	public function componentDetails()
	{
		return [
			'name'        => 'Theme Restorer',
			'description' => 'Return to default theme.'
		];
	}

	public function defineProperties()
	{
		return [
			'redirectParam' => [
				'title'       => 'Redirect',
				'description' => 'The URL to redirect to after the active theme is set.',
				'default'     => '/',
				'type'        => 'string'
			],
		];
	}

	public function onRun()
	{
		$cookie = Theme::forget();
		$redirect = $this->propertyOrParam('redirectParam');

		return Redirect::to($redirect)->withCookie($cookie);
	}
}
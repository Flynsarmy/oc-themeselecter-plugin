<?php

namespace Flynsarmy\ThemeSelecter\Components;

use Cms\Classes\ComponentBase;
use Flynsarmy\ThemeSelecter\Classes\Theme;
use Redirect;

class Selecter extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Theme Selecter',
            'description' => 'Alows the end user to set the active theme.',
        ];
    }

    public function defineProperties()
    {
        return [
            'idParam' => [
                'title'       => 'Theme param name',
                'description' => 'The URL route parameter used for looking up the theme by its name.',
                'default'     => ':theme',
                'type'        => 'string',
            ],
            'redirectParam' => [
                'title'       => 'Redirect',
                'description' => 'The URL to redirect to after the active theme is set.',
                'default'     => '/',
                'type'        => 'string',
            ],
        ];
    }

    public function onRun()
    {
        $theme = $this->propertyOrParam('idParam');
        $cookie = Theme::set($theme);
        $redirect = $this->propertyOrParam('redirectParam');

        return Redirect::to($redirect)->withCookie($cookie);
    }
}

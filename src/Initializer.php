<?php

namespace Adb\HomepagePlanner;

use Adb\HomepagePlanner\HomepageSwapper;
use Adb\HomepagePlanner\SettingsPage;

class Initializer
{
    public function __construct()
    {
        $settingsPage = new SettingsPage();
        add_action('admin_init', [$settingsPage, 'setUpSettingsSection']);
        add_action('admin_init', [$settingsPage, 'setUpPageListDropdownField']);
        add_action('admin_init', [$settingsPage, 'setUpTimeField']);

        $swapper = new HomepageSwapper();
        add_action('init', [$swapper, 'run']);
    }
}

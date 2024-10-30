<?php

/**
 * Plugin Name: Homepage Planner
 * Plugin URI: https://wordpress.org/plugins/homepage-planner/
 * Description: This plugin makes it possible to schedule a page as a home page at a given time.
 * Version: 1.0.1
 * Author: De Belser Arne
 * Author URI: https://www.arnedebelser.be/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: adb-homepage-planner
 * Domain Path: /languages
 */

use Adb\HomepagePlanner\Initializer;

if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

new Initializer();

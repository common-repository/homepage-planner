<?php

namespace Adb\HomepagePlanner;

use Adb\HomepagePlanner\HtmlRenderer;
use Adb\HomepagePlanner\Validator;

class SettingsPage
{
    public $renderer;

    public function __construct()
    {
        $this->renderer = new HtmlRenderer();
    }

    /**
     * Setup the settings section
     *
     * @return void
     */
    public function setUpSettingsSection()
    {
        add_settings_section(
            'adb_homepage_planner',
            __('Homepage Planner', 'adb-homepage-planner'),
            [$this->renderer, 'setUpAdbHomepagePlannerSettingsSection'],
            'reading'
        );
    }

    /**
     * Register the page id settings
     * Add the page id setting dropdown field
     *
     * @return void
     */
    public function setUpPageListDropdownField()
    {
        register_setting(
            'reading',
            'adb_homepage_planner_page_id',
            [
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => NULL,
            ]
        );

        add_settings_field(
            'adb_homepage_planner_page_dropdown',
            __('Switch current homepage to', 'adb-homepage-planner'),
            [$this->renderer, 'constructPageDropdownField'],
            'reading',
            'adb_homepage_planner',
            ['label_for' => 'adb_homepage_planner_page_dropdown']
        );
    }

    /**
     * Register the time settings
     * Add the time setting field
     *
     * @return void
     */
    public function setUpTimeField()
    {
        $validator = new Validator();

        register_setting(
            'reading',
            'adb_homepage_planner_time',
            [
                'type' => 'string',
                'sanitize_callback' => [$validator, 'checkTimeField'],
                'default' => NULL,
            ]
        );

        add_settings_field(
            'adb_homepage_planner_time_field',
            __('Time', 'adb-homepage-planner'),
            [$this->renderer, 'constructTimeField'],
            'reading',
            'adb_homepage_planner',
            ['label_for' => 'adb_homepage_planner_time_field']
        );
    }
}

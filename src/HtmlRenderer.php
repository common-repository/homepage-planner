<?php

namespace Adb\HomepagePlanner;

class HtmlRenderer
{
    /**
     * Show a helpfull tooltip which explains the user what to do
     *
     * @param mixed $arg
     * @return void
     */
    public function setUpAdbHomepagePlannerSettingsSection($args)
    {
        echo '<p>' . __('1. Select a page which you want to switch to', 'adb-homepage-planner') . '</p>';
        echo '<p>' . __('2. Pick a date and time when you want the homepage to switch', 'adb-homepage-planner') . '</p>';
    }

    /**
     * Render the HTML for the page id setting field
     *
     * @param mixed $args
     * @return void
     */
    public function constructPageDropdownField($args)
    {
        $pageId = get_option('adb_homepage_planner_page_id');

        $items = get_posts([
            'posts_per_page'   => -1,
            'orderby'          => 'name',
            'order'            => 'ASC',
            'post_type'        => 'page',
        ]);

        echo '<select name="adb_homepage_planner_page_id">';
        echo '<option value="0">' . __('— Select —', 'wordpress') . '</option>';
        foreach ($items as $item) {
            $selected = ($pageId == $item->ID) ? 'selected="selected"' : '';
            echo '<option value="' . $item->ID . '" ' . $selected . '>' . $item->post_title . '</option>';
        }
        echo '</select>';
    }

    /**
     * Render the HTML for the time setting field
     *
     * @param mixed $args
     * @return void
     */
    public function constructTimeField($args)
    {
        $currentlySpecifiedTime = get_option('adb_homepage_planner_time');

        echo '<input style="margin-bottom: 10px;" type="datetime-local" name="adb_homepage_planner_time" step="1" value="' . $currentlySpecifiedTime . '">';
        echo '<div style="display:inherit; background-color: #f06f63; color: #fff; padding: 10px; border-radius: 5px;">';
        echo '<p>' . __('Make sure to use the current server time! ', 'adb-homepage-planner') . '</p>';
        echo '<p>' . __('Current server time: ', 'adb-homepage-planner') . '<strong>' . current_time('d/m/Y H:i:s') . '</strong></p>';
        echo '</>';
    }
}

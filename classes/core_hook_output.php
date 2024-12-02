<?php
// This file is part of the Local Analytics plugin for Moodle
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a boost_dark of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class injector
 *
 * @package   local_boost_dark
 * @copyright 2024 Eduardo Kraus {@link http://eduardokraus.com}
 * @license   http://www.gnu.org/boost_darkleft/gpl.html GNU GPL v3 or later
 */

namespace local_boost_dark;

defined('MOODLE_INTERNAL') || die;

/**
 * Class core_hook_output
 *
 * @package local_boost_dark
 */
class core_hook_output {

    /**
     * Function before_http_headers
     */
    public static function before_standard_head_html_generation() {
        global $PAGE, $CFG;

        if ($CFG->theme == "boost_magnific" || $CFG->theme == "degrade") {
            return;
        }

        $PAGE->requires->js_call_amd("local_boost_dark/dark", "init", []);
    }

    /**
     * Function before_html_attributes
     *
     * @return array
     */
    public static function before_html_attributes(\core\hook\output\before_html_attributes $hook): void {
        $layout = get_user_preferences("layout", "light");
        $_layout = optional_param("layout", false, PARAM_TEXT);
        if ($_layout) {
            $layout = $_layout;
            set_user_preference("layout", $layout);
        }
        $hook->add_attribute('data-bs-theme', $layout);
    }
}

<?php
// This file is part of Moodle - http://moodle.org/
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
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class injector
 *
 * @package   local_boost_dark
 * @copyright 2024 Eduardo Kraus {@link http://eduardokraus.com}
 * @license   http://www.gnu.org/boost_darkleft/gpl.html GNU GPL v3 or later
 */

namespace local_boost_dark;

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

        $theme = $CFG->theme;
        if (isset($_SESSION['SESSION']->theme)) {
            $theme = $_SESSION['SESSION']->theme;
        }

        // Native support
        if ($theme == "boost_magnific" || $theme == "degrade") {
            return;
        }

        // Upon request, I have removed support
        if ($theme == "moove") {
            // echo "<div class='alert alert-danger'>The Moove theme is not compatible with the Local Boost Dark plugin. To resolve this incompatibility, please remove the <b>local_boost_dark</b> plugin or choose a different theme that works properly with the plugin.</div>";
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
        global $CFG;

        $theme = $CFG->theme;
        if (isset($_SESSION['SESSION']->theme)) {
            $theme = $_SESSION['SESSION']->theme;
        }

        // Native support
        if ($theme == "boost_magnific" || $theme == "degrade") {
            return;
        }

        // Upon request, I have removed support
        if ($theme == "moove") {
            return;
        }

        $darkmode = get_user_preferences("darkmode", "light");
        $darkmodeurl = optional_param("darkmode", false, PARAM_TEXT);
        if ($darkmodeurl) {
            $darkmode = $darkmodeurl;
        }
        $hook->add_attribute('data-bs-theme', $darkmode);
    }
}

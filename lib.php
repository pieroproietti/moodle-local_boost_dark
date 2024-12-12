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
 * lib.php
 *
 * @package   local_boost_dark
 * @copyright 2024 Eduardo Kraus {@link http://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Function local_boost_dark_add_htmlattributes
 *
 * @return array
 */
function local_boost_dark_add_htmlattributes() {
    global $CFG;

    $theme = $CFG->theme;
    if (isset($_SESSION['SESSION']->theme)) {
        $theme = $_SESSION['SESSION']->theme;
    }

    // Native support
    if ($theme == "boost_magnific" || $theme == "degrade") {
        return [];
    }

    // Upon request, I have removed support
    if ($theme == "moove") {
        return [];
    }

    $darkmode = get_user_preferences("darkmode", "default");
    $darkmodeurl = optional_param("darkmode", false, PARAM_TEXT);
    if ($darkmodeurl) {
        $darkmode = $darkmodeurl;
    }
    return ['data-bs-theme' => $darkmode];
}

function local_boost_dark_before_standard_html_head() {
    \local_boost_dark\core_hook_output::before_standard_head_html_generation();
}

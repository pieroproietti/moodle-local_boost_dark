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
    $thememode = get_user_preferences("theme_mode", "default");
    $layouturl = optional_param("theme_mode", false, PARAM_TEXT);
    if ($layouturl) {
        $thememode = $layouturl;
    }
    return ['data-bs-theme' => $thememode];
}

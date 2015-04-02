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
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_nead_unicentro
 * @copyright  2012 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class theme_nead_unicentro_core_renderer extends theme_bootstrapbase_core_renderer {

    public function content_zoom() {
        $zoomin = html_writer::span(get_string('fullscreen', 'theme_nead_unicentro'), 'zoomin');
        $zoomout = html_writer::span(get_string('closefullscreen', 'theme_nead_unicentro'), 'zoomout');
        $content = html_writer::link('#',  $zoomin . $zoomout,
            array('class' => 'btn btn-default pull-left moodlezoom'));
        return $content;
    }

}

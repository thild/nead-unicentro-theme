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
// GNU General Public License for nead_unicentro details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Nead/Unicentro config file.
 *
 * @package    theme_nead_unicentro
 * @copyright  2014 Frédéric Massart, Tony Alexander Hild
  * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$THEME->name = 'nead_unicentro';
$THEME->parents = array('clean', 'bootstrapbase');

$THEME->doctype = 'html5';
$THEME->parents_exclude_sheets = array('bootstrapbase' => array('moodle'), 'clean' => array('custom'), 'base' => array('dock'));
$THEME->parents_exclude_javascripts = array('bootstrapbase' => array('dock'));
$THEME->lessfile = 'moodle';
$THEME->sheets = array('custom', 'dockmod', 'moodle', 'colorbox', 'external', 'font-awesome.min');
$THEME->lessvariablescallback = 'theme_nead_unicentro_less_variables';
$THEME->extralesscallback = 'theme_nead_unicentro_extra_less';
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();
$THEME->enable_dock = false;
$THEME->editor_sheets = array();

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_nead_unicentro_process_css';

$THEME->blockrtlmanipulations = array(
    'side-pre' => 'side-post',
    'side-post' => 'side-pre'
);

$THEME->javascripts = array('dockmod', 'colorbox');
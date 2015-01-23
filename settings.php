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
 * Theme Nead/Unicentro settings.
 *
 * Each setting that is defined in the parent theme Clean should be
 * defined here too, and use the exact same config name. The reason
 * is that theme_nead_unicentro does not define any layout files to re-use the
 * ones from theme_clean. But as those layout files use the function
 * {@link theme_clean_get_html_for_settings} that belong to Clean,
 * we have to make sure it works as expected by having the same settings
 * in our theme.
 *
 * @see        theme_clean_get_html_for_settings
 * @package    theme_nead_unicentro
 * @copyright  2014 Frédéric Massart, Tony Alexander Hild
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // @textColor setting.
    $name = 'theme_nead_unicentro/textcolor';
    $title = get_string('textcolor', 'theme_nead_unicentro');
    $description = get_string('textcolor_desc', 'theme_nead_unicentro');
    $default = '#1e1e1e';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // @linkColor setting.
    $name = 'theme_nead_unicentro/linkcolor';
    $title = get_string('linkcolor', 'theme_nead_unicentro');
    $description = get_string('linkcolor_desc', 'theme_nead_unicentro');
    $default = '#FF6500';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // @bodyBackground setting.
    $name = 'theme_nead_unicentro/bodybackground';
    $title = get_string('bodybackground', 'theme_nead_unicentro');
    $description = get_string('bodybackground_desc', 'theme_nead_unicentro');
    $default = '';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background image setting.
    $name = 'theme_nead_unicentro/backgroundimage';
    $title = get_string('backgroundimage', 'theme_nead_unicentro');
    $description = get_string('backgroundimage_desc', 'theme_nead_unicentro');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background repeat setting.
    $name = 'theme_nead_unicentro/backgroundrepeat';
    $title = get_string('backgroundrepeat', 'theme_nead_unicentro');
    $description = get_string('backgroundrepeat_desc', 'theme_nead_unicentro');;
    $default = 'repeat';
    $choices = array(
        '0' => get_string('default'),
        'repeat' => get_string('backgroundrepeatrepeat', 'theme_nead_unicentro'),
        'repeat-x' => get_string('backgroundrepeatrepeatx', 'theme_nead_unicentro'),
        'repeat-y' => get_string('backgroundrepeatrepeaty', 'theme_nead_unicentro'),
        'no-repeat' => get_string('backgroundrepeatnorepeat', 'theme_nead_unicentro'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background position setting.
    $name = 'theme_nead_unicentro/backgroundposition';
    $title = get_string('backgroundposition', 'theme_nead_unicentro');
    $description = get_string('backgroundposition_desc', 'theme_nead_unicentro');
    $default = '0';
    $choices = array(
        '0' => get_string('default'),
        'left_top' => get_string('backgroundpositionlefttop', 'theme_nead_unicentro'),
        'left_center' => get_string('backgroundpositionleftcenter', 'theme_nead_unicentro'),
        'left_bottom' => get_string('backgroundpositionleftbottom', 'theme_nead_unicentro'),
        'right_top' => get_string('backgroundpositionrighttop', 'theme_nead_unicentro'),
        'right_center' => get_string('backgroundpositionrightcenter', 'theme_nead_unicentro'),
        'right_bottom' => get_string('backgroundpositionrightbottom', 'theme_nead_unicentro'),
        'center_top' => get_string('backgroundpositioncentertop', 'theme_nead_unicentro'),
        'center_center' => get_string('backgroundpositioncentercenter', 'theme_nead_unicentro'),
        'center_bottom' => get_string('backgroundpositioncenterbottom', 'theme_nead_unicentro'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Background fixed setting.
    $name = 'theme_nead_unicentro/backgroundfixed';
    $title = get_string('backgroundfixed', 'theme_nead_unicentro');
    $description = get_string('backgroundfixed_desc', 'theme_nead_unicentro');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Main content background color.
    $name = 'theme_nead_unicentro/contentbackground';
    $title = get_string('contentbackground', 'theme_nead_unicentro');
    $description = get_string('contentbackground_desc', 'theme_nead_unicentro');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Secondary background color.
    $name = 'theme_nead_unicentro/secondarybackground';
    $title = get_string('secondarybackground', 'theme_nead_unicentro');
    $description = get_string('secondarybackground_desc', 'theme_nead_unicentro');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Invert Navbar to dark background.
    $name = 'theme_nead_unicentro/invert';
    $title = get_string('invert', 'theme_nead_unicentro');
    $description = get_string('invertdesc', 'theme_nead_unicentro');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Logo file setting.
    $name = 'theme_nead_unicentro/logo';
    $title = get_string('logo','theme_nead_unicentro');
    $description = get_string('logodesc', 'theme_nead_unicentro');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_nead_unicentro/customcss';
    $title = get_string('customcss', 'theme_nead_unicentro');
    $description = get_string('customcssdesc', 'theme_nead_unicentro');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_nead_unicentro/footnote';
    $title = get_string('footnote', 'theme_nead_unicentro');
    $description = get_string('footnotedesc', 'theme_nead_unicentro');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
    
    // External CSS.
    $name = 'theme_nead_unicentro/externalcss';
    $title = get_string('externalcss', 'theme_nead_unicentro');
    $description = get_string('externalcssdesc', 'theme_nead_unicentro');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $settings->add($setting);
    
}

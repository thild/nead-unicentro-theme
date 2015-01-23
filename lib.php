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
 * Theme Nead/Unicentro lib.
 *
 * @package    theme_nead_unicentro
 * @copyright  2014 Frédéric Massart, Tony Alexander Hild
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Extra LESS code to inject.
 *
 * This will generate some LESS code from the settings used by the user. We cannot use
 * the {@link theme_nead_unicentro_less_variables()} here because we need to create selectors or
 * alter existing ones.
 *
 * @param theme_config $theme The theme config object.
 * @return string Raw LESS code.
 */
function theme_nead_unicentro_extra_less($theme) {
    $content = '';
    $imageurl = $theme->setting_file_url('backgroundimage', 'backgroundimage');
    // Sets the background image, and its settings.
    if (!empty($imageurl)) {
        $content .= 'body { ';
        $content .= "background-image: url('$imageurl');";
        if (!empty($theme->settings->backgroundfixed)) {
            $content .= 'background-attachment: fixed;';
        }
        if (!empty($theme->settings->backgroundposition)) {
            $content .= 'background-position: ' . str_replace('_', ' ', $theme->settings->backgroundposition) . ';';
        }
        if (!empty($theme->settings->backgroundrepeat)) {
            $content .= 'background-repeat: ' . $theme->settings->backgroundrepeat . ';';
        }
        $content .= ' }';
    }
    // If there the user wants a background for the content, we need to make it look consistent,
    // therefore we need to round its borders, and adapt the border colour.
    if (!empty($theme->settings->contentbackground)) {
        $content .= '
            #region-main {
                .well;
                background-color: ' . $theme->settings->contentbackground . ';
                border-color: darken(' . $theme->settings->contentbackground . ', 7%);
            }';
    }
    return $content;
}

/**
 * Returns variables for LESS.
 *
 * We will inject some LESS variables from the settings that the user has defined
 * for the theme. No need to write some custom LESS for this.
 *
 * @param theme_config $theme The theme config object.
 * @return array of LESS variables without the @.
 */
function theme_nead_unicentro_less_variables($theme) {
    $variables = array();
    if (!empty($theme->settings->bodybackground)) {
        $variables['bodyBackground'] = $theme->settings->bodybackground;
    }
    if (!empty($theme->settings->textcolor)) {
        $variables['textColor'] = $theme->settings->textcolor;
    }
    if (!empty($theme->settings->linkcolor)) {
        $variables['linkColor'] = $theme->settings->linkcolor;
    }
    if (!empty($theme->settings->secondarybackground)) {
        $variables['wellBackground'] = $theme->settings->secondarybackground;
    }
    return $variables;
}

/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */
function theme_nead_unicentro_process_css($css, $theme) {

    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_nead_unicentro_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_nead_unicentro_set_customcss($css, $customcss);

    return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_nead_unicentro_set_logo($css, $logo) {
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_nead_unicentro_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'logo' || $filearea === 'backgroundimage')) {
        $theme = theme_config::load('nead_unicentro');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_nead_unicentro_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * Do not add Nead/Unicentro specific logic in here, child themes should be able to
 * rely on that function just by declaring settings with similar names.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_nead_unicentro_get_html_for_settings(renderer_base $output, moodle_page $page) {
    global $CFG;
    $return = new stdClass;

    $return->navbarclass = '';
    if (!empty($page->theme->settings->invert)) {
        $return->navbarclass .= ' navbar-inverse';
    }

    $page_heading = $output->page_heading();
    if (!empty($page->theme->settings->logo)) {
        $courseid = $page->course->id;
        $context = context_course::instance($courseid);
        //print_object($page->course);
        $theme = theme_config::load('nead_unicentro');
        $logo = $theme->setting_file_url('logo', 'logo');
        //$img = html_writer::empty_tag('img', array('src' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAAAUCAYAAAByKzjvAAAAHklEQVRYhe3BAQ0AAADCoPdPbQ8HFAAAAAAAAACvBh4UAAGaUi4OAAAAAElFTkSuQmCC', 'class' => 'logo-placeholder', 'width' => '100%', 'height' => '20'));
        //$img = html_writer::empty_tag('img', array('src' => $logo, 'class' => 'logo-placeholder hidden'));
        $img = html_writer::empty_tag('img', array('src' => $logo, 'class' => 'logo-placeholder'));
        
        $default_heading = html_writer::tag('div', $page_heading, array('class' => 'default-heading'));
        
        $text = '';
        
        if(method_exists(course_get_format($page->course), 'get_settings')) {
	  $text = course_get_format($page->course)->get_settings()['headinginfo'];
	}
	
	$header_info = '';
	
	if (is_null($text)) {
	  $text = '';
	}
	else {
	  $heading_info = html_writer::tag('div', $text, array('class' => 'heading-info')); 
	}
	
        $logo_heading = html_writer::tag('div', $img.$heading_info, array('class' => 'logo'));
        $return->heading = $logo_heading.$default_heading;
    } else {
        $return->heading = $output->page_heading();
    }

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote text-center">'.format_text($page->theme->settings->footnote).'</div>';
    }

    return $return;
}

function theme_nead_unicentro_page_init(moodle_page $page) {
    $page->requires->jquery();
    $page->requires->jquery_plugin('bootstrap', 'theme_nead_unicentro');
    $page->requires->jquery_plugin('jquery.cookie', 'theme_nead_unicentro');
    $page->requires->jquery_plugin('jquery.colorbox', 'theme_nead_unicentro');
    $page->requires->jquery_plugin('jquery.colorbox-pt-br', 'theme_nead_unicentro');
}

/**
 * Loads the JavaScript for the zoom function.
 *
 * @param moodle_page $page Pass in $PAGE.
 */
function theme_nead_unicentro_initialise_zoom(moodle_page $page) {
    user_preference_allow_ajax_update('theme_nead_unicentro_zoom', PARAM_TEXT);
    $page->requires->yui_module('moodle-theme_nead_unicentro-zoom', 'M.theme_nead_unicentro.zoom.init', array());
}

/**
 * Get the user preference for the zoom function.
 */
function theme_nead_unicentro_get_zoom() {
    return get_user_preferences('theme_nead_unicentro_zoom', '');
}
/* zoom.js
 * copyright  2014 Bas Brands, www.basbrands.nl
 * authors    Bas Brands, David Scotson
 * license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *  */

var onZoom = function() {
  var zoomin = Y.one('body').hasClass('zoomin');
  if (zoomin) {
    Y.one('body').removeClass('zoomin');
    Y.one('body').addClass('nozoom');
    console.log('nozoom');
    M.util.set_user_preference('theme_unicentro_zoom', 'nozoom');
  } else {
    Y.one('body').addClass('zoomin');
    Y.one('body').removeClass('nozoom');
    console.log('zoomin');
    M.util.set_user_preference('theme_unicentro_zoom', 'zoomin');
  }
};

//When the button with class .moodlezoom is clicked fire the onZoom function
M.theme_unicentro = M.theme_unicentro || {};
M.theme_unicentro.zoom =  {
  init: function() {
    Y.one('body').delegate('click', onZoom, '.moodlezoom');
  }
};
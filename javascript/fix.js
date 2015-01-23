$(document).ready(function(){

//redimensionamento de texto
    $(window).bind('resize', function()
        {
            //Standard height, for which the body font size is correct
            var width = $(window).width();
            if(width < 900) return;
            var newFontSize = Math.floor(width * .03) - 1;
            $(".heading-info").css("font-size", newFontSize);
        }).trigger('resize');
 
});

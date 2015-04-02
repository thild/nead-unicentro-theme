$(document).ready(function(){
  //$(".activityinstance  a").addClass('iframe-activity');    
  $(".nogroup").colorbox();
  $(".group1").colorbox({rel:'group1'});
  $(".fade1").colorbox({rel:'fade1', transition:"fade"});
  $(".fixed1").colorbox({rel:'fixed1', transition:"none", width:"75%", height:"75%"});
  $(".show1").colorbox({rel:'show1', slideshow:true});
  $(".show2").colorbox({rel:'show2', slideshow:true, maxWidth:"1000px", maxHeight:"700px"});
  $(".ajax").colorbox();
  $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
  $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
  $(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
  $(".iframe-activity").colorbox({iframe:true, width:"80%", height:"80%"});
  $(".inline").colorbox({inline:true, width:"80%"});
  $('.non-retina').colorbox({rel:'group5', transition:'none'})
  $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
  $(".youtube").prepend('<img class="iconlarge activityicon" alt="URL" src="/theme/image.php?theme=nead_unicentro&component=url&image=icon" />');  
  $(".inline").prepend('<img class="iconlarge activityicon" alt="URL" src="/theme/image.php?theme=nead_unicentro&component=url&image=icon" />');  
  $(".iframe").prepend('<img class="iconlarge activityicon" alt="URL" src="/theme/image.php?theme=nead_unicentro&component=core&image=f%2Fsourcecode-24"></img>');
});  
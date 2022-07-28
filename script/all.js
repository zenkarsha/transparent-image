createImage();
var countdown = Date.now(),
    currentTime = Date.now();

$(document).ready(function()
{
  $('.ellipsis').dotdotdot();
  $('input.minicolors').ColorPickerSliders({
    placement: 'top',
    order: {
      preview: 1,
      hsl: 2
    }
  });

  $("#normalSubmit").click(function() {
    $('#directpost').val('');
    $('#iamForm').attr("target","_self").submit();
  });

  $("#facebookSubmit").click(function() {
    $('#directpost').val('1');
    $('#iamForm').attr("target","_blank").submit();
  });

  $(".link").click(function() {
    if($(this).hasClass('unlink')) $(this).removeClass('unlink');
    else $(this).addClass('unlink');
  });
  $("#image_w, #image_h").on('keyup change blur', function() {
    if($('.link').hasClass('unlink')==false)
    {
      var value = $(this).val();
      if($(this).attr('id')=='image_w') $('#image_h').val(value);
      else $('#image_w').val(value);
    }
    createImage();
  });
  $("#blank_level,#bgcolor,#color").on('change blur', function(){
    createImage();
  });

  $("#show").click(function() {
    $(".preview").toggle();
  });
});

//ajax function
function createImage()
{
  $('#loading').show();
  $.ajax({
    url: 'ajax',
    dataType: 'html',
    type:'POST',
    data: {
      image_w: $("#image_w").val(),
      image_h: $("#image_h").val(),
      bgcolor: $("#bgcolor").val(),
      color: $("#color").val(),
      blank_level: $("#blank_level").val()
    },
    success: function(response){
      $("#coverprint").html(response)
      $('#loading').fadeOut();
    }
  });
}

// scroll to top
$(window).scroll(function (event) {
  var scroll = $(window).scrollTop();
  var height = $(window).height();
  if(scroll > height*0.5)
    $('.gototop').show();
  else
    $('.gototop').hide();
});
$('.gototop').click(function(){
  $('html,body').animate({scrollTop: 0},'fast');
});

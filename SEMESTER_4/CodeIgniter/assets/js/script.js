$(window).on('resize', function(){
  console.log($(window).width());
  if ($(window).width() < 767) {
    $('.sidebar').removeClass('mbl');
  } else {
    $('.sidebar').removeClass('desk');
  }
});

$('#toggleNav').click(function() {
  if ($(window).width() < 767) {
    $('.sidebar').toggleClass('desk');
  } else {
    $('.sidebar').toggleClass('mbl');
  }
});

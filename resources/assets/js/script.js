
$(function() {
  $('a[href*=\\#]:not([href=\\#])').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 60}, 500, 'linear');
  });
});
let pad= (d) =>{
  return (d < 10) ? '0' + d.toString() : d.toString();
};
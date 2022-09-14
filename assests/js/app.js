$('.show-sidebar-btn').click(function(){
    $('.sidebar').animate({marginLeft:0})
})
$('.hide-sidebar-btn').click(function(){
    $('.sidebar').animate({
        marginLeft:-500,
    })
});
$(function () {
    $('[data-toggle="popover"]').popover()
  });
  $('.full-screen-btn').click(function(){
    let current=$(this).closest('.card')
    current.toggleClass('full-card')
    if(current.hasClass('full-card')){
        $(this).html(`<i class="feather-minimize-2 full-screen-btn"></i>`)
    }else{
        $(this).html(`<i class="feather-maximize-2 full-screen-btn"></i>`)
    }
  })


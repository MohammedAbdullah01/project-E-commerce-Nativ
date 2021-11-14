
$(function() {
    'use strict';
    $('.profile-img bi-camera-fill').click (function(){
        $(this).addClass('icon-p')

    });

    $('.login-page h2 span').click (function(){
        $(this).addClass('selected').siblings().removeClass('selected');
        $('.login-page form').hide();
        $('.' + $(this).data('class')).fadeIn(100);

    });

    $('[placeholder]').focus(function(){

        $(this).attr('data-text', $(this).attr('placeholder'));

        $(this).attr('placeholder', '');

    }).blur(function() {
        $(this).attr('placeholder', $(this).attr('data-text'));
    
    });

    var passField =$('.password');
    
    $('.bi-eye-fill').hover(function () {
        
        passField.attr('type','text');

    },function(){
        passField.attr('type','password');

    });

    $('.confirm').click (function (){
        return confirm('Are You Sure?');
    });

    $('.live-name').keyup(function (){
        $('.live-card .card-body h3').text($(this).val());

    });
    $('.live-desc').keyup(function (){
        $('.live-card .card-body p').text($(this).val());

    });
    $('.live-price').keyup(function (){
        $('.live-card .price').text('$'+$(this).val());

    });

});

// Start rate
$(function () {
 
  $("#rateYo").rateYo({
    fullStar  : true,
    spacing   : "5px",
    onSet: function(rating, rateYolnstance){
     $("#rating").val(rating)
    }
  });
 
 });
//  End rate 


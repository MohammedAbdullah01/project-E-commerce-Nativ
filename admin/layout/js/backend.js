
$(function() {
    'use strict';

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

});

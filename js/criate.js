$(document).ready(function(){
    'use strict';
 
    $('#background_curtain').on('click', function(){
        $('#background_curtain').hide();
    });

    $('.pop').on('click', function(){
	$('#background_curtain').find("#largeImg").attr("src",$(this).attr("href"));
        $('#background_curtain').show();
        return false;
    });
});
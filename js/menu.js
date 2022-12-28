$(document).ready(function(){

    $(".block").click(function(){
        $(this).toggleClass('active');
        $(".price").removeClass('active');
        $(".active .price").addClass('active');
    });
    
    });
import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;


/*
document.querySelector(".thread_div").addEventListener("click", () => {
    document.querySelector("#defaultModal").classList.toggle("hidden");
});
*/


$( "#down_vote, #up_vote" ).on("click", function() {
    //alert($(this).css('color'))
    alert("/vote/"+$(this).attr('id'))



    /*
    $.ajax({url: "/vote/"+$(this).attr('id'), success: function(result){
        $("#div1").html(result);
    }});
    */

    $.ajax({
        url : "/vote/"+$(this).attr('id'),
        context: document.body
      }).done(function() {
        $( this ).addClass( "done" );
    });
    
    
    $('#heat_score').val($('#heat_score').text()+1)
  });


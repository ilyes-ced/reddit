import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;


/*
document.querySelector(".thread_div").addEventListener("click", () => {
    document.querySelector("#defaultModal").classList.toggle("hidden");
});
*/

//inrement or decrement a posts score
$( "#down_vote, #up_vote" ).on("click", function() {
    if($(this).hasClass('text-the_red')){
        $(this).removeClass('text-the_red')
    }else{
        $(this).addClass('text-the_red')
    }
    $.ajax({
        url : "/vote",
        method: 'post',
        data: {
            _token:$('meta[name="csrf-token"]').attr('content'),
            type: $(this).attr('id'),
            id: $(this).parent().attr('id'),
         }
      })
    
    $('#heat_score').val($('#heat_score').text()+1)
  });

  
//open a post
$( ".post_clickable" ).on("click", function() {
    window.location.href = "/post/"+$(this).attr('id');
})
  


$( "#register" ).on("click", function() {
    $('#registration_modal').removeClass('hidden')
})
$( "#registration_modal" ).on("click", function() {
    $('#registration_modal').addClass('hidden')
})

$( "#login" ).on("click", function() {
    $('#login_modal').removeClass('hidden')
})
$( "#login_modal" ).on("click", function() {
    $('#login_modal').addClass('hidden')
})
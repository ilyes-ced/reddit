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
    $.ajax({
        url : "/vote",
        method: 'post',
        data: {
            _token:$('meta[name="csrf-token"]').attr('content'),
            type: $(this).attr('id'),
            id: $(this).parent().attr('id'),
         },
        success: function(result){
            alert(result)
        }
      })
    
    $('#heat_score').val($('#heat_score').text()+1)
  });

  
//open a post
$( ".post_clickable" ).on("click", function() {
    window.location.href = "/post/"+$(this).attr('id');
})
  
import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;
import Dropzone from "dropzone";


if($('.dropzone')[0]){
var myDropzone = new Dropzone(".dropzone")
myDropzone.options.imageUpload = {
            maxFilesize         :       2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
};
}




//inrement or decrement a posts score
$( "#down_vote, #up_vote" ).on("click", function() {
    if($(this).attr('id')=='up_vote'){
        if($(this).hasClass('text-the_red')){
            $(this).removeClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())-1)
        }else{
            $(this).addClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())+1)
        }
    }else if($(this).attr('id')=='down_vote'){
        if($(this).hasClass('text-the_red')){
            $(this).removeClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())+1)
        }else{
            $(this).addClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())-1)
        }
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
  })

  


  $( ".bookmark" ).on("click", function() {
    
    $(this).toggleClass('text-the_red')
 
    $.ajax({
        url : "/bookmarks",
        method: 'post',
        data: {
            _token:$('meta[name="csrf-token"]').attr('content'),
            type: 'bookmark',
            id: $(this).attr('id'),
         },success : function(data) {              
            if(data=='redirect_to_login'){
                window.location.href = "/login";
            }
        }
      })
    
  })



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


$( "#toggle_user_menu" ).on("click", function() {
    $('#user_menu').toggle('hidden')
})
$( "#toggle_subs_menu" ).on("click", function() {
    $('#subs_menu').toggle('hidden')
})


 


$( "#add_post_nav, #add_post_input_image" ).on("click", function() {
    window.location.href = "/add_post"; 
})

$("#add_post_input").on("click", function() {
    window.location.href = "/add_post"; 
})






$("#post_type").on("click", function() {
    $(this).addClass('bg-secondary text-the_red')
    $('#image_type').removeClass('bg-secondary text-the_red')
    $('#post_type_div').removeClass('hidden')
    $('#image_type_div').addClass('hidden')
})
$("#image_type").on("click", function() {
    $(this).addClass('bg-secondary text-the_red')
    $('#post_type').removeClass('bg-secondary text-the_red')
    $('#post_type_div').addClass('hidden')
    $('#image_type_div').removeClass('hidden')
})








$('#main_select').on('change', function(){
    $('#submit_button').removeClass('bg-main')
    $('#submit_button').removeClass('hover:bg-gray-800')
    $('#submit_button').addClass('bg-the_red')
    $('#submit_button').addClass('hover:bg-red-800')
    $('#submit_button').prop('disabled',false)
    $('#selected_sub_input').val($('#main_select').val())
    $('#selected_sub_input_image').val($('#main_select').val())

})






































$('#submit_button_images_input').on('click', function(){
    $("#input_image_form").submit()
})


$('.copy_to_clipboard').on('click', function(){
    var copyText = $(this).parent().find('a')[0];
    navigator.clipboard.writeText(copyText);
})




$('#join_leave').on('click', function(){
   // alert($(this).text())
    $(this).toggleClass('bg-the_red text-main border-the_red bg-transparent')
    if($(this).text()=='join'){
        $(this).text('leave')
    }else{
        $(this).text('join')
    }
    $.ajax({
        url : "/join_leave_sub",
        method: 'post',
        data: {
            _token:$('meta[name="csrf-token"]').attr('content'),
            id: $(this).parent().attr('id'),
         },success : function(data) {              
            alert(data)
        }
      })
    
})




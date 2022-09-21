import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;
import Dropzone from "dropzone";
import { startCase } from 'lodash';


if($('.dropzone')[0]){
var myDropzone = new Dropzone(".dropzone")
myDropzone.options.imageUpload = {
            maxFilesize         :       2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
};
}



//up vote down vote posts
$('body').on('click', '#down_vote, #up_vote', function() {
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
        },
        success : function(data) {            
            
        }
    })
});





//bookmark post
$('body').on('click', '.bookmark', function() {
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
$('body').on('click', '.post_clickable', function() {
    var classes = event.target.classList
    if (!(classes=='h-10 w-6')){
        window.location.href = "/post/"+$(this).attr('id');
    }
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



$('body').on('click', '.copy_to_clipboard', function() {
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























function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    )
}
var delay = 0
function start(){
    if(delay==0){
        delay = 3000
        setTimeout(function() { delay = 0 ; console.log('it changed')}, 3000);
        
        console.log('grege')
        var last_id = $('#posts_cont').children().last().attr('id')
        var number_of_elments = ($('#posts_cont').children().length)-1
        $('#posts_cont').append('<div id="to_be_removed" role="status" class="m-6 rounded-lg border border-gray-200 shadow animate-pulse md:p-6 dark:border-gray-700"><div class="flex justify-center items-center mb-4 h-48 bg-gray-300 rounded dark:bg-gray-700"><svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512" data-darkreader-inline-fill="" style="--darkreader-inline-fill:currentColor;"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"></path></svg></div><div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div><div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div><div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div><div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div><div class="flex items-center mt-4 space-x-3"><div><div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div><div class="w-48 h-2 bg-gray-200 rounded-full dark:bg-gray-700"></div></div></div><span class="sr-only">Loading...</span></div>')
        window.livewire.emit('load-more');
    }
}
document.addEventListener('scroll', function () {
    isInViewport(document.querySelector('#posts_cont').lastElementChild) ?
    start() :
    ''
}, {
    passive: true
})












$('body').on('click', '#down_vote_comment, #up_vote_comment', function() {
    if($(this).attr('id')=='up_vote_comment'){
        if($(this).hasClass('text-the_red')){
            $(this).removeClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())-1)
        }else{
            $(this).addClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())+1)
        }
    }else if($(this).attr('id')=='down_vote_comment'){
        if($(this).hasClass('text-the_red')){
            $(this).removeClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())+1)
        }else{
            $(this).addClass('text-the_red')
            $(this).parent().find('p').text(parseInt($(this).parent().find('p').text())-1)
        }
    }
    $.ajax({
        url : "/vote_comment",
        method: 'post',
        data: {
            _token:$('meta[name="csrf-token"]').attr('content'),
            type: $(this).attr('id'),
            id: $(this).parent().attr('id'),
        },
        success : function(data) {            
            alert(JSON.stringify(data))
        }
    })
});






$('.hover_hide').on('mouseover', function(){
    $('.prev_img, .next_img, .img_index').removeClass('hidden')
})

$('.hover_hide').on('mouseout', function(){
    $('.prev_img, .next_img, .img_index').addClass('hidden')
})



var image_index = 1
$('.prev_img').on('click', function(){
    var num_images = $(this).parent().find('.img_index').text().split(' / ')[1]
    var current_image = $(this).parent().find('.images_div').find('img').not('.hidden')
    if (current_image.index()>0){
        image_index = image_index-1
        $(this).parent().find('.img_index').text(image_index+' / '+num_images)
        current_image.addClass('hidden')
        $(this).parent().find('.images_div').find('img').eq(current_image.index()-1).removeClass('hidden')
    }
})


$('.next_img').on('click', function(){
    var num_images = $(this).parent().find('.img_index').text().split(' / ')[1]
    var current_image = $(this).parent().find('.images_div').find('img').not('.hidden')
    if (current_image.index()<num_images-1){
        image_index = image_index+1
        $(this).parent().find('.img_index').text(image_index+' / '+num_images)
        current_image.addClass('hidden')
        $(this).parent().find('.images_div').find('img').eq(current_image.index()+1).removeClass('hidden')
    }
})

































$('#general_toggle').on('click', function(){
    $('#general_data').removeClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#posts_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').removeClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#history_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').removeClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#subs_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').removeClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#comments_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').removeClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#bookmarks_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').removeClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#liked_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').removeClass('hidden')
    $('#disliked_data').addClass('hidden')
})
$('#disliked_toggle').on('click', function(){
    $('#general_data').addClass('hidden')
    $('#posts_data').addClass('hidden')
    $('#history_data').addClass('hidden')
    $('#subs_data').addClass('hidden')
    $('#comments_data').addClass('hidden')
    $('#bookmarks_data').addClass('hidden')
    $('#liked_data').addClass('hidden')
    $('#disliked_data').removeClass('hidden')
})





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






















/*

var dropzone = new Dropzone('#images_dropzone', {
    previewTemplate: document.querySelector('#preview-template').innerHTML,
    parallelUploads: 3,
    thumbnailHeight: 150,
    thumbnailWidth: 150,
    maxFilesize: 5,
    filesizeBase: 1500,
    thumbnail: function (file, dataUrl) {
        if (file.previewElement) {
            file.previewElement.classList.remove("dz-file-preview");
            var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
            for (var i = 0; i < images.length; i++) {
                var thumbnailElement = images[i];
                thumbnailElement.alt = file.name;
                thumbnailElement.src = dataUrl;
            }
            setTimeout(function () {
                file.previewElement.classList.add("dz-image-preview");
            }, 1);
        }
    }
});

var minSteps = 6,
    maxSteps = 60,
    timeBetweenSteps = 100,
    bytesPerStep = 100000;
dropzone.uploadFiles = function (files) {
    var self = this;
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
        for (var step = 0; step < totalSteps; step++) {
            var duration = timeBetweenSteps * (step + 1);
            setTimeout(function (file, totalSteps, step) {
                return function () {
                    file.upload = {
                        progress: 100 * (step + 1) / totalSteps,
                        total: file.size,
                        bytesSent: (step + 1) * file.size / totalSteps
                    };
                    self.emit('uploadprogress', file, file.upload.progress, file.upload
                        .bytesSent);
                    if (file.upload.progress == 100) {
                        file.status = Dropzone.SUCCESS;
                        self.emit("success", file, 'success', null);
                        self.emit("complete", file);
                        self.processQueue();
                    }
                };
            }(file, totalSteps, step), duration);
        }
    }
}*/
{{--
<form action="" id='images_dropzone' method="POST" id='input_image'>
    @csrf
    
    <input name='title'  class='mb-4 p-2 rounded-lg bg-main border  w-full'  placeholder='title' type="text">
    <input id='selected_sub_input_image' type="hidden" name="selected_sub">

    <div class="rounded-lg border-dashed border-2 ">
        <div class="py-2 px-4 bg-main rounded-lg  h-40">
            upload images
        </div>
    </div>    
</form>

--}}

<input  class='mb-4 p-2 rounded-lg bg-main border  w-full' name='title'  placeholder='title' type="text">
<div class="bg-secondary container h-40 w-full rounded-xl border border-dashed ">
    <form id='input_image_form'  action="{{ URL('create_post_image') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone w-full h-full  flex items-center justify-center cursor-pointer">
        @csrf
        
    </form>
    <button id='submit_button_images_input' type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main border rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-gray-800">
        Submit Post
    </button>
</div>

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


    <form id='input_image_form'  action="{{ URL('create_post_image') }}" method="post" enctype="multipart/form-data" class=" w-full h-full">
        @csrf
        <input  class='mb-4 p-2 rounded-lg bg-main border  w-full' name='title'  placeholder='title' type="text">

        <input id='selected_sub_input_image' type="hidden" name="selected_sub">
        <div class="w-full h-full grid grid-cols-5 gap-4 p-4 bg-secondary cursor-pointer  border border-dashed rounded-lg">
            <div>
                <div id='trigget_1' class="collective_images_trigger   h-[170px] border border-2 border-dashed rounded flex items-center justify-center "> 
                <p>+</p>
                </div>
                <input class='hidden collective_images' type="file" name="input_image_1" id="input_image_1">
            </div>
        </div>
    </form>



<button disabled id='submit_button_images_input' type="submit" class="mt-4 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main border rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-gray-800">
    Submit Post
</button>




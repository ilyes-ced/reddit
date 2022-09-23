<form action="{{route('create_post')}}" method="POST" id='input' enctype="multipart/form-data">
    @csrf
    <input  class='mb-4 p-2 rounded-lg bg-main border  w-full' name='title'  placeholder='title' type="text">
    <input id='selected_sub_input' type="hidden" name="selected_sub">
    <div  class=" bg-gray-50 rounded-lg border border-gray-200 ">
        <div id='bullbull' class="py-2 px-4 bg-main rounded-t-lg  ">
            <textarea name='main_text' id="comment" rows="10" class="bg-main px-0 w-full text-sm text-the_text  border-0  focus:ring-0 " placeholder="Write a comment..." required=""></textarea>
            
        </div>
        <div class=" rounded-b-lg flex justify-between items-center py-2 px-3 border-t d bg-secondary ">
            <button data-tooltip-target="tooltip-default" disabled id='submit_button' type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main border rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-gray-800">
                Submit Post
            </button>
            <div class="flex   divide-x">
                <div class='flex flex-row'>
                    <x-bi-type-bold class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-type-italic class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-link-45deg class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-type-strikethrough class='mx-1 w-10 p-2 h-10 rounded-lg hover:bg-main'/>
                </div>
                <div class='flex flex-row'>
                    <x-bi-list-ol class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-list-ul class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-card-heading class='mx-1 w-10 p-2 h-10 rounded-lg hover:bg-main'/>
                </div>
                <div class='flex flex-row'>
                    <x-bi-table class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-code class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                </div>
                <div class='flex flex-row'>
                    <x-bi-card-image id='image_upload_sim' class='mx-1 w-10 h-10 p-2 rounded-lg hover:bg-main' />
                    <input class='hidden' id='image_file' type="file" name="image_file" >
                </div>
            </div>
        </div>
    </div>

</form>
@props(["post_id"])

    <div class=" bg-gray-50 rounded-lg border border-gray-200 mx-8">
        <div class="py-2 px-4 bg-main rounded-t-lg  ">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea name='main_text'  id="main_text" rows="6" class="bg-main px-0 w-full text-sm text-the_text  border-0  focus:ring-0 " placeholder="Write a comment..." required=""></textarea>
        </div>
        <div class=" rounded-b-lg flex justify-between items-center py-2 px-3 border-t d bg-secondary ">
            <button  id='submit_comment' type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main border rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-gray-800">
                post comment
            </button>
            <input type="hidden" id="post_id" name="post_id" value='{{$post_id}}'>
            <input type="submit" value="">
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
            </div>
        </div>
    </div>
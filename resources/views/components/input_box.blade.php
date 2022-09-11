
<form>
    <div class=" bg-gray-50 rounded-lg border border-gray-200 ">
        <div class="py-2 px-4 bg-main rounded-t-lg  ">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="4" class="bg-main px-0 w-full text-sm text-the_text  border-0  focus:ring-0 " placeholder="Write a comment..." required=""></textarea>
        </div>
        <div class=" rounded-b-lg flex justify-between items-center py-2 px-3 border-t d bg-secondary ">
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                Post comment
            </button>
            <div class="flex pl-0 space-x-2  divide-x">
                <div class='flex flex-row'>
                    <x-bi-type-bold class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-type-italic class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-link-45deg class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-type-strikethrough class='w-10 p-2 h-10 rounded-lg hover:bg-main'/>
                </div>
                <div class='flex flex-row'>
                    <x-bi-list-ol class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-list-ul class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-card-heading class='w-10 p-2 h-10 rounded-lg hover:bg-main'/>
                </div>
                <div class='flex flex-row'>
                    <x-bi-table class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                    <x-bi-code class='w-10 h-10 p-2 rounded-lg hover:bg-main'/>
                </div>
            </div>
        </div>
    </div>
 </form>

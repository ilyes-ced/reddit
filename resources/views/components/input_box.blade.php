
<form>
    <div class="m-8 bg-gray-50 rounded-lg border border-gray-200 ">
        <div class="py-2 px-4 bg-main rounded-lg  ">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="4" class="bg-main px-0 w-full text-sm text-the_text  border-0  focus:ring-0 " placeholder="Write a comment..." required=""></textarea>
        </div>
        <div class=" rounded-b-lg flex justify-between items-center py-2 px-3 border-t d bg-secondary ">
            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-blue-800">
                Post comment
            </button>
            <div class="flex pl-0 space-x-1 sm:pl-2">
                <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 ">
                    <x-bi-skip-forward-circle />
                    <span class="sr-only">Attach file</span>
                </button>
                <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 ">
                    <x-bi-skip-forward-circle />
                    <span class="sr-only">Set location</span>
                </button>
                <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 ">
                    <x-bi-skip-forward-circle />
                    <span class="sr-only">Upload image</span>
                </button>
            </div>
        </div>
    </div>
 </form>

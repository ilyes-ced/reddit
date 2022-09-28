<div class="py-4  cursor-pointer  sm:w-full md:w-2/3 lg:w-5/6 mx-auto "  >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border  border-icon">
            <div class="">
                <div class='flex flex-row dark:bg-secondary p-2' >

                    
                    <img class='h-12 w-12 bg-black rounded-full' src="../../images/{{Auth::user()->profile_image}}" alt="">  
                    <input id='add_post_input' placeholder='create post' class='p-2 rounded-lg bg-main border mx-4 w-full' type="text">
                    <div id='add_post_input_image' class='w-12 h-12 p-2 rounded-lg hover:bg-main'> 
                        <x-bi-card-image class='w-8 h-8 text-icons' />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
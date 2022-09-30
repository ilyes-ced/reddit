<div>
<form class='m-8' wire:submit.prevent="create_comment" method="POST" wire:key='{{time()}}'>
    @csrf
    <div class=" bg-gray-50 rounded-lg border border-gray-200 ">
        <div class="py-2 px-4 bg-main rounded-t-lg  ">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea wire:model="main_text" name='main_text' id="comment" rows="6" class="bg-main px-0 w-full text-sm text-the_text  border-0  focus:ring-0 " placeholder="Write a comment..." required=""></textarea>
            @error('main_text') <span class="text-the_red">{{ $message }}</span> @enderror
        </div>
        <div class=" rounded-b-lg flex justify-between items-center py-2 px-3 border-t d bg-secondary ">
            <button  id='submit_comment' type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main border rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-gray-800">
                post comment
            </button>
            <input wire:model="post_id" type="hidden" name="post_id" value='{{$post_id}}'>
            @error('post_id') <span class="text-the_red">{{ $message }}</span> @enderror
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
</form>
<form class='m-8 hidden' {{--wire:submit.prevent="create_sub_comment"--}} id='to_be_moved' method="POST">
    {{--@csrf--}}
    <div class=" bg-gray-50 rounded-lg border border-gray-200 ">
        <div class="py-2 px-4 bg-main rounded-t-lg  ">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea {{--wire:model="main_text_sub"--}} name='main_text_sub' rows="6" class="bg-main px-0 w-full text-sm text-the_text  border-0  focus:ring-0 " placeholder="Write a comment..." required=""></textarea>
        </div>
        <div class=" rounded-b-lg flex justify-between items-center py-2 px-3 border-t d bg-secondary ">
            <button  id='submit_comment' type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main border rounded-lg focus:ring-4 focus:ring-blue-200  hover:bg-gray-800">
                post comment
            </button>
            <input {{--wire:model="post_id"--}} type="hidden" name="post_id" value='{{$post_id}}'>
            <input id='parent_comment_id_live' type="hidden" name="parent_comment_id_live" {{--wire:model="parent_comment_id_live"--}}>
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
</form>

<x-comment_input />

<div class="m-8 p-4  bg-secondary rounded-lg  border  border-icon">
    <div class=''>
        @if (count($comments)==0)
            <p class='text-[25px] text-center'>no comments yet</p>
        @else
        
                <x-comment :comments="$comments" />
                
        @endif
        {{--<livewire:new-comment />--}}
    </div>
</div>

</div>
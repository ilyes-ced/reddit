
<x-layouts.app>

<div class="m-8 bg-secondary">
   <div class=' flex flex-row'> 

    <div class=''>
        <div id='{{$data->heat}}' class=' h-100 w-10  pt- text-center'>
            <x-bi-arrow-up id='up_vote'  class='w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
            <p id='heat_score'>{{$data->heat}}</p> 
            <x-bi-arrow-down id='down_vote'  class='w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
        </div>
    </div>

    <div class=''>
        <div class='flex flex-row'>
            <p class='text-gray-600'>posted by &nbsp; </p>
            <p class='text-text_color'> username </p>
            <p class='text-gray-600'>&nbsp;  3h ago</p>
        </div>
        <p class='text-[25px] my-2'>{{json_decode($data->content)->title}}</p>
        <p class='mb-4'>{{json_decode($data->content)->body}}</p>
    
        <img class='' src="../../images/{{json_decode($data->content)->images[0]}} " alt="">
    </div>

   
    
   </div>
   <div class='px-10 py-2 flex flex-row w-full h-full'>
    <a href='#' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
        comment
    </a>
    <a href='#' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-share class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
        share
    </a>
    </div>
</div>
<div class='m-8 p-2 bg-secondary border'>
    <textarea class='w-full' name="" id="" ></textarea>
    <div>
        icons bar
    </div>
</div>
   
<div class="m-8 p-4  bg-secondary">
    <div class=''>
        
        @if (count($comments)==0)
            <p class='text-[25px] text-center'>no comments yet</p>
        @endif
        @foreach ($comments as $item)
            <x-comment :item='$item' />   
            @foreach ($sub_comments1 as $item)
                @if ($item->parent_comment_id==1)
                <div  class='flex flex_row divide-x ml-3'>
                    <div class=''></div>
                    <div class='ml-4'>
                        <x-comment :item='$item' /> 
                        @foreach ($sub_comments2 as $item)
                        @if ($item->parent_comment_id==2)
                        <div  class='flex flex_row divide-x'>
                            <div class=''></div>
                            <div class='ml-4'>
                                <x-comment :item='$item' /> 
                            </div>
                        </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
    
</x-layouts.app>
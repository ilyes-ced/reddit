
<x-layouts.app>

<div class="mx-8 mt-4 bg-secondary rounded-lg  border  border-icon">
   <div class=' flex flex-row'> 

    <div class=''>  
        @php
            $col_up = in_array($data->id,json_decode(Auth::user()->up_votes)) ? 'text-the_red' : '';
            $col_down = in_array($data->id,json_decode(Auth::user()->down_votes)) ? 'text-the_red' : ''; 
        @endphp
        <div id='{{$data->heat}}' class=' h-100 w-10  pt-2 text-center'>
            <x-bi-caret-up-fill id='up_vote'  class='{{$col_up}} w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
            <p id='heat_score'>{{$data->heat}}</p> 
            <x-bi-caret-down-fill id='down_vote'  class='{{$col_down}} w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
        </div>
    </div>

    <div class=''>
        <div class='flex flex-row pt-2'>
            <p class='text-gray-600'>posted by &nbsp; </p>
            <p class='text-text_color'> username </p>
            <p class='text-gray-600'>&nbsp;  3h ago</p>
        </div>
        <p class='text-[25px] my-2'>{{json_decode($data->content)->title}}</p>
        <p class='mb-4'>{{json_decode($data->content)->body}}</p>
    
        <img class='' src="../../images/{{json_decode($data->content)->images[0]}} " alt="">
    </div>

   
    
   </div>
   <div class='px-10 py-2 flex flex-row w-full '>
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

<x-input_box />
   
<div class="m-8 p-4  bg-secondary rounded-lg  border  border-icon">
    <div class=''>
        
        @if (count($comments)==0)
            <p class='text-[25px] text-center'>no comments yet</p>
        @endif
        @foreach ($comments as $item)
            <x-comment :item='$item' />  
            @php ($var = $item->id)
            {{$sub_comments}}
            @foreach ($sub_comments as $item)
                <div  class='flex flex_row divide-x ml-3'>
                    <div class=''></div>
                    <div class='ml-4 w-full'>
                        <x-comment :item='$item' /> 
                    </div>
                </div>
            @endforeach

        @endforeach
    </div>
</div>
    
</x-layouts.app>


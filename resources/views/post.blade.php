
<x-layouts.app>

<div class="mx-8 mt-4 bg-secondary rounded-lg  border  border-icon">
   <div class=' flex flex-row'> 

    <div class=''>  
        <div id='{{$data->id}}' class=' '>
            @php
                if(Auth::user()){          
                $col_up = in_array($data->id,json_decode(Auth::user()->up_votes)) ? 'text-the_red' : '';
                $col_down = in_array($data->id,json_decode(Auth::user()->down_votes)) ? 'text-the_red' : ''; 
                }else{
                    $col_up = '';
                    $col_down = '';
                }
            @endphp
            <div class=' h-100 w-10  pt-2 text-center'>
                <x-bi-caret-up-fill id='up_vote'  class='{{$col_up}} w-8 h-8 p-1 hover:bg-secondary rounded-full hover:text-the_red mx-auto' />
                <p id='heat_score'>{{$data->heat}}</p> 
                <x-bi-caret-down-fill id='down_vote'  class='{{$col_down}}  w-8 h-8 p-1 hover:bg-secondary rounded-full  hover:text-the_red mx-auto'/>
            
            </div>
          </div>
    </div>

    <div class=''>
        <div class='flex flex-row pt-2'>
            
            @if (isset($sub))
                <img class='h-8 w-8 bg-black rounded-full' src="../../images/pic1.jpg" alt="">  
                <a href='/sub/{{$sub->id}}' class = 'pl-2 mt-1 font-bold text-white hover:underline'>{{$sub->name}}</a>           
            @else
                <a href='' class = 'pl-2 mt-1 font-bold text-white hover:underline'>[deleted]</a>           
            @endif
            <p class='text-gray-400 mt-1 pl-1'> ● posted by </p>
            @if (isset($use))
                <a href='/user/{{$user->id}}' class='text-gray-400 mt-1 pl-1 hover:underline'>{{$user->username}}</a>
            @else
                <a href='' class = 'pl-2 mt-1 font-bold text-white hover:underline'>[deleted]</a>           
            @endif
            
            @php

                if(((strtotime(now())-strtotime($data->created_at))/3600 )< 24){
                    $diff = floor((strtotime(now())-strtotime($data->created_at))/3600).'hrs ago';
                }else{
                    $diff = floor((strtotime(now())-strtotime($data->created_at))/3600/24).'days ago';
                }

            @endphp

    
    <p class='text-gray-400 mt-1 pl-1'>{{$diff}}</p>
        </div>
        <p class='text-[25px] my-2'>{{json_decode($data->content)->title}}</p>
        <p class='mb-4'>{{json_decode($data->content)->body}}</p>
    
        @if (isset(json_decode($data->content, true)["images"]))
            <a href="#">
                {{--<img src="../../images/{{json_decode($item->images)[0]}}" alt="My logo"/> --}}
                <img src="../../images/{{json_decode($data->content)->images[0]}}" alt="My logo"/>
            
            </a>
        @endif
    </div>

   
    
   </div>
   <div class='px-10 py-2 flex flex-row w-full '>
    <a href='' class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-chat-square-text class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
        comments
    </a>
    <a  class='px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-share class='w-5 h-5 hover:text-the_red mt-1 mr-2' />
        share
    </a>
    <a id='{{$data->id}}' class=' bookmark px-2 flex flex-row hover:bg-main hover:text-the_red h-full p-2'>
        <x-bi-bookmark  class='w-5 h-5 hover:text-the_red mt-1 mr-2'/>
        bookmark 
    </a>
    </div>
</div>
<div class='m-8'>
@if ($errors->any())
<div class="flex justify-center">
    <ul>
        @foreach ($errors->all() as $error)
            <li class='text-the_red'>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<x-input_box_comment :post_id="$data->id"/>
</div>
<div class="m-8 p-4  bg-secondary rounded-lg  border  border-icon">
    <div class=''>
        
        @if (count($comments)==0)
            <p class='text-[25px] text-center'>no comments yet</p>
        @endif

            <x-comment :comments='$comments' /> 
        
     
    </div>
</div>
    
</x-layouts.app>



{{--
        @foreach ($comments as $item)
            <x-comment :item='$item' />   
                @foreach ($sub_comments as $sub_item)
                    @if ($sub_item->parent_comment_id==$item->id)
                        <div  class='flex flex_row divide-x ml-3'>
                            <div class=''></div>
                            <div class='ml-4 w-full'>
                                <x-comment :item='$sub_item' />
                            </div>
                        </div>
                    @endif
                @endforeach
        @endforeach
        
    --}}